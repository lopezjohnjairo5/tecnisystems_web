function ajax_search_record_reports(content){
  var url = "./controllers/search_record_reports_controller.php";

  $.ajax({
    type: "POST",
    url: url,
    success: function(data)
    {
      let section_cards_records = document.getElementById("cards_content_report_records");
      let cards_content = "";

      section_cards_records.innerHTML = cards_content;
      let response = JSON.parse(data);

      for (var i = 0; i < response.length; i++) {
        cards_content +=`<div class="record_card">`;
        cards_content +=`<header>`;
        cards_content +=`<h4>${response[i]["date_general"]}</h4>`;
        cards_content +=`<h4>Serial: ${response[i]["serialNumber"]}</h4>`;
        cards_content +=`</header>`;
        cards_content +=`<p>Departamento: ${response[i]["department"]}</p>`;
        cards_content +=`<p>Ciudad: ${response[i]["city"]}</p>`;
        cards_content +=`<p>Dirección: ${response[i]["address"]}</p>`;
        cards_content +=`<p>Cliente: ${response[i]["client"]}</p>`;
        cards_content +=`<p>Inicio servicio: ${response[i]["startTime"]}</p>`;
        cards_content +=`<p>Finalizacion servicio: ${response[i]["endTime"]}</p>`;
        cards_content +=`<p>Observaciones: ${response[i]["observations"]}</p>`;
        cards_content +=`</div>`;
      }

      section_cards_records.innerHTML = cards_content;
    }
  });
}
