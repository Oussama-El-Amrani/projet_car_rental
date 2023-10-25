<?php
session_start();
session_destroy();
$router->url('index');
if(session_destroy()){
    // header('Location : ' . $router->url('index'));
}
