<?php

    require_once './app/controllers/ProductosController.php';

    class ProductosView {

        public function showProductos($productos, $tipos) {
            require 'templates/header.phtml';
            require 'templates/productos.phtml';
            require 'templates/footer.phtml';
        }

    }

?>