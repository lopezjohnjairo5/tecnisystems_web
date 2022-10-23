<?php
include CORE."conection.php";

function search_info_air_by_serial($serialP)
{
  $conn = Conect_bd("cellar");
  $array_info_air = array();

  try
  {
    $query = "SELECT cgip.`Brand`, cgip.`Product`, cacp.`idAirConditioningTypes`, cacp.`capacity` FROM cellar_general_info_products cgip, cellar_air_conditioning_products cacp WHERE cgip.idCellarGeneralInfoProduct = cacp.idCellarGeneralInfoProduct AND cgip.serialProduct = '".$serialP."' AND cgip.idTypeProduct = 2 ;";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_info_air,[
        "Brand" => $item["Brand"],
        "Product" => $item["Product"],
        "idAirConditioningTypes" => $item["idAirConditioningTypes"],
        "capacity" => $item["capacity"]
      ]);
    }

    Disconect_bd($result,$conn);
    return $array_info_air;
  }
  catch (Exception $e)
  {
    return false;
  }
}
