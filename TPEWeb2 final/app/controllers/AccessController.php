<?php

    require_once './app/views/AccessView.php';
    require_once './app/models/AccessModel.php';


    class AccessController {

        private $view;
        private $model;

        public function __construct() {
            $this->view = new AccessView();
            $this->model = new AccessModel();
        }

        public function showLogin() {
            $this->view->showLogin();
        }

        public function loginUser() {
            $email = $_POST['email'];
            $contrasenia = $_POST['contrasenia'];

            if (empty($email) || empty($contrasenia)){
                die();
            }

            $user = $this->model->getUser($email);

            if ($user && password_verify($contrasenia, $user->contrasenia)) {

                session_start();
                $_SESSION['DNI_USER'] = $user->dni;
                $_SESSION['EMAIL_USER'] = $user->email;

                header("Location: " . BASE_URL . 'lista');
            }
        }

        public function logout() {
            session_start();
            session_destroy();
            header("Location: " . BASE_URL . 'access/login');
        }


    }
