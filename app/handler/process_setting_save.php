<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;
use App\Utils\Message;

$message = new Message();

$gcash_acc_name = Utilities::validate($_POST['gcash_acc_name']);
$gcash_acc_no = Utilities::validate($_POST['gcash_acc_no']);
$delivery_status = Utilities::validate($_POST['delivery_status']);

if(empty($gcash_acc_name) || empty($gcash_acc_no) || (empty($delivery_status) && $delivery_status == null)){
  echo $message->jsonError('All fields are required');
} elseif(strlen($gcash_acc_no) < 11){
  echo $message->jsonError('Input 11 digit number');
} else{
  $helper->query("UPDATE `settings` SET `gcash_acc_name` = ?, `gcash_acc_no` = ?, `is_delivery_available` = ? WHERE `id` = ?", [$gcash_acc_name, $gcash_acc_no, $delivery_status, 1]);
  echo $message->jsonSuccess('Settings saved');
}