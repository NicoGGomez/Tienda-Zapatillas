<?php 

class authView {

    function showLogin($error=null){
        $name = 'login';
        $login = false;
        require 'templates/login.phtml';
    }

    function showLogout($error=null){
        $mensaje = $error;
        $login = false;
        require 'templates/login.phtml';
    }

    function showRegister($error=null){
        $name ='registro';
        require 'templates/registro.phtml'; // cambiar por el template de registro
    }

    function showPerfil(){
        $login = true;
        require 'templates/perfil.phtml';
    }

    function showHome($userLogued){
        $name ='home';
        $login = $userLogued;
        require 'templates/home.phtml';
    }

}