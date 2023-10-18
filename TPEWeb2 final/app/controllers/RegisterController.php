<?php

    require_once './app/views/RegisterView.php';

    class RegisterController {
        private $view;

        public function __construct() {
            $this->view = new RegisterView();
        }

        public function showRegister() {
            $this->view->showRegister();
        }
    }

?>
