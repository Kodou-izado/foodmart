<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$id = Utilities::validate($_POST['id']);

$helper->query(
  'SELECT * FROM `order_items` o LEFT JOIN `menus` m ON o.menu_id=m.menu_id WHERE o.order_id = ? ORDER BY o.id DESC',
  [$id]
);

echo json_encode($helper->fetchAll());