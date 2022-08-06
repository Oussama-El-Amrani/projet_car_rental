<?php
use App\Lib\Database\DatabaseConnection;
use App\Model\Cart\Cart;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cart.php';
// require '../src/modele/Authentification.php';

// Authentication::check();

session_start();
$Cart = new Cart();
$Cart->connection = new DatabaseConnection();
// dd($params['id']);
$delete = $Cart->deleteReservation($params['id'], $_SESSION['cin']);
header('Location: ' . $router->url('cart_liste'));
