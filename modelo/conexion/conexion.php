<?php 

require_once $_SERVER["DOCUMENT_ROOT"] . '/clinica_iam/vendor/autoload.php';
class Conexion {
    public function conectar(){
        try {
            $usuario = "root";
            $clave = "ClinicaIam2022";
            $server = "localhost";
            $puerto = "27017";
            $base = "clinica_iam";
            $cadena = "mongodb://".$usuario.":".$clave."@".$server.":".$puerto."/".$base;
            $conexion = new MongoDB\Client($cadena);
            return $conexion->selectDatabase($base);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}