function ajax_fill_client_fields(nit_client,element){
  var url = "./controllers/search_info_client_to_fill_controller.php";

  $.ajax({
    url: url,
    data: {"nit_client":nit_client},
    type: "POST",
    success: function(json)
    {
      let client_name = document.getElementById("client_name");
      let client_email = document.getElementById("client_email");
      let client_phone = document.getElementById("client_phone");

      if (json == "Redirigir") {
        location.reload();

      }else if(json == "Not_found"){
        client_name.value = "";
        client_email.value = "";
        client_phone.value = "";

        restart_background_color(element);

      }else{
        let new_data = JSON.parse(json);
        for (var i = 0; i < new_data.length; i++) {
          client_name.value = new_data[i]["name"];
          client_email.value = new_data[i]["email"];
          client_phone.value = new_data[i]["phone"];
          element.style.backgroundColor = "#43E16A";
        }
      }
    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
        restart_background_color(element);
    }
  });
}


let client_document = document.getElementById("client_document");
client_document.addEventListener("keyup",function(){
  let content_element = this.value;
  ajax_fill_client_fields(content_element,this);
});


client_document.addEventListener("blur", function() {
  let content_element = this.value;

  if(content_element == "" || content_element == null || content_element == undefined || content_element == "NaN"){
    let client_document = document.getElementById("client_document");
    let client_name = document.getElementById("client_name");
    let client_email = document.getElementById("client_email");
    let client_phone = document.getElementById("client_phone");
    client_document.value = "";
    client_name.value = "";
    client_email.value = "";
    client_phone.value = "";
    restart_background_color(this);
  }
});
