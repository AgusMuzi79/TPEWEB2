<?php

class DataBase {
    public static function crearDB ($host, $username, $password, $databaseName) {
        $pdo = new PDO ("mysql:host=$host", $username, $password);
        $query = "CREATE DATABASE IF NOT EXISTS $databaseName";
        $pdo->exec($query);
    }
}