<?php
	include CORE."conection.php";

	function search_all_clients_info()
	{
    $conn = Conect_bd("clients");
    $array_info_c = array();

    try
		{
    $query = "SELECT idClientInfo, tokenClient, documentClient, nameClient, emailClient, phoneClient, alternativePhoneClient, personInCharge, idStateClient FROM clients_info ORDER BY idClientInfo DESC;";
		$sql = $conn->prepare($query);

    $sql->execute();

    foreach ($sql as $item)
		{
      array_push($array_info_c,[
				"idClientInfo" => $item["idClientInfo"],
				"tokenClient" => $item["tokenClient"],
				"documentClient" => $item["documentClient"],
				"nameClient" => $item["nameClient"],
				"emailClient" => $item["emailClient"],
				"phoneClient" => $item["phoneClient"],
				"alternativePhoneClient" => $item["alternativePhoneClient"],
				"personInCharge" => $item["personInCharge"],
				"stateClient" => $item["idStateClient"]]);
			}

      Disconect_bd($result,$conn);
      return $array_info_c;
    }
		catch (Exception $e)
		{
      return false;
    }
  }

	function search_clients_by_nit($nitClient)
	{
    $conn = Conect_bd("clients");
    $array_info_c = array();

    try
		{
    $query = "SELECT idClientInfo, tokenClient, documentClient, nameClient, emailClient, phoneClient, alternativePhoneClient, personInCharge, idStateClient FROM clients_info WHERE documentClient = ".$nitClient." ORDER BY idClientInfo DESC;";
		$sql = $conn->prepare($query);

    $sql->execute();

    foreach ($sql as $item)
		{
      array_push($array_info_c,[
				"idClientInfo" => $item["idClientInfo"],
				"tokenClient" => $item["tokenClient"],
				"documentClient" => $item["documentClient"],
				"nameClient" => $item["nameClient"],
				"emailClient" => $item["emailClient"],
				"phoneClient" => $item["phoneClient"],
				"alternativePhoneClient" => $item["alternativePhoneClient"],
				"personInCharge" => $item["personInCharge"],
				"stateClient" => $item["idStateClient"]]);
      }

      Disconect_bd($result,$conn);
      return $array_info_c;

    }
		catch (Exception $e)
		{
      return false;
    }
  }

	function search_clients_by_phone($pClient)
	{
    $conn = Conect_bd("clients");
    $array_info_c = array();

    try
		{
	    $query = "SELECT DISTINCTROW idClientInfo, tokenClient, documentClient, nameClient, emailClient, phoneClient, alternativePhoneClient, personInCharge, idStateClient FROM clients_info WHERE phoneClient LIKE '%".$pClient."%' OR alternativePhoneClient LIKE '%".$pClient."%' ORDER BY idClientInfo DESC;";
			$sql = $conn->prepare($query);

	    $sql->execute();

	    foreach ($sql as $item) {
	      array_push($array_info_c,[
					"idClientInfo" => $item["idClientInfo"],
					"tokenClient" => $item["tokenClient"],
					"documentClient" => $item["documentClient"],
					"nameClient" => $item["nameClient"],
					"emailClient" => $item["emailClient"],
					"phoneClient" => $item["phoneClient"],
					"alternativePhoneClient" => $item["alternativePhoneClient"],
					"personInCharge" => $item["personInCharge"],
					"stateClient" => $item["idStateClient"]]);
	      }
	      Disconect_bd($result,$conn);
	      return $array_info_c;
    }
		catch (Exception $e)
		{
      return false;
    }
  }

	function search_clients_by_info($info)
	{
		$conn = Conect_bd("clients");
		$array_info_c = array();

		try
		{
			$query = "SELECT DISTINCTROW idClientInfo, tokenClient, documentClient, nameClient, emailClient, phoneClient, alternativePhoneClient, personInCharge, idStateClient FROM clients_info WHERE nameCLient LIKE '%".$info."%' OR  emailClient LIKE '%".$info."%' OR personInCharge LIKE '%".$info."%' ORDER BY idClientInfo DESC;";
			$sql = $conn->prepare($query);

			$sql->execute();

			foreach ($sql as $item)
			{
				array_push($array_info_c,[
					"idClientInfo" => $item["idClientInfo"],
					"tokenClient" => $item["tokenClient"],
					"documentClient" => $item["documentClient"],
					"nameClient" => $item["nameClient"],
					"emailClient" => $item["emailClient"],
					"phoneClient" => $item["phoneClient"],
					"alternativePhoneClient" => $item["alternativePhoneClient"],
					"personInCharge" => $item["personInCharge"],
					"stateClient" => $item["idStateClient"]]);
			}
			Disconect_bd($result,$conn);
			return $array_info_c;
		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_id_general_customer_information($idDep)
	{
		$conn = Conect_bd("clients");
		$ids_general_customer = array();

		try
		{
			$query = "SELECT idGeneralCustomerInformation FROM general_customer_information WHERE idDepartment = ".$idDep." ORDER BY idGeneralCustomerInformation DESC;";
			$sql = $conn->prepare($query);

			$sql->execute();

			foreach ($sql as $item)
			{
				array_push($ids_general_customer,$item["idGeneralCustomerInformation"]);
			}

			Disconect_bd($result,$conn);
			return $ids_general_customer;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_id_clients_costumers_info($idGeneralCustomerInfo)
	{
		$conn = Conect_bd("clients");
		$ids_clients = array();

		try
		{
			$query = "SELECT idClientInfo FROM clients_costumers_info WHERE idGeneralCostumerInfo = ".$idGeneralCustomerInfo." ORDER BY idClientInfo DESC;";
			$sql = $conn->prepare($query);

			$sql->execute();

			foreach ($sql as $item)
			{
				array_push($ids_clients,$item["idClientInfo"]);
			}
			Disconect_bd($result,$conn);
			return $ids_clients;
		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_clients_info_by_id($idClient)
	{
    $conn = Conect_bd("clients");
    $array_info_c = array();

    try
		{
	    $query = "SELECT idClientInfo, tokenClient, documentClient, nameClient, emailClient, phoneClient, alternativePhoneClient, personInCharge, idStateClient FROM clients_info
			WHERE idClientInfo = ".$idClient." ORDER BY idClientInfo DESC;";

			$sql = $conn->prepare($query);
	    $sql->execute();

	    foreach ($sql as $item)
			{
	      array_push($array_info_c,[
					"idClientInfo" => $item["idClientInfo"],
					"tokenClient" => $item["tokenClient"],
					"documentClient" => $item["documentClient"],
					"nameClient" => $item["nameClient"],
					"emailClient" => $item["emailClient"],
					"phoneClient" => $item["phoneClient"],
					"alternativePhoneClient" => $item["alternativePhoneClient"],
					"personInCharge" => $item["personInCharge"],
					"stateClient" => $item["idStateClient"]]);
	    }
	    Disconect_bd($result,$conn);
	    return $array_info_c;
    }
		catch (Exception $e)
		{
      return false;
    }
  }


	function search_all_address_by_idclient($idClient)
	{
		$conn = Conect_bd("clients");
		$array_address_info = array();

		try
		{
			$query = "SELECT gci.idDepartment, gci.idCity, gci.Address FROM clients_costumers_info cci, general_customer_information gci WHERE cci.idClientInfo = ".$idClient." AND gci.idGeneralCustomerInformation = cci.idGeneralCostumerInfo ;";
			$sql = $conn->prepare($query);
			$sql -> execute();

			foreach ($sql as $item)
			{
				array_push($array_address_info,[
					"idDepartment" => $item["idDepartment"],
					"idCity" => $item["idCity"],
					"Address" => $item["Address"]
				]);
			}

			Disconect_bd($result, $conn);
			return $array_address_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_all_type_machine_by_idclient($idClient)
	{
		$conn = Conect_bd("clients");
		$array_type_machine_info = array();

		try
		{
			$query = "SELECT tmc.typeMachineClient FROM client_machine cm, type_machine_client tmc WHERE cm.idClient = ".$idClient." AND tmc.idTypeMachineClient = cm.idTypeMachine;";
			$sql = $conn->prepare($query);

			$sql->execute();

			foreach ($sql as $item)
			{
				array_push($array_type_machine_info, $item["typeMachineClient"]);
			}
			Disconect_bd($result,$conn);
			return $array_type_machine_info;
		}
		catch (Exception $e)
		{
			return false;
		}
	}
