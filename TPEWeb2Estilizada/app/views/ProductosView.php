<?php

    require_once './app/controllers/ProductosController.php';

    class ProductosView {

        public function showProductos($productos, $categorias) {
            require 'templates/header.phtml';
            require 'templates/productos.phtml';
            require 'templates/footer.phtml';
        }

        public function showProductosAdmin($productos, $categorias) {
            require 'templates/header.phtml';
            require 'templates/productosAdmin.phtml';
            require 'templates/footer.phtml';
        }

        public function showDetalle($detalle) {
            require 'templates/header.phtml';
            require 'templates/detalle.phtml';
            require 'templates/footer.phtml';
        }

    }

?>