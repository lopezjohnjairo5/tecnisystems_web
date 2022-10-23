<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."edit_product_search_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."end_session.php";

session_start();
if (search_state_user($_SESSION["Cellar_user"][4],$_SESSION["Cellar_user"][3],$_SESSION["Cellar_user"][0]))
{
  $idEdit = $_POST["data"][0]["idToEdit"];
  $typeProd = $_POST["data"][0]["typeP"];
  $arrayG = array();

  if ($typeProd == 1)
  {
    $arrayInfoGeneral = search_info_general_products_by_id($idEdit);
    $arrayCellarElectricP = search_info_cellar_electric_products_by_id($idEdit);
    $arrayCellarAmountRefElectricP = search_info_cellar_amount_electric_products_by_id($arrayCellarElectricP[0]["idAmountReferenceElectricProducts"]);

    array_push($arrayG,[
      "arrayInfoGeneral" => $arrayInfoGeneral,
      "arrayCellarElectricP" => $arrayCellarElectricP,
      "arrayCellarAmountRefElectricP" => $arrayCellarAmountRefElectricP
    ]);

  }
  else if ($typeProd == 2)
  {
    $arrayInfoGeneral = search_info_general_products_by_id($idEdit);
    $arrayCellarAirC = search_info_cellar_air_products_by_id($idEdit);

    array_push($arrayG,[
      "arrayInfoGeneral" => $arrayInfoGeneral,
      "arrayCellarAirC" => $arrayCellarAirC
    ]);

  }
  else
  {
    $arrayInfoGeneral = search_info_general_products_by_id($idEdit);
    $arrayCellarPumpsP = search_info_cellar_pumps_products_by_id($idEdit);

    array_push($arrayG,[
      "arrayInfoGeneral" => $arrayInfoGeneral,
      "arrayCellarPumpsP" => $arrayCellarPumpsP
    ]);

  }

  echo json_encode($arrayG);

}
else
{
    end_session();
    echo "Redirigir";
}
