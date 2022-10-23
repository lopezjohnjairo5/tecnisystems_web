function ajax_activate_deactivate_user(tokenUser,rol){
  var url = "./controllers/activate_deactivate_user_controller.php";
  let state = document.getElementById("select_state_user_search").value;
  let json_data = [];
  let json_object = {};

  json_data.push({
    "token":tokenUser,
    "rol":rol,
    "state":state,
  });
  json_object.data = json_data;

  $.ajax({
    type: "POST",
    url: url,
    data: json_object,
    success: function(data)
    {
      if (data == "not_found") {
        alert("No se encuentra el historial del usuario. Verifique e intente nuevamente.");
      }else if(data == "Redirigir"){
        location.reload();
      }else if(data == "correct"){
        alert("Actualización correcta.");
      }else if(data == "error"){
        alert("Problema al actualizar el estado del usuario. Es posible que no se detectara cambios en el estado actual. Verifique e intente nuevamente.");
      }else if (data == "content_error") {
        alert("Todos los campos son obligatorios. Verifique e intente nuevamente");
      }
    }
  });
}

let btn_save_state_user = document.getElementById("btn_save_state_user");
btn_save_state_user.addEventListener("click",function(e){
  let info_user_search_state = document.getElementById("info_user_search_state");
  let list_elements = info_user_search_state.childNodes;
  for (var i = 0; i < list_elements.length; i++) {
    if (list_elements[i].tagName == "DIV") {
      let elements = list_elements[i].className.split("-");
      ajax_activate_deactivate_user(elements[0],elements[1]);
    }
  }
});
