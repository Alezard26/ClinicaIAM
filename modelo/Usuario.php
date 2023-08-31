<?php

require_once 'conexion/conexion.php';
class Usuario extends Conexion {
    public $conexion = "";
    public $coleccion = "";
    public $usuario = "";
    public $clave = "";

    public function __construct()
    {
        $conexion = parent::conectar();
        $this->coleccion = $conexion->usuarios;
    }

    public function VerificarSesion($user, $pass) {
        try {
            $datos = $this->coleccion->find(); 
            foreach ($datos as $row) {
                $usuario = $row['Usuario'];
                $clave = $row['Clave'];
            }

            if ($user == $usuario && $pass == $clave) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        } 
    }
}