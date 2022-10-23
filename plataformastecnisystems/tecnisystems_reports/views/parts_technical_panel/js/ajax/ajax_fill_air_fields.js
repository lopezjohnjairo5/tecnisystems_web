function ajax_fill_air_fields(serial_element,element){
  var url = "./controllers/search_info_air_to_fill_fields_controller.php";

  $.ajax({
    url: url,
    data: {"serial_element":serial_element},
    type: "POST",
    success: function(json)
    {

      let air_mark = document.getElementById("mark_air_conditioning_input");
      let air_model = document.getElementById("model_air_conditioning_input");
      let air_type = document.getElementById("type_air_conditioning_input");
      let air_capacity = document.getElementById("capacity_air_conditioning_input");

      if (json == "Redirigir") {
        location.reload();

      }else if(json == "Not_found"){
        air_mark.value = "";
        air_model.value = "";
        air_type.value = "";
        air_capacity.value = "";

        restart_background_color(element);

      }else{
        let new_data = JSON.parse(json);

        for (var i = 0; i < new_data.length; i++) {
          air_mark.value = new_data[i]["Brand"];
          air_model.value = new_data[i]["Product"];
          air_type.value = new_data[i]["idAirConditioningTypes"];
          air_capacity.value = new_data[i]["capacity"];

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

function restart_background_color(el){
  el.style.backgroundColor = "#f7e48e";
}

let air_serial = document.getElementById("serial_air_conditioning_input");

air_serial.addEventListener("keyup",function(){
  let content_element = this.value;
  ajax_fill_air_fields(content_element,this);
});

air_serial.addEventListener("blur", function() {
  let content_element = this.value;

  if(content_element == "" || content_element == null || content_element == undefined || content_element == "NaN"){
    let air_mark = document.getElementById("mark_air_conditioning_input");
    let air_model = document.getElementById("model_air_conditioning_input");
    let air_type = document.getElementById("type_air_conditioning_input");
    let air_capacity = document.getElementById("capacity_air_conditioning_input");

    air_mark.value = "";
    air_model.value = "";
    air_type.value = "";
    air_capacity.value = "";
    restart_background_color(this);
  }
});
