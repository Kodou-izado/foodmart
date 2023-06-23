<?php

namespace App\Controller;

use App\Interfaces\AppInterface;
use App\Utils\DbHelper;
use App\Utils\Message;
use stdClass;

class CartController implements AppInterface
{
  private $helper;
  private $message;
  public $menu_id;
  public $quantity;

  public function __construct(DbHelper $helper)
  {
    $this->helper = $helper;

    $this->message = new Message();
  }

  public function get(): array
  {
    $this->helper->query(
      'SELECT * FROM `cart` c LEFT JOIN `menus` m ON c.menu_id=m.menu_id WHERE c.user_id = ? ORDER BY c.id DESC',
      [$_SESSION['uid']]
    );

    return $this->helper->fetchAll();

  }

  public function getOne(string $id): stdClass 
  {

  }

  public function insert(): string
  {
    if(empty($this->menu_id)){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->query(
      'SELECT * FROM `menus` WHERE `menu_id` = ?',
      [$this->menu_id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->query(
      'INSERT INTO `cart` (`cart_id`, `user_id`, `menu_id`, `quantity`, `date_added`) VALUES (UUID(), ?, ?, ?, current_timestamp())',
      [$_SESSION['uid'], $this->menu_id, 1]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('Add to cart failed');
    }

    return $this->message->jsonSuccess('Added to cart');
  }

  public function update(string $id): string
  {
    if(empty($id) AND empty($this->quantity)){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->query(
      'SELECT * FROM `cart` WHERE `cart_id` = ?',
      [$id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('An error occurred');
    }

    if($this->quantity == 0){
      $this->helper->query(
        'DELETE FROM `cart` WHERE `cart_id` = ?',
        [$id]
      );
    } else {
      $this->helper->query(
        'UPDATE `cart` SET `quantity` = ? WHERE `cart_id` = ?',
        [$this->quantity, $id]
      );
    }
    
    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('An error occurred');
    }

    return $this->message->jsonSuccess('Updated');
  }

  public function delete(string $id): string
  {
    
  }
}