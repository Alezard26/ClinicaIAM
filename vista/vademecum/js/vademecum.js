/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
var globIdVademecum = 0;

function prevenir() {
  document
    .getElementById("formVademecum")
    .addEventListener("click", function (event) {
      event.preventDefault();
    });
}

function ResetearControles() {
  $("#txtPrincipioActivo").val("");
  $("#txtPrecauciones").val("");
  $("#txtAccionTeraupeutica").val("");
  $("#txtDosificacion").val("");
  $("#txtIndicaciones").val("");
  $("#txtInteracciones").val("");
  $("#txtMarca").val("");
  $("#txtContraindicaciones").val("");
  $("#txtPropiedades").val("");
  $("#txtSobreDosificacion").val("");
  $("#txtReaccionesAdversas").val("");
}

function LlenarTablaVademecum() {
  $.post(
    "../controlador/controlador_vademecum.php",
    { tipo: "obtener" },
    function (respuesta) {
      $("#tblVademecum").html(respuesta.html);
    },
    "json"
  );
}

function CargarDatos(id) {
  globIdVademecum = id;
  $.post(
    "../controlador/controlador_vademecum.php",
    { tipo: "buscar", id: id },
    function (respuesta) {
      $("#txtPrincipioActivo").val(respuesta.principio_activo);
      $("#txtPrecauciones").val(respuesta.precauciones);
      $("#txtAccionTeraupeutica").val(respuesta.accion_terapeutica);
      $("#txtDosificacion").val(respuesta.dosificacion);
      $("#txtIndicaciones").val(respuesta.indicaciones);
      $("#txtInteracciones").val(respuesta.interacciones);
      $("#txtMarca").val(respuesta.marca);
      $("#txtContraindicaciones").val(respuesta.contraindicaciones);
      $("#txtPropiedades").val(respuesta.propiedades);
      $("#txtSobreDosificacion").val(respuesta.sobredosificacion);
      $("#txtReaccionesAdversas").val(respuesta.reacciones_adversas);
    },
    "json"
  );
}

function AgregarVademecum() {
  prevenir();
  let principioActivo = $("#txtPrincipioActivo").val();
  let precauciones = $("#txtPrecauciones").val();
  let accionTerapeutica = $("#txtAccionTeraupeutica").val();
  let dosificacion = $("#txtDosificacion").val();
  let indicaciones = $("#txtIndicaciones").val();
  let interacciones = $("#txtInteracciones").val();
  let marca = $("#txtMarca").val();
  let contraindicciones = $("#txtContraindicaciones").val();
  let propiedades = $("#txtPropiedades").val();
  let sobredosificacion = $("#txtSobreDosificacion").val();
  let reaccionesAdversas = $("#txtReaccionesAdversas").val();
  $.post(
    "../controlador/controlador_vademecum.php",
    {
      tipo: "agregar",
      principio_activo: principioActivo,
      precauciones: precauciones,
      accion_terapeutica: accionTerapeutica,
      dosificacion: dosificacion,
      indicaciones: indicaciones,
      interacciones: interacciones,
      marca: marca,
      contraindicaciones: contraindicciones,
      propiedades: propiedades,
      sobredosificacion: sobredosificacion,
      reacciones_adversas: reaccionesAdversas,
    },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaVademecum();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function EditarVademecum() {
  prevenir();
  let principioActivo = $("#txtPrincipioActivo").val();
  let precauciones = $("#txtPrecauciones").val();
  let accionTerapeutica = $("#txtAccionTeraupeutica").val();
  let dosificacion = $("#txtDosificacion").val();
  let indicaciones = $("#txtIndicaciones").val();
  let interacciones = $("#txtInteracciones").val();
  let marca = $("#txtMarca").val();
  let contraindicciones = $("#txtContraindicaciones").val();
  let propiedades = $("#txtPropiedades").val();
  let sobredosificacion = $("#txtSobreDosificacion").val();
  let reaccionesAdversas = $("#txtReaccionesAdversas").val();
  $.post(
    "../controlador/controlador_vademecum.php",
    {
      tipo: "editar",
      id: globIdVademecum,
      principio_activo: principioActivo,
      precauciones: precauciones,
      accion_terapeutica: accionTerapeutica,
      dosificacion: dosificacion,
      indicaciones: indicaciones,
      interacciones: interacciones,
      marca: marca,
      contraindicaciones: contraindicciones,
      propiedades: propiedades,
      sobredosificacion: sobredosificacion,
      reacciones_adversas: reaccionesAdversas,
    },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaVademecum();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function EliminarVademecum() {
  prevenir();
  $.post(
    "../controlador/controlador_vademecum.php",
    { tipo: "eliminar", id: globIdVademecum },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaVademecum();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}
