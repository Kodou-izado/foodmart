<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$account->fullname = Utilities::validate($_POST['fullname']);
$account->gender = Utilities::validate($_POST['gender']);
$account->username = Utilities::validate($_POST['username']);
$account->email = Utilities::validate($_POST['email']);

if(Utilities::isCustomer()){
  $account->year_section = Utilities::validate($_POST['year_section']);
}

$response = $account->updateAccount();
echo $response;