<?php

require_once __DIR__.'/../../config/init.php';

use App\Utils\Utilities;

$id = Utilities::validate($_POST['menu']);
$menu->name = Utilities::validate($_POST['menu_name']);
$menu->price = Utilities::validate($_POST['menu_price']);
$menu->category_id = Utilities::validate($_POST['category']);
$menu->stock = Utilities::validate($_POST['stock']);
$menu->tag = Utilities::validate($_POST['menu_tag']);

$response = $menu->update($id);
echo $response;