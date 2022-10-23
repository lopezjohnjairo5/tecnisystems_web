<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."search_machine_models.php";
  include GENERALFUNC."delete_special_chars.php";
  include GENERALFUNC."end_session.php";

  session_start();

  $search = filter_var($_POST['search_machine'],FILTER_SANITIZE_SPECIAL_CHARS);
  $type_technical = 0;

  if (isset($_SESSION["technical_user"][3]))
  {
    if ($_SESSION["technical_user"][3] == "técnico eléctrico")
    {
      $type_technical = 1;
    }
    else if ($_SESSION["technical_user"][3] == "técnico aire acondicionado")
    {
      $type_technical = 2;
    }
    else if ($_SESSION["technical_user"][3] == "técnico motobombas")
    {
      $type_technical = 3;
    }

    if (strtolower($search) == "todo" || strtolower($search) == "t")
    {
      $contentSearch = search_all_machines($type_technical);
      echo json_encode($contentSearch);
    }
    else
    {
      $contentSearch = search_machine_by_serial($type_technical,$search);
      echo json_encode($contentSearch);
    }

  }
  else
  {
    echo "No hay una session activa. Redirigiendo";
  	end_session();
    header('Location: '.PATH_WEB."?error=access_denied");
    die();
  }
