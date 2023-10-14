<?php
include_once('./views/login.view.php');
include_once('./models/user.model.php');
include_once('./helpers/auth.helper.php');

class LoginController {

    private $view;
    private $model;
    private $authHelper;

    public function __construct() {
        $this->view = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin() {

        // encontró un user con el username que mandó, y tiene la misma contraseña
        if (!empty($user) && password_verify($password, $user->password)) {

            // INICIO LA SESSION Y LOGUEO AL USUARIO
            session_start();
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['USERNAME'] = $user->username;
            $this->authHelper->login($user);

            header('Location: ver');
        } else {
    }

    public function logout() {
        session_start();
        session_destroy();
        $this->authHelper->logout();
        header('Location: ' . LOGIN);
    }
}
