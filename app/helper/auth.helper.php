<?php 

class AuthHelper {

    public static function init() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function login($user){
        self::init();
        $_SESSION['USER_NAME'] = $user->nombre; // Guarda los datos del usuario
        $_SESSION['USER_ID'] = $user->id_usuario;  // Identificador único
        $_SESSION['USER_MAIL'] = $user->mail;
        var_dump($_SESSION); // Verifica que la sesión tiene datos antes de redirigir
        header('Location: ' . BASE_URL);
        exit(); 
    }

    public static function logout() {
        self::init();
        session_unset();  // Limpia todas las variables de sesión
        session_destroy();  // Destruye la sesión
        header('Location: ' . BASE_URL);
    }

    public static function verify(){
        self::init();
        if (!isset($_SESSION['USER_NAME'])) {
            header('Location: ' . BASE_URL);
            exit();
        }
    }
}
