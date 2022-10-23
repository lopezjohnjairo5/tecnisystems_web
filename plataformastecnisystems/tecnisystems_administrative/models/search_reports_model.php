<?php
	include CORE."conection.php";

	function search_general_info_by_multiple_info($info,$type)
	{
		$conn = Conect_bd("reports");
		$array_report_general_info = array();

		try
		{
			switch ($type)
			{
				case 1:
					$query = "SELECT idGeneralInformation, date_general, department, city, address, idClient FROM general_information WHERE date_general = '".$info."' ORDER BY idGeneralInformation DESC;";
					break;

				case 2:
					$query = "SELECT idGeneralInformation, date_general, department, city, address, idClient FROM general_information WHERE department = ".$info." ORDER BY idGeneralInformation DESC;";
					break;

				case 3:
					$query = "SELECT idGeneralInformation, date_general, department, city, address, idClient FROM general_information WHERE city = ".$info." ORDER BY idGeneralInformation DESC;";
					break;

				case 4:
					$query = "SELECT idGeneralInformation, date_general, department, city, address, idClient FROM general_information WHERE idGeneralInformation = ".$info." ORDER BY idGeneralInformation DESC;";
					break;

				case 5:
					$query = "SELECT idGeneralInformation, date_general, department, city, address, idClient FROM general_information WHERE idClient = ".$info." ORDER BY idGeneralInformation DESC;";
					break;
			}

			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_report_general_info,[
					"idGeneralInformation" => $item["idGeneralInformation"],
					"date_general" => $item["date_general"],
					"department" => $item["department"],
					"city" => $item["city"],
					"address" => $item["address"],
					"idClient" => $item["idClient"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_general_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_all_electrical_reports()
	{
		$conn = Conect_bd("reports");
		$array_all_report_electrical_info = array();

		try
		{
			$query = "SELECT DISTINCTROW er.idGeneralInformationER, er.idElectricalReport, er.serialNumberER, er.idTechnicalsReportsER, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM electrical_reports er, technicals_reports tr WHERE er.idTechnicalsReportsER = tr.idTechnicalsReports ORDER BY er.idElectricalReport DESC;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_all_report_electrical_info,[
					"idGeneralInfo" => $item["idGeneralInformationER"],
					"idReport" => $item["idElectricalReport"],
					"serialNumber" => $item["serialNumberER"],
					"idTechnicalsReports" => $item["idTechnicalsReportsER"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_all_report_electrical_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_electrical_reports_info_by_general_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_electrical_info = array();

		try
		{
			$query = "SELECT DISTINCTROW er.idElectricalReport, er.serialNumberER, er.idTechnicalsReportsER, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM electrical_reports er, technicals_reports tr WHERE er.idGeneralInformationER = ".$id." AND er.idTechnicalsReportsER = tr.idTechnicalsReports;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_report_electrical_info,[
					"idReport" => $item["idElectricalReport"],
					"serialNumber" => $item["serialNumberER"],
					"idTechnicalsReports" => $item["idTechnicalsReportsER"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_electrical_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_electrical_reports_info_by_serial($serial)
	{
		$conn = Conect_bd("reports");
		$array_report_electrical_info = array();

		try
		{
			$query = "SELECT DISTINCTROW er.idGeneralInformationER, er.idElectricalReport, er.serialNumberER, er.idTechnicalsReportsER, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM electrical_reports er, technicals_reports tr WHERE er.serialNumberER = '".$serial."' AND er.idTechnicalsReportsER = tr.idTechnicalsReports;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($array_report_electrical_info,[
					"idGeneralInfo" => $item["idGeneralInformationER"],
					"idReport" => $item["idElectricalReport"],
					"serialNumber" => $item["serialNumberER"],
					"idTechnicalsReports" => $item["idTechnicalsReportsER"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_electrical_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_all_pumps_reports()
	{
		$conn = Conect_bd("reports");
		$array_all_report_pump_info = array();

		try
		{
			$query = "SELECT DISTINCTROW pr.idGeneralInformationPR, pr.idPumpReport, pr.serialNumberReportPR, pr.idTechnicalsReportsPR, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM pump_report pr, technicals_reports tr WHERE pr.idTechnicalsReportsPR = tr.idTechnicalsReports ORDER BY pr.idPumpReport DESC;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_all_report_pump_info,[
					"idGeneralInfo" => $item["idGeneralInformationPR"],
					"idReport" => $item["idPumpReport"],
					"serialNumber" => $item["serialNumberReportPR"],
					"idTechnicalsReports" => $item["idTechnicalsReportsPR"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_all_report_pump_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_pumps_reports_info_by_general_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_pump_info = array();

		try
		{
			$query = "SELECT DISTINCTROW pr.idPumpReport, pr.serialNumberReportPR, pr.idTechnicalsReportsPR, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM pump_report pr, technicals_reports tr WHERE pr.idGeneralInformationPR = ".$id." AND pr.idTechnicalsReportsPR = tr.idTechnicalsReports;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_report_pump_info,[
					"idReport" => $item["idPumpReport"],
					"serialNumber" => $item["serialNumberReportPR"],
					"idTechnicalsReports" => $item["idTechnicalsReportsPR"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_pump_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_pumps_reports_info_by_serial($serial)
	{
		$conn = Conect_bd("reports");
		$array_report_pump_info = array();

		try
		{
			$query = "SELECT DISTINCTROW pr.idGeneralInformationPR, pr.idPumpReport, pr.serialNumberReportPR, pr.idTechnicalsReportsPR, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM pump_report pr, technicals_reports tr WHERE pr.serialNumberReportPR = '".$serial."' AND pr.idTechnicalsReportsPR = tr.idTechnicalsReports;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($array_report_pump_info,[
					"idGeneralInfo" => $item["idGeneralInformationPR"],
					"idReport" => $item["idPumpReport"],
					"serialNumber" => $item["serialNumberReportPR"],
					"idTechnicalsReports" => $item["idTechnicalsReportsPR"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_pump_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_all_air_reports()
	{
		$conn = Conect_bd("reports");
		$array_all_air_pump_info = array();

		try
		{
			$query = "SELECT DISTINCTROW ar.idGeneralInformation, ar.idAirReport, ar.serialNumberReport, ar.idTechnicalsReports, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM air_report ar, technicals_reports tr WHERE ar.idTechnicalsReports = tr.idTechnicalsReports ORDER BY ar.idAirReport DESC;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_all_air_pump_info,[
					"idGeneralInfo" => $item["idGeneralInformation"],
					"idReport" => $item["idAirReport"],
					"serialNumber" => $item["serialNumberReport"],
					"idTechnicalsReports" => $item["idTechnicalsReports"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_all_air_pump_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_air_reports_info_by_general_info($id)
	{
		$conn = Conect_bd("reports");
		$array_air_pump_info = array();

		try
		{
			$query = "SELECT DISTINCTROW ar.idAirReport, ar.serialNumberReport, ar.idTechnicalsReports, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM air_report ar, technicals_reports tr WHERE ar.idGeneralInformation = ".$id." AND ar.idTechnicalsReports = tr.idTechnicalsReports;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_air_pump_info,[
					"idReport" => $item["idAirReport"],
					"serialNumber" => $item["serialNumberReport"],
					"idTechnicalsReports" => $item["idTechnicalsReports"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_air_pump_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_air_reports_info_by_serial($serial)
	{
		$conn = Conect_bd("reports");
		$array_air_pump_info = array();

		try
		{
			$query = "SELECT DISTINCTROW ar.idGeneralInformation, ar.idAirReport, ar.serialNumberReport, ar.idTechnicalsReports, tr.idTechnicalUser1, tr.idTechnicalUser2, tr.idTechnicalUser3 FROM air_report ar, technicals_reports tr WHERE ar.serialNumberReport = '".$serial."' AND ar.idTechnicalsReports = tr.idTechnicalsReports;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_air_pump_info,[
					"idGeneralInfo" => $item["idGeneralInformation"],
					"idReport" => $item["idAirReport"],
					"serialNumber" => $item["serialNumberReport"],
					"idTechnicalsReports" => $item["idTechnicalsReports"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_air_pump_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function search_technical_by_id($id)
	{
		$conn = Conect_bd("reports");
		$technical_name = "";

		try
		{
			$query = "SELECT TechnicalUser FROM technical_users WHERE idTechnicalUser = ".$id.";";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        $technical_name = $item["TechnicalUser"];
			}
			Disconect_bd($result,$conn);
			return $technical_name;
		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_info_client_by_id($id)
	{
		$conn = Conect_bd("clients");
		$array_client_info = array();

		try
		{
			$query = "SELECT nameClient, personInCharge FROM clients_info WHERE idClientInfo = ".$id.";";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_client_info,[
					"nameClient" => $item["nameClient"],
					"personInCharge" => $item["personInCharge"]
				]);
			}

			Disconect_bd($result,$conn);
			return $array_client_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_info_client_by_name($name)
	{
		$conn = Conect_bd("clients");
		$array_client_info = array();

		try
		{
			$query = "SELECT DISTINCTROW idClientInfo, nameClient, personInCharge FROM clients_info WHERE nameClient LIKE '%".$name."%' OR personInCharge LIKE '%".$name."%' ;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
        array_push($array_client_info,[
					"idClientInfo" => $item["idClientInfo"],
					"nameClient" => $item["nameClient"],
					"personInCharge" => $item["personInCharge"]
				]);
			}

			Disconect_bd($result,$conn);
			return $array_client_info;

		}
		catch (Exception $e)
		{
			return false;
		}
	}
