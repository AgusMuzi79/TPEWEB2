<?php

    require_once './app/views/ListaView.php';
    require_once './app/models/ListaModel.php';

    class ListaController {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new ListaModel();
            $this->view = new ListaView();
        }

        public function showLista() {
            $lista = $this->model->getLista();
            $this->view->showLista($lista);
        }
    }

?>