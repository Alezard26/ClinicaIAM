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
                LlenarTablaCie10();
            });
        </script>
        <div class="divTittle">
            <h1 class="titulo">Clasificaión Internacional de Enfermedades 10.ª Revisión</h1>
        </div>

        <div class="myDiv">
            <form id="formCie10">
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label class="lbForm" for="txtCodigo">Código: </label>
                        <input type="text" class="form-control" id="txtCodigo" placeholder="Precauciones">
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label class="lbForm" for="texaDescrip">Descripción: </label>
                        <textarea class="form-control" id="texaDescrip" placeholder="Descripción: "></textarea>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-success" onclick="AgregarCie10()">Agregar</button>
                        <br>
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-warning" onclick="EditarCie10()">Editar</button>
                        <br>
                    </div>
                    <div class="form-group col-md-2 text-center">
                        <br>
                        <button type="submit" class="btn btn-danger" onclick="EliminarCie10()">Eliminar</button>
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
                                <th>Código</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody class="table-light" id="tblCie10"></tbody>
                    </table>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="cie10/js/cie10.js"></script>
    </body>
</html>

<?php 
} 
?>