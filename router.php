<?php 

require_once 'app/controller/home.controller.php';
require_once 'app/controller/auth.controller.php';
require_once 'app/controller/producto.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch($params[0]){

    case 'login':
        $authController = new authController();
        $authController->showLogin();
        break;

    case 'loginUsuario':
        $authController = new authController();
        $authController->auth();
        break;

    case 'register':
        $authController = new authController();
        $authController->showRegister();
        break;

    case 'registroUsuario': 
        $authController = new authController();
        $authController->nuevoUsuario();
        break;

    case 'home':
        $homeController = new homeController();
        $homeController->showHome();
        break;

    case 'producto':
        $productoConotroller = new productoController();
        $productoConotroller->showProducto();
        break;

}