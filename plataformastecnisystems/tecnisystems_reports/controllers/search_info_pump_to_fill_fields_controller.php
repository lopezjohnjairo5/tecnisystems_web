<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include "../general_functions/delete_special_chars.php";
  include "../general_functions/search_state_user.php";
  include MODELS."search_info_pump_to_fill_fields_model.php";
  include GENERALFUNC."end_session.php";

  session_start();

  if (search_state_user($_SESSION["technical_user"][0],$_SESSION["technical_user"][2],$_SESSION["technical_user"][4],3))
  {
    $serial_element = $_POST["serial_element"];
    $result_search = search_info_pump_by_serial($serial_element);
    if ($result_search)
    {
      echo json_encode($result_search);
    }
    else
    {
      echo "Not_found";
    }
  }
  else
  {
    end_session();
    echo "Redirigir";
  }
