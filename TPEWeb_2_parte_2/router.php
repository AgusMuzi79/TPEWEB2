<?php
require_once './app/controllers/LoginController.php';
require_once './app/controllers/RegisterController.php';
require_once './app/controllers/ProductosController.php';
require_once './app/controllers/ListaController.php';



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'login';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'login':
        $controllerlogin = new LoginController();
        $controllerlogin->showLogin();
    break;
    case 'register':
        $controllerRegister = new RegisterController();
        $controllerRegister->showRegister();
    break;
    case 'productos':
        $controllerProductos = new ProductosController();
        $controllerProductos->showProductos();
    break;
    case 'lista':
        $controllerLista = new ListaController();
        $controllerLista->showLista();
    break;
    default:
        echo('404 Page not found');
    break;
}

?>