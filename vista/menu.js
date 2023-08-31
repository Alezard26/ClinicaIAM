function CerrarSesion() {
  $.post(
    "../controlador/login.php",
    { tipo: "cerrar" },
    function (respuesta) {
      if (respuesta.estado == 1) {
        window.location.href = "../index.php";
      }
    },
    "json"
  );
}

function CargarPacientes() {
  $("#divContenido").load("pacientes/pacientes.php");
}

function CargarConsulta() {
  $("#divContenido").load("consulta/consulta.php");
}

function CargarAgenda() {
  $("#divContenido").load("agenda/agenda.php");
}

function CargarVademecum() {
  $("#divContenido").load("vademecum/vademecum.php");
}

function CargarCIE10() {
  $("#divContenido").load("cie10/cie10.php");
}
