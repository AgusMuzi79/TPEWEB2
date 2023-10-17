<?php

class AuthHelper {

    public function __construct() {

    }

    public function checkLogged() {
        session_start();
        if(!isset($_SESSION['DNI_USER'])) {
            header("Location: " . BASE_URL . 'access/login');
            die();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'access/login');
    }

    public function esAdmin() {
        session_start();
        if($_SESSION && $_SESSION['EMAIL_USER'] == "webadmin@outlook.com"){
            return true;
        } else {
            return false;
        }
    }
}
