<?php

Flight::set('flight.views.path', 'app/');

Flight::route('/', function(){
    Flight::render('Views/login.php');
});

Flight::route('/signup', function(){
  Flight::render('Views/signup.php');
});

Flight::route('/logout', function(){
  Flight::render('Views/logout.php');
});

Flight::route('/menu', function(){
  Flight::render('Views/menu.php');
});

Flight::route('/menu/@name', function($name){
  Flight::render('Views/menu-category.php', array('name' => $name));
});

Flight::route('/add-menu', function(){
  Flight::render('Views/add-menu.php');
});

Flight::route('/update-menu/@id', function($id){
  Flight::render('Views/update-menu.php', array('id' => $id));
});

Flight::route('/order-history', function(){
  Flight::render('Views/order-history.php');
});

Flight::route('/orders', function(){
  Flight::render('Views/orders.php');
});

Flight::route('/users/@type', function($type){
  Flight::render('Views/users.php', array('type' => $type));
});

Flight::route('/about-us', function(){
  Flight::render('Views/about-us.php');
});

Flight::route('/message', function(){
  Flight::render('Views/message.php');
});

Flight::route('/message/@id', function($id){
  Flight::render('Views/view-message.php', array('id' => $id));
});

Flight::route('/shopping-cart', function(){
  Flight::render('Views/shopping-cart.php');
});

Flight::route('/account-settings', function(){
  Flight::render('Views/account-settings.php');
});

Flight::route('/not-found', function(){
  Flight::render('Views/404.php');
});

Flight::map('notFound', function () {
  Flight::redirect('/not-found');
});