function delete_sharp(txt){
  let new_text = "";
  for (var i = 0; i < txt.length; i++) {
    if(txt[i] !="#" && txt[i] !="\#"){
      new_text +=txt[i];
    }

  }
  return new_text;
}


function ajax_search_reports(){
  var url = "./controllers/search_reports_controller.php";
  let search_report = document.getElementById('search_report_input').value;
  let json_data = [];
  let json_object = {};

  if(search_report != "" && search_report != null && search_report != "NaN" && search_report != " "){
    json_data.push({
      "search":search_report
    });
    json_object.data = json_data;

    $.ajax({
      type: "POST",
      url: url,
      data: json_object,
      success: function(data)
      {
        switch (data) {
          case "Redirigir":
            location.reload();
            break;

          case "Empty":
            alert("El campo de busqueda se encuentra vacio.");
            break;

          default:
            let tbody_reports_content = document.getElementById("tbody_reports_content");
            tbody_reports_content.innerHTML = "";
            let content = "";
            let amount = 50;
            let new_data = JSON.parse(data);
            let amount_content_pages = "";
            let page_num = 1;
            let count = 1;
            let hidde = "";
            let objLengthDataPages = length_data_for_pages(new_data, amount);

            for (var i = 0; i < objLengthDataPages.length_data; i++) {
          		if (page_num !== 1) {
          			hidde = "hidden";
          		}
              content += `<tr class="page_${page_num} ${hidde}" id='${new_data[i]["idReport"]}'>`;
              content += `<td>${new_data[i]["serial"]}</td>`;
              content += `<td>${new_data[i]["tecnicals"]}</td>`;
              content += `<td>${new_data[i]["type_report"]}</td>`;
              content += `<td>${new_data[i]["department"]}</td>`;
              content += `<td>${new_data[i]["city"]}</td>`;
              content += `<td>${new_data[i]["address"]}</td>`;
              content += `<td>${new_data[i]["date_general"]}</td>`;
              content += `<td>${new_data[i]["client"]}</td>`;
              content += `<td>${new_data[i]["personInCharge"]}</td>`;
              content += `<td><a href="./controllers/download_report_controller.php?type_report=${new_data[i]["type_report"]}&id_report=${new_data[i]["idReport"]}" class="download_report" target="_blank">descargar informe</a></td>`;
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
            tbody_reports_content.innerHTML = content;
            containerNumberPages.innerHTML = `${amount_content_pages}`;

            let msn = "Buscando reportes: "+search_report;
            ajax_save_record_user(msn);
            break;
        }
      }
    });

  } else {
    alert("La casilla de busqueda se encuentra vacia. Verifiquee intente nuevamente.");
  }

}

var btn_search = document.getElementById('btn_search_report');
btn_search.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_search_reports,time:500});
});
