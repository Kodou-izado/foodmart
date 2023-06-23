<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$id = Utilities::validate($_POST['id']);
$user->status = Utilities::validate($_POST['status']);

$response = $user->update($id);
echo $response;