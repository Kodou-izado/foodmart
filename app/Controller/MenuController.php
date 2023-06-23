<?php

namespace App\Controller;

use App\Interfaces\AppInterface;
use App\Utils\DbHelper;
use App\Utils\Message;
use App\Utils\FileUpload;
use stdClass;

class MenuController implements AppInterface
{
  private $helper;
  private $message;
  private $upload;
  private $accepted_extensions = ['png', 'jpg', 'svg'];
  public $name;
  public $price;
  public $category_id;
  public $tag;
  public $stock;

  public function __construct(DbHelper $helper)
  {
    $this->helper = $helper;

    $this->message = new Message();

    $this->upload = new FileUpload('../../uploads/menu/');
  }

  public function get(): array
  {
    if(!empty($_SESSION['menu_filter'])){
      $this->helper->query(
        'SELECT * FROM `menus` WHERE NOT `menu_tag` = ? AND `category_id` = ? ORDER BY `id` DESC',
        ['Not Available', $_SESSION['menu_filter']]
      );
    } else {
      $this->helper->query(
        'SELECT * FROM `menus` WHERE NOT `menu_tag` = ? ORDER BY `id` DESC',
        ['Not Available']
      );
    }

    return $this->helper->fetchAll();
  }

  public function getOne(string $id): stdClass
  {
    $this->helper->query(
      'SELECT * FROM `menus` m LEFT JOIN `category` c ON m.category_id=c.category_id  WHERE NOT m.menu_tag = ? AND m.menu_id = ?',
      ['Not Available', $id]
    );

    return $this->helper->fetch();
  }

  public function insert(): string
  {
    if(
      empty($this->name) OR 
      empty($this->price) OR 
      empty($this->category_id) OR 
      empty($this->tag) OR 
      empty($this->stock)
    )
    {
      return $this->message->jsonError('All fields are required');
    }

    $this->upload->setFile($_FILES['menuimg']);
    
    if(!$this->upload->isUploading()){
      return $this->message->jsonError('Upload an image');
    }
    
    if(!$this->upload->isValidExtension(['jpg', 'png'])){
      return $this->message->jsonError('Accepted png and jpg type');
    }

    $this->helper->query(
      'SELECT * FROM `menus` WHERE `menu_name` = ?',
      [$this->name]
    );

    if($this->helper->rowCount() > 0){
      return $this->message->jsonError('Menu already exist');
    }

    $this->helper->startTransaction();

    $this->helper->query(
      'INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_price`, `category_id`, `menu_tag`, `menu_stock`, `date_created`, `date_updated`) VALUES (UUID(), ?, ?, ?, ?, ?, current_timestamp(), current_timestamp())',
      [$this->name, $this->price, $this->category_id, $this->tag, $this->stock]
    );

    $this->helper->query(
      'SELECT * FROM `menus` WHERE `id` = ?',
      [$this->helper->getInsertId()]
    );

    $menu = $this->helper->fetch();

    if(!$this->upload->isUploadSuccess($menu->menu_id.'.png')){
      $this->helper->rollback();
      return $this->message->jsonError('Menu cannot be saved');
    }

    $this->helper->commit();

    return $this->message->jsonSuccess('Menu saved');
  }

  public function update(string $id): string
  {
    if(empty($id)){
      return $this->message->jsonError('An error occured');
    }

    $this->helper->query(
      'SELECT * FROM `menus` WHERE `menu_id` = ?',
      [$id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('An error occured');
    }

    if(
      empty($this->name) OR 
      empty($this->price) OR 
      empty($this->category_id) OR 
      empty($this->tag) OR 
      empty($this->stock)
    )
    {
      return $this->message->jsonError('All fields are required');
    }

    $this->upload->setFile($_FILES['menuimg']);

    if($this->upload->isUploading()){
      $file_data = explode('.', $_FILES['menuimg']['name']);
      $extension = end($file_data);
      
      if(!$this->upload->isValidExtension(['jpg', 'png'])){
        return $this->message->jsonError('Accepted png and jpg type');
      }
    }

    $this->helper->startTransaction();

    $this->helper->query(
      'UPDATE `menus` SET `menu_name` = ?, `menu_price` = ?, `category_id` = ?, `menu_tag` = ?, `menu_stock` = ?, `date_updated` = current_timestamp() WHERE `menu_id` = ?',
      [$this->name, $this->price, $this->category_id, $this->tag, $this->stock, $id]
    );

    if($_FILES['menuimg']['size'] > 0 AND !$this->upload->isUploadSuccess($id.'.png')){
      $this->helper->rollback();
      return $this->message->jsonError('Menu update failed');
    }

    $this->helper->commit();
    
    return $this->message->jsonSuccess('Menu updated');
  }

  public function delete(string $id): string
  {
    if(empty($id)){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->query(
      'SELECT * FROM `menus` WHERE `menu_id` = ?',
      [$id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->startTransaction();

    $this->helper->query(
      'DELETE FROM `menus` WHERE `menu_id` = ?',
      [$id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('Menu cannot be deleted');
    }

    if(!$this->upload->isDeleteSuccess($id.'.png')){
      $this->helper->rollback();
      return $this->message->jsonError('Menu cannot be deleted');
    }

    $this->helper->commit();

    return $this->message->jsonSuccess('Menu deleted ');
  }
}