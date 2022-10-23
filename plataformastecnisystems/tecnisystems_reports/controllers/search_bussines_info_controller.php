<?php
include "../config/paths.php";
include "../config/generals.php";
include "../general_functions/search_state_user.php";
include "../general_functions/search_ids_dep_city.php";
include "../general_functions/define_tipe_technical_user.php";
include MODELS."search_bussines_info_model.php";
include GENERALFUNC."end_session.php";

session_start();

$role = define_type_tech_user();

if ( search_state_user($_SESSION["technical_user"][0],$_SESSION["technical_user"][2],$_SESSION["technical_user"][4],$role) )
{
  $search = $_POST["search"];
  $final_array = array();
  $result_search = search_client_info_by_tk($search);
  if ($result_search)
  {
    $asociate_address = search_client_address($result_search[0]["idClientInfo"]);
    if ($asociate_address)
    {
      $asociate_address_length = count($asociate_address);
      for ($i=0; $i < $asociate_address_length; $i++)
      {
        $depCityPass = search_names_city_and_department_by_ids($asociate_address[$i]["idCity"],$asociate_address[$i]["idDepartment"]);
        $asociate_address[$i]["idDepartment"] = $depCityPass[0][1];
        $asociate_address[$i]["idCity"] = $depCityPass[0][0];
      }
      $final_array = [
        "idClientInfo" => $result_search[0]["idClientInfo"],
        "tokenClient" => $result_search[0]["tokenClient"],
        "documentClient" => $result_search[0]["documentClient"],
        "nameClient" => $result_search[0]["nameClient"],
        "emailClient" => $result_search[0]["emailClient"],
        "phoneClient" => $result_search[0]["phoneClient"],
        "alternativePhoneClient" => $result_search[0]["alternativePhoneClient"],
        "personInCharge" => $result_search[0]["personInCharge"],
        "address" => $asociate_address
      ];
      echo json_encode($final_array);
    }
    else
    {
      echo "Error";
    }
  }
  else
  {
    echo "Error";
  }
}
else
{
  end_session();
  echo "Redirigir";
}
