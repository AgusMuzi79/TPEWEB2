<?php

    class ProductosModel {

        protected $db;

        public function __construct() {
            $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        }

        public function getProductos() {
            $query = $this->db->prepare('SELECT
            productos.*,
            categorias.nombre AS nombre_categoria
        FROM
            productos
        JOIN
            categorias
        ON
            productos.id_categoria = categorias.id_categoria');
            $query->execute();

            $productos = $query->fetchall(PDO::FETCH_OBJ);

            return $productos;
        }

        public function getCategorias() {
            $query = $this->db->prepare('SELECT * FROM categorias;');
            $query->execute();

            $categorias = $query->fetchAll(PDO::FETCH_OBJ);

            return $categorias;
        }

        public function getCategoria($params) {
            $query = $this->db->prepare('SELECT productos.*, categorias.nombre AS nombre_categoria FROM productos JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE categorias.nombre = ?;');
            $query->execute([$params]);

            $categoria = $query->fetchAll(PDO::FETCH_OBJ);

            return $categoria;

        }

        public function getDetalle($params) {
            $query = $this->db->prepare('SELECT productos.*, categorias.nombre AS nombre_categoria FROM productos JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE productos.nombre = ?;');
            $query->execute([$params]);

            $detalle = $query->fetch(PDO::FETCH_OBJ);

            return $detalle;
        }

        public function eliminarCategoria($categoria) {
            $query = $this->db->prepare('DELETE FROM categorias WHERE nombre = ?;');
            $query->execute([$categoria]);
        }

        public function crearCategoria($categoria){
            $query = $this->db->prepare('INSERT INTO categorias (id_categoria, nombre) VALUES (null ,?)');
            $query->execute([$categoria]);
        }

        public function editarCategoria($categoria, $categoriaNueva) {
            $query = $this->db->prepare('UPDATE categorias SET nombre = ? WHERE nombre = ?;');
            $query->execute([$categoriaNueva, $categoria]);
        }
    }

?>