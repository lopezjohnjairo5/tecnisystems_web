<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include "../general_functions/delete_special_chars.php";
  include "../general_functions/search_state_user.php";
  include "../general_functions/define_tipe_technical_user.php";
  include MODELS."search_info_client_to_fill_model.php";
  include GENERALFUNC."end_session.php";
  session_start();

  $role = define_type_tech_user();

  if (search_state_user($_SESSION["technical_user"][0],$_SESSION["technical_user"][2],$_SESSION["technical_user"][4],$role))
  {
    $nit_client = $_POST["nit_client"];
    $result_search = search_info_client_by_nit($nit_client);

    if($result_search)
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
