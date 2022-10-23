function ajax_search_info_electrical_machine(content){
  record_nav_user.push(get_date_time());
  record_nav_user.push(lat_long);
  record_nav_user.push(content);

  let json_data = [];
  let json_object = {};

  json_data.push({
    "serial": content
  });

  json_object.data = json_data;
  var url = "./controllers/search_info_electrical_machine_controller.php";

  $.ajax({
    url: url,
    data: json_object,
    type: "POST",
    success: function(json)
    {
      let plant = document.getElementsByClassName('mecs_values');
      let response = JSON.parse(json);

      if (response.length === 0 || response === "" || response === null) {
        plant[0].value = "N/A";
        plant[1].value = "N/A";
        plant[2].value = "N/A";
        plant[3].value = "N/A";
        plant[4].value = "N/A";
        plant[5].value = "N/A";
        plant[6].value = "N/A";
        plant[7].value = "N/A";
        plant[8].value = "N/A";
        plant[9].value = "N/A";
        plant[10].value = "N/A";
        plant[11].value = "N/A";

        plant[12].value = "N/A";
        plant[13].value = "N/A";
        plant[14].value = "N/A";
        plant[15].value = "N/A";
        plant[16].value = "N/A";
        plant[17].value = "N/A";
        plant[18].value = "N/A";
        plant[19].value = "N/A";
        plant[20].value = "N/A";
        plant[21].value = "N/A";
        plant[22].value = "N/A";
        plant[23].value = "N/A";
        plant[24].value = "N/A";
        plant[25].value = "N/A";

      }else{
        plant[0].value = response[0]["powerPlant"] == "" ? "N/A" : response[0]["powerPlant"];
        plant[1].value = response[0]["powerPlantModel"] == "" ? "N/A" :  response[0]["powerPlantModel"];
        plant[2].value = response[0]["powerPlantSerie"] == "" ? "N/A" :  response[0]["powerPlantSerie"];
        plant[3].value = response[0]["motor"] == "" ? "N/A" :  response[0]["motor"];
        plant[4].value = response[0]["motorModel"] == "" ? "N/A" :  response[0]["motorModel"];
        plant[5].value = response[0]["motorSerie"] == "" ? "N/A" :  response[0]["motorSerie"];
        plant[6].value = response[0]["generator"] == "" ? "N/A" :  response[0]["generator"];
        plant[7].value = response[0]["generatorSerie"] == "" ? "N/A" :  response[0]["generatorSerie"];
        plant[8].value = response[0]["generatorKw"] == "" ? "N/A" :  response[0]["generatorKw"];
        plant[9].value = response[0]["generatorKwa"] == "" ? "N/A" :  response[0]["generatorKwa"];
        plant[10].value = response[0]["generatorPhases"] == "" ? "N/A" :  response[0]["generatorPhases"];
        plant[11].value = response[0]["generatorVolt"] == "" ? "N/A" :  response[0]["generatorVolt"];
        plant[12].value = response[0]["oilAmount"] == "" ? "N/A" :  response[0]["oilAmount"];
        plant[13].value = response[0]["oilReference"] == "" ? "N/A" :  response[0]["oilReference"];
        plant[14].value = response[0]["fuelAmount"] == "" ? "N/A" :  response[0]["fuelAmount"];
        plant[15].value = response[0]["fuelReference"] == "" ? "N/A" :  response[0]["fuelReference"];
        plant[16].value = response[0]["airAmount"] == "" ? "N/A" :  response[0]["airAmount"];
        plant[17].value = response[0]["airReference"] == "" ? "N/A" :  response[0]["airReference"];
        plant[18].value = response[0]["separatorAmount"] == "" ? "N/A" :  response[0]["separatorAmount"];
        plant[19].value = response[0]["separatorReference"] == "" ? "N/A" :  response[0]["separatorReference"];
        plant[20].value = response[0]["refrigerantAmount"] == "" ? "N/A" :  response[0]["refrigerantAmount"];
        plant[21].value = response[0]["refrigerantReference"] == "" ? "N/A" :  response[0]["refrigerantReference"];
        plant[22].value = response[0]["engineOilAmount"] == "" ? "N/A" :  response[0]["engineOilAmount"];
        plant[23].value = response[0]["engineOilReference"] == "" ? "N/A" :  response[0]["engineOilReference"];
        plant[24].value = response[0]["otherAmount"] == "" ? "N/A" :  response[0]["otherAmount"];
        plant[25].value = response[0]["otherReference"] == "" ? "N/A" :  response[0]["otherReference"];
      }

    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}

var btn_search_electrical_machine = document.getElementById('search_by_serial_electric_machine');
btn_search_electrical_machine.addEventListener("click",function(){
  cont = document.getElementById('power_plant_serial');
  ajax_search_info_electrical_machine(cont.value);
});
