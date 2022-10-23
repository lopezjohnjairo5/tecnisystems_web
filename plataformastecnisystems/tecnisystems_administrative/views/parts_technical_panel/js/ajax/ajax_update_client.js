function ajax_update_client(){
  var url = "./controllers/update_client_controller.php";

  let client_token = document.getElementById('client_token_update').value;
  let client_document = document.getElementById('client_document').value;
  let client_name = document.getElementById('client_name').value;
  let client_charge = document.getElementById('client_charge').value;

  let client_email = return_validate_email(document.getElementById('client_email').value);
  let client_phone = document.getElementById('client_phone').value;
  let client_alternative_phone = document.getElementById('client_alternative_phone').value  !== "" ? document.getElementById('client_alternative_phone').value : "NA";
  let electrical_machine = document.getElementById('cb_machine_client1').checked;
  let air_machine = document.getElementById('cb_machine_client2').checked;
  let pump_machine = document.getElementById('cb_machine_client3').checked;

  let array_address_values = [];
  let tbody_clients_address_content = document.querySelectorAll('#tbody_clients_address_content tr');

  let exist_min_info = client_token != "" && client_document !== "" && client_name !== "" && client_charge !== "" && client_email !== "" && client_phone !== "";
  let exist_machine = electrical_machine || air_machine || pump_machine;

  if (tbody_clients_address_content.length > 0 && exist_min_info && exist_machine) {
    tbody_clients_address_content.forEach((item, i) => {
      array_address_values.push(item.innerText.split("\t"));
    });

    let json_data = [];
    let json_object = {};

    json_data.push({
      "client_token":client_token,
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
        //alert(data);
        switch (data) {
          case "Redirigir":
            location.reload();
            break;

          case "ErrorUpdateInfo":
            alert("Error al actualizar los datos del cliente. Es posible que no se detectarán cambios en la información general.\nVerifique e intente nuevamente.");
            break;

          case "ErrorDeleteDataInfo":
            alert("Error al reemplazar / eliminar la información relacionada con la maquinaria y/o direcciones del cliente.\nVerifique e intente nuevamente.");
            break;

          case "ErrorUpdateAddress":
            alert("Error al actualizar las direcciones del cliente. Es posible que existan caracteres no validos en la información proporcionada.\nVerifique e intente nuevamente.");
            break;

          case "Correct":
            alert("Cliente actualizado correctamente.");

            msn = `Datos de cliente actualizados: ${client_document} | ${client_name} | ${client_email}`;
            ajax_save_record_user(msn);

            return_to_new_client();
            break;

          case "Error":
            alert("Error al actualizar la información del cliente. \nEs posible que no se detectarán cambios con el estado actual.");
            break;

        }
      }
    });

  } else {
    alert('Todos los datos marcados con * son obligatorios y además se requiere minimo una dirección y un tipo de máquina asociada al cliente.\nVerifique e intente nuevamente.')
  }

}


let update_client_btn = document.getElementById("update_client_btn");
update_client_btn.addEventListener('click', () => {
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_update_client,time:500});
});
