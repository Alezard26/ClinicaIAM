/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
let globIdPaciente = 0;

function prevenir() {
  document
    .getElementById("formPacientes")
    .addEventListener("click", function (event) {
      event.preventDefault();
    });
}

function ResetearControles() {
  $("#txtNombres").val("");
  $("#txtApellidos").val("");
  $("#txtDui").val("");
  $("#txtTelefono").val("");
  $("#txtDireccion").val("");
  $("#txtOcupacion").val("");
  $("#txtFechNac").val("");
  $("#selSexo").val("0");
  $("#selEstadoCivil").val("0");
}

function AgregarPaciente() {
  prevenir();
  let nombres = $("#txtNombres").val();
  let apellidos = $("#txtApellidos").val();
  let dui = $("#txtDui").val();
  let telefono = $("#txtTelefono").val();
  let direccion = $("#txtDireccion").val();
  let ocupacion = $("#txtOcupacion").val();
  let fechaNacimiento = $("#txtFechNac").val();
  let sexo = $("#selSexo").val();
  let estadoCivil = $("#selEstadoCivil").val();
  $.post(
    "../controlador/controlador_pacientes.php",
    {
      tipo: "agregar",
      nombres: nombres,
      apellidos: apellidos,
      dui: dui,
      telefono: telefono,
      direccion: direccion,
      ocupacion: ocupacion,
      fechaNacimiento: fechaNacimiento,
      sexo: sexo,
      estadoCivil: estadoCivil,
    },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaPacientes();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function LlenarTablaPacientes() {
  $.post(
    "../controlador/controlador_pacientes.php",
    { tipo: "obtener" },
    function (respuesta) {
      $("#tblPacientes").html(respuesta.html);
    },
    "json"
  );
}

function CargarDatos(id) {
  globIdPaciente = id;
  $.post(
    "../controlador/controlador_pacientes.php",
    { tipo: "buscar", id: id },
    function (respuesta) {
      $("#txtNombres").val(respuesta.nombres);
      $("#txtApellidos").val(respuesta.apellidos);
      $("#txtDui").val(respuesta.dui);
      $("#txtTelefono").val(respuesta.telefono);
      $("#txtDireccion").val(respuesta.direccion);
      $("#txtOcupacion").val(respuesta.ocupacion);
      document.getElementById("txtFechNac").value = respuesta.fechaNacimiento;
      $("#selEstadoCivil").val(respuesta.estadoCivil);
      $("#selSexo").val(respuesta.sexo);
    },
    "json"
  );
}

function EditarPaciente() {
  prevenir();
  let nombres = $("#txtNombres").val();
  let apellidos = $("#txtApellidos").val();
  let dui = $("#txtDui").val();
  let telefono = $("#txtTelefono").val();
  let direccion = $("#txtDireccion").val();
  let ocupacion = $("#txtOcupacion").val();
  let fechaNacimiento = $("#txtFechNac").val();
  let sexo = $("#selSexo").val();
  let estadoCivil = $("#selEstadoCivil").val();
  $.post(
    "../controlador/controlador_pacientes.php",
    {
      tipo: "editar",
      id: globIdPaciente,
      nombres: nombres,
      apellidos: apellidos,
      dui: dui,
      telefono: telefono,
      direccion: direccion,
      ocupacion: ocupacion,
      fechaNacimiento: fechaNacimiento,
      sexo: sexo,
      estadoCivil: estadoCivil,
    },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaPacientes();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function EliminarPaciente() {
  prevenir();
  $.post(
    "../controlador/controlador_pacientes.php",
    { tipo: "eliminar", id: globIdPaciente },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaPacientes();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}
