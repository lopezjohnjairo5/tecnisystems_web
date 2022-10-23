<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include "../general_functions/delete_special_chars.php";
  include "../general_functions/search_id_technicals.php";
  include "../general_functions/search_id_client.php";
  include "../general_functions/moveImgTo.php";
  include "../general_functions/search_last_report_id.php";
  include "../general_functions/create_serial_reports.php";
  include GENERALFUNC."end_session.php";
  include MODELS."save_report_electrical_model.php";

  $t1_info_array = cleanUpInfo($_POST["data"][0]["technical1_content"]["technical1"][0]);
  $t2_info_array = cleanUpInfo($_POST["data"][0]["technical2_content"]["technical2"][0]);
  $t3_info_array = cleanUpInfo($_POST["data"][0]["technical3_content"]["technical3"][0]);
  $general_info_array = cleanUpInfo($_POST["data"][0]["general_info_content"]["general_info"][0],2);
  $machine_info_p1_array = cleanUpInfo($_POST["data"][0]["machine_content"]["machine_p1"][0]);
  $machine_info_p2_array = cleanUpInfo($_POST["data"][0]["machine_content"]["machine_p2"][0]);
  $machine_info_p3_array = cleanUpInfo($_POST["data"][0]["machine_content"]["machine_p3"][0]);
  $work_out_lubrication_system_array = cleanUpInfo($_POST["data"][0]["works_out_power_plant_content"]["lubrication_system"][0]);
  $work_out_fuel_system_array = cleanUpInfo($_POST["data"][0]["works_out_power_plant_content"]["fuel_system"][0]);
  $work_out_air_intake_system_array = cleanUpInfo($_POST["data"][0]["works_out_power_plant_content"]["air_intake_system"][0]);
  $work_out_cooling_system_array = cleanUpInfo($_POST["data"][0]["works_out_power_plant_content"]["cooling_system"][0]);
  $work_out_direct_current_system_array = cleanUpInfo($_POST["data"][0]["works_out_power_plant_content"]["direct_current_system"][0]);
  $work_out_alternating_current_system_array = cleanUpInfo($_POST["data"][0]["works_out_power_plant_content"]["alternating_current_system"][0]);
  $empty_tests_array = cleanUpInfo($_POST["data"][0]["parameter_register_power_plant_content"]["empty_tests"][0]);
  $load_tests_array = cleanUpInfo($_POST["data"][0]["parameter_register_power_plant_content"]["load_tests"][0]);
  $client_info = cleanUpInfo($_POST["data"][0]["client_info_content"]);

  $table_materials_quantity = array();

  $observations = delete_special_chars_with_points($_POST["data"][0]["parameter_register_power_plant_content"]["observations"]);

  $msn = "";

  $v1 = array();
  $path_firms = "./../documents/firms/";
  $path_qr_machine = "./../documents/qrs/";

  foreach ($_POST["data"][0]["materials_quantities_table_content"] as $key => $value)
  {
    foreach ($_POST["data"][0]["materials_quantities_table_content"][$key][0] as $k => $v)
    {
      array_push($v1, delete_special_chars($v));
    }
    array_push($table_materials_quantity,$v1);
    $v1 = array();
  }

  $technical_user_exist = !empty($t1_info_array[0]) && !empty($t1_info_array[1]) && !empty($t1_info_array[2]);
  $department_city_exist = !empty($general_info_array[0]) && !empty($general_info_array[1]);
  $client_exist = !empty($client_info[0]) && !empty($client_info[1]) && !empty($client_info[2]) && !empty($client_info[3]);

  if ($technical_user_exist && $department_city_exist && $client_exist)
  {
    if (search_id_technical_by_nit($t1_info_array[2],1,$t1_info_array[1]) && search_id_client_by_token($client_info[4]))
    {
      $serial_report_e = create_serial_report(1);
      $active = search_state_technical($t1_info_array[2],$t1_info_array[1]);

      if ($active == 1)
      {
        $id_amount_reference = invoke_crud_machine_table($machine_info_p1_array[1],$table_materials_quantity);
        $id_offline_jobs_electric_plant = invoke_crud_offline_work($work_out_alternating_current_system_array,$work_out_direct_current_system_array,$work_out_cooling_system_array,$work_out_air_intake_system_array,$work_out_fuel_system_array,$work_out_lubrication_system_array);
        $id_register_power_plant_parameters =  invoke_crud_load_empty_tests($load_tests_array,$empty_tests_array);
        $id_general_info = invoke_cruds_from_values_general_information($observations,$general_info_array,$client_info,$machine_info_p1_array,$path_firms,$path_qr_machine);
        $id_tech1 = search_id_technical_by_document_and_mail($t1_info_array[2],$t1_info_array[1]);
        $id_tech2 = search_id_technical_by_document_and_mail($t2_info_array[2],$t2_info_array[1]);
        $id_tech3 = search_id_technical_by_document_and_mail($t3_info_array[2],$t3_info_array[1]);
        $id_technical_reports = invoke_crud_technicals_reports($id_tech1,$id_tech2,$id_tech3);
        $id_client_info = search_id_client_by_document($client_info[0]);
        $id_cellar_general_info_product = search_id_product($machine_info_p1_array[1]);
        $final_array =[$serial_report_e,$id_cellar_general_info_product,$id_client_info,$id_offline_jobs_electric_plant,$id_register_power_plant_parameters,$id_technical_reports,$id_general_info];
        $id_electrical_report = insert_electrical_reports($final_array);

        if ($id_electrical_report)
        {
          print_r("\n- Nuevo reporte insertado. \nSerial del reporte:\n"."$serial_report_e");
        }
        else
        {
          print_r("\n- Problema al insertar reporte");
        }

      }
      else
      {
        end_session();
        print_r("Redirigir");
        die();
      }
    }
    else
    {
      echo "Not found";
    }
  }

  function invoke_crud_technicals_reports($id1,$id2,$id3)
  {
    if (!$id2)
    {
      $id2 = 0;
    }
    if (!$id3)
    {
      $id3 = 0;
    }

    $idTR = insert_technicals_reports([$id1,$id2,$id3]);
    return $idTR;
  }

  function cleanUpInfo($array,$valueSC = 1)
  {
    $new_array = array();
    foreach ($array as $key => $value)
    {
      if ($valueSC == 1)
      {
        array_push($new_array,delete_special_chars($value));
      }
      else
      {
        array_push($new_array,delete_special_chars_with_points($value));
      }
    }
    return $new_array;
  }


  function invoke_crud_machine_table($serial,$table)
  {
    $id = search_amount_reference_electric_products($serial);
    if ($id)
    {
      $update_result = update_amount_reference_electric_products($id,$table);

      if($update_result)
      {
        print_r("\n- ...Información de la tabla 'material/cantidad/referencia' actualizada correctamente...");
      }
    }
    else
    {
      $id = insert_amount_reference_electric_products($table);
    }
    return $id;
  }


  function invoke_crud_offline_work($ac,$dc,$c,$ai,$f,$l)
  {
    $idACS = insert_alternating_current_system($ac);
    $idDCS = insert_direct_current_system($dc);
    $idCS = insert_cooling_system($c);
    $idAIS = insert_airintake_system($ai);
    $idFS = insert_fuel_system($f);
    $idLS = insert_lubrication_system($l);

    $id = insert_offline_jobs_electric_plant([$idLS,$idFS,$idAIS,$idCS,$idDCS,$idACS]);
    return $id;
  }


  function invoke_crud_load_empty_tests($lt,$et)
  {
    $idLT = insert_load_tests($lt);
    $idET = insert_empty_tests($et);
    $id = insert_register_power_plant_parameters([$idET,$idLT]);
    return $id;
  }


  function invoke_cruds_from_values_general_information($observations,$arrayG,$arrayCI,$arrayMachine,$pathF,$pathQr)
  {
    $firm = $pathF."firm_".$arrayCI[0].".png";
    $qr = $pathQr."QR_photo_serial_".$arrayMachine[1].".png";

    $idCD = return_cities_and_departmens_id($arrayG[1]);
    $idCl = search_id_client_by_document($arrayCI[0]);

    array_push($arrayCI,$firm);

    moveImgTo("Firma cliente",$_POST["data"][0]["client_info_content"]["firm"],$firm);
    moveImgTo("Qr img",$_POST["data"][0]["machine_content"]["machine_p1"][0]["qr"],$qr);

    array_push($arrayG,$qr,$observations);

    $new_general_array = [$arrayG[3], $arrayG[4], $arrayG[5], $idCD[0][1], $idCD[0][0], $arrayG[2], $idCl, $arrayG[7], $arrayG[6], $arrayG[8]];

    $id = insert_general_information($new_general_array);

    return $id;
  }
