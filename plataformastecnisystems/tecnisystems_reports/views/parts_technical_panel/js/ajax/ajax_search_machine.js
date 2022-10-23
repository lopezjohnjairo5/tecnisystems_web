function ajax_search_machine(){
  let search_input_value = document.getElementById("search_machine").value;

  if (search_input_value !== "" && search_input_value !== null && search_input_value !== "NaN") {
    let msn = "Buscando maquina con texto: " + search_input_value;
    ajax_save_record_user(msn);

    var url = "./controllers/search_machine_controller.php";

    $.ajax({
      type: "POST",
      url: url,
      data: $("#search_machine_form").serialize(),
      success: function(data)
      {
        let table = document.getElementById("tbody_search_machine_content");

        switch (data) {
          case "Redirigir":
            location.reload();
            break;

          case "":
          case null:
          case 0:
          case "Empty":
            alert("No hay resultados disponibles. Verifique e intente nuevamente.");
            break;

          default:
            let new_data = JSON.parse(data);
            let content_table = "";
            let amount = 30;
            let amount_content_pages = "";
            let page_num = 1;
            let count = 1;
            let hidde = "";
            let objLengthDataPages = length_data_for_pages(new_data, amount);

            for (var i = 0; i < objLengthDataPages.length_data; i++) {
              if (page_num !== 1) {
                hidde = "hidden";
              }
              content_table +=`<tr class="page_${page_num} ${hidde}" id="${new_data[i]["idCellarGeneralInfoProduct"]}">`;
              content_table +=`<td>${new_data[i]["serialProduct"]}</td>`;
              content_table +=`<td>${new_data[i]["Product"]}</td>`;
              content_table +=`<td>${new_data[i]["Brand"]}</td>`;
              content_table +=`<td><a href="${new_data[i]["pathDatasheet"]}" target="_blank"><img src="./imgs/ico_ver.png" alt="imagen ${new_data[i]["Product"]}"> </a></td>`;
              content_table +=`</tr>`;

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
            table.innerHTML = content_table;
            containerNumberPagesMachine.innerHTML = `${amount_content_pages}`;
            break;
        }
      }
    });
  } else {
    alert("Todos los campos son obligatorios. Porfavor verifique e intente nuevamente.");
  }

}

var send = document.getElementById('btn_search_machine');
send.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_search_machine,time:500});
});
