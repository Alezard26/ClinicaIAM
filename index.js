/** *************************************
 * @author Alexander Antonio Soto Brito *
 * @author Jaime Alberto Portillo Luna  *
 * @author Jose Miguel Arevalo Moreira  *
 * @copyright 2022 - 2025               *
 * @version 1.0.0                       *
 * @date 2022-06-05 12:32:21            *
 ************************************* **/

function Modal() {
  $("#myModal").modal("show");
}

function IniciarSession() {
  document
    .getElementById("formLogin")
    .addEventListener("click", function (event) {
      event.preventDefault();
    });
  let usuario = $("#txtUsuario").val();
  let contra = $("#txtContra").val();
  if (usuario == "" || contra == "") {
    $("#textoError").html("Por favor llene todos los campos");
    $("#modalError").modal("show");
  } else {
    $.post(
      "controlador/login.php",
      { tipo: "iniciar", usuario: usuario, contra: contra },
      function (respuesta) {
        if (respuesta.estado == 1) {
          window.location.href = "vista/menu.php";
        } else {
          $("#textoError").html(respuesta.mensaje);
          $("#modalError").modal("show");
        }
      },
      "json"
    );
  }
}
