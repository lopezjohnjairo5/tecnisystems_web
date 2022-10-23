function prepare_json_pumps_report(){
  let my_Canvas_client = document.querySelector('#canvas_client_autograph');
  var imagen = my_Canvas_client.toDataURL("image/png");

  let qr_machine = document.querySelector('#img_preview_machine');
  var qr = qr_machine.toDataURL("image/png");

  let content_inputs = document.querySelectorAll("#report_pumps_form input");
  let content_selects = document.querySelectorAll("#report_pumps_form select");
  let content_textarea = document.querySelectorAll("#report_pumps_form textarea");

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

  let serial1_table = content_inputs[11].value;

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

  let min_elements_validate_empty = t1_name == "" || t1_email == "" || t1_document == "" || c_document == "" || c_name == "" || c_email == "" || c_phone == "" || g_department == "" || g_city == "" || serial1_table == "" || g_address == "";
  let min_elements_validate_null = t1_name === null || t1_email === null || t1_document === null || c_document === null || c_name === null || c_email === null || c_phone === null || g_department === null || g_city === null || serial1_table === null || g_address == null;
  let min_elements_validate_undefined = t1_name === undefined || t1_email === undefined || t1_document === undefined || c_document === undefined || c_name === undefined || c_email === undefined || c_phone === undefined || g_department === undefined || g_city === undefined || serial1_table === undefined || g_address == undefined;

  if (min_elements_validate_empty || min_elements_validate_null || min_elements_validate_undefined) {
    return "fields empty";
  } else {
    let technical1 = [{"name":t1_name,"email":t1_email,"document":t1_document}];
    let technical2 = [{"name":content_inputs[3].value == "" ? "NA" : content_inputs[3].value,"email":content_inputs[4].value == "" ? "NA" : content_inputs[4].value,"document":content_inputs[5].value == "" ? "NA" : content_inputs[5].value}];
    let technical3 = [{"name":content_inputs[6].value == "" ? "NA" : content_inputs[6].value,"email":content_inputs[7].value == "" ? "NA" : content_inputs[7].value,"document":content_inputs[8].value == "" ? "NA" : content_inputs[8].value}];
    let general_info = {"general_info":[{"start_hour":g_start_hour,"end_hour":g_end_hour,"date_service":content_inputs[9].value,"address_service":g_address,"type_maintenance":content_selects[6].value,"department":g_department,"city":g_city}]};
    let machine = {"qr":content_inputs[10].value == "" ? "NA" : qr,"observations":content_textarea[0].value == "" ? "NA" :content_textarea[0].value};
    let machine_table = {"column1":[{
      "serial":content_inputs[11].value == "" ? "NA" : content_inputs[11].value,
      "brand":content_inputs[15].value == "" ? "NA" : content_inputs[15].value,
      "hp":content_inputs[19].value == "" ? "NA" : content_inputs[19].value,
      "voltaje":content_inputs[23].value == "" ? "NA" : content_inputs[23].value,
      "amp":content_inputs[27].value == "" ? "NA" : content_inputs[27].value,
      "control_panel":content_inputs[31].value == "" ? "NA" : content_inputs[31].value,
      "protection":content_inputs[35].value == "" ? "NA" : content_inputs[35].value,
      "hidro_tank":content_inputs[39].value == "" ? "NA" : content_inputs[39].value,
      "capacity":content_inputs[43].value == "" ? "NA" : content_inputs[43].value,
      "presion_work":content_inputs[47].value == "" ? "NA" : content_inputs[47].value,
      "preload":content_inputs[51].value == "" ? "NA" : content_inputs[51].value,
      "electric_float":content_inputs[55].value == "" ? "NA" : content_inputs[55].value,
      "hidraulic_part":content_inputs[59].value == "" ? "NA" : content_inputs[59].value,
    }],"column2":[{
      "serial":content_inputs[12].value == "" ? "NA" : content_inputs[12].value,
      "brand":content_inputs[16].value == "" ? "NA" : content_inputs[16].value,
      "hp":content_inputs[20].value == "" ? "NA" : content_inputs[20].value,
      "voltaje":content_inputs[24].value == "" ? "NA" : content_inputs[24].value,
      "amp":content_inputs[28].value == "" ? "NA" : content_inputs[28].value,
      "control_panel":content_inputs[32].value == "" ? "NA" : content_inputs[32].value,
      "protection":content_inputs[36].value == "" ? "NA" : content_inputs[36].value,
      "hidro_tank":content_inputs[40].value == "" ? "NA" : content_inputs[40].value,
      "capacity":content_inputs[44].value == "" ? "NA" : content_inputs[44].value,
      "presion_work":content_inputs[48].value == "" ? "NA" : content_inputs[48].value,
      "preload":content_inputs[52].value == "" ? "NA" : content_inputs[52].value,
      "electric_float":content_inputs[56].value == "" ? "NA" : content_inputs[56].value,
      "hidraulic_part":content_inputs[60].value == "" ? "NA" : content_inputs[60].value,
    }],"column3":[{
      "serial":content_inputs[13].value == "" ? "NA" : content_inputs[13].value,
      "brand":content_inputs[17].value == "" ? "NA" : content_inputs[17].value,
      "hp":content_inputs[21].value == "" ? "NA" : content_inputs[21].value,
      "voltaje":content_inputs[25].value == "" ? "NA" : content_inputs[25].value,
      "amp":content_inputs[29].value == "" ? "NA" : content_inputs[29].value,
      "control_panel":content_inputs[33].value == "" ? "NA" : content_inputs[33].value,
      "protection":content_inputs[37].value == "" ? "NA" : content_inputs[37].value,
      "hidro_tank":content_inputs[41].value == "" ? "NA" : content_inputs[41].value,
      "capacity":content_inputs[45].value == "" ? "NA" : content_inputs[45].value,
      "presion_work":content_inputs[49].value == "" ? "NA" : content_inputs[49].value,
      "preload":content_inputs[53].value == "" ? "NA" : content_inputs[53].value,
      "electric_float":content_inputs[57].value == "" ? "NA" : content_inputs[57].value,
      "hidraulic_part":content_inputs[61].value == "" ? "NA" : content_inputs[61].value,
    }],"column4":[{
      "serial":content_inputs[14].value == "" ? "NA" : content_inputs[14].value,
      "brand":content_inputs[18].value == "" ? "NA" : content_inputs[18].value,
      "hp":content_inputs[22].value == "" ? "NA" : content_inputs[22].value,
      "voltaje":content_inputs[26].value == "" ? "NA" : content_inputs[26].value,
      "amp":content_inputs[30].value == "" ? "NA" : content_inputs[30].value,
      "control_panel":content_inputs[34].value == "" ? "NA" : content_inputs[34].value,
      "protection":content_inputs[38].value == "" ? "NA" : content_inputs[38].value,
      "hidro_tank":content_inputs[42].value == "" ? "NA" : content_inputs[42].value,
      "capacity":content_inputs[46].value == "" ? "NA" : content_inputs[46].value,
      "presion_work":content_inputs[50].value == "" ? "NA" : content_inputs[50].value,
      "preload":content_inputs[54].value == "" ? "NA" : content_inputs[54].value,
      "electric_float":content_inputs[58].value == "" ? "NA" : content_inputs[58].value,
      "hidraulic_part":content_inputs[62].value == "" ? "NA" : content_inputs[62].value,
    }]};

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
      "technical1":technical1,
      "technical2":technical2,
      "technical3":technical3,
      "general_info":general_info,
      "machine":machine,
      "machine_table":machine_table,
      "client_info":client_info
    });

    json_object.data = json_data;
    return json_object;
  }
}


function ajax_save_report_pumps(){
  let content = prepare_json_pumps_report();
  if (content == "fields empty") {
    alert("Existen campos escenciales incompletos (campos marcados con *) o campos con valores incorrectos. Verifique e intente nuevamente");
  }else{
    var url = "./controllers/save_report_pumps_controller.php";
    $.ajax({
      url: url,
      data: content,
      type: "POST",
      success: function(json)
      {
        record_nav_user = [];

        if (json == "Redirigir") {
          location.reload();
        }else if(json == "element_not_found"){
          alert("Error. Existen campos obligatorios con informacion incorrecta(datos de tecnicos, datos de cliente). Por favor verifique e intente nuevamente. ")
        }else{
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

let btn_pumps_report = document.getElementById("send_form_pumps");
btn_pumps_report.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_save_report_pumps,time:1200});

});
