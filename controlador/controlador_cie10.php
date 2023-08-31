<?php 
/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
require_once '../modelo/Cie10.php';
$obj = new Cie10();
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
switch ($tipo) {
    case 'obtener':
        LlenarTabla($obj);
        break;
    case 'buscar':
        ObtenerCie10($obj);
        break;
    case 'agregar':
        AgregarCie10($obj);
        break;
    case 'editar':
        EditarCie10($obj);
        break;
    case 'eliminar':
        EliminarCie10($obj);
        break;
}

function AgregarCie10($obj) {
    $obj->codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $obj->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    if ($obj->AgregarCie10()) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Enfermedad agregada correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al agregar enfermedad.'));
    }
}

function LlenarTabla($obj) {
    $html = '';
    $datos = $obj->coleccion->find();
    foreach ($datos as $row) {
        $id = '"'.$row['_id'].'"';
        $codigo = $row['code'];
        $descripcion = $row['description'];
        $html .= "<tr onclick='CargarDatos($id)'>
            <td>$codigo</td>
            <td>$descripcion</td>
        </tr>";
    }
    echo json_encode(array('estado' => 1, 'html' => $html));
}

function ObtenerCie10($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $datos = $obj->ObtenerCie10($id);
    $codigo = $datos['code'];
    $descripcion = $datos['description'];
    echo json_encode(array('estado' => 1, 'codigo' => $codigo, 'descripcion' => $descripcion));
}

function EditarCie10($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $obj->codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $obj->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    if ($obj->EditarCie10($id)) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Enfermedad editada correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al editar enfermedad.'));
    }
}

function EliminarCie10($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    if ($obj->EliminarCie10($id)) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Enfermedad eliminada correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al eliminar enfermedad.'));
    }
}