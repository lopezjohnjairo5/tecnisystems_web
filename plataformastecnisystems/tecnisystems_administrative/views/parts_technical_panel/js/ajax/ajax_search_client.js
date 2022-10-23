function ajax_search_client(){

  var url = "./controllers/search_client_controller.php";
  let search_client_input = document.getElementById('search_client_input').value;

  if(search_client_input !== "" && search_client_input !== null && search_client_input !== "NaN"){
    let json_data = [];
    let json_object = {};

    json_data.push({
      "search":search_client_input
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

          case "Error":
            alert("Error:\n\nSe ha producido un error.Por favor verifique los terminos de la busqueda: \n\nNota: \nRecuerde que puede realizar consultas mediante:\n- Empresa.\n- Persona responsable.\n- Número de documento(n:número ó nit:número).\n- Teléfono(tel:número ó telefono:número).\n- Correo electrónico.\n- t / todos : para visualizar todos los resultados.");

            break;

          case "Empty":
            alert("Error:\n\nEl cuadro de busqueda se encuentra vacio.\nNota: \nRecuerde que puede realizar consultas mediante:\n- Empresa.\n- Persona responsable.\n- Número de documento(n:número ó nit:número).\n- Teléfono(tel:número ó telefono:número).\n- Correo electrónico.\n- t / todos : para visualizar todos los resultados.");
            break;

          default:
            let tbody_clients_content = document.getElementById("tbody_clients_content");
            let new_data = JSON.parse(data);
            let content = "";
            let stateC = 0;

            let amount = 20;
            let amount_content_pages = "";
            let page_num = 1;
            let count = 1;
            let hidde = "";
            let objLengthDataPages = length_data_for_pages(new_data, amount);

            for (var i = 0; i < objLengthDataPages.length_data; i++) {
              if (page_num !== 1) {
          			hidde = "hidden";
          		}

              stateC = new_data[i]["stateClient"] === "1" ? "activo" : "inactivo";

              content += `<tr class="page_${page_num} ${hidde}" id="${new_data[i]["tokenClient"]}">`;
              content += `<td>${new_data[i]["documentClient"]}</td>`;
              content += `<td>${new_data[i]["nameClient"]}</td>`;
              content += `<td>${new_data[i]["personInCharge"]}</td>`;
              content += `<td>${new_data[i]["emailClient"]}</td>`;
              content += `<td>${new_data[i]["phoneClient"]}</td>`;
              content += `<td>${new_data[i]["alternativePhoneClient"]}</td>`;
              content += `<td>${new_data[i]["address"]}</td>`;
              content += `<td>${new_data[i]["typeMachine"]}</td>`;
              content += `<td>${stateC}</td>`;
              content += `<td><a href="#" class="edit_client_content">Editar</a> <a href="#" data-client-token="${new_data[i]["tokenClient"]}"  data-state-client="${new_data[i]["stateClient"] }" class="edit_client_state">Estado</a></td>`;
              content += `</tr>`;

              if (count < amount) {
                count += 1;
              } else {
                page_num += 1;
                count = 1;
              }
            }

            for (var i = 1; i <= objLengthDataPages.amount_pages_int; i++) {
            	amount_content_pages += `<span><a href="#" id="page_${i}">${i}</a></span>`;
            }
            
            tbody_clients_content.innerHTML = content;
            containerNumberPagesClient.innerHTML = `${amount_content_pages}`;

            msn = "buscando cliente "+search_client_input;
            ajax_save_record_user(msn);
            break;
        }
      }
    });
  } else {
    alert("Error:\n\nEl cuadro de busqueda se encuentra vacio.\nNota: \nRecuerde que puede realizar consultas mediante:\n- Empresa.\n- Persona responsable.\n- Número de documento(n:número ó nit:número).\n- Teléfono(tel:número ó telefono:número).\n- Correo electrónico.\n- t / todos : para visualizar todos los resultados.");
  }

}

var btn_search_client = document.getElementById('btn_search_client');
btn_search_client.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_search_client,time:500});
});
