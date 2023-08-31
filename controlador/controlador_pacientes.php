<?php 
/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
require_once '../modelo/Pacientes.php';
$obj = new Pacientes();
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
switch ($tipo) {
    case 'obtener':
        LlenarTabla($obj);
        break;
    case 'buscar':
        ObtenerPaciente($obj);
        break;
    case 'agregar':
        AgregarPaciente($obj);
        break;
    case 'editar':
        EditarPaciente($obj);
        break;
    case 'eliminar':
        EliminarPaciente($obj);
        break;
}

function AgregarPaciente($obj) {
    $obj->nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
    $obj->apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $obj->dui = isset($_POST['dui']) ? $_POST['dui'] : '';
    $obj->telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $obj->direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $obj->ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : '';
    $obj->fecha_nacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '';
    $obj->sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $obj->estado_civil = isset($_POST['estadoCivil']) ? $_POST['estadoCivil'] : '';
    if ($obj->AgregarPaciente()) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Paciente agregado correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al agregar paciente.'));
    }
}

function LlenarTabla($obj) {
    $html = '';
    $datos = $obj->coleccion->find();
    foreach ($datos as $row) {
        $id = '"'.$row['_id'].'"';
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];
        $dui = $row['dui'];
        $telefono = $row['telefono'];
        $direccion = $row['direccion'];
        $ocupacion = $row['ocupacion'];
        $fecha_nacimiento = $row['fecha_nacimiento'];
        $sexo = $row['sexo'];
        $estado_civil = $row['estado_civil'];

        switch ($sexo) {
            case '1':
                $sexo = 'Masculino';
                break;
            case '2':
                $sexo = 'Femenino';
                break;
            default:
                $sexo = 'Otro';
                break;
        }

        switch ($estado_civil) {
            case '1':
                $estado_civil = 'Solter(a)';
                break;
            case '2':
                $estado_civil = 'Casad(a)';
                break;
            case '3':
                $estado_civil = 'Divorciad(a)';
                break;
            case '4':
                $estado_civil = 'Viud(a)';
                break;
            default:
                $estado_civil = 'No especificado';
                break;
        }

        $html .= "<tr onclick='CargarDatos($id)'>
            <td>$nombres</td>
            <td>$apellidos</td>
            <td>$dui</td>
            <td>$telefono</td>
            <td>$direccion</td>
            <td>$ocupacion</td>
            <td>$fecha_nacimiento</td>
            <td>$sexo</td>
            <td>$estado_civil</td>
        </tr>";
    }
    echo json_encode(array('estado' => 1, 'html' => $html));
}

function ObtenerPaciente($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $datos = $obj->ObtenerPaciente($id);
    $nombres = $datos['nombres'];
    $apellidos = $datos['apellidos'];
    $dui = $datos['dui'];
    $telefono = $datos['telefono'];
    $direccion = $datos['direccion'];
    $ocupacion = $datos['ocupacion'];
    $fecha_nacimiento = $datos['fecha_nacimiento'];
    $sexo = $datos['sexo'];
    $estado_civil = $datos['estado_civil'];
    echo json_encode(array('estado' => 1, 'nombres' => $nombres, 'apellidos' => $apellidos, 'dui' => $dui, 'telefono' => $telefono, 'direccion' => $direccion, 'ocupacion' => $ocupacion, 'fecha_nacimiento' => $fecha_nacimiento, 'sexo' => $sexo, 'estado_civil' => $estado_civil));
}

function EditarPaciente($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $obj->nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
    $obj->apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $obj->dui = isset($_POST['dui']) ? $_POST['dui'] : '';
    $obj->telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $obj->direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $obj->ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : '';
    $obj->fecha_nacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '';
    $obj->sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $obj->estado_civil = isset($_POST['estadoCivil']) ? $_POST['estadoCivil'] : '';
    if ($obj->EditarPaciente($id)) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Paciente editado correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al editar paciente.'));
    }
}

function EliminarPaciente($obj) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    if ($obj->EliminarPaciente($id)) {
        echo json_encode(array('estado' => 1, 'mensaje' => 'Paciente eliminado correctamente.'));
    } else {
        echo json_encode(array('estado' => 2, 'mensaje' => 'Error al eliminar paciente.'));
    }
}