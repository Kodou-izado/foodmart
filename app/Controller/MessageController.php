<?php

namespace App\Controller;

use App\Interfaces\AppInterface;
use App\Utils\DbHelper;
use App\Utils\Utilities;
use App\Utils\Message;
use stdClass;

class MessageController extends Message implements AppInterface
{
  private $helper;
  public $message;
  public $receiver_id;

  public function __construct(DbHelper $helper)
  {
    $this->helper = $helper;
  }

  public function get(): array
  {
    $this->helper->query('SELECT * FROM `messages` m LEFT JOIN `accounts` a ON m.sender_id=a.user_id WHERE NOT m.sender_id = ? GROUP BY m.sender_id ORDER BY m.id DESC, m.message_status ASC', [$_SESSION['uid']]);
    return $this->helper->fetchAll();
  }

  public function getOne(string $id): stdClass {}

  public function insert(): string 
  {
    if (empty($this->message)) {
      return $this->jsonError('Type your message');
    }

    $this->helper->startTransaction();

    if (Utilities::isCustomer()) {
      $this->helper->query(
        'INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `message`, `date_created`) VALUES (UUID(), ?, ?, ?, current_timestamp())',
        [$_SESSION['uid'], $this->receiver_id, $this->message]
      );
    } else {
      $this->helper->query(
        'UPDATE `messages` SET `message_status` = ? WHERE `sender_id` = ?',
        ['Read', $this->receiver_id]
      );

      // if ($this->helper->rowCount() == 0) {
      //   $this->helper->rollback();
      //   return $this->jsonError('Message cannot be send');
      // }
      
      $this->helper->query(
        'INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `message`, `message_status`, `date_created`) VALUES (UUID(), ?, ?, ?, ?, current_timestamp())',
        [$_SESSION['uid'], $this->receiver_id, $this->message, 'Read']
      );
    }

    if ($this->helper->rowCount() == 0) {
      $this->helper->rollback();
      return $this->jsonError('Message cannot be send');
    }

    $message_id = $this->helper->getInsertId();
    $this->helper->query(
      'SELECT * FROM `messages` WHERE `id` = ?',
      [$message_id]
    );

    $message_data = $this->helper->fetch();
    $current_date = Utilities::getCurrentDate();

    if (Utilities::isCustomer()) {
      $this->helper->query(
        'INSERT INTO `notifications` (`origin_id`, `origin_type`, `user_id`, `date_created`) VALUES (?, ?, ?, ?)', 
        [$message_data->message_id, 'New Message', $_SESSION['uid'], $current_date]
      );
    } else {
      $this->helper->query(
        'INSERT INTO `notifications` (`origin_id`, `origin_type`, `user_id`, `date_created`) VALUES (?, ?, ?, ?)', 
        [$message_data->message_id, 'Message Reply', $message_data->receiver_id, $current_date]
      );
    }

    if ($this->helper->rowCount() == 0) {
      $this->helper->rollback();
      return $this->jsonError('Message cannot be send');
    }

    $this->helper->commit();
    return $this->jsonSuccess('Sent');
  }

  public function update(string $id): string {}

  public function delete(string $id): string {}
}