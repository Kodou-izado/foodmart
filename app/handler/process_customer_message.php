<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$message->message = Utilities::validate($_POST['message']);
$message->receiver_id = '96abef16-0cd4-11ee-aca4-088fc30176f9';

$response = $message->insert();
echo $response;