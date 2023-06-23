<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$id = Utilities::validate($_POST['id']);
$cart->quantity = Utilities::validate($_POST['quantity']);

$response = $cart->update($id);
echo $response;