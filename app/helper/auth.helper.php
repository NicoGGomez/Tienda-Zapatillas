<?php 

class authHelper {

    public static function init(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public static function login($user){
        authHelper::init();
        $_SESSION['USER_USER'] = $user->nombre;
        $_SESSION['USER_PASS'] = $user->contraseña;   
    }

    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    public static function verify(){
        authHelper::init();
        if(!isset($_SESSION['USER_USER'])){
            header('location: '. BASE_URL);
            die();
        }
    }

    public static function usuarioIniciado(){
        if(session_status() === PHP_SESSION_NONE){
            return false;
        }
        return true;
    }

}