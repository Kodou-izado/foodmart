<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$id = Utilities::validate($_POST['id']);
$order->status = Utilities::validate($_POST['status']);

$response = $order->update($id);
echo $response;