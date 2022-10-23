function ajax_search_providers(){

  var url = "./controllers/search_provider_controller.php";

  $.ajax({
    type: "POST",
    url: url,
    data: {"search_provider_input" : $("#search_provider_input").val()},
    success: function(data)
    {
      switch (data) {
        case "Error":
        case "NaN":
        case undefined:
          alert("Error. \nTodos los campos son obligatorios. Por favor, Verifique e intente nuevamente.");
          break;

        default:
          let tbody_provider_content = document.getElementById("tbody_provider_content");
          let new_data = JSON.parse(data);
          let content = "";
          let amount = 1;

          let amount_content_pages = "";
          let page_num = 1;
          let count = 1;
          let hidde = "";
          let objLengthDataPages = length_data_for_pages(new_data, amount);

          for (var i = 0; i < new_data.length; i++) {
            if (page_num !== 1) {
              hidde = "hidden";
            }
            content += `<tr class="page_${page_num} ${hidde}" id='prov_${new_data[i]["tokenSupplier"]}'>`;
            content += `<td>${new_data[i]["Supplier"]}</td>`;
            content += `<td>${new_data[i]["phone1"]}</td>`;
            content += `<td>${new_data[i]["phone2"]}</td>`;
            content += `<td>${new_data[i]["Email"]}</td>`;
            content += `<td>${new_data[i]["officeAddress"]}</td>`;
            content += `<td>${new_data[i]["department"]}</td>`;
            content += `<td>${new_data[i]["city"]}</td>`;
            content += `<td class="img_previews_tables"><a href="#"> <img class="delete_this_element" src="./imgs/ico_eliminar.png" alt=""></a> </td>`;
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

          tbody_provider_content.innerHTML = content;
          containerNumberPagesProvider.innerHTML = `${amount_content_pages}`;

          msn = "busqueda de proveedor por "+$("#search_provider_input").val();
          ajax_save_record_user(msn);
          break;
      }
    },
    error: function(){
      alert("Error al realizar la busqueda.\nEl campo de busqueda no puede estar vacio.\nVerifique e intente nuevamente.");
    }
  });
}

var search_provider = document.getElementById('btn_search_provider');
search_provider.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_search_providers,time:500});
});
