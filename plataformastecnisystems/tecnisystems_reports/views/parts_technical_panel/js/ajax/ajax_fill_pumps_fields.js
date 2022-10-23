function ajax_fill_pumps_fields(pump_number,serial_element,element){
  var url = "./controllers/search_info_pump_to_fill_fields_controller.php";

  $.ajax({
    url: url,
    data: {"serial_element":serial_element},
    type: "POST",
    success: function(json)
    {
      let pump_mark = document.getElementById("pump_mark"+pump_number);
      let pump_hp = document.getElementById("pump_hp"+pump_number);
      let pump_volt = document.getElementById("pump_volt"+pump_number);
      let pump_amper = document.getElementById("pump_amper"+pump_number);
      let pump_capacity = document.getElementById("pump_capacity"+pump_number);

      if (json == "Redirigir") {
        location.reload();

      }else if(json == "Not_found"){
        pump_mark.value = "";
        pump_hp.value = "";
        pump_volt.value = "";
        pump_amper.value = "";
        pump_capacity.value = "";
        restart_background_color(element);

      }else{
        let new_data = JSON.parse(json);
        for (var i = 0; i < new_data.length; i++) {
          pump_mark.value = new_data[i]["Brand"];
          pump_hp.value = new_data[i]["hp"];
          pump_volt.value = new_data[i]["voltage"];
          pump_amper.value = new_data[i]["amps"];
          pump_capacity.value = new_data[i]["capacity"];
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

function select_column_number(el){
      if(el.id == "pump_serial1"){
        return 1;
      }
      if(el.id == "pump_serial2"){
        return 2;
      }
      if(el.id == "pump_serial3"){
        return 3;
      }
      if(el.id == "pump_serial4"){
        return 4;
      }
}


let pump_serial = document.getElementsByClassName("pump_serial");

for (var i = 0; i < pump_serial.length; i++) {

  pump_serial[i].addEventListener("keyup",function(){
    let content_element = this.value;
    let num = select_column_number(this);
    ajax_fill_pumps_fields(num,content_element,this);
  });

  pump_serial[i].addEventListener("blur", function() {
    let content_element = this.value;

    if(content_element == "" || content_element == null || content_element == undefined || content_element == "NaN"){
      let pump_n = select_column_number(this);
      let pump_mark = document.getElementById("pump_mark"+pump_n);
      let pump_hp = document.getElementById("pump_hp"+pump_n);
      let pump_volt = document.getElementById("pump_volt"+pump_n);
      let pump_amper = document.getElementById("pump_amper"+pump_n);
      let pump_capacity = document.getElementById("pump_capacity"+pump_n);
      pump_mark.value = "";
      pump_hp.value = "";
      pump_volt.value = "";
      pump_amper.value = "";
      pump_capacity.value = "";
      restart_background_color(this);
    }
  });
}
