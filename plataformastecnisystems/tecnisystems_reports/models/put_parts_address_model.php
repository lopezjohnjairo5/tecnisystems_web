<?php
	include CORE."conection.php";

  function search_address_by_id($id)
	{
    $conn = Conect_bd("clients");
    $array_info_address_client = array();

    try
		{
      $query = "SELECT idDepartment, idCity, Address
      FROM general_customer_information
      WHERE idGeneralCustomerInformation = ".$id.";";

      $result = $conn->query($query);

      foreach ($result as $item)
			{
        array_push($array_info_address_client,
          [ "idDepartment" => $item["idDepartment"],
           "idCity" => $item["idCity"],
           "Address" => $item["Address"]]
          );
      }

      Disconect_bd($result,$conn);
      return $array_info_address_client;
    }
		catch (Exception $e)
		{
      return false;
    }
  }
