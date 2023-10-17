<?php
require_once './app/controllers/AccessController.php';
require_once './app/controllers/ProductosController.php';
require_once './app/controllers/ListaController.php';
require_once './config.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'productos';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'access':
        $controllerAccess = new AccessController();
        if (empty($params[1])){
            $controllerAccess->showLogin();
        }else {
            switch($params[1]){
                case 'login':
                    $controllerAccess->showLogin();
                break;
                case 'verify':
                    $controllerAccess->loginUser();
                break;
                case 'logout':
                    $controllerAccess->logout();
                break;
            }
        }
    break;
    case 'productos':
        $controllerProductos = new ProductosController();
        if (empty($params[1])) {
            $controllerProductos->showProductos();
        } else {
            switch($params[1]) {
                case 'categoria':
                    $controllerProductos->showCategoria($params[2]);
                break;
                case 'detalle':
                    $controllerProductos->showDetalle($params[2]);
                break;
                case 'eliminar':
                    $controllerProductos->eliminarCategoria($params[2]);
                break;
                case 'crear':
                    $controllerProductos->crearCategoria();
                break;
                case 'editar':
                    $controllerProductos->editarCategoria($params[2]);
                break;
            }
        }
    break;
    case 'lista':
        $controllerLista = new ListaController();
        $controllerLista->showLista();
    break;
    case 'agregarLista':
        $controllerLista->addLista($params[1]);
        break;
    default:
        echo('404 Page not found');
    break;
}

?>