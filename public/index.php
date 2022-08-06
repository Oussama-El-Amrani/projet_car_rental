<?php
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router('../src/controllers');

$router->get('/','indexControllers', 'index');

$router->get('/home','homeControllers', 'home');

$router->match('/login','loginControllers' , 'login');

$router->match('/signup', 'signupControllers', 'singup');

$router->match('/signout', 'signoutControllers', 'singout');



// Cart
$router->match('/reservation/[i:id]','reservationControllers', 'reservation');

$router->match('/add_to_cart/[i:id]','cartControllers', 'add_to_cart');

$router->post('/reservation/[i:id]/delete', 'deleteReservationControllers', 'delete_reservation');

$router->match('/panier', 'panierControllers', 'panier');

// payment

$router->match('/panier/payment', 'payPalClientControllers', 'paymentPayPal');

$router->match('/panier/payment/succesPayment', 'succesPaypementControllers', 'succesPaypement');

// Admin
$router->get('/admin','admin/post/adminControllers', 'admin_posts');

$router->match('/admin/post/[i:id]/edit','admin/post/editControllers', 'admin_post_edit');

$router->post('/admin/post/[i:id]/delete','admin/post/deleteControllers', 'admin_post_delete');

$router->match('/admin/post/new','admin/post/newControllers', 'admin_post_new');

$router->run();