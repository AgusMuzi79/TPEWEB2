<?php

    class ProductosModel {

        public function __construct() {
        }

        public function getProductos() {

            $db = new PDO('mysql:host=localhost;dbname=noisyprints_db_tp;charset=utf8', 'root', '');

            $query = $db->prepare('SELECT * FROM productos');
            $query->execute();

            $productos = $query->fetchall(PDO::FETCH_OBJ);

            return $productos;

        }

        public function getTipos() {

            $db = new PDO('mysql:host=localhost;dbname=noisyprints_db_tp;charset=utf8', 'root', '');

            $query = $db->prepare('SELECT DISTINCT productos.tipo FROM `productos` WHERE 1');
            $query->execute();

            $tipos = $query->fetchall(PDO::FETCH_OBJ);

            return $tipos;

        }
    }

?>