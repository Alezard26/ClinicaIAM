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
class Agenda extends Conexion {
    public $conexion = "";
    public $coleccion = "";
    public $fecha = "";
    public $hora = "";
    public $paciente = "";

    public function __construct()
    {
        $conexion = parent::conectar();
        $this->coleccion = $conexion->agenda;
    }

    /** ********************************
     * Funcion para agregar una agenda * 
     ******************************** **/
    public function AgregarAgenda() {
        try {
            $documento = array(
                "fecha" => $this->fecha,
                "hora" => $this->hora,
                "paciente" => $this->paciente,
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

    /** ********************************
     * Funcion para obtener una agenda * 
     ******************************** **/
    public function ObtenerAgenda($id) {
        try {
            $documento = $this->coleccion->findOne(array("_id" => new \MongoDB\BSON\ObjectId($id)));
            return $documento;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /** *******************************
     * Funcion para editar una agenda * 
     ******************************* **/
    public function EditarAgenda($id) {
        try {
            $documento = array(
                "fecha" => $this->fecha,
                "hora" => $this->hora,
                "paciente" => $this->paciente,
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
    
    /** *********************************
     * Funcion para eliminar una agenda * 
     ********************************* **/
    public function EliminarAgenda($id) {
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