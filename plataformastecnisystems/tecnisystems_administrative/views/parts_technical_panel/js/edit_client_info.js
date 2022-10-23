function put_info_inputs_new_client(info){

  let update_client_btn = document.getElementById("update_client_btn"),
  new_client_btn = document.getElementById("new_client_btn"),
  return_client_btn = document.getElementById("return_client_btn"),
  client_token_update = document.getElementById("client_token_update"),
  client_document = document.getElementById("client_document"),
  client_name = document.getElementById("client_name"),
  client_charge = document.getElementById("client_charge"),
  client_email = document.getElementById("client_email"),
  client_phone = document.getElementById("client_phone"),
  client_alternative_phone = document.getElementById("client_alternative_phone"),
  cb_machine_client1 = document.getElementById('cb_machine_client1'),
  cb_machine_client2 = document.getElementById('cb_machine_client2'),
  cb_machine_client3 = document.getElementById('cb_machine_client3'),
  tbody_clients_address_content = document.getElementById("tbody_clients_address_content"),
  tb1 = document.getElementById('new_client'),
  tb2 = document.getElementById('search_client'),
  client_address_table_elements = info[7].split("|"),
  client_type_machines_elements = info[8].split("|"),
  new_array_address = [],
  content = "";

  for (let i = 0; i <= client_address_table_elements.length-1; i++){
    new_array_address.push(client_address_table_elements[i].split(","));
  }

  view_hidde_btns([new_client_btn],[update_client_btn, return_client_btn]);

  tb1.style.display = "block";
  tb2.style.display = "none";

  client_token_update.value = info[0];
  client_document.value = info[1];
  client_name.value = info[2];
  client_charge.value = info[3];
  client_email.value = info[4];
  client_phone.value = info[5];
  client_alternative_phone.value = info[6];

  cb_machine_client1.checked = false;
  cb_machine_client2.checked = false;
  cb_machine_client3.checked = false;

  for (var i = 0; i < client_type_machines_elements.length-1; i++) {
    if(client_type_machines_elements[i].trim() === 'Planta eléctrica'){
      cb_machine_client1.checked = true;
    } else if (client_type_machines_elements[i].trim() === 'Aire acondicionado') {
      cb_machine_client2.checked = true;
    } else if (client_type_machines_elements[i].trim() === 'Motobomba') {
      cb_machine_client3.checked = true;
    }
  }

  for (let j=0; j < new_array_address.length-1; j++ ){
    content += `<tr id="rowAdressClient_${document.querySelectorAll('#tbody_clients_address_content tr').length + 1}">`;
    content += `<td>${new_array_address[j][0]}</td>`;
    content += `<td>${new_array_address[j][2]}</td>`;
    content += `<td>${new_array_address[j][1]}</td>`;
    content += `<td><a href="#rowAdressClient_${document.querySelectorAll('#tbody_clients_address_content tr').length + 1}" class = "delete_table_address_client_element">X</a></td>`;
    content += `</tr>`;
  }

  tbody_clients_address_content.innerHTML = content;

  let msn = "solicitando edicion del cliente "+client_document.value;
  ajax_save_record_user(msn);
}

let tbody_clients_content = document.getElementById("tbody_clients_content");
tbody_clients_content.addEventListener("click",function(e){
  let array_info = [];
  if(e.target.tagName == "A" && e.target.classList.contains("edit_client_content")){
    let nodes = e.target.parentNode.parentNode.childNodes;
    array_info.push(e.target.parentNode.parentNode.id);
    for (var i = 0; i < nodes.length-1; i++) {
      if(nodes[i].tagName == "TD"){
        if(nodes[i].id !== "" && nodes[i].id !== undefined){
          array_info.push(nodes[i].id + " ; " +nodes[i].textContent);
        }else{
          array_info.push(nodes[i].textContent);
        }
      }
    }

    put_info_inputs_new_client(array_info);

  } else if(e.target.tagName == "A" && e.target.classList.contains("edit_client_state")){
    let btn_pop_update_client = document.getElementById("pop_update_client");
    let state_client_update = document.getElementById("state_client_update").childNodes;
    let details_info_client = document.getElementById("details_info_client");
    let content = "";

    let obj_data = {
      "token":e.target.getAttribute("data-client-token"),
      "document":e.target.parentNode.parentNode.childNodes[0].textContent,
      "name":e.target.parentNode.parentNode.childNodes[1].textContent,
      "email":e.target.parentNode.parentNode.childNodes[3].textContent,
      "phone":e.target.parentNode.parentNode.childNodes[4].textContent,
    }

    state_client_update.forEach((el) => {
      if(el.value == e.target.getAttribute("data-state-client")){
        el.selected = true;
      }
    });

    content = `<span id="update_token_client" class="hidden">${obj_data["token"]}</span>`;
    content += `<span><b>Documento: </b>${obj_data["document"]}</span>`;
    content += `<span><b>Cliente: </b>${obj_data["name"]}</span>`;
    content += `<span><b>Email: </b>${obj_data["email"]}</span>`;
    content += `<span><b>Teléfono: </b>${obj_data["phone"]}</span>`;

    details_info_client.innerHTML = content;

    btn_pop_update_client.style.display = "flex";
  }
});
