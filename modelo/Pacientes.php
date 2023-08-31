<?php
/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
require_once 'conexion/conexion.php';
class Pacientes extends Conexion {
    public $conexion = "";
    public $coleccion = "";
    public $nombres = "";
    public $apellidos = "";
    public $dui = "";
    public $telefono = "";
    public $direccion = "";
    public $ocupacion = "";
    public $fecha_nacimiento = "";
    public $sexo = "";
    public $estado_civil = "";

    public function __construct()
    {
        $conexion = parent::conectar();
        $this->coleccion = $conexion->pacientes;
    }

    /** *********************************
     * Funcion para agregar un paciente * 
     ********************************* **/
    public function AgregarPaciente() {
        try {
            $documento = array(
                "nombres" => $this->nombres,
                "apellidos" => $this->apellidos,
                "dui" => $this->dui,
                "telefono" => $this->telefono,
                "direccion" => $this->direccion,
                "ocupacion" => $this->ocupacion,
                "fecha_nacimiento" => $this->fecha_nacimiento,
                "sexo" => $this->sexo,
                "estado_civil" => $this->estado_civil
            );
            if ($this->coleccion->insertOne($documento)) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /** *********************************
     * Funcion para obtener un paciente * 
     ********************************* **/
    public function ObtenerPaciente($id) {
        try {
            $documento = $this->coleccion->findOne(array("_id" => new \MongoDB\BSON\ObjectId($id)));
            return $documento;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /** ********************************
     * Funcion para editar un paciente * 
     ******************************** **/
    public function EditarPaciente($id) {
        try {
            $documento = array(
                "nombres" => $this->nombres,
                "apellidos" => $this->apellidos,
                "dui" => $this->dui,
                "telefono" => $this->telefono,
                "direccion" => $this->direccion,
                "ocupacion" => $this->ocupacion,
                "fecha_nacimiento" => $this->fecha_nacimiento,
                "sexo" => $this->sexo,
                "estado_civil" => $this->estado_civil
            );
            if ($this->coleccion->updateOne(array("_id" => new \MongoDB\BSON\ObjectId($id)), array('$set' => $documento))) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    /** **********************************
     * Funcion para eliminar un paciente * 
     ********************************** **/
    public function EliminarPaciente($id) {
        try {
            if ($this->coleccion->deleteOne(array("_id" => new \MongoDB\BSON\ObjectId($id)))) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}