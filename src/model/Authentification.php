<?php

namespace App\Model\Authentication;

use Exception;

class Authentication
{
    public static function check () {
        // dd($_SESSION);
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['logged'])) {
            // dd($_SESSION);
            throw new Exception("Vous avez pas le droit d'acceder a cette page"); 
        }
    }

    public static function checkAdmin () {
        // dd($_SESSION);
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['logged'])|| !$_SESSION['admin']) {
            // dd($_SESSION);
            throw new Exception("Vous avez pas le droit d'acceder a cette page"); 
        }
    }
}