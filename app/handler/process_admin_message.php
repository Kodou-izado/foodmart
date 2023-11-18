<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$message->message = Utilities::validate($_POST['message']);
$message->receiver_id = Utilities::validate($_POST['customer_id']);

$response = $message->insert();
echo $response;