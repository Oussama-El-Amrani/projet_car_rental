<?php

namespace App\Model\Authentication;

use Exception;

class Authentication
{
    public static function check () {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['logged'])) {
            throw new Exception("Vous avez pas le droit d'acceder a cette page"); 
        }
    }

    public static function checkAdmin () {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['logged'])|| !$_SESSION['admin']) {
            throw new Exception("Vous avez pas le droit d'acceder a cette page"); 
        }
    }
}