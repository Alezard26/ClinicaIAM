/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
var globIdConsulta = 0;

function prevenir() {
  document
    .getElementById("formConsultas")
    .addEventListener("click", function (event) {
      event.preventDefault();
    });
}

function ResetearControles() {
  $("#cmbPaciente").val("0");
  $("#txtMotivoConsulta").val("");
  $("#txtPeso").val("");
  $("#txtTalla").val("");
  $("#txtTemperatura").val("");
  $("#txtFreResp").val("");
  $("#txtFreCar").val("");
  $("#txtPresion").val("");
  $("#txtFechCons").val("");
  $("#txtObservacion").val("");
  $("#txtDiagnostico").val("");
  $("#txtReceta").val("");
}

function LlenarComboPacientes() {
  $.post(
    "../controlador/controlador_consultas.php",
    { tipo: "obtenerCombo" },
    function (respuesta) {
      $("#cmbPaciente").html(respuesta.html);
    },
    "json"
  );
}

function AgregarConsulta() {
  prevenir();
  let paciente = $("#cmbPaciente").val();
  let motivo = $("#txtMotivoConsulta").val();
  let peso = $("#txtPeso").val();
  let talla = $("#txtTalla").val();
  let temperatura = $("#txtTemperatura").val();
  let frecResp = $("#txtFreResp").val();
  let frecCard = $("#txtFreCar").val();
  let presion = $("#txtPresion").val();
  let fecha = $("#txtFechCons").val();
  let observacion = $("#txtObservacion").val();
  let diagnostico = $("#txtDiagnostico").val();
  let receta = $("#txtReceta").val();
  $.post(
    "../controlador/controlador_consultas.php",
    {
      tipo: "agregar",
      paciente: paciente,
      motivo: motivo,
      peso: peso,
      talla: talla,
      temperatura: temperatura,
      frecResp: frecResp,
      frecCard: frecCard,
      presion: presion,
      fecha: fecha,
      observacion: observacion,
      diagnostico: diagnostico,
      receta: receta,
    },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaConsultas();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function LlenarTablaConsultas() {
  $.post(
    "../controlador/controlador_consultas.php",
    { tipo: "obtener" },
    function (respuesta) {
      $("#tblConsulta").html(respuesta.html);
    },
    "json"
  );
}
