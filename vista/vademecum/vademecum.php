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
        <link rel="stylesheet" href="vademecum/css/vademecum.css">
        <title>Clinica IAM</title>
    </head>
    <body>
        <script>
            $(document).ready(function() {
                LlenarTablaVademecum();
            });
        </script>
        <div class="divTittle">
            <h1 class="titulo">Vademecum</h1>
        </div>

        <div class="myDiv">
            <form id="formVademecum">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="lbForm" for="txtPrincipioActivo">Principio Activo: </label>
                        <input type="text" class="form-control" id="txtPrincipioActivo" placeholder="Principio Activo">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lbForm" for="txtPrecauciones">Precauciones </label>
                        <input type="text" class="form-control" id="txtPrecauciones" placeholder="Precauciones">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lbForm" for="txtAccionTeraupeutica">Accion Terapeutica: </label>
                        <input type="text" class="form-control" id="txtAccionTeraupeutica" placeholder="Accion Teraupeutica">
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-success" onclick="AgregarVademecum()" id="btnAggPaciente">Agregar</button>
                        <br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="lbForm" for="txtDosificacion">Dosificacion: </label>
                        <input type="text" class="form-control" id="txtDosificacion" placeholder="Dosificacion">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lbForm" for="txtIndicaciones">Indicaciones: </label>
                        <input type="text" class="form-control" id="txtIndicaciones" placeholder="Indicaciones">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lbForm" for="txtInteracciones">Interacciones: </label>
                        <input type="text" class="form-control" id="txtInteracciones" placeholder="Interacciones">
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-warning" onclick="EditarVademecum()" id="btnAggPaciente">Editar</button>
                        <br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="lbForm" for="txtMarca">Marca: </label>
                        <input type="text" class="form-control" id="txtMarca" placeholder="Marca">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lbForm" for="txtContraindicaciones">Contra Indicaciones: </label>
                        <input type="text" class="form-control" id="txtContraindicaciones" placeholder="Contra Indicaciones">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="lbForm" for="txtPropiedades">Propiedades: </label>
                        <input type="text" class="form-control" id="txtPropiedades" placeholder="Propiedades">
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-danger" onclick="EliminarVademecum()" id="btnAggPaciente">Eliminar</button>
                        <br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label class="lbForm" for="txtSobreDosificacion">Sobre Dosificacion: </label>
                        <input type="text" class="form-control" id="txtSobreDosificacion" placeholder="Contra Indicaciones">
                    </div>
                    <div class="form-group col-md-5">
                        <label class="lbForm" for="txtReaccionesAdversas">Reacciones Adversas: </label>
                        <input type="text" class="form-control" id="txtReaccionesAdversas" placeholder="Reacciones Adversas">
                    </div>
                    <div class="form-group col-md-2 text-center"></div>
                </div>               
            </form>
            <div class="row" style="padding: 20px;">
                <table class="table table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Principio Activo</th>
                            <th>Accion Terapeutica</th>
                            <th>Dosificacion</th>
                            <th>Indicaciones</th>
                            <th>Marca</th>
                            <th>Propiedades</th>
                        </tr>
                    </thead>
                    <tbody class="table-light" id="tblVademecum"></tbody>
                </table>
            </div>
        </div>

        <script type="text/javascript" src="vademecum/js/vademecum.js"></script>
    </body>
</html>

<?php 
} 
?>