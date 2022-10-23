function ajax_delete_product_search(idElementToDelete){
  content = "Eliminando producto con ID: "+idElementToDelete;
  record_nav_user.push(get_date_time());
  record_nav_user.push(lat_long);
  record_nav_user.push(content);

  let json_data = [];
  let json_object = {};

  json_data.push({
    "idToDelete": idElementToDelete
  });
  json_object.data = json_data;

  var url = "./controllers/delete_product_controller.php";

  $.ajax({
    url: url,
    data: json_object,
    type: "POST",
    success: function(json)
    {
      alert(json);
      if (json == "Redirigir") {
        location.reload();
      }else{
        ajax_search_product();
      }
    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}


function ajax_edit_product_search(idElementToEdit,type_p){
  content = "Editando producto con ID: "+idElementToEdit;
  record_nav_user.push(get_date_time());
  record_nav_user.push(lat_long);
  record_nav_user.push(content);

  let json_data = [];
  let json_object = {};

  json_data.push({
    "idToEdit": idElementToEdit,
    "typeP": type_p
  });
  json_object.data = json_data;

  var url = "./controllers/edit_product_search_controller.php";

  $.ajax({
    url: url,
    data: json_object,
    type: "POST",
    success: function(json)
    {
      let serial_product = document.getElementById("serial_product");
      let product = document.getElementById("product");
      let brand_product = document.getElementById("brand_product");
      let datasheet_product = document.getElementById("datasheet_product");
      let supplier_product = document.getElementById("supplier_product");
      let state_product = document.getElementById("state_product");
      let type_product = document.getElementById("type_product");

      let power_plant_product = document.getElementById("power_plant_product");
      let power_plant_model = document.getElementById("power_plant_model");
      let power_plant_serie = document.getElementById("power_plant_serie");
      let motor_product = document.getElementById("motor_product");
      let motor_model = document.getElementById("motor_model");
      let motor_serie = document.getElementById("motor_serie");
      let generator_product = document.getElementById("generator_product");
      let generator_serie = document.getElementById("generator_serie");
      let generator_kw = document.getElementById("generator_kw");
      let generator_kwa = document.getElementById("generator_kwa");
      let generator_phases = document.getElementById("generator_phases");
      let generator_volt = document.getElementById("generator_volt");

      let f_oil_amount_cellar = document.getElementById("f_oil_amount_cellar");
      let f_oil_reference_cellar = document.getElementById("f_oil_reference_cellar");
      let fuel_amount_cellar = document.getElementById("fuel_amount_cellar");
      let fuel_reference_cellar = document.getElementById("fuel_reference_cellar");
      let air_amount_cellar = document.getElementById("air_amount_cellar");
      let air_reference_cellar = document.getElementById("air_reference_cellar");
      let separator_amount_cellar = document.getElementById("separator_amount_cellar");
      let separator_reference_cellar = document.getElementById("separator_reference_cellar");
      let cooling_amount_cellar = document.getElementById("cooling_amount_cellar");
      let cooling_reference_cellar = document.getElementById("cooling_reference_cellar");
      let motor_oil_amount_cellar = document.getElementById("motor_oil_amount_cellar");
      let motor_oil_reference_cellar = document.getElementById("motor_oil_reference_cellar");
      let other_amount_cellar = document.getElementById("other_amount_cellar");
      let other_reference_cellar = document.getElementById("other_reference_cellar");

      let capacity_air = document.getElementById("capacity_air");
      let type_air_aconditioning = document.getElementById("type_air_aconditioning");

      let voltaje_pump = document.getElementById("voltaje_pump");
      let hp_pump = document.getElementById("hp_pump");
      let amp_pump = document.getElementById("amp_pump");
      let capacity_pump = document.getElementById("capacity_pump");
      let type_pump = document.getElementById("type_pump");


      if (json == "Redirigir") {
        location.reload();
      }else{
        let new_data = JSON.parse(json);
        serial_product.value = new_data[0]["arrayInfoGeneral"][0]["serialProduct"];
        product.value = new_data[0]["arrayInfoGeneral"][0]["Product"];
        brand_product.value = new_data[0]["arrayInfoGeneral"][0]["Brand"];
        supplier_product.value = new_data[0]["arrayInfoGeneral"][0]["idSupplier"];
        state_product.value = new_data[0]["arrayInfoGeneral"][0]["idProductStatus"];
        type_product.value = new_data[0]["arrayInfoGeneral"][0]["idTypeProduct"];

        switch (type_p) {
          case 1:
            power_plant_product.value = new_data[0]["arrayCellarElectricP"][0]["powerPlant"];
            power_plant_model.value = new_data[0]["arrayCellarElectricP"][0]["powerPlantModel"];
            power_plant_serie.value = new_data[0]["arrayCellarElectricP"][0]["powerPlantSerie"];
            motor_product.value = new_data[0]["arrayCellarElectricP"][0]["motor"];
            motor_model.value = new_data[0]["arrayCellarElectricP"][0]["motorModel"];
            motor_serie.value = new_data[0]["arrayCellarElectricP"][0]["motorSerie"];
            generator_product.value = new_data[0]["arrayCellarElectricP"][0]["generator"];
            generator_serie.value = new_data[0]["arrayCellarElectricP"][0]["generatorSerie"];
            generator_kw.value = new_data[0]["arrayCellarElectricP"][0]["generatorKw"];
            generator_kwa.value = new_data[0]["arrayCellarElectricP"][0]["generatorKwa"];
            generator_phases.value = new_data[0]["arrayCellarElectricP"][0]["generatorPhases"];
            generator_volt.value = new_data[0]["arrayCellarElectricP"][0]["generatorVolt"];

            f_oil_amount_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["oilAmount"];
            f_oil_reference_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["oilReference"];
            fuel_amount_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["fuelAmount"];
            fuel_reference_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["fuelReference"];
            air_amount_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["airAmount"];
            air_reference_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["airReference"];
            separator_amount_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["separatorAmount"];
            separator_reference_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["separatorReference"];
            cooling_amount_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["refrigerantAmount"];
            cooling_reference_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["refrigerantReference"];
            motor_oil_amount_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["engineOilAmount"];
            motor_oil_reference_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["engineOilReference"];
            other_amount_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["otherAmount"];
            other_reference_cellar.value = new_data[0]["arrayCellarAmountRefElectricP"][0]["otherReference"];

            break;

          case 2:
            capacity_air.value = new_data[0]["arrayCellarAirC"][0]["capacity"];
            type_air_aconditioning.value = new_data[0]["arrayCellarAirC"][0]["idAirConditioningTypes"];

            break;

          case 3:
            voltaje_pump.value = new_data[0]["arrayCellarPumpsP"][0]["voltage"];
            hp_pump.value = new_data[0]["arrayCellarPumpsP"][0]["hp"];
            amp_pump.value = new_data[0]["arrayCellarPumpsP"][0]["amps"];
            voltaje_pump.value = new_data[0]["arrayCellarPumpsP"][0]["voltage"];
            capacity_pump.value = new_data[0]["arrayCellarPumpsP"][0]["capacity"];
            type_pump.value = new_data[0]["arrayCellarPumpsP"][0]["idPumpType"];

            break;
        }

        change_switch_inputs_products(type_p);

        alert("\nRedireccionando a la ventana 'nuevo producto' para la edición del elemento.");

        let tab1 = document.getElementById("search_product");
        let tab2 = document.getElementById("new_product");

        tab1.style.display = "none";
        tab2.style.display = "block";

      }

    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}


let tbody_product_content =  document.getElementById("tbody_product_content");
tbody_product_content.addEventListener("click",function(e){

  if(e.target.tagName === "IMG" && e.target.classList.contains("delete_this_element")){
		let idElementToDelete = e.target.closest("tr").id;
    let continue_delete = confirm("¿Esta seguro de eliminar este elemento?.");
    if (continue_delete) {
      ajax_delete_product_search(idElementToDelete);
    }

  }else if(e.target.tagName === "IMG" && e.target.classList.contains("view_info_product")){
		let idElementToEdit = e.target.closest("tr").id;
    let continue_edit = confirm("¿Desea editar este elemento?.");
    if (continue_edit) {
      let tp = parseInt(e.target.getAttribute("data-type-p"));
      ajax_edit_product_search(idElementToEdit, tp);
    }
  }
});
