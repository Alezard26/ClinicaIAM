/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/
var globIdCie10 = 0;

function prevenir() {
  document
    .getElementById("formCie10")
    .addEventListener("click", function (event) {
      event.preventDefault();
    });
}

function ResetearControles() {
  $("#txtCodigo").val("");
  $("#texaDescrip").val("");
}

function AgregarCie10() {
  prevenir();
  let codigo = $("#txtCodigo").val();
  let descripcion = $("#texaDescrip").val();
  $.post(
    "../controlador/controlador_cie10.php",
    { tipo: "agregar", codigo: codigo, descripcion: descripcion },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaCie10();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function LlenarTablaCie10() {
  $.post(
    "../controlador/controlador_cie10.php",
    { tipo: "obtener" },
    function (respuesta) {
      $("#tblCie10").html(respuesta.html);
    },
    "json"
  );
}

function CargarDatos(id) {
  globIdPaciente = id;
  $.post(
    "../controlador/controlador_cie10.php",
    { tipo: "buscar", id: id },
    function (respuesta) {
      $("#txtCodigo").val(respuesta.codigo);
      $("#texaDescrip").val(respuesta.descripcion);
    },
    "json"
  );
}

function EditarCie10() {
  prevenir();
  let codigo = $("#txtCodigo").val();
  let descripcion = $("#texaDescrip").val();
  $.post(
    "../controlador/controlador_cie10.php",
    {
      tipo: "editar",
      id: globIdCie10,
      codigo: codigo,
      descripcion: descripcion,
    },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaCie10();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}

function EliminarCie10() {
  prevenir();
  $.post(
    "../controlador/controlador_cie10.php",
    { tipo: "eliminar", id: globIdCie10 },
    function (respuesta) {
      if (respuesta.estado == 1) {
        ResetearControles();
        LlenarTablaCie10();
        alert(respuesta.mensaje);
      } else {
        alert(respuesta.mensaje);
      }
    },
    "json"
  );
}
