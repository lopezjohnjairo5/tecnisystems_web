function ajax_update_state_client(token){
  let url = "./controllers/update_state_client_controller.php";

  let state_client_update = document.getElementById("state_client_update").value;

  $.ajax({
    type: "POST",
    url: url,
    data: {"token":token,"state":state_client_update},
    success: function(data){
      switch (data) {
        case "Correct":
          alert("Actualización exitosa.");
          msn = `Estado de cliente ${token} actualizado.`;
          ajax_save_record_user(msn);
          break;

        case "Error":
          alert("Error al actualizar el estado del cliente.\nVerifique su conexión a internet.\nSi el problema persiste, por favor, contacte al soporte técnico.");
          break;
      }
    }
  });
}

let btn_update_client_info = document.getElementById("btn_update_client_info");
btn_update_client_info.addEventListener("click",function(){
  let update_token_client = document.getElementById("update_token_client");
  ajax_update_state_client(update_token_client.textContent);

});
