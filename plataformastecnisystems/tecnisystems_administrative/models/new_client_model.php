<?php
	include CORE."conection.php";

	function insert_new_clients_info ($content)
	{
		$conn = Conect_bd("clients");
		$stateClient = 1;

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `clients_info` (`tokenClient`, `documentClient`, `nameClient`, `emailClient`, `phoneClient`, `alternativePhoneClient`, `clientFirmPath`, `personInCharge`, `idStateClient`) VALUES ( :tokenClient, :documentClient, :nameClient, :emailClient, :phoneClient, :alternativePhoneClient, :clientFirmPath, :personInCharge, :idStateClient)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':tokenClient',$content[0],PDO::PARAM_STR);
			$sql->bindParam(':documentClient',$content[1],PDO::PARAM_INT);
			$sql->bindParam(':nameClient',$content[2],PDO::PARAM_STR);
			$sql->bindParam(':emailClient',$content[3],PDO::PARAM_STR);
			$sql->bindParam(':phoneClient',$content[4],PDO::PARAM_STR);
			$sql->bindParam(':alternativePhoneClient',$content[5],PDO::PARAM_STR);
			$sql->bindParam(':clientFirmPath',$content[6],PDO::PARAM_STR);
			$sql->bindParam(':personInCharge',$content[7],PDO::PARAM_STR);
			$sql->bindParam(':idStateClient',$stateClient,PDO::PARAM_INT);

			$sql->execute();

			$id = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id;

		}
		catch(Exception $e)
		{
			$conn->rollBack();
			return false;
		}
	}
