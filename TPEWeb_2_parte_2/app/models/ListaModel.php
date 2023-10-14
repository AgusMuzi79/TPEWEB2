<?php

    class ListaModel {

        public function __construct() {
        }

        public function getLista() {

            $db = new PDO('mysql:host=localhost;dbname=noisyprints_db_tp;charset=utf8', 'root', '');

            $query = $db->prepare('SELECT lista.id_lista, productos.nombre AS nombre_producto, productos.tipo, lista.puntaje, lista.dni FROM lista INNER JOIN productos ON lista.id_producto = productos.id_producto;');
            $query->execute();

            $lista = $query->fetchall(PDO::FETCH_OBJ);

            return $lista;

        }
    }

?>