<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."delete_product_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."end_session.php";

session_start();


if (search_state_user($_SESSION["Cellar_user"][4],$_SESSION["Cellar_user"][3],$_SESSION["Cellar_user"][0]))
{
  $idDelete = $_POST["data"][0]["idToDelete"];

  $idAmountREP = intval(search_electrical_id_product_by_id_general($idDelete));

  $stateDelAir = delete_product_by_id($idDelete,"cellar_air_conditioning_products");
  $stateDelPumps = delete_product_by_id($idDelete,"cellar_pumps_products");
  $stateDelElectric = delete_product_by_id($idDelete,"cellar_electric_products");
  $stateDelGeneralP = delete_general_info_product_by_id($idDelete);
  $stateDelAmountElectric = delete_amount_product_by_id($idAmountREP);

  if ($stateDelAir && $stateDelPumps && $stateDelElectric && $stateDelGeneralP)
  {
    $msn = "Producto eliminado con exito.";
  }
  else
  {
    $msn = "problema al eliminar el producto. Verifique e intente nuevamente";
  }
  echo json_encode($msn);
}
else
{
    end_session();
    echo "Redirigir";
}
