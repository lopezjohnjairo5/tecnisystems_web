<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include "../general_functions/search_ids_dep_city.php";
  include "../general_functions/search_state_user.php";
  include "../general_functions/search_id_client.php";
  include "../general_functions/define_tipe_technical_user.php";
  include GENERALFUNC."end_session.php";
  include MODELS."search_record_reports_model.php";

  session_start();

  $role = define_type_tech_user();

  if (search_state_user($_SESSION["technical_user"][0],$_SESSION["technical_user"][2],$_SESSION["technical_user"][4],$role))
  {
    $final_array = array();

    if ($role == 3)
    {
      $result_search = search_pump_reports($_SESSION["technical_user"][4]);
      $result_search_length = count($result_search);
      for ($i=0; $i < $result_search_length ; $i++)
      {
        $result_search_cd = search_names_city_and_department_by_ids($result_search[$i][5],$result_search[$i][4]);
        $result_search_client = search_client_by_id($result_search[$i][6]);

        array_push($final_array,[
          "serialNumber" => $result_search[$i][0],
          "startTime" => $result_search[$i][1],
          "endTime" => $result_search[$i][2],
          "date_general" => $result_search[$i][3],
          "department" => $result_search_cd[0][1],
          "city" => $result_search_cd[0][0],
          "client" => $result_search_client,
          "address" => $result_search[$i][7],
          "observations" => $result_search[$i][8]
        ]);
      }
    }
    else if($role == 1)
    {
      $result_search = search_electrical_reports($_SESSION["technical_user"][4]);
      $result_search_length = count($result_search);
      for ($i=0; $i < $result_search_length ; $i++)
      {
        $result_search_cd = search_names_city_and_department_by_ids($result_search[$i][5],$result_search[$i][4]);
        $result_search_client = search_client_by_id($result_search[$i][6]);

        array_push($final_array,[
          "serialNumber" => $result_search[$i][0],
          "startTime" => $result_search[$i][1],
          "endTime" => $result_search[$i][2],
          "date_general" => $result_search[$i][3],
          "department" => $result_search_cd[0][1],
          "city" => $result_search_cd[0][0],
          "client" => $result_search_client,
          "address" => $result_search[$i][7],
          "observations" => $result_search[$i][8]
        ]);
      }

    }
    else if($role == 2)
    {
      $result_search = search_air_reports($_SESSION["technical_user"][4]);
      $result_search_length = count($result_search);
      for ($i=0; $i < $result_search_length ; $i++)
      {
        $result_search_cd = search_names_city_and_department_by_ids($result_search[$i][5],$result_search[$i][4]);
        $result_search_client = search_client_by_id($result_search[$i][6]);

        array_push($final_array,[
          "serialNumber" => $result_search[$i][0],
          "startTime" => $result_search[$i][1],
          "endTime" => $result_search[$i][2],
          "date_general" => $result_search[$i][3],
          "department" => $result_search_cd[0][1],
          "city" => $result_search_cd[0][0],
          "client" => $result_search_client,
          "address" => $result_search[$i][7],
          "observations" => $result_search[$i][8]
        ]);
      }
    }
    echo json_encode($final_array);
  }
  else
  {
  	end_session();
    echo "Redirigir";
  }
