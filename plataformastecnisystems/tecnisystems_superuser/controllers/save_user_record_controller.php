<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."save_record_user_model.php";
  include GENERALFUNC."end_session.php";

  $date = $_POST["data"][0]["date_time"][0]["date"];
  $time = $_POST["data"][0]["date_time"][0]["time"];
  $lat = $_POST["data"][0]["position_coords"][0]["lat"];
  $lon = $_POST["data"][0]["position_coords"][0]["lon"];
  $content = $_POST["data"][0]["content"];

  session_start();

  if(search_state_user($_SESSION["superUser"][0],$_SESSION["superUser"][2],$_SESSION["superUser"][4]))
  {
    if (empty($lat) || empty($lon))
    {
      $lat = "denegado";
      $lon = "denegado";
    }

    $id_lat_lon = search_lat_long($lat,$lon);

    if(!$id_lat_lon)
    {
      insert_lat_lon($lat,$lon);
      $id_lat_lon = search_lat_long($lat,$lon);
    }

    $id = $_SESSION["superUser"][4];

    if (insert_record($content,$date,$time,$id_lat_lon, $id, 4))
    {
      echo "\nRegistro insertado correctamente";
    }
    else
    {
      echo "\nProblemas al insertar el registro";
    }
  }
  else
  {
  	end_session();
    echo "Redirigir";
  }
