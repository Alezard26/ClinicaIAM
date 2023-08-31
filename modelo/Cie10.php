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
class Cie10 extends Conexion {
    public $conexion = "";
    public $coleccion = "";
    public $codigo = "";
    public $descripcion = "";

    public function __construct()
    {
        $conexion = parent::conectar();
        $this->coleccion = $conexion->cie10;
    }

    /** ************************************
     * Funcion para agregar una enfermedad * 
     ************************************ **/
    public function AgregarCie10() {
        try {
            $documento = array(
                "code" => $this->codigo,
                "description" => $this->descripcion,
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

    /** ************************************
     * Funcion para obtener una enfermedad * 
     ************************************ **/
    public function ObtenerCie10($id) {
        try {
            $documento = $this->coleccion->findOne(array("_id" => new \MongoDB\BSON\ObjectId($id)));
            return $documento;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /** ***********************************
     * Funcion para editar una enfermedad * 
     *********************************** **/
    public function EditarCie10($id) {
        try {
            $documento = array(
                "code" => $this->codigo,
                "description" => $this->descripcion,
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
    
    /** *************************************
     * Funcion para eliminar una enfermedad * 
     ************************************* **/
    public function EliminarCie10($id) {
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