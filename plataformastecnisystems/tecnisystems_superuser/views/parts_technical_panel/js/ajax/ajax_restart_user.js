function ajax_restart_user(tokenUser,rol){
  var url = "./controllers/restart_user_controller.php";

  let json_data = [];
  let json_object = {};

  json_data.push({
    "token":tokenUser,
    "rol":rol
  });
  json_object.data = json_data;

  $.ajax({
    type: "POST",
    url: url,
    data: json_object,
    success: function(data)
    {
      if(data == "correct"){
        alert("Restablecimiento de contraseña exitoso. Se ha enviado un mensaje con los datos de acceso al correo por defecto.");
      }else if(data == "error"){
        alert("Problema al restablecer. Problemas para encontrar al usuario registrado, datos no validos. Verifique e intente nuevamente.");
      }else if(data == "send_mail_error"){
        alert("Restablecimiento de contraseña correcto. Error al enviar mensaje al correo electronico asociado. Verifique e intente nuevamente.");
      }else if(data == "error_not_exist"){
        alert("Error: Usuario no encontrado. Verifique e intente nuevamente.");
      }else if(data == "Redirigir"){
        location.reload();
      }else{
        alert(data);
      }
    }
  });
}

let btn_continue_restart_access_user = document.getElementById("btn_continue_restart_access_user");
btn_continue_restart_access_user.addEventListener("click",function(e){
  let info_restart_access_user = document.getElementById("info_restart_access_user");
  let list_elements = info_restart_access_user.childNodes;
  for (var i = 0; i < list_elements.length; i++) {
    if (list_elements[i].tagName == "DIV") {
      let elements = list_elements[i].className.split("-");
      ajax_restart_user(elements[0],elements[1]);
    }
  }
});
