function ajax_record_user(){
  var url = "./controllers/record_user_controller.php";

  $.ajax({
    type: "POST",
    url: url,
    success: function(data)
    {
      let section_cards_records = document.getElementById("cards_content_user_records");
      let cards_content = "";

      section_cards_records.innerHTML = cards_content;
      let response = JSON.parse(data);

      for (var i = 0; i < response.length; i++) {
          cards_content +=`<div class="record_card">`;
          cards_content +=`<header>`;
          cards_content +=`<h6>${response[i][0]}/${response[i][1]}</h6>`;
          cards_content +=`<h6>${response[i][3]}||${response[i][4]}</h6>`;
          cards_content +=`</header>`;
          cards_content +=`<p>${response[i][2]}</p>`;
          cards_content +=`</div>`;
        }

      section_cards_records.innerHTML = cards_content;
    }
  });
}
