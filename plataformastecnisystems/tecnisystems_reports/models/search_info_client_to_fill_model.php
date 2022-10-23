<?php
include CORE."conection.php";

function search_info_client_by_nit($nitClient)
{
  $conn = Conect_bd("clients");
  $array_info_client = array();

  try
  {
    $query = "SELECT `nameClient`,`emailClient`,`phoneClient` FROM clients_info WHERE documentClient = ".$nitClient.";";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_info_client,[
        "name" => $item["nameClient"],
        "email" => $item["emailClient"],
        "phone" => $item["phoneClient"]
      ]);
    }

    Disconect_bd($result,$conn);
    return $array_info_client;
  }
  catch (Exception $e)
  {
    return false;
  }
}
