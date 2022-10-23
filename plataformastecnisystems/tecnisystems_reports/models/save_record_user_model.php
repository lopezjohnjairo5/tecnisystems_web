<?php
	include CORE."conection.php";

	function search_state_user($token_user, $email_user, $id_user)
	{
		$conn = Conect_bd("reports");
    $id_state_user;

		try
		{
			$query = "SELECT `idStateUser` FROM technical_users WHERE userToken = '".$token_user."' AND Email = '".$email_user."' AND idTechnicalUser = '".$id_user."';";
			$result = $conn->query($query);

      foreach ($result as $item)
			{
				$id_state_user = $item["idStateUser"];
			}

			Disconect_bd($result,$conn);

			if($id_state_user == 1)
			{
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


  function insert_lat_lon($lat,$lon)
	{
    $conn = Conect_bd("records");
    $id_location_report;

		try
		{
			$query = "INSERT INTO `location_records` ( `Latitude`, `Longitude`) VALUES ('".$lat."', '".$lon."') ;";
      $conn->query($query);

			Disconect_bd($result,$conn);
			return true;

		}
		catch (Exception $e)
		{
			return false;
		}
  }


  function search_lat_long($lat,$lon)
	{
    $conn = Conect_bd("records");
    $id_location_record;

		try
		{
			$query = "SELECT `idLocationRecord` FROM location_records WHERE Latitude = '".$lat."' AND Longitude = '".$lon."' ;";
			$result = $conn->query($query);

      foreach ($result as $item)
			{
				$id_location_record = $item["idLocationRecord"];
			}

			Disconect_bd($result,$conn);
			return $id_location_record;
		}
		catch (Exception $e)
		{
			return "false";
		}
  }


  function insert_record($record,$dateRecord,$timeRecord,$idLocationRecord, $idTechnicalUser,$idTypeUser)
	{
    $conn = Conect_bd("records");

		try
		{
			$query = "INSERT INTO `records` ( `Record`,`dateRecord`,`timeRecord`,`idLocationRecord`, `idUser`, `idTypeUser`) VALUES ('".$record."','".$dateRecord."','".$timeRecord."',".$idLocationRecord.",".$idTechnicalUser.",".$idTypeUser.") ;";
      $conn->query($query);

			Disconect_bd($result,$conn);
			return true;

		}
		catch (Exception $e)
		{
			return false;
		}
  }
