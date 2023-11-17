<?php

namespace App\Controller;

use App\Utils\DbHelper;
use App\Utils\Message;
use stdClass;

class UserController
{
  private $helper;
  private $message;
  public $status;

  public function __construct(DbHelper $helper)
  {
    $this->helper = $helper;

    $this->message = new Message();
  }

  public function get(string $type): array
  {
    if(!empty($_SESSION['account_filter'])){
      if ($type == 'student') {
        $this->helper->query(
          'SELECT * FROM `accounts` WHERE NOT `role_id` = ? AND `account_status` = ? AND `year_section` != ? ORDER BY `id` DESC',
          ['699dd7be-0c4b-11ee-a71c-088fc30176f9', $_SESSION['account_filter'], ""]
        );
      } else {
        $this->helper->query(
          'SELECT * FROM `accounts` WHERE NOT `role_id` = ? AND `account_status` = ? AND `year_section` = ? ORDER BY `id` DESC',
          ['699dd7be-0c4b-11ee-a71c-088fc30176f9', $_SESSION['account_filter'], ""]
        );
      }
    } else{
      if ($type == 'student') {
        $this->helper->query(
          'SELECT * FROM `accounts` WHERE NOT `role_id` = ? AND `year_section` != ? ORDER BY `id` DESC',
          ['699dd7be-0c4b-11ee-a71c-088fc30176f9', ""]
        );
      } else {
        $this->helper->query(
          'SELECT * FROM `accounts` WHERE NOT `role_id` = ? AND `year_section` = ? ORDER BY `id` DESC',
          ['699dd7be-0c4b-11ee-a71c-088fc30176f9', ""]
        );
      }
    }

    return $this->helper->fetchAll();
  }

  public function getOne(string $id): stdClass 
  {
    $this->helper->query(
      'SELECT * FROM accounts WHERE user_id = ? LIMIT 1',
      [$id]
    );

    return $this->helper->fetch();
  }

  public function insert(): string {}

  public function update(string $id): string
  {
    if(empty($id) AND empty($this->status)){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->query(
      'SELECT * FROM `accounts` WHERE `user_id` = ?',
      [$id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('An error occurred');
    }

    $this->helper->query(
      'UPDATE `accounts` SET `account_status` = ? WHERE `user_id` = ?',
      [$this->status, $id]
    );

    if($this->helper->rowCount() == 0){
      return $this->message->jsonError('User cannot be '.$this->status.'');
    }
    
    return $this->message->jsonSuccess('User is '.strtolower($this->status).'');
  }

  public function delete(string $id): string
  {
    
  }
}