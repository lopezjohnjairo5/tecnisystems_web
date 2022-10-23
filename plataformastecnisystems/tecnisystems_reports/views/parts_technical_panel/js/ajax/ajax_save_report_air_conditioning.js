function return_selected_value(element){
  let unit = document.getElementsByName(element);

  for (var i = 0; i < unit.length; i++) {
    if(unit[i].checked){
      return unit[i].value;
    }
  }
  return unit[0].value;
}

function prepare_json_air_report(){
  let my_Canvas_client = document.querySelector('#canvas_client_autograph');
  var imagen = my_Canvas_client.toDataURL("image/png");

  let qr_machine = document.querySelector('#img_preview_machine');
  var qr = qr_machine.toDataURL("image/png");

  let content_inputs = document.querySelectorAll("#report_air_conditioning_form input");
  let content_selects = document.querySelectorAll("#report_air_conditioning_form select");
  let content_textarea = document.querySelectorAll("#report_air_conditioning_form textarea");

  let t1_name =content_inputs[0].value;
  let t1_email =content_inputs[1].value;
  let t1_document =content_inputs[2].value;

  let c_document = document.getElementById("client_document").value;
  let c_name = document.getElementById("client_name").textContent;
  let c_token = document.getElementById("client_name").value;
  let c_email = document.getElementById("client_email").value;
  let c_phone = document.getElementById("client_phone").value;

  let g_department = document.getElementById("department_client").getAttribute("data-dep-tk");
  let g_city = document.getElementById("city_client").getAttribute("data-city-tk");
  let g_address = document.getElementById("address_client").value;

  let g_start_hour;
  let g_end_hour;

  let serial_machine = content_inputs[13].value;

  if (content_selects[2].value == "am"){
    g_start_hour = (content_selects[0].value == "" ? "00" : content_selects[0].value)+":"+(content_selects[1].value == "" ? "00" : content_selects[1].value);
  }else{
    g_start_hour = (content_selects[0].value == "" ? "00" : (parseInt(content_selects[0].value,10)+12))+":"+(content_selects[1].value == "" ? "00" : content_selects[1].value);
  }

  if (content_selects[5].value == "am"){
    g_end_hour = (content_selects[3].value == "" ? "00" : content_selects[3].value)+":"+(content_selects[4].value == "" ? "00" : content_selects[4].value);
  }else{
    g_end_hour = (content_selects[3].value == "" ? "00" : (parseInt(content_selects[3].value,10)+12))+":"+(content_selects[4].value == "" ? "00" : content_selects[4].value);
  }

  let min_elements_validate_empty = t1_name == "" || t1_email == "" || t1_document == "" || c_document == "" || c_name == "" || c_email == "" || c_phone == "" || g_department == "" || g_city == "" || serial_machine == "" ||  g_address == "";
  let min_elements_validate_null = t1_name === null || t1_email === null || t1_document === null || c_document === null || c_name === null || c_email === null || c_phone === null || g_department === null || g_city === null || serial_machine === null ||  g_address == null;
  let min_elements_validate_undefined = t1_name === undefined || t1_email === undefined || t1_document === undefined || c_document === undefined || c_name === undefined || c_email === undefined || c_phone === undefined || g_department === undefined || g_city === undefined || serial_machine === undefined ||  g_address == undefined;

  if (min_elements_validate_empty || min_elements_validate_null || min_elements_validate_undefined) {
    return "fields empty";
  } else {
    let technical1 = [{"name":t1_name,"email":t1_email,"document":t1_document}];
    let technical2 = [{"name":content_inputs[3].value == "" ? "NA" : content_inputs[3].value,"email":content_inputs[4].value == "" ? "NA" : content_inputs[4].value,"document":content_inputs[5].value == "" ? "NA" : content_inputs[5].value}];
    let technical3 = [{"name":content_inputs[6].value == "" ? "NA" : content_inputs[6].value,"email":content_inputs[7].value == "" ? "NA" : content_inputs[7].value,"document":content_inputs[8].value == "" ? "NA" : content_inputs[8].value}];
    let general_info = {"general_info":[{"start_hour":g_start_hour,"end_hour":g_end_hour,"date_service":content_inputs[9].value,"area":content_inputs[10].value == "" ? "NA" :content_inputs[10].value,"branch_office":content_inputs[11].value == "" ? "NA":content_inputs[11].value,  "address":g_address,"type_maintenance":content_selects[6].value == "0" ? 1:content_selects[6].value,"department":g_department,"city":g_city}]};
    let machine = {"qr":content_inputs[12].value == "" ? "NA" : qr,"serial_machine": content_inputs[13].value == "" ? "NA" : serial_machine,"observations":content_textarea[0].value == "" ? "NA" :content_textarea[0].value};
    let technical_data = {
      "drive_unit":[{
        "engine_data_hp":content_inputs[18].value == "" ? "NA" : content_inputs[18].value,
        "engine_data_vol":content_inputs[19].value == "" ? "NA" : content_inputs[19].value,
        "engine_data_amo":content_inputs[20].value == "" ? "NA" : content_inputs[20].value,
        "engine_data_rpm":content_inputs[21].value == "" ? "NA" : content_inputs[21].value,
        "measurements_v11_v12":content_inputs[22].value == "" ? "NA" : content_inputs[22].value,
        "measurements_v12_v13":content_inputs[23].value == "" ? "NA" : content_inputs[23].value,
        "measurements_v13_v14":content_inputs[24].value == "" ? "NA" : content_inputs[24].value,
        "amps_i1":content_inputs[25].value == "" ? "NA" : content_inputs[25].value,
        "amps_i2":content_inputs[26].value == "" ? "NA" : content_inputs[26].value,
        "amps_i3":content_inputs[27].value == "" ? "NA" : content_inputs[27].value,
      }],
      "drive_unit_2":[{
        "clean":return_selected_value("clean_air_unit"),
        "screw_adjustment":return_selected_value("screw_adjustment_air_unit"),
        "Snake_wash":return_selected_value("Snake_wash_air_unit"),
        "expansion_valve":return_selected_value("expansion_valve_air_unit"),
        "rotors_and_bearings":return_selected_value("rotors_and_bearings_air_unit"),
        "electrical_accessories":return_selected_value("electrical_accessories_air_unit"),
        "washing_air_filters":return_selected_value("washing_air_filters_air_unit"),
        "alarm_lamps":return_selected_value("alarm_lamps_air_unit"),
        "belt_tension":return_selected_value("belt_tension_air_unit"),
        "electrical_review":return_selected_value("electrical_review_air_unit"),
        "bearing_review":return_selected_value("bearing_review_air_unit"),
        "remote_control_review":return_selected_value("remote_control_review_air_unit"),
        "drain_cleaning":return_selected_value("drain_cleaning_air_unit"),
        "pump":return_selected_value("pump_air_unit"),
        "insulation_review":return_selected_value("insulation_review_air_unit"),
        "thermostat_check":return_selected_value("thermostat_check_air_unit"),
        "machine_room_cleaning":return_selected_value("machine_room_cleaning_air_unit"),
        "engine_inspection":return_selected_value("engine_inspection_air_unit")
      }],
      "condensing_unit":[{
        "plate_data_hp":content_inputs[82].value == "" ? "NA" : content_inputs[82].value,
        "plate_data_vol":content_inputs[83].value == "" ? "NA" : content_inputs[83].value,
        "plate_data_amp":content_inputs[84].value == "" ? "NA" : content_inputs[84].value,
        "measurements_v11_v12":content_inputs[85].value == "" ? "NA" : content_inputs[85].value,
        "measurements_v12_v13":content_inputs[86].value == "" ? "NA" : content_inputs[86].value,
        "measurements_v13_v14":content_inputs[87].value == "" ? "NA" : content_inputs[87].value,
        "amps_i1":content_inputs[88].value == "" ? "NA" : content_inputs[88].value,
        "amps_i2":content_inputs[89].value == "" ? "NA" : content_inputs[89].value,
        "amps_i3":content_inputs[90].value == "" ? "NA" : content_inputs[90].value,
        "high_pressure":content_inputs[91].value == "" ? "NA" : content_inputs[91].value,
        "low_pressure":content_inputs[92].value == "" ? "NA" : content_inputs[92].value
      }],
      "condensing_and_compress_unit":[{
        "functioning_conditioning":return_selected_value("functioning_conditioning_air_unit"),
        "screw_adjustment_conditioning":return_selected_value("screw_adjustment_conditioning_air_unit"),
        "clean_conditioning":return_selected_value("clean_conditioning_air_unit"),
        "accessories_review_conditioning":return_selected_value("accessories_review_conditioning_air_unit"),
        "snake_wash_conditioning":return_selected_value("snake_wash_conditioning_air_unit"),
        "screw_adjustment_tab_control_conditioning":return_selected_value("screw_adjustment_tab_control_conditioning_air_unit"),
        "adjusting_rotors_conditioning":return_selected_value("adjusting_rotors_conditioning_air_unit"),
        "noise_conditioning":return_selected_value("noise_conditioning_air_unit"),
        "supports_status_conditioning":return_selected_value("supports_status_conditioning_air_unit"),
        "fan_temperature_conditioning":return_selected_value("fan_temperature_conditioning_air_unit"),
        "scapes_conditioning":return_selected_value("scapes_conditioning_air_unit")
      }],
      "interconection_cooling_system":[{
        "isolation_refrigeration":return_selected_value("isolation_refrigeration_air_unit"),
        "support_refrigeration":return_selected_value("support_refrigeration_air_unit"),
        "filter_refrigeration":return_selected_value("filter_refrigeration_air_unit"),
        "peephole_refrigeration":return_selected_value("peephole_refrigeration_air_unit"),
        "valve_cut_refrigeration":return_selected_value("valve_cut_refrigeration_air_unit"),
        "valve_solenoid_refrigeration":return_selected_value("valve_solenoid_refrigeration_air_unit"),
        "scape_pipeline_refrigeration":return_selected_value("scape_pipeline_refrigeration_air_unit"),
        "liquid_suction_refrigeration":return_selected_value("liquid_suction_refrigeration_air_unit")
      }],
      "fan_motor":[{
        "plate_data_rpm":content_inputs[150].value == "" ? "NA" : content_inputs[150].value,
        "plate_data_volt":content_inputs[151].value == "" ? "NA" : content_inputs[151].value,
        "plate_data_amp":content_inputs[152].value == "" ? "NA" : content_inputs[153].value,
        "plate_data_hp":content_inputs[153].value == "" ? "NA" : content_inputs[154].value,
        "amps_i1":content_inputs[154].value == "" ? "NA" : content_inputs[154].value,
        "amps_i2":content_inputs[155].value == "" ? "NA" : content_inputs[155].value,
        "amps_i3":content_inputs[156].value == "" ? "NA" : content_inputs[156].value
      }]
    };

    let client_info = {
      "document":c_document,
      "name":c_name,
      "email":c_email,
      "phone":c_phone,
      "token":c_token,
      "firm":imagen
    };

    let json_data = [];
    let json_object = {};

    json_data.push({
      "technical1":technical1,
      "technical2":technical2,
      "technical3":technical3,
      "general_info":general_info,
      "machine":machine,
      "technical_data":technical_data,
      "client_info":client_info
    });

    json_object.data = json_data;
    return json_object;
  }
}


