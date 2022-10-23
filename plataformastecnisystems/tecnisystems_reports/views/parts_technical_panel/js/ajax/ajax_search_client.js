function ajax_search_valid_client(){
  let url =  "./controllers/search_client_controller.php";
  let search = document.getElementById("client_search_bar").value;

  if (search !== "" && search !== null && search !== "NaN") {
    $.ajax({
      url: url,
      data: {"search":search},
      type: "POST",
      success: function(data){
        switch (data) {
          case "Redirigir":
          location.reload();
          break;

          case "Error":
          alert("No existen resultados para los terminos de busqueda. Verifique e intente nuevamente.");
          break;

          default:
          let select_client_name = document.getElementById("client_name");
          let content = `<option value="0">Seleccione una opción</option>`;
          let tokensClients = "";

          let new_data = JSON.parse(data);
          for (var i = 0; i < new_data.length; i++) {
            tokensClients += new_data[i]["tokenClient"] + " | ";
            content += `<option value="${new_data[i]["tokenClient"]}">${new_data[i]["nameClient"]}</option>`;
            console.log(new_data[i]["tokenClient"]);
          }
          select_client_name.disabled = false;
          select_client_name.innerHTML = content;
          let msn = "Buscando clientes: "+tokensClients;
          ajax_save_record_user(msn);
        }
      },
      error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
      }
    });
  } else {
    alert("El cuadro de busqueda se encuentra vacio. Verifique e intente nuevamente.");
  }
}

let btn_search_valid_client = document.getElementById("btn_search_client");
btn_search_valid_client.addEventListener("click", function(){
  ajax_search_valid_client();
});
