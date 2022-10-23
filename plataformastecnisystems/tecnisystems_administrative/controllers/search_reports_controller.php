<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include GENERALFUNC."search_state_user.php";
  include GENERALFUNC."search_by_location.php";
	include GENERALFUNC."end_session.php";
  include MODELS."search_reports_model.php";

  $complete_arrays = array();


  session_start();
  if (search_state_user($_SESSION["administrative_user"][0],$_SESSION["administrative_user"][2],$_SESSION["administrative_user"][4]))
  {

    $search = strtolower($_POST["data"][0]["search"]);
    $terms_search = strpos($search,":") !== false ? explode(":",$search) : trim($search);
    $array_electrical_info = array();
    $array_air_info = array();
    $array_pump_info = array();
    $final_array = array();

    if (is_array($terms_search))
    {
      $terms_search[0] = trim($terms_search[0]);
      $terms_search[1] = trim($terms_search[1]);

      switch ($terms_search[0])
      {
        case 'f':
        case 'fecha':
          $array_general_info = search_general_info_by_multiple_info($terms_search[1],1);
          validate_general_array($array_general_info);
          break;

        case 'd':
        case 'departamento':
          $idDept = search_id_department_by_name($terms_search[1]);
          $array_general_info = search_general_info_by_multiple_info($idDept[0]["idDepartment"],2);
          validate_general_array($array_general_info);
          break;

        case 'c':
        case 'ciudad':
          $idCity = search_id_city_by_name($terms_search[1]);
          $array_general_info = search_general_info_by_multiple_info($idCity[0]["idCity"],3);
          validate_general_array($array_general_info);
          break;

        case 's':
        case 'serial':
          $type_serial = substr($terms_search[1],0,3);
          if ($type_serial == "tre")
          {
            $result_search_electrical_serial = search_electrical_reports_info_by_serial($terms_search[1]);
            $array_general_info = search_general_info_by_multiple_info($result_search_electrical_serial[0]["idGeneralInfo"],4);
            validate_general_array($array_general_info);

          }
          elseif ($type_serial == "tra")
          {
            $result_search_air_serial = search_air_reports_info_by_serial($terms_search[1]);
            $array_general_info = search_general_info_by_multiple_info($result_search_air_serial[0]["idGeneralInfo"],4);
            validate_general_array($array_general_info);

          }
          elseif ($type_serial == "trm")
          {
            $result_search_pump_serial = search_pumps_reports_info_by_serial($terms_search[1]);
            $array_general_info = search_general_info_by_multiple_info($result_search_pump_serial[0]["idGeneralInfo"],4);
            validate_general_array($array_general_info);
          }
          break;
      }

    }
    else
    {
      switch ($terms_search)
      {
        case 'h':
        case 'hoy':
          $current_date = date("Y-m-d");
          $array_general_info = search_general_info_by_multiple_info($current_date,1);
          validate_general_array($array_general_info);
          break;

        case 'te':
        case 'electricos':
          $type_report = "electrico";
          $array_electrical_info = search_all_electrical_reports();
          traverse_array_info($type_report, $array_electrical_info);
          break;

        case 'ta':
        case 'aires':
          $type_report = "aire";
          $array_air_info = search_all_air_reports();
          traverse_array_info($type_report, $array_air_info);
          break;

        case 'tm':
        case 'motobombas':
          $type_report = "motobomba";
          $array_pump_info =  search_all_pumps_reports();
          traverse_array_info($type_report, $array_pump_info);
          break;

        default:
          $result_search_client = search_info_client_by_name($terms_search);

          if ($result_search_client)
          {
            $result_search_client_length = count($result_search_client);
            for ($i=0; $i < $result_search_client_length; $i++)
            {
              $array_general_info = search_general_info_by_multiple_info($result_search_client[$i]["idClientInfo"],5);
              validate_general_array($array_general_info);
            }
          }
          break;
      }
    }

  }
  else
  {
    end_session();
    echo "Redirigir";
  }


  function search_technical_user_info($array)
  {
    $technical_info = "";

    $technical_user1 = $array[0]["idTechnicalUser1"] != 0 ? search_technical_by_id($array[0]["idTechnicalUser1"]) : "NA";
    $technical_user2 = $array[0]["idTechnicalUser2"] != 0 ? search_technical_by_id($array[0]["idTechnicalUser2"]) : "NA";
    $technical_user3 = $array[0]["idTechnicalUser3"] != 0 ? search_technical_by_id($array[0]["idTechnicalUser3"]) : "NA";

    $technical_info = $technical_user1." | ".$technical_user2." | ".$technical_user3;

    return $technical_info;
  }


  function add_to_final_array_search_reports($array, $info)
  {
    $f_array = $array;

    array_push($f_array,[
      "idReport" => $info[0],
      "serial" => $info[1],
      "date_general" => $info[2],
      "tecnicals" => $info[3],
      "department" => $info[4],
      "city" => trim($info[5],"\n \t"),
      "address" => trim($info[6],"\n \t"),
      "type_report" => $info[7],
      "client" => $info[8],
      "personInCharge" => $info[9]
    ]);

    return $f_array;
  }


  function validate_general_array($array_g)
  {
    $new_final_array = array();

    if ($array_g)
    {
      $array_g_length = count($array_g);
      for ($i=0; $i < $array_g_length; $i++)
      {
        $city_dep = search_city_and_department_by_id($array_g[$i]["city"],$array_g[$i]["department"]);
        $client_person_in_charge = search_info_client_by_id($array_g[$i]["idClient"]);

        $result_electrical_info = search_electrical_reports_info_by_general_info($array_g[$i]["idGeneralInformation"]);
        $result_pump_info = search_pumps_reports_info_by_general_info($array_g[$i]["idGeneralInformation"]);
        $result_air_info = search_air_reports_info_by_general_info($array_g[$i]["idGeneralInformation"]);

        if ($result_electrical_info)
        {
          $idReport = $result_electrical_info[0]["idReport"];
          $serial_report = $result_electrical_info[0]["serialNumber"];
          $tech_info = search_technical_user_info($result_electrical_info);
          $type_report = "electrico";
          $info = [
            $idReport,
            $serial_report,
            $array_g[$i]["date_general"],
            $tech_info,
            $city_dep[0]["Department"],
            $city_dep[0]["City"],
            $array_g[$i]["address"],
            $type_report,
            $client_person_in_charge[0]["nameClient"],
            $client_person_in_charge[0]["personInCharge"]
          ];

          $new_final_array = add_to_final_array_search_reports($new_final_array,$info);
        }

        if ($result_pump_info)
        {
          $idReport = $result_pump_info[0]["idReport"];
          $serial_report = $result_pump_info[0]["serialNumber"];
          $tech_info = search_technical_user_info($result_pump_info);
          $type_report = "motobomba";
          $info = [
            $idReport,
            $serial_report,
            $array_g[$i]["date_general"],
            $tech_info,
            $city_dep[0]["Department"],
            $city_dep[0]["City"],
            $array_g[$i]["address"],
            $type_report,
            $client_person_in_charge[0]["nameClient"],
            $client_person_in_charge[0]["personInCharge"]
          ];

          $new_final_array = add_to_final_array_search_reports($new_final_array,$info);
        }

        if ($result_air_info)
        {
          $idReport = $result_air_info[0]["idReport"];
          $serial_report = $result_air_info[0]["serialNumber"];
          $tech_info = search_technical_user_info($result_air_info);
          $type_report = "aire";
          $info = [
            $idReport,
            $serial_report,
            $array_g[$i]["date_general"],
            $tech_info,
            $city_dep[0]["Department"],
            $city_dep[0]["City"],
            $array_g[$i]["address"],
            $type_report,
            $client_person_in_charge[0]["nameClient"],
            $client_person_in_charge[0]["personInCharge"]
          ];
          $new_final_array = add_to_final_array_search_reports($new_final_array,$info);
        }
      }
      echo json_encode($new_final_array);
    }

  }

  function traverse_array_info($type_report,$array_inf)
  {
    $new_final_array = array();
    $array_inf_length = count($array_inf);
    for ($i=0; $i < $array_inf_length; $i++)
    {
      $idReport = $array_inf[$i]["idReport"];
      $serial_report = $array_inf[$i]["serialNumber"];
      $array_general_info = search_general_info_by_multiple_info($array_inf[$i]["idGeneralInfo"],4);
      $tech_info = search_technical_user_info($array_inf);

      $city_dep = search_city_and_department_by_id($array_general_info[0]["city"],$array_general_info[0]["department"]);
      $client_person_in_charge = search_info_client_by_id($array_general_info[0]["idClient"]);

      $info = [
        $idReport,
        $serial_report,
        $array_general_info[0]["date_general"],
        $tech_info,
        $city_dep[0]["Department"],
        $city_dep[0]["City"],
        $array_general_info[0]["address"],
        $type_report,
        $client_person_in_charge[0]["nameClient"],
        $client_person_in_charge[0]["personInCharge"]
      ];
      $new_final_array = add_to_final_array_search_reports($new_final_array,$info);
    }
    echo json_encode($new_final_array);
  }
