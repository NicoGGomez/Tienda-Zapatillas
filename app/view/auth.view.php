<?php 

class authView {

    function showLogin($error=null){
        $name = 'login';
        require 'templates/login.phtml';
    }

    function showRegister($error=null){
        $name ='registro';
        require 'templates/registro.phtml'; // cambiar por el template de registro
    }

    function showHome(){
        $name ='home';
        require 'templates/home.phtml';
    }

}