<?php

    require_once './app/views/ProductosView.php';
    require_once './app/models/ProductosModel.php';

    class ProductosController {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new ProductosModel();
            $this->view = new ProductosView();
        }

        public function showProductos() {
            $productos = $this->model->getProductos();
            $tipos = $this->model->getTipos();
            $this->view->showProductos($productos, $tipos);
        }
    }

?>