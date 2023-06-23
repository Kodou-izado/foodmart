<?php
session_start();

require_once __DIR__.'/../vendor/autoload.php';

define('SYSTEM_URL', 'http://localhost/projects/foodmart');
// define('SYSTEM_URL', 'http://192.168.254.150/projects/foodmart');

use Config\Database;
use App\Utils\DbHelper;
use App\Controller\AccountController;
use App\Controller\MenuController;
use App\Controller\CategoryController;
use App\Controller\UserController;
use App\Controller\CartController;
use App\Controller\OrderController;

$database = new Database();
$conn = $database->getConnetion();

$helper = new DbHelper($conn);

$account = new AccountController($helper);
$menu = new MenuController($helper);
$category = new CategoryController($helper);
$user = new UserController($helper);
$cart = new CartController($helper);
$order = new OrderController($helper);

date_default_timezone_set('Asia/Hong_Kong');