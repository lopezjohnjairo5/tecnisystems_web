<?php
include CORE."conection.php";

function search_client_info_by_tk($tk)
{
  $conn = Conect_bd("clients");
  $array_info_bussines = array();

  try
  {
    $query = "SELECT DISTINCTROW idClientInfo, tokenClient, documentClient, nameClient, emailClient, phoneClient, alternativePhoneClient, personInCharge FROM clients_info WHERE tokenClient = '".$tk."';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_info_bussines, [
        "idClientInfo" => $item["idClientInfo"],
        "tokenClient" => $item["tokenClient"],
        "documentClient" => $item["documentClient"],
        "nameClient" => $item["nameClient"],
        "emailClient" => $item["emailClient"],
        "phoneClient" => $item["phoneClient"],
        "alternativePhoneClient" => $item["alternativePhoneClient"],
        "personInCharge" => $item["personInCharge"]]);
    }

    Disconect_bd($result,$conn);
    return $array_info_bussines;

  }
  catch (Exception $e)
  {
    return false;
  }
}


function search_client_address($idClient)
{
  $conn = Conect_bd("clients");
  $array_address_bussines = array();

  try
  {
    $query = "SELECT DISTINCTROW gci.idGeneralCustomerInformation, gci.idDepartment, gci.idCity, gci.Address FROM clients_costumers_info cci, general_customer_information gci WHERE gci.idGeneralCustomerInformation = cci.idGeneralCostumerInfo AND cci.idClientInfo = ".$idClient.";";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_address_bussines, [
        "idGeneralAddressInfo" => $item["idGeneralCustomerInformation"],
        "idDepartment" => $item["idDepartment"],
        "idCity" => $item["idCity"],
        "Address" => $item["Address"]]);
    }

    Disconect_bd($result,$conn);
    return $array_address_bussines;

  }
  catch (Exception $e)
  {
    return false;
  }
}
