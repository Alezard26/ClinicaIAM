<?php

/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
session_start();
if ($_SESSION['usuario'] == '') {
    session_destroy();
    header('Location: ../index.php');
} else {
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" href="../recursos/clinica.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="menu.css">
        <title>Clinica IAM</title>
    </head>
    <body>
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="../recursos/recepcion.png" style="width: 38px;">
                    <h3 style="margin-left: 10px; height: 32px; padding-top: 6px;">Menu</h3>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="#" onclick="CargarPacientes()"><img src="../recursos/registro.png"> Pacientes</a>
                    </li>
                    <li>
                        <a href="#" onclick="CargarConsulta()"><img src="../recursos/consulta.png"> Consulta</a>
                    </li>
                    <li>
                        <a href="#" onclick=" CargarAgenda()"><img src="../recursos/agenda.png"> Agenda</a>
                    </li>
                    <li>
                        <a href="#" onclick="CargarVademecum()"><img src="../recursos/vademecum.png"> Vademecum</a>
                    </li>
                    <li>
                        <a href="#" onclick="CargarCIE10()"><img src="../recursos/cie10.png"> CIE10</a>
                    </li>
                </ul>
                <div style="padding: 20px;">
                    <a href="#" onclick="CerrarSesion()"><img src="../recursos/logout.png"> Cerrar Sesion</a>
                </div>
            </nav>
            <div id="divContenido">
            </div>
        </div>

    <script type="text/javascript" src="menu.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</body>

</html>
<?php 
} 
?>