<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$cart->menu_id = Utilities::validate($_POST['id']);

$response = $cart->insert();
echo $response;