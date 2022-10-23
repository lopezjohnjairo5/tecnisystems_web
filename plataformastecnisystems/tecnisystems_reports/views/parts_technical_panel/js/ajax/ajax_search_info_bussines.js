function ajax_search_info_bussines(search){
  let url =  "./controllers/search_bussines_info_controller.php";

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
            let client_address = document.getElementById("client_address_options");
            let client_document = document.getElementById("client_document");
            let client_email = document.getElementById("client_email");
            let client_phone = document.getElementById("client_phone");
            let client_alternative_phone = document.getElementById("client_alternative_phone");
            let person_in_charge_Client = document.getElementById("person_in_charge_Client");
            let address_client = document.getElementById("address_client");
            let city_client = document.getElementById("city_client");
            let department_client = document.getElementById("department_client");
            let content = `<option value="0">Seleccione una opción</option>`;
            let new_data = JSON.parse(data);

            client_document.value = new_data["documentClient"];
            client_email.value = new_data["emailClient"];
            client_phone.value = new_data["phoneClient"];
            client_alternative_phone.value = new_data["alternativePhoneClient"];
            person_in_charge_Client.value = new_data["personInCharge"];
            address_client.value = "";
            city_client.value = "";
            department_client.value = "";

            for (var i = 0; i < new_data["address"].length; i++) {
              console.log(new_data["address"][i]);
              content += `<option value="${new_data["address"][i]["idGeneralAddressInfo"]}">${new_data["address"][i]["Address"]} | ${new_data["address"][i]["idCity"]} | ${new_data["address"][i]["idDepartment"]}</option>`;
            }
            client_address.disabled = false;
            client_address.innerHTML = content;
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

let select_client = document.getElementById("client_name");
select_client.addEventListener("change", function(){
  let tkC = "";
  for (var i = 0; i < this.length; i++) {
    if (this[i].selected === true) {
      tkC = this[i].value;
      ajax_search_info_bussines(tkC);
    }
  }
});
