<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$helper->query("SELECT * FROM `notifications` WHERE `notif_status` = ?", ["Unread"]);

if($helper->rowCount() > 0){
  $helper->query("UPDATE `notifications` SET `notif_status` = ?", ["Read"]);
}