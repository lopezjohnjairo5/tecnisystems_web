function ajax_search_user(){
  var url = "./controllers/search_user_controller.php";

  $.ajax({
    type: "POST",
    url: url,
    data: $("#form_search_technical_content").serialize(),
    success: function(data)
    {
      let typeElementToSearch = document.getElementById("typeElementToSearch");
      let input_search_technical = document.getElementById("input_search_technical");
      if(data == "content_error"){
        alert("Todos los campos son obligatorios. Por favor verifique e intente nuevamente.");
      }else if(data == "not_found"){
        alert("Usuario no encontrado. \nPor favor, verifique e intente nuevamente.");
      }else if(data == "Redirigir"){
        location.reload();
      }else{
        let table_content_TI = document.getElementById("table_content_technicals_info");
        table_content_TI.innerHTML = "";
        let content = "";
        let typeUserNumber = 0;
        let new_data = JSON.parse(data);

        let amount = 30;
        let amount_content_pages = "";
        let page_num = 1;
        let count = 1;
        let hidde = "";
        let objLengthDataPages = length_data_for_pages(new_data, amount);

        for (var i = 0; i < new_data.length; i++) {
          if(new_data[i]["rol"] == "técnico eléctrico"){
            typeUserNumber = 1;
          }
          if(new_data[i]["rol"] == "técnico aire acondicionado"){
            typeUserNumber = 2;
          }
          if(new_data[i]["rol"] == "técnico motobombas"){
            typeUserNumber = 3;
          }
          if(new_data[i]["rol"] == "Administrativo"){
            typeUserNumber = 4;
          }
          if(new_data[i]["rol"] == "Bodega"){
            typeUserNumber = 5;
          }

          if (page_num !== 1) {
            hidde = "hidden";
          }

          content += `<tr class="page_${page_num} ${hidde}" id="${new_data[i]["userToken"]}-${typeUserNumber}">`; // typeUserNumber indica el rol en formato numerico, para que los btns de los resultados funcionen
          content += `<td class="document_user_data">${new_data[i]["documentTechnicalUser"]}</td>`;
          content += `<td class="name_user_data">${new_data[i]["TechnicalUser"]}</td>`;
          content += `<td class="email_user_data">${new_data[i]["Email"]}</td>`;
          content += `<td class="rol_user_data">${new_data[i]["rol"]}</td>`;
          content += `<td class="state_user_data">${new_data[i]["StateUser"]}</td>`;
          content += `<td>`;
          content += `<a href="#" class="edit_search_user" title="Editar" ><img class="imgs_actions_table" src="./imgs/ico_editar_elemento.png" alt="Editar"></a>`;
          content += `<a href="#" class="active_inactive_search_user" title="deshabilitar/habilitar" ><img class="imgs_actions_table" src="./imgs/ico_habilitar_deshabilitar.png" alt="deshabilitar/habilitar"></a>`;
          content += `<a href="#" class="restart_search_user" title="Restablecer" ><img class="imgs_actions_table" src="./imgs/ico_restablecer.png" alt="Restablecer"></a>`;
          content += `<a href="#" class="view_record_user" title="Historial" ><img class="imgs_actions_table" src="./imgs/ico_historial.png" alt="Historial"></a>`;
          content += `</td>`;
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
        table_content_TI.innerHTML += content;
        containerNumberPagesUser.innerHTML = `${amount_content_pages}`;
      }
    }
  });
}

var btn_search_technical = document.getElementById('btn_search_technical');
btn_search_technical.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_search_user,time:500});
});
