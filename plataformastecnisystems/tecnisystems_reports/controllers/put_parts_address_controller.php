<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include "../general_functions/search_state_user.php";
  include "../general_functions/define_tipe_technical_user.php";
  include "../general_functions/search_ids_dep_city.php";
  include MODELS."put_parts_address_model.php";
  include GENERALFUNC."end_session.php";

  session_start();

  $role = define_type_tech_user();

  if( search_state_user($_SESSION["technical_user"][0],$_SESSION["technical_user"][2],$_SESSION["technical_user"][4],$role) )
  {
    $array_result = search_address_by_id($_POST["search"]);
    if($array_result)
    {
      $depAndCityInfo = search_tk_city_and_dept_by_id($array_result[0]["idCity"], $array_result[0]["idDepartment"]);

      $returnArray = [
        "dept" => $depAndCityInfo[0]["dept"],
        "city" => $depAndCityInfo[0]["city"],
        "deptTk" => $depAndCityInfo[0]["tokenDept"],
        "cityTk" => $depAndCityInfo[0]["tokenCity"],
        "addr" => $array_result[0]["Address"]
      ];
      echo json_encode($returnArray);
    }

  }
  else 
  {
  	end_session();
    echo "Redirigir";
  }
