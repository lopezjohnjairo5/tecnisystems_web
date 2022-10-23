<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."search_reports_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."end_session.php";

session_start();
if (search_state_user($_SESSION["Cellar_user"][4],$_SESSION["Cellar_user"][3],$_SESSION["Cellar_user"][0]))
{
  $searchReport = $_POST["data"][0]["searchReport"];
  print_r($searchReport);
}
else
{
    end_session();
    echo "Redirigir";
}
