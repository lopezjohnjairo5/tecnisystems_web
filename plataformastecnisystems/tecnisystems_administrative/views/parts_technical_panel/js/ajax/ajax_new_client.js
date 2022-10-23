
function ajax_new_client(){
  var url = "./controllers/new_client_controller.php";
  let client_document = document.getElementById('client_document').value;
  let client_name = document.getElementById('client_name').value;
  let client_charge = document.getElementById('client_charge').value;

  let client_email = return_validate_email(document.getElementById('client_email').value);
  //alert(client_email);
  let client_phone = document.getElementById('client_phone').value;
  let client_alternative_phone = document.getElementById('client_alternative_phone').value  !== "" ? document.getElementById('client_alternative_phone').value : "NA";
  let electrical_machine = document.getElementById('cb_machine_client1').checked;
  let air_machine = document.getElementById('cb_machine_client2').checked;
  let pump_machine = document.getElementById('cb_machine_client3').checked;

  let array_address_values = [];
  let tbody_clients_address_content = document.querySelectorAll('#tbody_clients_address_content tr');

  let exist_min_info = client_document !== "" && client_name !== "" && client_charge !== "" && client_email !== "" && client_phone !== "";
  let exist_machine = electrical_machine || air_machine || pump_machine;

  if (tbody_clients_address_content.length > 0 && exist_min_info && exist_machine) {
    tbody_clients_address_content.forEach((item, i) => {
      array_address_values.push(item.innerText.split("\t"));
    });

    let json_data = [];
    let json_object = {};

    json_data.push({
      "client_document":client_document,
      "client_name":client_name,
      "client_charge":client_charge,
      "client_email":client_email,
      "client_phone":client_phone,
      "client_alternative_phone":client_alternative_phone,
      "electrical_machine":electrical_machine,
      "air_machine":air_machine,
      "pump_machine":pump_machine,
      "array_address_values":array_address_values
    });
    json_object.data = json_data;

    $.ajax({
      type: "POST",
      url: url,
      data: json_object,
      success: function(data)
      {
        let msn = "";
        switch (data) {
          case "Redirigir":
            location.reload();
            break;

          case "Correct":
            alert("Nuevo cliente agregado.");
            msn = `Nuevo cliente agregado: ${client_document} | ${client_name} | ${client_email}`;
            ajax_save_record_user(msn);
            break;

          case "Error":
            alert("Error al insertar nuevo cliente. \nVerifique e intente nuevamente.");
            break;

          default:
            alert(data);
        }
      }
    });

  } else {
    alert('Todos los datos marcados con * son obligatorios y además se requiere minimo una dirección y un tipo de máquina asociada al cliente.\nVerifique e intente nuevamente.')
  }
}

var new_client_btn = document.getElementById('new_client_btn');
new_client_btn.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_new_client,time:500});
});
