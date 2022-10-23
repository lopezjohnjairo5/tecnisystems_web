<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include "../general_functions/delete_special_chars.php";
  include MODELS."save_report_electrical_model.php";

  $t1_info_array = array();
  $t2_info_array = array();
  $t3_info_array = array();
  $general_info_array = array();
  $machine_info_p1_array = array();
  $machine_info_p2_array = array();
  $machine_info_p3_array = array();
  $work_out_lubrication_system_array = array();
  $work_out_fuel_system_array = array();
  $work_out_air_intake_system_array = array();
  $work_out_cooling_system_array = array();
  $work_out_direct_current_system_array = array();
  $work_out_alternating_current_system_array = array();
  $empty_tests_array = array();
  $load_tests_array = array();
  $table_materials_quantity = array();
  $pass1_materials_quantity = array();
  $pass2_materials_quantity = array();
  $client_info = array();
  $observations = delete_special_chars($_POST["data"][0]["parameter_register_power_plant_content"]["observations"]);

  $v1 = array();

  foreach ($_POST["data"][0]["technical1_content"]["technical1"][0] as $key => $value)
  {
    array_push($t1_info_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["technical2_content"]["technical2"][0] as $key => $value)
  {
    array_push($t2_info_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["technical3_content"]["technical3"][0] as $key => $value)
  {
    array_push($t3_info_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["general_info_content"]["general_info"][0] as $key => $value)
  {
    array_push($general_info_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["machine_content"]["machine_p1"][0] as $key => $value)
  {
    array_push($machine_info_p1_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["machine_content"]["machine_p2"][0] as $key => $value)
  {
    array_push($machine_info_p2_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["machine_content"]["machine_p3"][0] as $key => $value)
  {
    array_push($machine_info_p3_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["works_out_power_plant_content"]["lubrication_system"][0] as $key => $value)
  {
    array_push($work_out_lubrication_system_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["works_out_power_plant_content"]["fuel_system"][0] as $key => $value)
  {
    array_push($work_out_fuel_system_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["works_out_power_plant_content"]["air_intake_system"][0] as $key => $value)
  {
    array_push($work_out_air_intake_system_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["works_out_power_plant_content"]["cooling_system"][0] as $key => $value)
  {
    array_push($work_out_cooling_system_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["works_out_power_plant_content"]["direct_current_system"][0] as $key => $value)
  {
    array_push($work_out_direct_current_system_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["works_out_power_plant_content"]["alternating_current_system"][0] as $key => $value)
  {
    array_push($work_out_alternating_current_system_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["parameter_register_power_plant_content"]["empty_tests"][0] as $key => $value)
  {
    array_push($empty_tests_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["parameter_register_power_plant_content"]["load_tests"][0] as $key => $value)
  {
    array_push($load_tests_array,delete_special_chars($value));
  }

  foreach ($_POST["data"][0]["materials_quantities_table_content"] as $key => $value)
  {
    foreach ($_POST["data"][0]["materials_quantities_table_content"][$key][0] as $k => $v)
    {
      array_push($v1, delete_special_chars($v));
    }
    array_push($table_materials_quantity,$v1);
    $v1 = array();
  }

  foreach ($_POST["data"][0]["client_info_content"] as $key => $value)
  {
    array_push($client_info,delete_special_chars($value));
  }

  print_r($table_materials_quantity);

  $technical_user_exist = !empty($t1_info_array[0]) && !empty($t1_info_array[1]) && !empty($t1_info_array[2]);
  $department_city_exist = !empty($general_info_array[0]) && !empty($general_info_array[1]);
  $client_exist = !empty($client_info[0]) && !empty($client_info[1]) && !empty($client_info[2]) && !empty($client_info[3]);

  print_r($machine_info_p1_array);

  if ($technical_user_exist && $department_city_exist && $client_exist)
  {
    $id_amount_reference = search_amount_reference_electric_products($machine_info_p1_array[1]);

    if ($id_amount_reference)
    {
      $update_result = update_amount_reference_electric_products($id_amount_reference,$table_materials_quantity);
      if ($update_result)
      {
        print_r("...actualizado correctamente...");
      }
      else
      {
        print_r("Error al actualizar la INFORMACION. Verifique e intentente nuevamente");
      }
    }
    else
    {
      $id_amount_reference = insert_amount_reference_electric_products($table_materials_quantity);
      print_r("El nuevo registro insertado tiene el id: ".$id_amount_reference);
    }

    print_r("el id_amount_reference es: ");
    print_r($id_amount_reference);
  }
