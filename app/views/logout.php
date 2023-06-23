<?php

include './config/init.php';
use App\Utils\Utilities;

Utilities::redirectUnauthorize();

$account->signOut();