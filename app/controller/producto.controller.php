<?php 

require 'app/view/producto.view.php';
require 'app/model/producto.model.php';

class productoController {
    private $view;
    private $model;

    function __construct(){
        $this->view = new productoView();
        $this->model = new ProductoModel();
    }

    function showProducto(){
        $this->view->showProducto();
    }

}