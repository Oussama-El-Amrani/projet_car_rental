<?php

require '../vendor/autoload.php';
require ('../src/lib/database.php');
require '../src/model/User.php';


use App\Lib\Database\DatabaseConnection;
use App\HTML\Form;
use App\Model\User\User;

$title = 'login';

$user = new User();
$user->connection = new DatabaseConnection();

$form = new Form();
$errors = [];
session_start();
session_destroy();

if(!empty($_POST))
{
    $user->setEmail($_POST['email']);
    if(empty($_POST['email']) || empty($_POST['password']))
    {
        $errors['password'] = 'Identifiant au mot de passe incorrecct';
    } else {
        $user->setPassword($_POST['password']);
        if($user->is_user()){
            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['cin']=$user->getCin();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['admin'] = $user->getAdmin();
            // dd($_SESSION);

            if($user->is_admin()){
                header('Location: ' . $router->url('admin_posts'));
            } else{
                header('Location: ' . $router->url('home'));
            }
        } else {
            $errors['password'] = 'Identifiant au mot de passe incorrecct';
        }
    }
}

require '../templates/login.php';
