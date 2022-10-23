<?php

function search_id_client($documentClient,$emailClient)
{
    $conn = Conect_bd("clients");
    $id_client_info = "";

    try
    {
      $query = "SELECT idClientInfo FROM clients_info WHERE documentClient = ".$documentClient." AND emailClient = '".$emailClient."';";
      $result = $conn->query($query);

      foreach ($result as $item)
      {
        $id_client_info = $item['idClientInfo'];
      }

      Disconect_bd($results,$conn);
      return $id_client_info;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_client_by_id($id)
  {
      $conn = Conect_bd("clients");
      $name_client = "";

      try
      {
        $query = "SELECT nameClient FROM clients_info WHERE idClientInfo = ".$id.";";
        $result = $conn->query($query);

        foreach ($result as $item)
        {
          $name_client = $item['nameClient'];
        }

        Disconect_bd($results,$conn);
        return $name_client;

      }
      catch (Exception $e)
      {
        return false;
      }
    }

function search_id_client_by_document($document)
{
	$conn = Conect_bd("clients");
	$id_client = array();

	try
  {
		$query = "SELECT `idClientInfo` FROM clients_info WHERE `documentClient` = ".$document.";";
		$result = $conn->query($query);

		foreach ($result as $item)
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

function search_id_client_by_token($tk){
	$conn = Conect_bd("clients");
	$id_client = array();

	try{
		$query = "SELECT `idClientInfo` FROM clients_info WHERE `tokenClient` = '".$tk."';";
		$result = $conn->query($query);

		foreach ($result as $item) {
			$id_client = $item["idClientInfo"];
		}

		Disconect_bd($result,$conn);
		return $id_client;

	}catch (Exception $e){
		return false;
	}
}
