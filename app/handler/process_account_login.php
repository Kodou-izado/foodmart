<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$account->username = Utilities::validate($_POST['username']);
$account->password = Utilities::validate($_POST['password']);

$response = $account->signIn();
echo $response;