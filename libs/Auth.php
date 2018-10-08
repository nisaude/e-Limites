<?php

class Auth{
    
    public static function autentica(){
        error_reporting(E_ALL & ~E_NOTICE);
        @session_start();
       
        
       // $logged = $_SESSION['deslogado'];
        $logged = $_SESSION['logado'];
        //if ($logged == false) {
        if ($logged!=true) {
            session_destroy();
            header("Location: ".URL.'login/');
            exit;
        }
    }
}