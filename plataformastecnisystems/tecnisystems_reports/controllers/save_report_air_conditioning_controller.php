<?php
  include "../config/paths.php";
  include "../config/generals.php";

  include "../general_functions/delete_special_chars.php";
  include "../general_functions/search_state_user.php";
  include "../general_functions/search_id_technicals.php";
  include "../general_functions/search_id_cellar_product.php";
  include "../general_functions/search_id_client.php";
  include "../general_functions/search_ids_dep_city.php";
  include "../general_functions/insert_technicals_reports_ids.php";
  include "../general_functions/moveImgTo.php";
  include "../general_functions/insert_general_info.php";
  include "../general_functions/search_last_report_id.php";
  include "../general_functions/create_serial_reports.php";
  include GENERALFUNC."end_session.php";

  include MODELS."save_report_air_conditioning_model.php";

  session_start();

  if(search_state_user($_SESSION["technical_user"][0],$_SESSION["technical_user"][2],$_SESSION["technical_user"][4],2))
  {
    $serial_repor_number = create_serial_report(2); // 2 = aire acondicionado;
    $path_firms = "./../documents/firms/";
    $path_qr_machine = "./../documents/qrs/";

    $info_tech1_email = delete_special_chars($_POST["data"][0]["technical1"][0]["email"]);
    $info_tech1_document = delete_special_chars($_POST["data"][0]["technical1"][0]["document"]);
    $id_tech1 = search_id_technical_by_nit($info_tech1_document,2,$info_tech1_email);

    $info_client_document = delete_special_chars($_POST["data"][0]["client_info"]["document"]);
    $info_client_email = delete_special_chars($_POST["data"][0]["client_info"]["email"]);
    $info_client_firm = $_POST["data"][0]["client_info"]["firm"];
    $info_client_token = $_POST["data"][0]["client_info"]["token"];

    $id_client = search_id_client_by_token($info_client_token);
    $firm = $path_firms."firm_".$info_client_document.".png";

    $info_machine_serial = delete_special_chars($_POST["data"][0]["machine"]["serial_machine"]);
    $id_machine = search_id_cellar_general_product($info_machine_serial,2);

    $not_empty = !empty($id_tech1) && !empty($id_client) && !empty($id_machine);
    $not_zero = $id_tech1 != 0 && $id_client != 0 && $id_machine != 0;
    $not_false = $id_tech1 != false && $id_client != false && $id_machine!= false;

    $qr = $path_qr_machine."QR_photo_serial_".$info_machine_serial.".png";

    if ( $not_empty && $not_zero && $not_false)
    {
      $array_info_fan_motor = array();
      $array_info_condensing_unit = array();
      $array_info_drive_unit = array();
      $array_info_wr_refrigeration_system = array();
      $array_info_wr_condensing_and_compressor_unit = array();
      $array_info_wr_drive_unit = array();

      $array_ids_technicals = array();
      $array_general_info = array();

      for ($i=1; $i <= 3; $i++)
      {
        $info_tech_email = delete_special_chars($_POST["data"][0]["technical".$i][0]["email"]);
        $info_tech_document = delete_special_chars($_POST["data"][0]["technical".$i][0]["document"]);
        $id_tech = search_id_technical_by_nit($info_tech_document,2,$info_tech_email);
        array_push($array_ids_technicals,!empty($id_tech) && $id_tech != false ?$id_tech : 0);
      }

      array_push($array_general_info,
        $_POST["data"][0]["general_info"]["general_info"][0]["date_service"],
        $_POST["data"][0]["general_info"]["general_info"][0]["start_hour"],
        $_POST["data"][0]["general_info"]["general_info"][0]["end_hour"],
        search_id_dept_by_tk($_POST["data"][0]["general_info"]["general_info"][0]["department"]),
        search_id_city_by_tk($_POST["data"][0]["general_info"]["general_info"][0]["city"]),
        $_POST["data"][0]["general_info"]["general_info"][0]["address"],
        $id_client,
        $qr,
        $_POST["data"][0]["general_info"]["general_info"][0]["type_maintenance"],
        $_POST["data"][0]["machine"]["observations"]);

      array_push($array_info_fan_motor,
        $_POST["data"][0]["technical_data"]["fan_motor"][0]["plate_data_rpm"],
        $_POST["data"][0]["technical_data"]["fan_motor"][0]["plate_data_volt"],
        $_POST["data"][0]["technical_data"]["fan_motor"][0]["plate_data_amp"],
        $_POST["data"][0]["technical_data"]["fan_motor"][0]["plate_data_hp"],
        $_POST["data"][0]["technical_data"]["fan_motor"][0]["amps_i1"],
        $_POST["data"][0]["technical_data"]["fan_motor"][0]["amps_i2"],
        $_POST["data"][0]["technical_data"]["fan_motor"][0]["amps_i3"]
      );

      array_push($array_info_condensing_unit,
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["plate_data_hp"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["plate_data_vol"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["plate_data_amp"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["measurements_v11_v12"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["measurements_v12_v13"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["measurements_v13_v14"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["amps_i1"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["amps_i2"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["amps_i3"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["high_pressure"],
        $_POST["data"][0]["technical_data"]["condensing_unit"][0]["low_pressure"]
      );

      array_push($array_info_drive_unit,
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["engine_data_hp"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["engine_data_vol"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["engine_data_amo"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["engine_data_rpm"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["measurements_v11_v12"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["measurements_v12_v13"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["measurements_v13_v14"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["amps_i1"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["amps_i2"],
        $_POST["data"][0]["technical_data"]["drive_unit"][0]["amps_i3"]
      );

      array_push($array_info_wr_refrigeration_system,
        $_POST["data"][0]["technical_data"]["interconection_cooling_system"][0]["isolation_refrigeration"],
        $_POST["data"][0]["technical_data"]["interconection_cooling_system"][0]["filter_refrigeration"],
        $_POST["data"][0]["technical_data"]["interconection_cooling_system"][0]["valve_cut_refrigeration"],
        $_POST["data"][0]["technical_data"]["interconection_cooling_system"][0]["scape_pipeline_refrigeration"],
        $_POST["data"][0]["technical_data"]["interconection_cooling_system"][0]["support_refrigeration"],
        $_POST["data"][0]["technical_data"]["interconection_cooling_system"][0]["peephole_refrigeration"],
        $_POST["data"][0]["technical_data"]["interconection_cooling_system"][0]["valve_solenoid_refrigeration"],
        $_POST["data"][0]["technical_data"]["interconection_cooling_system"][0]["liquid_suction_refrigeration"]
      );

      array_push($array_info_wr_condensing_and_compressor_unit,
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["functioning_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["clean_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["snake_wash_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["adjusting_rotors_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["fan_temperature_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["screw_adjustment_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["accessories_review_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["noise_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["supports_status_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["scapes_conditioning"],
        $_POST["data"][0]["technical_data"]["condensing_and_compress_unit"][0]["screw_adjustment_tab_control_conditioning"]
      );

      array_push($array_info_wr_drive_unit,
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["clean"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["Snake_wash"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["rotors_and_bearings"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["washing_air_filters"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["belt_tension"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["bearing_review"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["drain_cleaning"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["insulation_review"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["machine_room_cleaning"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["screw_adjustment"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["expansion_valve"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["electrical_accessories"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["alarm_lamps"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["electrical_review"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["remote_control_review"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["pump"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["thermostat_check"],
        $_POST["data"][0]["technical_data"]["drive_unit_2"][0]["engine_inspection"]
      );

      $result_id_it = insert_technicals_reports($array_ids_technicals);

      $result_id_afmi = insert_air_fan_motor_info($array_info_fan_motor);
      $result_id_acui = insert_air_condensing_unit_info($array_info_condensing_unit);
      $result_id_adui = insert_air_drive_unit_info($array_info_drive_unit);

      $result_id_awrsi = insert_air_wr_refrigeration_system_info($array_info_wr_refrigeration_system);
      $result_id_awcci = insert_air_wr_condensing_and_compressor_info($array_info_wr_condensing_and_compressor_unit);
      $result_id_awdui = insert_air_wr_drive_unit_info($array_info_wr_drive_unit);

      $valid_ids_insertion_1 = $result_id_afmi != false && $result_id_acui != false && $result_id_adui != false;
      if ($valid_ids_insertion_1)
      {
        $result_id_atdi = insert_air_technical_data_info([$result_id_afmi,$result_id_acui,$result_id_adui]);
      }

      $valid_ids_insertion_2 = $result_id_awrsi != false && $result_id_awcci != false && $result_id_awdui != false;
      if ($valid_ids_insertion_2)
      {
        $result_id_awrcoi = insert_air_works_and_revisions_carried_out_info([$result_id_awdui,$result_id_awcci,$result_id_awrsi]);
      }

      $result_id_gi = insert_general_information($array_general_info);

      if ($result_id_it && $result_id_atdi && $result_id_awrcoi && $result_id_gi)
      {
        $array_air_report = [
          $serial_repor_number,
          $_POST["data"][0]["general_info"]["general_info"][0]["area"],
          $_POST["data"][0]["general_info"]["general_info"][0]["branch_office"],
          $id_machine,
          $id_client,
          $result_id_it,
          $result_id_gi,
          $result_id_atdi,
          $result_id_awrcoi
        ];
        $result_iari = insert_air_report_info($array_air_report);

        if ($result_iari)
        {
          echo "Serial reporte creado: ".$serial_repor_number;
          try
          {
            moveImgTo("Firma cliente",$info_client_firm,$firm);
            moveImgTo("Qr img",$_POST["data"][0]["machine"]["qr"],$qr);

          }
          catch (\Exception $e)
          {
            echo "error_move_img";
          }
        }
      }
      else
      {
        echo "insert_error";
      }
    }
    else
    {
      echo "element_not_found";
    }

  }
  else
  {
  	end_session();
    echo "Redirigir";
  }
