<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."delete_provider_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."end_session.php";

session_start();


if (search_state_user($_SESSION["Cellar_user"][4],$_SESSION["Cellar_user"][3],$_SESSION["Cellar_user"][0]))
{
  $msn = "";
  $TokenDelete = $_POST["data"][0]["tokenToDelete"];

  $resultDel = delete_provider_by_token($TokenDelete);
  if ($resultDel)
  {
    $msn = "Registro de proveedor eliminado con exito.";
  }
  else
  {
    $msn = "No es posible eliminar el registro del proveedor seleccionado.\nPara eliminar un proveedor no deben existir productos asociados a este.";
  }
  echo json_encode($msn);
}
else
{
	end_session();
  echo "Redirigir";
}
