<?php
session_start();
session_destroy();
// $router->url('index');
if(session_destroy()){
    echo 'hhhhh';
    // header('Location : ' . $router->url('index'));
}
