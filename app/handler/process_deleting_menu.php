<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$id = Utilities::validate($_POST['id']);

$response = $menu->delete($id);
echo $response;