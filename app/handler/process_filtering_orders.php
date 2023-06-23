<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$filter = Utilities::validate($_POST['filter']);

if(empty($filter)){
  unset($_SESSION['order_filter']);
} else{
  $_SESSION['order_filter'] = $filter;
}

echo json_encode(
  array(
    'type' => 'success',
    'message' => 'Filter was applied'
  )
  );