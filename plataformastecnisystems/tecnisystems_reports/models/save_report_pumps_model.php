<?php
	include CORE."conection.php";

	function insert_pumps_reports_aditional_info($array_elements)
	{
		$id_prai = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `pumps_reports_aditional_info` (`controlPanel`, `protection`, `hydroTank`, `workPressure`, `preload`, `electricFloat`, `hydraulicPart`, `idCellarGeneralInfoProduct`) VALUES (:controlPanel, :protection, :hydroTank, :workPressure, :preload, :electricFloat, :hydraulicPart, :idCellarGeneralInfoProduct)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':controlPanel',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':protection',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':hydroTank',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':workPressure',$array_elements[3],PDO::PARAM_STR);
			$sql->bindParam(':preload',$array_elements[4],PDO::PARAM_STR);
			$sql->bindParam(':electricFloat',$array_elements[5],PDO::PARAM_STR);
			$sql->bindParam(':hydraulicPart',$array_elements[6],PDO::PARAM_STR);
			$sql->bindParam(':idCellarGeneralInfoProduct',$array_elements[7],PDO::PARAM_INT);

			$sql->execute();

			$id_prai = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_prai;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_pumps_reports_pumps_aditional($array_elements)
	{
		$id_prpa = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `pumps_reports_pumps_aditional` (`idPumpsReportsAditionalInfo1`,`idPumpsReportsAditionalInfo2`,`idPumpsReportsAditionalInfo3`,`idPumpsReportsAditionalInfo4`) VALUES (:idPumpsReportsAditionalInfo1, :idPumpsReportsAditionalInfo2, :idPumpsReportsAditionalInfo3, :idPumpsReportsAditionalInfo4)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':idPumpsReportsAditionalInfo1',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':idPumpsReportsAditionalInfo2',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':idPumpsReportsAditionalInfo3',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':idPumpsReportsAditionalInfo4',$array_elements[3],PDO::PARAM_INT);


			$sql->execute();

			$id_prpa = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_prpa;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_pump_report($array_elements)
	{
		$id_pr = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `pump_report` (`serialNumberReportPR`,`idClientInfo`,`idTechnicalsReportsPR`,`idGeneralInformationPR`, `idPumpsReportsPumpsAditional`) VALUES (:serialNumberReportPR, :idClientInfo, :idTechnicalsReportsPR, :idGeneralInformationPR, :idPumpsReportsPumpsAditional)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':serialNumberReportPR',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':idClientInfo',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':idTechnicalsReportsPR',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':idGeneralInformationPR',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':idPumpsReportsPumpsAditional',$array_elements[4],PDO::PARAM_INT);

			$sql->execute();

			$id_pr = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_pr;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}