function ajax_save_report_air_conditioning(){
  let content = prepare_json_air_report();
  if (content == "fields empty") {
    alert("Existen campos escenciales incompletos (campos marcados con *) o campos con valores incorrectos. Verifique e intente nuevamente");
  }else{
    var url = "./controllers/save_report_air_conditioning_controller.php";

    $.ajax({
      url: url,
      data: content,
      type: "POST",
      success: function(json)
      {
        record_nav_user = [];
        if(json == "error_move_img"){
          alert("Error al guardar la imagen. Verifique e intente nuevamente. ");
        }else if(json == "insert_error"){
          alert("Error al insertar el reporte. Verifique e intente nuevamente.");
        }else if(json == "element_not_found"){
          alert("Error. Información incorrecta.\nEs posible que algunos de los datos marcados como obligatorios(*), sean erroneos. \nPor favor verifique e intente nuevamente.");
        }else if (json == "Redirigir") {
          location.reload();
        }else{
          alert("Reporte creado con éxito");
          alert(json);
        }

        delete_all_saved_info();
      },
      error : function(xhr, status) {
          alert('Disculpe, hay un problema '+status);
      }
    });
  }
}

let btn_air_conditioning_report = document.getElementById("send_form_air_conditioning");
btn_air_conditioning_report.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_save_report_air_conditioning,time:1200});
});
