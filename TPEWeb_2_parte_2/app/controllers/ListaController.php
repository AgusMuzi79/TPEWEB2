<?php

    require_once './app/views/ListaView.php';
    require_once './app/models/ListaModel.php';
    require_once './app/helpers/AuthHelper.php';

    class ListaController {
        private $model;
        private $view;
        private $authHelper;

        public function __construct() {
            $this->model = new ListaModel();
            $this->view = new ListaView();
            $this->authHelper = new AuthHelper();

            $this->authHelper->checkLogged();
        }

        public function showLista() {
            $lista = $this->model->getLista();
            $this->view->showLista($lista);
        }

    }

?>