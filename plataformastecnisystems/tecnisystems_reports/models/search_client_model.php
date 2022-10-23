<?php
include CORE."conection.php";

function search_client_info($search,$typeMachine)
{
  $conn = Conect_bd("clients");
  $array_info_valid_client = array();

  try
  {
    $query = "SELECT DISTINCTROW ci.`idClientInfo`, ci.`tokenClient`, ci.`nameClient`
    FROM clients_info ci, client_machine cm
    WHERE ci.`nameClient` LIKE '%".$search."%' AND ci.`idStateClient` = 1 AND cm.`idTypeMachine` = ".$typeMachine." AND ci.`idClientInfo` = cm.`idClient`
    OR ci.`personInCharge` LIKE '%".$search."%' AND ci.`idStateClient` = 1 AND cm.`idTypeMachine` = ".$typeMachine." AND ci.`idClientInfo` = cm.`idClient`;";

    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_info_valid_client, [
        "idClientInfo" => $item["idClientInfo"],
        "tokenClient" => $item["tokenClient"],
        "nameClient" => $item["nameClient"]]);
    }

    Disconect_bd($result,$conn);
    return $array_info_valid_client;

  }
  catch (Exception $e)
  {
    return false;
  }

}
