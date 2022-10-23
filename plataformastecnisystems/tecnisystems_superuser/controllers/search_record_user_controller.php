<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."search_record_user_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."delete_special_chars.php";
include GENERALFUNC."end_session.php";

session_start();

if (search_state_user($_SESSION["superUser"][0],$_SESSION["superUser"][2],$_SESSION["superUser"][4]))
{
  $token = $_POST["data"][0]["token"];
  $rol = $_POST["data"][0]["rol"];
  $record = array();

  if ($rol == 1)
  {
    $UserId = search_id_technical_users_by_token_rol(1,$token);
    $record = search_record_users_by_id($UserId,1);

    if ($record)
    {
      echo json_encode($record);
    }
    else
    {
      echo "not_found";
    }
  }

  if ($rol == 2)
  {
    $UserId = search_id_technical_users_by_token_rol(2,$token);
    $record = search_record_users_by_id($UserId,1);
    if ($record)
    {
      echo json_encode($record);
    }
    else
    {
      echo "not_found";
    }
  }

  if ($rol == 3)
  {
    $UserId = search_id_technical_users_by_token_rol(3,$token);
    $record = search_record_users_by_id($UserId,1);
    if ($record)
    {
      echo json_encode($record);
    }
    else
    {
      echo "not_found";
    }
  }

  if ($rol == 4)
  {
    $UserAdmin = search_id_administrative_users_by_token_rol($token);
    $record = search_record_users_by_id($UserAdmin,2);
    if ($record)
    {
      echo json_encode($record);
    }
    else
    {
      echo "not_found";
    }
  }

  if ($rol == 5)
  {
    $UserCellar = search_id_cellar_users_by_token_rol($token);
    $record = search_record_users_by_id($UserAdmin,3);
    if ($record)
    {
      echo json_encode($record);
    }
    else
    {
      echo "not_found";
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
