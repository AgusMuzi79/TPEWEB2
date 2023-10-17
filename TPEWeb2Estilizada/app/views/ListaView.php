<?php

    require_once './app/controllers/ProductosController.php';

    class ListaView {

        public function showLista($lista) {
            require 'templates/header.phtml';
            require 'templates/formLista.phtml';
            require 'templates/lista.phtml';
            require 'templates/footer.phtml';
        }
        public function showError($error) {
            require 'templates/error.phtml';
        }
    }

?>