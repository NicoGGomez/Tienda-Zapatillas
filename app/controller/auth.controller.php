<?php

require 'app/view/auth.view.php';
require 'app/model/auth.model.php';
require 'app/helper/auth.helper.php';

class authController {
    private $view;
    private $model;

    function __construct(){
        $this->view = new authView();
        $this->model = new authModel();
    }

    function showLogin(){
        $this->view->showLogin();
    }

    function showRegister(){
        $this->view->showRegister();
    }

    function nuevoUsuario(){
        $nombre = $_POST['usr'];
        $password = $_POST['pass'];
        $mail = $_POST['mail'];
        $img = $_POST['img'];

        if (empty($nombre) || empty($password) || empty($mail)) {
            $this->view->showRegister('faltan completar datos');
            return;
        }

        if ($this->userExistente($nombre)) {
        $this->model->insertarUsuario($nombre, $password, $mail, $img);
        $this->view->showHome();
        $this->auth();
        } else {
            $this->view->showRegister('usuario ya registrado');
        }

    }

    function userExistente($nombre){
        $user = $this->model->getUserByName($nombre);
        if(empty($user)){
            return true;
        }
        return false;
    }

    function auth(){
        $username = $_POST['usr'];
        $password = $_POST['pass'];

        if(empty($username) || empty($password)){
            $this->view->showLogin('faltan completar datos');
            return;
        }

        $user = $this->model->getUserByName($username);

        if ($user->contraseña === $password) {
            authHelper::login($user);
            $this->view->showHome();
        } else {
            $this->view->showLogin('usuario invalido');
        }

    }

}