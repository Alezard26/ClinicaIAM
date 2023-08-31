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
        <link rel="stylesheet" href="consulta/css/consulta.css">
        <title>Clinica IAM</title>
    </head>
    <body>
        <script>
            $(document).ready(function() {
                LlenarComboPacientes();
                LlenarTablaConsultas();
            });
        </script>
        <div class="divTittle">
            <h1 class="titulo">Conculta Medica</h1>
        </div>

        <div class="myDiv">
            <form id="formConsultas">
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6 text-center">
                        <label class="lbForm">Doctor: </label>
                        <input disabled type="text" class="form-control text-center" value="Doctor José Arevalo.">
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="lbForm">Paciente: </label>
                        <select id="cmbPaciente" class="form-control text-center">
                            <option value="0">Seleccione un paciente</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="lbForm" for="txtMotivoConsulta">Motivo de consulta: </label>
                        <input type="text" id="txtMotivoConsulta" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label class="lbForm" for="txtPeso">Peso: </label>
                        <input type="number" id="txtPeso" class="form-control">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="lbForm" for="txtTalla">Talla: </label>
                        <input type="number" id="txtTalla" class="form-control">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="lbForm" for="txtTemperatura">Temperatura: </label>
                        <input type="number" id="txtTemperatura" class="form-control">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="lbForm" for="txtFreResp">FR: </label>
                        <input type="number" id="txtFreResp" class="form-control">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="lbForm" for="txtFreCar">FC: </label>
                        <input type="number" id="txtFreCar" class="form-control">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="lbForm" for="txtPresion">Presión: </label>
                        <input type="number" id="txtPresion" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lbForm" for="txtFechCons">Fecha de consulta:</label>
                        <input type="date" id="txtFechCons" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lbForm" for="txtObservacion">Observación: </label>
                        <input type="text" id="txtObservacion" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="lbForm" for="txtDiagnostico">Diagnostico: </label>
                        <textarea id="txtDiagnostico" class="form-control" rows="6"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="lbForm" for="txtReceta">Receta: </label>
                        <textarea id="txtReceta" class="form-control" rows="6"></textarea>
                    </div>
                </div>
                 <div class="form-row">
                    <div class="form-group col-md-12 text-center">
                        <br>
                        <button type="submit" class="btn btn-success" onclick="AgregarConsulta()" id="btnAggPaciente">Guardar</button>
                        <br>
                    </div>
                </div>
            </form>
            <div class="row" style="padding: 20px;">
                <div class="divTable">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Fecha</th>
                                <th>Paciente</th>
                                <th>Motivo</th>
                                <th>Observación</th>
                            </tr>
                        </thead>
                        <tbody class="table-light" id="tblConsulta"></tbody>
                    </table>
                </div>
            </div>
        </div>  

        <script type="text/javascript" src="consulta/js/consulta.js"></script>
    </body>
</html>

<?php 
} 
?>