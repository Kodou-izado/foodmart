<?php

namespace App\Controller;

use App\Interfaces\AppInterface;
use App\Utils\DbHelper;
use App\Utils\Message;
use App\Utils\Utilities;
use App\Utils\FileUpload;
use stdClass;

class OrderController implements AppInterface
{
  private $helper;
  private $message;
  private $upload;
  public $order_type;
  public $payment_method;
  public $delivery_address;
  public $status;

  public function __construct(DbHelper $helper)
  {
    $this->helper = $helper;

    $this->message = new Message();

    $this->upload = new FileUpload('../../uploads/receipt/');
  }

  public function get(): array
  {
    if($_SESSION['role'] == "73ca4984-0c4b-11ee-a71c-088fc30176f9"){
      $this->helper->query(
        'SELECT * FROM `orders` WHERE `user_id` = ? ORDER BY `id` DESC',
        [$_SESSION['uid']]
      );

      return $this->helper->fetchAll();
    }

    if(!empty($_SESSION['order_filter'])){
      $this->helper->query(
        'SELECT * FROM `orders` o LEFT JOIN `accounts` a ON o.user_id=a.user_id WHERE o.status = ? ORDER BY o.id DESC',
        [$_SESSION['order_filter']]
      );
    } else {
      $this->helper->query(
        'SELECT * FROM `orders` o LEFT JOIN `accounts` a ON o.user_id=a.user_id ORDER BY o.id DESC'
      );
    }

    return $this->helper->fetchAll();
  }

  public function getOne(string $id): stdClass
  {
    
  }

  public function insert(): string
  {
    $this->helper->query("SELECT * FROM `accounts` WHERE `user_id` = ?", [$_SESSION['uid']]);
    $user_data = $this->helper->fetch();

    if($user_data->account_status != "Verified"){
      return $this->message->jsonError('Order cannot be processed');
    }
 
    if(empty($this->order_type) AND empty($this->payment_method)){
      return $this->message->jsonError('Set your payment details');
    }

    if($this->order_type == "Delivery" AND empty($this->delivery_address)){
      return $this->message->jsonError('Delivery address is required');
    }

    $this->upload->setFile($_FILES['gcash_receipt']);

    if($this->payment_method == "GCash" AND !$this->upload->isUploading()){
      return $this->message->jsonError('Upload the GCash receipt');
    }

    if($this->payment_method == "GCash" AND !$this->upload->isValidExtension(['png', 'jpg'])){
      return $this->message->jsonError('Accepts png and jpg type');
    }

    $this->helper->startTransaction();

    $this->helper->query(
      'SELECT * FROM `cart` WHERE `user_id` = ?',
      [$_SESSION['uid']]
    );

    $cart_items = $this->helper->fetchAll();

    $this->helper->query(
      'INSERT INTO `orders` (`order_id`, `order_no`, `user_id`, `order_type`, `payment_method`, `delivery_address`, `status`, `date_added`) VALUES (UUID(), ?, ?, ?, ?, ?, ?, current_timestamp())',
      [Utilities::generateOrderNo(), $_SESSION['uid'], $this->order_type, $this->payment_method, $this->delivery_address, 'Pending']
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('Cannot process your order');
    }

    $this->helper->query(
      'SELECT * FROM `orders` WHERE `id` = ?',
      [$this->helper->getInsertId()]
    );

    $order_details = $this->helper->fetch();

    foreach($cart_items as $item){
      $this->helper->query(
        'INSERT INTO `order_items` (`order_item_id`, `order_id`, `menu_id`, `quantity`, `date_added`) VALUES (UUID(), ?, ?, ?, current_timestamp())',
        [$order_details->order_id, $item->menu_id, $item->quantity]
      );

      if($this->helper->rowCount() == 0){
        $this->helper->rollback();
        return $this->message->jsonError('Cannot process your order');
      }
    }

    $this->helper->query(
      'DELETE FROM `cart` WHERE `user_id` = ?',
      [$_SESSION['uid']]
    );

    if($this->helper->rowCount() == 0){
      $this->helper->rollback();
      return $this->message->jsonError('Cannot process your order');
    }

    if($this->payment_method == "GCash" AND !$this->upload->isUploadSuccess($order_details->order_id.'.jpg')){
      $this->helper->rollback();
      return $this->message->jsonError('Cannot process your order');
    }

    $this->helper->query("INSERT INTO `notifications` (`user_id`, `date_created`) VALUES (?, current_timestamp())", [$_SESSION['uid']]);

    if($this->helper->rowCount() == 0){
      $this->helper->rollback();
      return $this->message->jsonError('Cannot process your order');
    }

    $this->helper->commit();
    return $this->message->jsonSuccess('Your order was placed');
  }

  public function update(string $id): string
  {
    if(empty($id) OR empty($this->status)){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->query(
      'SELECT * FROM `orders` WHERE `order_id` = ?',
      [$id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->query(
      'UPDATE `orders` SET `status` = ? WHERE `order_id` = ?',
      [$this->status, $id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('Status failed to update');
    }

    $message = Utilities::isCustomer() ? 'Order was cancelled' : 'Status was updated';
    return $this->message->jsonSuccess($message);
  }
  
  public function delete(string $id): string
  {

  }
}