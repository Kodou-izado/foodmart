<?php

Flight::set('flight.views.path', 'app/');

Flight::route('/', function(){
    Flight::render('views/login.php');
});

Flight::route('/signup', function(){
  Flight::render('views/signup.php');
});

Flight::route('/logout', function(){
  Flight::render('views/logout.php');
});

Flight::route('/menu', function(){
  Flight::render('views/menu.php');
});

Flight::route('/menu/@name', function($name){
  Flight::render('views/menu-category.php', array('name' => $name));
});

Flight::route('/add-menu', function(){
  Flight::render('views/add-menu.php');
});

Flight::route('/update-menu/@id', function($id){
  Flight::render('views/update-menu.php', array('id' => $id));
});

Flight::route('/order-history', function(){
  Flight::render('views/order-history.php');
});

Flight::route('/orders', function(){
  Flight::render('views/orders.php');
});

Flight::route('/users', function(){
  Flight::render('views/users.php');
});

Flight::route('/about-us', function(){
  Flight::render('views/about-us.php');
});

Flight::route('/shopping-cart', function(){
  Flight::render('views/shopping-cart.php');
});

Flight::route('/account-settings', function(){
  Flight::render('views/account-settings.php');
});

Flight::route('/not-found', function(){
  Flight::render('views/404.php');
});

Flight::map('notFound', function () {
  Flight::redirect('/not-found');
});