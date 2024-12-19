<?php 

require_once 'app/view/home.view.php';
require_once 'app/model/home.model.php';

class homeController {
    private $view;
    private $model;

    function __construct(){
        $this->view = new homeView();
        $this->model = new homeModel();
    }

    function showHome(){
        $login = authHelper::usuarioIniciado();
        $this->view->showHome($login);
    }


}