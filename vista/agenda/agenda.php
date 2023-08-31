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
    header('Location: ../../index.php');
} else {
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../recursos/clinica.png">
        <link rel="stylesheet" href="agenda/css/agenda.css">
        <title>Clinica IAM</title>
    </head>
    <body>
        <script>
            $(document).ready(function() {
                LlenarTablaAgenda();
                LlenarComboPacientes();
            });
        </script>
        <div class="divTittle">
            <h1 class="titulo">Agenda</h1>
        </div>

        <div class="myDiv">
            <form id="formAgenda">
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6 text-center">
                        <label class="lbForm">Doctor: </label>
                        <input disabled type="text" class="form-control text-center" value="Doctor José Arevalo.">
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6 text-center">
                        <label class="lbForm" for="txtFecha">Fecha: </label>
                        <input type="date" class="form-control text-center" id="txtFecha" placeholder="Dirección de Residencia">
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6 text-center">
                        <label class="lbForm" for="txtHora">Hora: </label>
                        <input type="time" class="form-control text-center" id="txtHora" placeholder="Dirección de Residencia">
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6 text-center">
                        <label class="lbForm" for="selPacientes">Paciente: </label>
                        <select id="selPacientes" class="form-control"></select>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-success" onclick="AgregarAgenda()" id="btnAggPaciente">Agregar</button>
                        <br>
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-warning" onclick="EditarAgenda()" id="btnAggPaciente">Editar</button>
                        <br>
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-danger" onclick="EliminarAgenda()" id="btnAggPaciente">Eliminar</button>
                        <br>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
            </form>
            <div class="row" style="padding: 20px;">
                <div class="divTable">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Paciente</th>
                            </tr>
                        </thead>
                        <tbody class="table-light" id="tblAgenda"></tbody>
                    </table>
                </div>
            </div>
        </div>  

        <script type="text/javascript" src="agenda/js/agenda.js"></script>
    </body>

</html>

<?php 
} 
?>