<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."activate_deactivate_user_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."delete_special_chars.php";
include GENERALFUNC."end_session.php";

session_start();

if (search_state_user($_SESSION["superUser"][0],$_SESSION["superUser"][2],$_SESSION["superUser"][4]))
{
  $token = $_POST["data"][0]["token"];
  $rol = $_POST["data"][0]["rol"];
  $state = $_POST["data"][0]["state"];

  if ($state == 0)
  {
    echo "content_error";
  }
  else
  {
    if ($rol == 1)
    {
        $result = update_state_technical_user(1,$state,$token);
      if ($result)
      {
        echo "correct";
      }
      else
      {
        echo "error";
      }
    }
    if ($rol == 2)
    {
      $result = update_state_technical_user(2,$state,$token);
      if ($result)
      {
        echo "correct";
      }
      else
      {
        echo "error";
      }
    }
    if ($rol == 3)
    {
      $result = update_state_technical_user(3,$state,$token);
      if ($result)
      {
        echo "correct";
      }
      else
      {
        echo "error";
      }
    }
    if ($rol == 4)
    {
      $result = update_state_administrative_user($state,$token);
      if ($result)
      {
        echo "correct";
      }
      else
      {
        echo "error";
      }
    }
    if ($rol == 5)
    {
      $result = update_state_cellar_user($state,$token);
      if ($result)
      {
        echo "correct";
      }
      else
      {
        echo "error";
      }
    }
  }
}
else
{
  echo "No hay una session activa. Redirigiendo";
	end_session();
  header('Location: '.PATH_WEB."?error=access_denied");
  die();
}
