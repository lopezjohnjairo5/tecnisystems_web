function prepare_json_electrical_report(){
  let my_Canvas_client = document.querySelector('#canvas_client_autograph');
  var imagen = my_Canvas_client.toDataURL("image/png");

  let qr_machine = document.querySelector('#img_preview_machine');
  var qr = qr_machine.toDataURL("image/png");

  let content_inputs = document.querySelectorAll("#report_electrical_form input");
  let content_selects = document.querySelectorAll("#report_electrical_form select");
  let content_textarea = document.querySelectorAll("#report_electrical_form textarea");

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

  if (t1_name == "" || t1_email == "" || t1_document == "" || c_document == "" || c_name == "" || c_email == "" || c_phone == "" || g_department == "" || g_city == "") {
    alert("Existen campos escenciales incompletos (campos marcados con *). Verifique e intente nuevamente");
  }else{
    let technical1 = {"technical1":[{"name":content_inputs[0].value,"email":content_inputs[1].value,"document":content_inputs[2].value}]};
    let technical2 = {"technical2":[{"name":content_inputs[3].value == "" ? "N/A" : content_inputs[3].value,"email":content_inputs[4].value == "" ? "N/A" : content_inputs[4].value,"document":content_inputs[5].value == "" ? "N/A" : content_inputs[5].value}]};
    let technical3 = {"technical3":[{"name":content_inputs[6].value == "" ? "N/A" : content_inputs[6].value,"email":content_inputs[7].value == "" ? "N/A" : content_inputs[7].value,"document":content_inputs[8].value == "" ? "N/A" : content_inputs[8].value}]};
    let general_info = {"general_info":[{"department":g_department,"city":g_city,"address":g_address == "" ? "N/A" : g_address,"date":content_inputs[9].value == "" ? "N/A" : content_inputs[9].value,"start_hour":g_start_hour,"end_hour":g_end_hour,"type_maintenance":content_selects[6].value}]};
    let machine = {"machine_p1":[{"qr":content_inputs[10].value == "" ? "N/A":qr,"power_plant_serial":content_inputs[11].value == "" ? "N/A":content_inputs[11].value,"power_plant":content_inputs[12].value == "" ? "N/A":content_inputs[12].value,"power_plant_model":content_inputs[13].value == "" ? "N/A":content_inputs[13].value,"power_plant_serie":content_inputs[14].value == "" ? "N/A":content_inputs[14].value}],
                  "machine_p2":[{"motor":content_inputs[15].value == "" ? "N/A":content_inputs[15].value,"motor_model":content_inputs[16].value == "" ? "N/A":content_inputs[16].value,"motor_serie":content_inputs[17].value == "" ? "N/A":content_inputs[17].value}],
                  "machine_p3":[{"generator":content_inputs[18].value == "" ? "N/A":content_inputs[18].value,"generator_serie":content_inputs[19].value == "" ? "N/A":content_inputs[19].value,"generator_kw":content_inputs[20].value == "" ? "N/A":content_inputs[20].value,"generator_kwa":content_inputs[21].value == "" ? "N/A":content_inputs[21].value,"generator_fases":content_inputs[22].value == "" ? "N/A":content_inputs[22].value,"generator_volt":content_inputs[23].value == "" ? "N/A":content_inputs[23].value}]};
    let works_out_power_plant ={"lubrication_system":[{"connection_check":$('input[name="connections"]:checked').val(),"filters_check":$('input[name="filters"]:checked').val(),"filters_change":$('input[name="change_filters"]:checked').val(),"level_state_oil":$('input[name="check_oil"]:checked').val(),"oil_change":$('input[name="change_oil"]:checked').val()}],
                  "fuel_system":[{"leak_check":$('input[name="leak"]:checked').val(),"connections_check":$('input[name="fuel_conections"]:checked').val(),"filter_check":$('input[name="check_filters_fuel"]:checked').val(),"pump_cylinder_check":$('input[name="check_bombin"]:checked').val(),"fuel_check":$('input[name="check_fuel_tank"]:checked').val()}],
                  "air_intake_system":[{"connection_air_check":$('input[name="air_conections"]:checked').val(),"casing_filter_check":$('input[name="check_filters_air"]:checked').val(),"turbo_check":$('input[name="check_air_turbo"]:checked').val()}],
                  "cooling_system":[{"connection_cooling_check":$('input[name="check_connections_cooling"]:checked').val(),"straps_check":$('input[name="check_straps"]:checked').val(),"check_coolant_condition":$('input[name="check_level_cooling"]:checked').val(),"radiator_condition_check":$('input[name="check_radiator"]:checked').val(),"water_level_sensor_check":$('input[name="check_sensor_level_water"]:checked').val()}],
                  "direct_current_system":[{"alternator_belt_check":$('input[name="check_alternator_strap"]:checked').val(),"electric_conections_check":$('input[name="check_electric_connections"]:checked').val(),"battery_acid_condition_check":$('input[name="check_level_acid"]:checked').val(),"battery_charging_terminals":$('input[name="check_battery_terminals"]:checked').val(),"battery_charger_review":$('input[name="check_battery_charger"]:checked').val()}],
                  "alternating_current_system":[{"voltmeter_check":$('input[name="check_voltmeter"]:checked').val(),"frequency_meter":$('input[name="check_Frequency_meter"]:checked').val(),"ammeter_check":$('input[name="check_ammeter"]:checked').val(),"terminal_connections_check":$('input[name="check_conections_terminals_electricals"]:checked').val(),"breaker_review":$('input[name="check_breakers"]:checked').val(),"contactors_review":$('input[name="check_contactors"]:checked').val(),"power_cable_check":$('input[name="check_power_cables"]:checked').val()}]};
    let parameter_register_power_plant ={"empty_tests":[{"vl1_N":content_inputs[84].value == "" ? "N/A" : content_inputs[84].value,"vl2_N":content_inputs[85].value == "" ? "N/A" : content_inputs[85].value,"vl3_N":content_inputs[86].value == "" ? "N/A" : content_inputs[86].value,"vl_l":content_inputs[87].value == "" ? "N/A" : content_inputs[87].value,"hz":content_inputs[88].value == "" ? "N/A" : content_inputs[88].value,"starting_current":content_inputs[89].value == "" ? "N/A" : content_inputs[89].value,"battery_voltage":content_inputs[90].value == "" ? "N/A" : content_inputs[90].value,"amps":content_inputs[91].value == "" ? "N/A" : content_inputs[91].value,"engine_oil_pressure":content_inputs[92].value == "" ? "N/A" : content_inputs[92].value,"engine_temperature":content_inputs[93].value == "" ? "N/A" : content_inputs[93].value,"rpm":content_inputs[94].value == "" ? "N/A" : content_inputs[94].value}],
                  "load_tests":[{"vl1_N":content_inputs[95].value == "" ? "N/A" : content_inputs[95].value,"vl2_N":content_inputs[96].value == "" ? "N/A" : content_inputs[96].value,"vl3_N":content_inputs[97].value == "" ? "N/A" : content_inputs[97].value,"vl_l":content_inputs[98].value == "" ? "N/A" : content_inputs[98].value,"hz":content_inputs[99].value == "" ? "N/A" : content_inputs[99].value,"al1":content_inputs[100].value == "" ? "N/A" : content_inputs[100].value,"al2":content_inputs[101].value == "" ? "N/A" : content_inputs[101].value,"al3":content_inputs[102].value == "" ? "N/A" : content_inputs[102].value,"battery_voltage":content_inputs[103].value == "" ? "N/A" : content_inputs[103].value,"amps":content_inputs[104].value == "" ? "N/A" : content_inputs[104].value,"engine_oil_pressure":content_inputs[105].value == "" ? "N/A" : content_inputs[105].value,"engine_temperature":content_inputs[106].value == "" ? "N/A" : content_inputs[106].value,"rpm":content_inputs[107].value == "" ? "N/A" : content_inputs[107].value,"previous_hourmeter_reading":content_inputs[108].value == "" ? "N/A" : content_inputs[108].value,"current_hourmeter_reading":content_inputs[109].value == "" ? "N/A" : content_inputs[109].value,"charge_transfer_function":$('input[name="load_transfer"]:checked').val(),"level_fuel":$('input[name="fuel_level"]:checked').val()}],
                  "observations":content_textarea[0].value == "" ? "N/A" : content_textarea[0].value};
    let materials_quantities_table ={"f_oil":[{"f_oil_amount":content_inputs[115].value == "" ? "N/A" : content_inputs[115].value,"f_oil_reference":content_inputs[116].value == "" ? "N/A" : content_inputs[116].value}],
                  "f_fuel":[{"f_fuel_amount":content_inputs[117].value == "" ? "N/A" : content_inputs[117].value,"f_fuel_reference":content_inputs[118].value == "" ? "N/A" : content_inputs[118].value}],
                  "f_air":[{"f_air_amount":content_inputs[119].value == "" ? "N/A" : content_inputs[119].value,"f_air_reference":content_inputs[120].value == "" ? "N/A" : content_inputs[120].value}],
                  "f_separator":[{"f_separator_amount":content_inputs[121].value == "" ? "N/A" : content_inputs[121].value,"f_separator_reference":content_inputs[122].value == "" ? "N/A" : content_inputs[122].value}],
                  "t_cooling":[{"cooling_amount":content_inputs[123].value == "" ? "N/A" : content_inputs[123].value,"cooling_reference":content_inputs[124].value == "" ? "N/A" : content_inputs[124].value}],
                  "t_engine_oil":[{"engine_oil_amount":content_inputs[125].value == "" ? "N/A" : content_inputs[125].value,"engine_oil_reference":content_inputs[126].value == "" ? "N/A" : content_inputs[126].value}],
                  "t_others":[{"others_amount":content_inputs[127].value == "" ? "N/A" : content_inputs[127].value,"others_reference":content_inputs[128].value == "" ? "N/A" : content_inputs[128].value}]};
    let client_info = {"document":c_document,
                      "name":c_name,
                      "email":c_email,
                      "phone":c_phone,
                      "token":c_token,
                      "firm":imagen
                    };

    let json_data = [];
    let json_object = {};

    json_data.push({
      "technical1_content":technical1,
      "technical2_content":technical2,
      "technical3_content":technical3,
      "general_info_content":general_info,
      "machine_content":machine,
      "works_out_power_plant_content":works_out_power_plant,
      "parameter_register_power_plant_content":parameter_register_power_plant,
      "materials_quantities_table_content":materials_quantities_table,
      "client_info_content":client_info
    });

    json_object.data = json_data;
    return json_object;
  }
}

function ajax_save_report_electrical(){
  let content = prepare_json_electrical_report();
  var url = "./controllers/save_report_electrical_controller.php";

  $.ajax({
    url: url,
    data: content,
    type: "POST",
    success: function(json)
    {
      record_nav_user = [];

      if (json == "Redirigir") {
        location.reload();
      } else if (json == "Not found") {
        alert("Error. \n\nSe ha producido un error, algunas de las causas pueden ser:\n- Información del técnico principal es incorrecta.\n- Información del cliente es incorrecta.\n- Cliente no registrado. \n\nPor favor verifique e intente nuevamente.\n")
      } else {
        alert(json);
      }

      let msn = "Reporte creado. \nContenido: \n"+json;
      ajax_save_record_user(msn);
      delete_all_saved_info();
    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}

let btn_electrical_report = document.getElementById("send_form_electrical");
btn_electrical_report.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_save_report_electrical,time:1200});
});
