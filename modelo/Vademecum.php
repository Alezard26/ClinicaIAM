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
class Vademecum extends Conexion {
    public $conexion = "";
    public $coleccion = "";
    public $principio_activo = "";
    public $precauciones = "";
    public $accion_terapeutica = "";
    public $dosificacion = "";
    public $indicaciones = "";
    public $interacciones = "";
    public $marca = "";
    public $contraindicaciones = "";
    public $propiedades = "";
    public $sobredosificacion = "";
    public $reacciones_adversas = "";

    public function __construct()
    {
        $conexion = parent::conectar();
        $this->coleccion = $conexion->vademecum;
    }

    /** **********************************
     * Funcion para agregar un vademecum * 
     ********************************** **/
    public function AgregarVademecum() {
        try {
            $documento = array(
                "principio_activo" => $this->principio_activo,
                "precauciones" => $this->precauciones,
                "accion_terapeutica" => $this->accion_terapeutica,
                "dosificacion" => $this->dosificacion,
                "indicaciones" => $this->indicaciones,
                "interacciones" => $this->interacciones,
                "marca" => $this->marca,
                "contraindicaciones" => $this->contraindicaciones,
                "propiedades" => $this->propiedades,
                "sobredosificacion" => $this->sobredosificacion,
                "reacciones_adversas" => $this->reacciones_adversas
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
    public function ObtenerVademecum($id) {
        try {
            $documento = $this->coleccion->findOne(array("_id" => new \MongoDB\BSON\ObjectId($id)));
            return $documento;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /** *********************************
     * Funcion para editar un vademecum * 
     ********************************* **/
    public function EditarVademecum($id) {
        try {
            $documento = array(
                "principio_activo" => $this->principio_activo,
                "precauciones" => $this->precauciones,
                "accion_terapeutica" => $this->accion_terapeutica,
                "dosificacion" => $this->dosificacion,
                "indicaciones" => $this->indicaciones,
                "interacciones" => $this->interacciones,
                "marca" => $this->marca,
                "contraindicaciones" => $this->contraindicaciones,
                "propiedades" => $this->propiedades,
                "sobredosificacion" => $this->sobredosificacion,
                "reacciones_adversas" => $this->reacciones_adversas
            );
            $this->coleccion->updateOne(array("_id" => new \MongoDB\BSON\ObjectId($id)), array('$set' => $documento));
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    
    /** ***********************************
     * Funcion para eliminar un vademecum * 
     *********************************** **/
    public function EliminarVademecum($id) {
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