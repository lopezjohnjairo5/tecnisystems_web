<?php
	include CORE."conection.php";

	function search_token_db($token)
	{
	    $conn = Conect_bd("clients");
	    $id_client = 0;

	    try
			{
		    $query = "SELECT idClientInfo FROM clients_info WHERE tokenClient = '".$token."';";
				$sql = $conn->prepare($query);
		    $sql->execute();

		    foreach ($sql as $item)
				{
		      $id_client = $item["idClientInfo"];
		    }
	      Disconect_bd($result,$conn);
	      return $id_client;
	    }
			catch (Exception $e)
			{
	      return false;
	    }
	}

	function search_ids_asociate_address($idClient)
	{
	    $conn = Conect_bd("clients");
	    $id_address = array();

	    try
			{
		    $query = "SELECT idGeneralCostumerInfo FROM clients_costumers_info WHERE idClientInfo = ".$idClient.";";
				$sql = $conn->prepare($query);
		    $sql->execute();

		    foreach ($sql as $item)
				{
		      array_push($id_address, $item["idGeneralCostumerInfo"]);
		    }

	      Disconect_bd($result,$conn);
	      return $id_address;

	    }
			catch (Exception $e)
			{
	      return false;
	    }
	}


	function delete_asociate_machine_client_pass_table($idClient)
	{
		$conn = Conect_bd("clients");
		$id_client = array();

		try
		{
			$query = "DELETE FROM client_machine WHERE idClient = ".$idClient.";";
			$sql = $conn->prepare($query);
			$sql->execute();

			Disconect_bd($result,$conn);
			return true;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function delete_asociate_address_client($idElement)
	{
		$conn = Conect_bd("clients");
		$id_client = array();

		try
		{
			$query = "DELETE FROM general_customer_information WHERE idGeneralCustomerInformation = ".$idElement.";";
			$sql = $conn->prepare($query);
			$sql->execute();

			Disconect_bd($result,$conn);
			return true;
		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function delete_asociate_address_client_pass_table($idClient)
	{
		$conn = Conect_bd("clients");
		$id_client = array();

		try
		{
			$query = "DELETE FROM clients_costumers_info WHERE idClientInfo = ".$idClient.";";
			$sql = $conn->prepare($query);
			$sql->execute();

			Disconect_bd($result,$conn);
			return true;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function update_clients_info($info_update_array)
	{
    $conn = Conect_bd("clients");

    try
		{
      $query = "UPDATE clients_info
      SET
      `documentClient`= :documentClient,
      `nameClient`= :nameClient,
      `emailClient`= :emailClient,
      `phoneClient`= :phoneClient,
      `alternativePhoneClient`= :alternativePhoneClient,
      `personInCharge`= :personInCharge,
      `clientFirmPath`= :clientFirmPath
      WHERE `idClientInfo` = :idClientInfo";

      $sql = $conn->prepare($query);

      $sql->bindParam(":idClientInfo",$info_update_array[0],PDO::PARAM_INT);
      $sql->bindParam(":documentClient",$info_update_array[1],PDO::PARAM_INT);
      $sql->bindParam(":nameClient",$info_update_array[2],PDO::PARAM_STR);
      $sql->bindParam(":emailClient",$info_update_array[3],PDO::PARAM_STR);
      $sql->bindParam(":phoneClient",$info_update_array[4],PDO::PARAM_STR);
      $sql->bindParam(":alternativePhoneClient",$info_update_array[5],PDO::PARAM_STR);
      $sql->bindParam(":personInCharge",$info_update_array[6],PDO::PARAM_STR);
      $sql->bindParam(":clientFirmPath",$info_update_array[7],PDO::PARAM_STR);

      $sql->execute();
      if ($sql->rowCount() > 0)
			{
        Disconect_bd($result,$conn);
        return true;
      }
			else
			{
        return false;
      }

    }
		catch (Exception $e)
		{
      return false;
    }
  }
