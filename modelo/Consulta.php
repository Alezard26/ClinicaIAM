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
class Consulta extends Conexion {
    public $conexion = "";
    public $coleccion = "";
    public $Paciente = "";
    public $Receta = "";
    public $Diagnostico = "";
    public $Fecha_consulta = "";
    public $Observacion = "";
    public $Motivo_Consulta = "";
    public $Presion_Arterial = "";
    public $Frecuencia_Cardiaca = "";
    public $Frecuencia_Respiratoria = "";
    public $Temperatura = "";
    public $Peso = "";
    public $talla = "";
    public function __construct()
    {
        $conexion = parent::conectar();
        $this->coleccion = $conexion->consulta;
    }

    /** **********************************
     * Funcion para agregar una consulta * 
     ********************************** **/
    public function AgregarConsulta() {
        try {
            $documento = array(
                'fecha' => $this->Fecha_consulta,
                'paciente' => $this->Paciente,
                'receta' => $this->Receta,
                'diagnostico' => $this->Diagnostico,
                'observacion' => $this->Observacion,
                'motivo_consulta' => $this->Motivo_Consulta,
                'presion_arterial' => $this->Presion_Arterial,
                'frecuencia_cardiaca' => $this->Frecuencia_Cardiaca,
                'frecuencia_respiratoria' => $this->Frecuencia_Respiratoria,
                'temperatura' => $this->Temperatura,
                'peso' => $this->Peso,
                'talla' => $this->talla
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

    /** **********************************
     * Funcion para obtener una consulta * 
     ********************************** **/
    public function ObtenerConsulta($id) {
        try {
            $documento = $this->coleccion->findOne(array("_id" => new \MongoDB\BSON\ObjectId($id)));
            return $documento;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}