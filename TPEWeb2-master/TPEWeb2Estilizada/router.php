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
                case 'agregar':
                    $controllerProductos->agregarNuevoProducto();
                break;
                case 'borrar':
                    $controllerProductos->eliminarProducto($params[2]);
                break;
                case 'cambiar':
                    $controllerProductos->editarProducto();
                break;
                case 'detalle':
                    $controllerProductos->showDetalle($params[2]);
                break;
                case 'categoria':
                    switch($params[2]) {
                        case 'show':
                            $controllerProductos->showCategoria($params[3]);
                        break;
                        case 'eliminar':
                            $controllerProductos->eliminarCategoria($params[3]);
                        break;
                        case 'crear':
                            $controllerProductos->crearCategoria();
                        break;
                        case 'editar':
                            $controllerProductos->editarCategoria();
                        break;
                    }
            }
        }
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