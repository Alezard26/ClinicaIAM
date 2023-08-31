<?php 
/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
require_once '../modelo/Vademecum.php';
$obj = new Vademecum();
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
switch ($tipo) {
    case 'obtener':
        LlenarTabla($obj);
        break;
    case 'buscar':
        ObtenerVademecum($obj);
        break;
    case 'agregar':
        AgregarVademecum($obj);
        break;
    case 'editar':
        EditarVademecum($obj);
        break;
    case 'eliminar':
        EliminarVademecum($obj);
        break;
}

function AgregarVademecum($obj) {
    $obj->principio_activo = isset($_POST['principio_activo']) ? $_POST['principio_activo'] : '';   
    $obj->precauciones = isset($_POST['precauciones']) ? $_POST['precauciones'] : '';
    $obj->accion_terapeutica = isset($_POST['accion_terapeutica']) ? $_POST['accion_terapeutica'] : '';
    $obj->dosificacion = isset($_POST['dosificacion']) ? $_POST['dosificacion'] : '';
    $obj->indicaciones = isset($_POST['indicaciones']) ? $_POST['indicaciones'] : '';
    $obj->interacciones = isset($_POST['interacciones']) ? $_POST['interacciones'] : '';
    $obj->marca = isset($_POST['marca']) ? $_POST['marca'] : '';
    $obj->contraindicaciones = isset($_POST['contraindicaciones']) ? $_POST['contraindicaciones'] : '';
    $obj->propiedades = isset($_POST['propiedades']) ? $_POST['propiedades'] : '';
    $obj->sobredosificacion = isset($_POST['sobredosificacion']) ? $_POST['sobredosificacion'] : '';
    $obj->reacciones_adversas = isset($_POST['reacciones_adversas']) ? $_POST['reacciones_adversas'] : '';
    if ($obj->AgregarVademecum()) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Vademecum agregado correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al agregar Vademecum.'));
    }
}

function LlenarTabla($obj) {
    $html = '';
    $datos = $obj->coleccion->find();
    foreach ($datos as $row) {
        $id = '"'.$row['_id'].'"';
        $principio_activo = $row['principio_activo'];
        $accion_terapeutica = $row['accion_terapeutica'];
        $dosificacion = $row['dosificacion'];
        $indicaciones = $row['indicaciones'];
        $marca = $row['marca'];
        $propiedades = $row['propiedades'];

        $html .= "<tr onclick='CargarDatos($id)'>
            <td>$principio_activo</td>
            <td>$accion_terapeutica</td>
            <td>$dosificacion</td>
            <td>$indicaciones</td>
            <td>$marca</td>
            <td>$propiedades</td>
        </tr>";
    }
    echo json_encode(array('estado' => 1, 'html' => $html));
}

function ObtenerVademecum($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $datos = $obj->ObtenerVademecum($id);
    $principio_activo = $datos['principio_activo'];
    $precauciones = $datos['precauciones'];
    $accion_terapeutica = $datos['accion_terapeutica'];
    $dosificacion = $datos['dosificacion'];
    $indicaciones = $datos['indicaciones'];
    $interacciones = $datos['interacciones'];
    $marca = $datos['marca'];
    $contraindicaciones = $datos['contraindicaciones'];
    $propiedades = $datos['propiedades'];
    $sobredosificacion = $datos['sobredosificacion'];
    $reacciones_adversas = $datos['reacciones_adversas'];
    echo json_encode(array(
        'estado' => 1, 
        'principio_activo' => $principio_activo, 
        'precauciones' => $precauciones,
        'accion_terapeutica' => $accion_terapeutica, 
        'dosificacion' => $dosificacion, 
        'indicaciones' => $indicaciones, 
        'interacciones' => $interacciones, 
        'marca' => $marca, 
        'contraindicaciones' => $contraindicaciones, 
        'propiedades' => $propiedades, 
        'sobredosificacion' => $sobredosificacion, 
        'reacciones_adversas' => $reacciones_adversas
    ));
}

function EditarVademecum($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $obj->principio_activo = isset($_POST['principio_activo']) ? $_POST['principio_activo'] : '';   
    $obj->precauciones = isset($_POST['precauciones']) ? $_POST['precauciones'] : '';
    $obj->accion_terapeutica = isset($_POST['accion_terapeutica']) ? $_POST['accion_terapeutica'] : '';
    $obj->dosificacion = isset($_POST['dosificacion']) ? $_POST['dosificacion'] : '';
    $obj->indicaciones = isset($_POST['indicaciones']) ? $_POST['indicaciones'] : '';
    $obj->interacciones = isset($_POST['interacciones']) ? $_POST['interacciones'] : '';
    $obj->marca = isset($_POST['marca']) ? $_POST['marca'] : '';
    $obj->contraindicaciones = isset($_POST['contraindicaciones']) ? $_POST['contraindicaciones'] : '';
    $obj->propiedades = isset($_POST['propiedades']) ? $_POST['propiedades'] : '';
    $obj->sobredosificacion = isset($_POST['sobredosificacion']) ? $_POST['sobredosificacion'] : '';
    $obj->reacciones_adversas = isset($_POST['reacciones_adversas']) ? $_POST['reacciones_adversas'] : '';
    
    if ($obj->EditarVademecum($id)) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Vademecum editado correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al editar Vademecum.'));
    }
}

function EliminarVademecum($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    if ($obj->EliminarVademecum($id)) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Vademecum eliminado correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al eliminar Vademecum.'));
    }
}