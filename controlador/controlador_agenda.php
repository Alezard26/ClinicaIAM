<?php 
/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
require_once '../modelo/Agenda.php';
require_once '../modelo/Pacientes.php';
$obj = new Agenda();
$objPaciente = new Pacientes();
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
switch ($tipo) {
    case 'obtener':
        LlenarTabla($obj, $objPaciente);
        break;
    case 'obtenerCombo':
        LlenarCombo($objPaciente);
        break;
    case 'buscar':
        ObtenerAgenda($obj, $objPaciente);
        break;
    case 'agregar':
        AgregarAgenda($obj);
        break;
    case 'editar':
        EditarAgenda($obj);
        break;
    case 'eliminar':
        EliminarAgenda($obj);
        break;
}

function LlenarTabla($obj, $objPaciente) {
    $html = '';
    $datos = $obj->coleccion->find();
    foreach ($datos as $row) {
        $id = '"'.$row['_id'].'"';
        $fecha = $row['fecha'];
        $hora = $row['hora'];
        $paciente = $row['paciente'];
        $datosPaciente = $objPaciente->ObtenerPaciente($paciente);
        $nombrePaciente = $datosPaciente['nombres'].' '.$datosPaciente['apellidos'];
        $html .= "<tr onclick='CargarDatos($id)'>
            <td>$fecha</td>
            <td>$hora</td>
            <td>$nombrePaciente</td>
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

function ObtenerAgenda($obj, $objPaciente) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $datos = $obj->ObtenerAgenda($id);
    $fecha = $datos['fecha'];
    $hora = $datos['hora'];
    $paciente = $datos['paciente'];
    echo json_encode(array('estado' => 1, 'fecha' => $fecha, 'hora' => $hora, 'paciente' => $paciente));
}

function AgregarAgenda($obj) {
    $obj->fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $obj->hora = isset($_POST['hora']) ? $_POST['hora'] : '';
    $obj->paciente = isset($_POST['paciente']) ? $_POST['paciente'] : '';
    if ($obj->AgregarAgenda()) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Cita agendada correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al agendar cita.'));
    }
}

function EditarAgenda($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $obj->fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $obj->hora = isset($_POST['hora']) ? $_POST['hora'] : '';
    $obj->paciente = isset($_POST['paciente']) ? $_POST['paciente'] : '';
    if ($obj->EditarAgenda($id)) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Cita editada correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al editar cita.'));
    }
}

function EliminarAgenda($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    if ($obj->EliminarAgenda($id)) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Enfermedad eliminada correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al eliminar enfermedad.'));
    }
}