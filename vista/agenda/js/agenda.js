/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
var globIdAgenda = 0;

function prevenir() {
  document
    .getElementById("formAgenda")
    .addEventListener("click", function (event) {
      event.preventDefault();
    });
}

function ResetearControles() {
  $("#txtFecha").val("");
  $("#txtHora").val("");
  $("#selPacientes").val("0");
}

function AgregarAgenda() {
  prevenir();
  let fecha = $("#txtFecha").val();
  let hora = $("#txtHora").val();
  let paciente = $("#selPacientes").val();
  $.post(
    "../controlador/controlador_agenda.php",
    {
      tipo: "agregar",
      fecha: fecha,
      hora: hora,
      paciente: paciente,
    },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaAgenda();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function LlenarTablaAgenda() {
  $.post(
    "../controlador/controlador_agenda.php",
    { tipo: "obtener" },
    function (respuesta) {
      $("#tblAgenda").html(respuesta.html);
    },
    "json"
  );
}

function LlenarComboPacientes() {
  $.post(
    "../controlador/controlador_agenda.php",
    { tipo: "obtenerCombo" },
    function (respuesta) {
      $("#selPacientes").html(respuesta.html);
    },
    "json"
  );
}

function CargarDatos(id) {
  globIdAgenda = id;
  $.post(
    "../controlador/controlador_agenda.php",
    { tipo: "buscar", id: id },
    function (respuesta) {
      $("#txtFecha").val(respuesta.fecha);
      $("#txtHora").val(respuesta.hora);
      $("#selPacientes").val(respuesta.paciente);
    },
    "json"
  );
}

function EditarAgenda() {
  prevenir();
  let fecha = $("#txtFecha").val();
  let hora = $("#txtHora").val();
  let paciente = $("#selPacientes").val();
  $.post(
    "../controlador/controlador_agenda.php",
    {
      tipo: "editar",
      id: globIdAgenda,
      fecha: fecha,
      hora: hora,
      paciente: paciente,
    },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaAgenda();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function EliminarAgenda() {
  prevenir();
  $.post(
    "../controlador/controlador_agenda.php",
    { tipo: "eliminar", id: globIdAgenda },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaAgenda();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}
