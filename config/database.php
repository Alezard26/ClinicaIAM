<?php
class Conexion {
    public static function conectar() {
        $conexion = new MongoDB\Client("mongodb://localhost:27017");
        return $conexion;
    }
}