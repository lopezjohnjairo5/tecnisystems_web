<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."search_client_model.php";
  include GENERALFUNC."search_state_user.php";
  include GENERALFUNC."search_by_location.php";
	include GENERALFUNC."end_session.php";

  session_start();

  if (search_state_user($_SESSION["administrative_user"][0],$_SESSION["administrative_user"][2],$_SESSION["administrative_user"][4]))
  {
    $array_address_client = [];
    $array_type_machines_client = [];
    $array_final_client = [];

    $search = strtolower($_POST["data"][0]["search"]);
    $term = explode(":",$search);

    if (isset($search) && !empty($search))
    {
      if (count($term) > 1)
      {
        $term = [trim($term[0]),trim($term[1])];

        if ($term[0] == 'n' or $term[0] == "nit")
        {
          $array_client_general_info = search_clients_by_nit($term[1]);

          $final_array = create_final_array($array_client_general_info);
          if ($final_array)
          {
            echo json_encode($final_array);
          }
          else
          {
            echo "Error";
          }

        }
        elseif ($term[0] == 'tel' or $term[0] == "telefono")
        {
          $array_client_general_info = search_clients_by_phone($term[1]);
          $final_array = create_final_array($array_client_general_info);
          if ($final_array)
          {
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
        if ($search == 't' or $search == "todos")
        {
          $array_client_general_info = search_all_clients_info();
          $final_array = create_final_array($array_client_general_info);
          if ($final_array)
          {
            echo json_encode($final_array);
          }
          else
          {
            echo "Error";
          }

        }
        else
        {
          $array_client_general_info = search_clients_by_info($search);
          $final_array = create_final_array($array_client_general_info);
          if ($final_array)
          {
            echo json_encode($final_array);
          }
          else
          {
            echo "Error";
          }
        }
      }
    }

  }
  else
  {
    end_session();
    echo "Redirigir";
  }

function create_only_text_address($content)
{
  $final_text = "";

  $content_length = count($content);
  for ($i=0; $i < $content_length; $i++)
  {
    $depCity = search_city_and_department_by_id($content[$i]["idCity"],$content[$i]["idDepartment"]);
    $city = $depCity[0]["City"];
    $dep = $depCity[0]["Department"];
    $add = $content[$i]["Address"];

    $final_text .= $add." , ".$city." , ".$dep." <b style='color:#aaa;'>|</b> <br> ";
  }

  return $final_text;
}


function create_only_text_type_machine($content)
{
  $final_text = "";
  $content_length = count($content);
  for ($i=0; $i < $content_length; $i++)
  {
    $final_text .= $content[$i]." <b style='color:#aaa;'>|</b> <br> ";
  }

  return $final_text;
}


function create_final_array($arrayInfo)
{
  $array_final_client = [];

  if ($arrayInfo)
  {
    $arrayInfoLength = count($arrayInfo);
    for ($i=0; $i < $arrayInfoLength; $i++)
    {
      $pass_array_address = search_all_address_by_idclient($arrayInfo[$i]["idClientInfo"]);
      $pass_array_address = $pass_array_address ? create_only_text_address($pass_array_address) : "-";

      $pass_array_machine = search_all_type_machine_by_idclient($arrayInfo[$i]["idClientInfo"]);
      $pass_array_machine = $pass_array_machine ? create_only_text_type_machine($pass_array_machine) : "-";

      array_push($array_final_client, [
        "idClientInfo" => !empty($arrayInfo[$i]["idClientInfo"]) ? $arrayInfo[$i]["idClientInfo"] : "-" ,
        "tokenClient" => !empty($arrayInfo[$i]["tokenClient"]) ? $arrayInfo[$i]["tokenClient"] : "" ,
        "documentClient" => !empty($arrayInfo[$i]["documentClient"]) ? $arrayInfo[$i]["documentClient"] : "-" ,
        "nameClient" => !empty($arrayInfo[$i]["nameClient"]) ? $arrayInfo[$i]["nameClient"] : "-" ,
        "personInCharge" => !empty($arrayInfo[$i]["personInCharge"]) ? $arrayInfo[$i]["personInCharge"] : "-" ,
        "emailClient" => !empty($arrayInfo[$i]["emailClient"]) ? $arrayInfo[$i]["emailClient"] : "-" ,
        "phoneClient" => !empty($arrayInfo[$i]["phoneClient"]) ? $arrayInfo[$i]["phoneClient"] : "-" ,
        "alternativePhoneClient" => !empty($arrayInfo[$i]["alternativePhoneClient"]) ? $arrayInfo[$i]["alternativePhoneClient"] : "-" ,
        "address" => $pass_array_address,
        "typeMachine" => $pass_array_machine,
        "stateClient" => $arrayInfo[$i]["stateClient"]
      ]);
    }

    return $array_final_client;

  }
  else
  {
    return false;
  }
}
