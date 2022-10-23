<?php
include CORE."conection.php";

function search_info_pump_by_serial($serialP)
{
  $conn = Conect_bd("cellar");
  $array_info_pump = array();

  try
  {
    $query = "SELECT cgip.`Brand`, cpp.`hp`, cpp.`voltage`, cpp.`amps`, cpp.`capacity` FROM cellar_general_info_products cgip, cellar_pumps_products cpp WHERE cgip.idCellarGeneralInfoProduct = cpp.idCellarGeneralInfoProduct AND cgip.serialProduct = '".$serialP."' AND cgip.idTypeProduct = 3 ;";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_info_pump,[
        "Brand" => $item["Brand"],
        "hp" => $item["hp"],
        "voltage" => $item["voltage"],
        "amps" => $item["amps"],
        "capacity" => $item["capacity"]
      ]);
    }

    Disconect_bd($result,$conn);
    return $array_info_pump;
  }
  catch (Exception $e)
  {
    return false;
  }
}
