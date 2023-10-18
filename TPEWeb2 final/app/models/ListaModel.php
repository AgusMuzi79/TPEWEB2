<?php

    class ListaModel {

        protected $db;

        public function __construct() {
            $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        }

        public function getLista() {

            $dni = $_SESSION["DNI_USER"];
            $query = $this->db->prepare('SELECT lista.id_lista, lista.id_producto, lista.puntaje, productos.nombre AS nombre_producto, categorias.nombre AS categoria_producto FROM lista JOIN productos ON lista.id_producto = productos.id_producto JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE lista.dni = ?;');
            $query->execute([$dni]);

            $lista = $query->fetchall(PDO::FETCH_OBJ);

            return $lista;

        }

        /*
        public function addItemLista($puntaje, $categoria) {
            $query = $this->db->prepare('INSERT INTO `lista`(`puntaje`, `categoria`) VALUES (?,?)');
            $lista = $query -> execute([$puntaje, $categoria]);

            return $lista;
        }
        */
    }

?>