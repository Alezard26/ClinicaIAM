<?php 
/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
require_once '../modelo/Consulta.php';
require_once '../modelo/Pacientes.php';
$obj = new Consulta();
$objPaciente = new Pacientes();
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
switch ($tipo) {
    case 'obtener':
        LlenarTabla($obj, $objPaciente);
        break;
    case 'obtenerCombo':
        LlenarCombo($objPaciente);
        break;
    case 'agregar':
        AgregarConsulta($obj);
        break;
}

function LlenarTabla($obj, $objPaciente) {
    $html = '';
    $datos = $obj->coleccion->find();
    foreach ($datos as $row) {
        $Fecha_consulta = $row['fecha'];
        $Paciente = $row['paciente'];
        $Motivo_Consulta = $row['motivo_consulta']; 
        $Observacion = $row['observacion'];
        $datos = $objPaciente->ObtenerPaciente($Paciente);
        $nombrePaciente = $datos['nombres'].' '.$datos['apellidos'];
        $html .= "<tr>
            <td>$Fecha_consulta</td>
            <td>$nombrePaciente</td>
            <td>$Motivo_Consulta</td>
            <td>$Observacion</td>
        </tr>";
    }
    echo json_encode(array('estado' => 1, 'html' => $html));
}

function LlenarCombo($objPaciente) {
    $html = '<option value="0">Seleccione un paciente</option>';
    $datos = $objPaciente->coleccion->find();
    foreach ($datos as $row) {
        $id = $row['_id'];
        $nombre = $row['nombres'].' '.$row['apellidos'];
        $html .= "<option value='$id'>$nombre</option>";
    }
    echo json_encode(array('estado' => 1, 'html' => $html));
}

function AgregarConsulta($obj) {
    $obj->Paciente = isset($_POST['paciente']) ? $_POST['paciente'] : '';
    $obj->Motivo_Consulta = isset($_POST['motivo']) ? $_POST['motivo'] : '';
    $obj->Peso = isset($_POST['peso']) ? $_POST['peso'] : '';
    $obj->talla =  isset($_POST['talla']) ? $_POST['talla'] : '';
    $obj->Temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : '';
    $obj->Frecuencia_Respiratoria = isset($_POST['frecResp']) ? $_POST['frecResp'] : '';
    $obj->Frecuencia_Cardiaca = isset($_POST['frecCard']) ? $_POST['frecCard'] : '';
    $obj->Presion_Arterial = isset($_POST['presion']) ? $_POST['presion'] : '';
    $obj->Fecha_consulta = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $obj->Observacion = isset($_POST['observacion']) ? $_POST['observacion'] : '';
    $obj->Diagnostico = isset($_POST['diagnostico']) ? $_POST['diagnostico'] : '';
    $obj->Receta = isset($_POST['receta']) ? $_POST['receta'] : '';
    if ($obj->AgregarConsulta()) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Cita agendada correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al agendar cita.'));
    }
}