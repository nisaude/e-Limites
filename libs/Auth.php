<?php

class Auth{
    
    public static function autentica(){
        
        @session_start();
        
        $logged = $_SESSION['deslogado'];
        //$logged = $_SESSION['logado'];
        //if ($logged == false) {
        if ($logged == true) {
            session_destroy();
            header('Location: login/');
            exit;
        }
    }
}