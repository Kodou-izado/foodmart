<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$order->order_type = Utilities::validate($_POST['order_type']);
$order->payment_method = Utilities::validate($_POST['payment_method']);
$order->delivery_address = Utilities::validate($_POST['delivery_address']);

$response = $order->insert();
echo $response;