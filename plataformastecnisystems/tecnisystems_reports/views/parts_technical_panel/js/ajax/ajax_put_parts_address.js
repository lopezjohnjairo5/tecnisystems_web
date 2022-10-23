function ajax_put_parts_address(search){

  let url =  "./controllers/put_parts_address_controller.php";

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
            let address_client = document.getElementById("address_client");
            let city_client = document.getElementById("city_client");
            let department_client = document.getElementById("department_client");
            let new_data = JSON.parse(data);
            address_client.value = new_data["addr"];
            city_client.value = new_data["city"];
            city_client.setAttribute("data-city-tk",new_data["cityTk"]);
            department_client.value = new_data["dept"];
            department_client.setAttribute("data-dep-tk",new_data["deptTk"]);
            break;
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

let client_address_options = document.getElementById("client_address_options");
client_address_options.addEventListener("change", function(){
  let idAddress = "";
  for (var i = 0; i < this.length; i++) {
    if (this[i].selected === true) {
      idAddress = this[i].value;
      ajax_put_parts_address(idAddress);
    }
  }
});
