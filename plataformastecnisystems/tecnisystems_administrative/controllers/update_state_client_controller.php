<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."update_state_client_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."end_session.php";

session_start();

if (search_state_user($_SESSION["administrative_user"][0],$_SESSION["administrative_user"][2],$_SESSION["administrative_user"][4]))
{
  $token = $_POST["token"];
  $state = $_POST["state"];

  $resultUpdateState = update_state_clients($token,$state);
  if ($resultUpdateState)
  {
    echo "Correct";
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
