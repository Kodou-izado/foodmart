<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$current_password = Utilities::validate($_POST['current_account_password']);
$account->password = Utilities::validate($_POST['new_account_password']);
$account->confirm_password = Utilities::validate($_POST['confirm_password']);

$response = $account->changePassword($current_password);
echo $response;