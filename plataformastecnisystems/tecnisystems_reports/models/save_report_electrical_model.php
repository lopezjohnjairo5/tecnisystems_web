<?php
	include CORE."conection.php";

	function search_amount_reference_electric_products($serial_electric_product)
	{
		$conn = Conect_bd("cellar");
		$id_amount = "";

		try
		{
			$query = "SELECT cep.`idAmountReferenceElectricProducts`,cgi.`idCellarGeneralInfoProduct`, cep.`idCellarGeneralInfoProduct` FROM cellar_electric_products cep, cellar_general_info_products cgi WHERE cgi.`serialProduct` = '".$serial_electric_product."' AND cgi.`idCellarGeneralInfoProduct` = cep.`idCellarGeneralInfoProduct`;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				$id_amount = $item['idAmountReferenceElectricProducts'];
			}

			Disconect_bd($result,$conn);
			return $id_amount;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function search_id_product($serial)
	{
		$conn = Conect_bd("cellar");
		$id_cellar = "";

		try
		{
			$query = "SELECT `idCellarGeneralInfoProduct` FROM cellar_general_info_products WHERE `serialProduct` = '".$serial."';";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				$id_cellar = $item['idCellarGeneralInfoProduct'];
			}

			Disconect_bd($result,$conn);
			return $id_cellar;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function update_amount_reference_electric_products($id_amount,$content)
	{
		$conn = Conect_bd("cellar");

		try
		{
			$query = "UPDATE amount_reference_electric_products SET `oilAmount`= :f_oil_amount, `oilReference` = :f_oil_reference, `fuelAmount` = :f_fuel_amount, `fuelReference` = :f_fuel_reference, `airAmount` = :f_air_amount, `airReference` = :f_air_reference, `separatorAmount` = :f_separator_amount, `separatorReference` = :f_separator_reference, `refrigerantAmount` = :t_cooling_amount, `refrigerantReference` = :t_cooling_reference, `engineOilAmount` = :t_oil_engine_amount, `engineOilReference` = :t_oil_engine_reference, `otherAmount` = :t_others_amount, `otherReference` = :t_others_reference WHERE `idAmountReferenceElectricProducts` = ".$id_amount.";";

			$sql = $conn->prepare($query);

			$sql->bindParam(':f_oil_amount',$content[0][0],PDO::PARAM_STR);
			$sql->bindParam(':f_oil_reference',$content[0][1],PDO::PARAM_STR);
			$sql->bindParam(':f_fuel_amount',$content[1][0],PDO::PARAM_STR);
			$sql->bindParam(':f_fuel_reference',$content[1][1],PDO::PARAM_STR);
			$sql->bindParam(':f_air_amount',$content[2][0],PDO::PARAM_STR);
			$sql->bindParam(':f_air_reference',$content[2][1],PDO::PARAM_STR);
			$sql->bindParam(':f_separator_amount',$content[3][0],PDO::PARAM_STR);
			$sql->bindParam(':f_separator_reference',$content[3][1],PDO::PARAM_STR);
			$sql->bindParam(':t_cooling_amount',$content[4][0],PDO::PARAM_STR);
			$sql->bindParam(':t_cooling_reference',$content[4][1],PDO::PARAM_STR);
			$sql->bindParam(':t_oil_engine_amount',$content[5][0],PDO::PARAM_STR);
			$sql->bindParam(':t_oil_engine_reference',$content[5][1],PDO::PARAM_STR);
			$sql->bindParam(':t_others_amount',$content[6][0],PDO::PARAM_STR);
			$sql->bindParam(':t_others_reference',$content[6][1],PDO::PARAM_STR);
			$sql->execute();

			if($sql->rowCount() > 0)
			{
				return true;
				Disconect_bd($result,$conn);
			}
			else
			{
				Disconect_bd($result,$conn);
				return false;
			}

			return true;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function insert_amount_reference_electric_products($content)
	{
		$conn = Conect_bd("cellar");

		try
		{
	    $conn->beginTransaction();
	    $insertSql = "INSERT INTO `amount_reference_electric_products` (`oilAmount`, `oilReference`, `fuelAmount`, `fuelReference`, `airAmount`, `airReference`, `separatorAmount`, `separatorReference`, `refrigerantAmount`, `refrigerantReference`, `engineOilAmount`, `engineOilReference`, `otherAmount`, `otherReference`) VALUES (:f_oil_amount, :f_oil_reference, :f_fuel_amount, :f_fuel_reference, :f_air_amount, :f_air_reference, :f_separator_amount, :f_separator_reference, :t_cooling_amount, :t_cooling_reference, :t_oil_engine_amount, :t_oil_engine_reference, :t_others_amount, :t_others_reference)";

	    $sql = $conn->prepare($insertSql);

			$sql->bindParam(':f_oil_amount',$content[0][0],PDO::PARAM_STR);
			$sql->bindParam(':f_oil_reference',$content[0][1],PDO::PARAM_STR);
			$sql->bindParam(':f_fuel_amount',$content[1][0],PDO::PARAM_STR);
			$sql->bindParam(':f_fuel_reference',$content[1][1],PDO::PARAM_STR);
			$sql->bindParam(':f_air_amount',$content[2][0],PDO::PARAM_STR);
			$sql->bindParam(':f_air_reference',$content[2][1],PDO::PARAM_STR);
			$sql->bindParam(':f_separator_amount',$content[3][0],PDO::PARAM_STR);
			$sql->bindParam(':f_separator_reference',$content[3][1],PDO::PARAM_STR);
			$sql->bindParam(':t_cooling_amount',$content[4][0],PDO::PARAM_STR);
			$sql->bindParam(':t_cooling_reference',$content[4][1],PDO::PARAM_STR);
			$sql->bindParam(':t_oil_engine_amount',$content[5][0],PDO::PARAM_STR);
			$sql->bindParam(':t_oil_engine_reference',$content[5][1],PDO::PARAM_STR);
			$sql->bindParam(':t_others_amount',$content[6][0],PDO::PARAM_STR);
			$sql->bindParam(':t_others_reference',$content[6][1],PDO::PARAM_STR);

	    $sql->execute();

	    $id = $conn->lastInsertId();
	    $conn->commit();
			Disconect_bd($result,$conn);
			return $id;
		}
		catch(Exception $e)
		{
		    echo $e->getMessage();
		    $conn->rollBack();
				return false;
		}
	}

	function insert_alternating_current_system($array_elements)
	{
		$id_ACS = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `alternating_current_system` (`voltmeterReview`, `frequencyMeterReview`, `ammeterReview`, `checkElectricalConnectionsAndTerminals`, `breakerReview`, `contactorsReview`, `powerCableCheck`) VALUES (:voltmeterReview, :frequencyMeterReview, :ammeterReview, :checkElectricalConnectionsAndTerminals, :breakerReview, :contactorsReview, :powerCableCheck)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':voltmeterReview',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':frequencyMeterReview',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':ammeterReview',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':checkElectricalConnectionsAndTerminals',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':breakerReview',$array_elements[4],PDO::PARAM_INT);
			$sql->bindParam(':contactorsReview',$array_elements[5],PDO::PARAM_INT);
			$sql->bindParam(':powerCableCheck',$array_elements[6],PDO::PARAM_INT);


			$sql->execute();

			$id_ACS = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_ACS;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_direct_current_system($array_elements)
	{
		$id_DCS = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `direct_current_system` (`alternatorBeltCheck`, `checkElectricalConnections`, `batteryStatusAndAcidLevelCheck`, `checkBatteryAndChargeTerminals`, `batteryChargerReview`) VALUES (:alternatorBeltCheck, :checkElectricalConnections, :batteryStatusAndAcidLevelCheck, :checkBatteryAndChargeTerminals, :batteryChargerReview)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':alternatorBeltCheck',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':checkElectricalConnections',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':batteryStatusAndAcidLevelCheck',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':checkBatteryAndChargeTerminals',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':batteryChargerReview',$array_elements[4],PDO::PARAM_INT);

			$sql->execute();

			$id_DCS = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_DCS;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_cooling_system($array_elements)
	{
		$id_CS = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `cooling_system` (`connectionCheck`, `checkConditionStraps`, `conditionCheckAndCoolantLevel`, `radiatorConditionCheck`, `waterLevelSensorCheck`) VALUES (:connectionCheck, :checkConditionStraps, :conditionCheckAndCoolantLevel, :radiatorConditionCheck, :waterLevelSensorCheck)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':connectionCheck',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':checkConditionStraps',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':conditionCheckAndCoolantLevel',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':radiatorConditionCheck',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':waterLevelSensorCheck',$array_elements[4],PDO::PARAM_INT);

			$sql->execute();

			$id_CS = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_CS;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_airintake_system($array_elements)
	{
		$id_AIS = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `airIntake_system` (`connectionReview`, `casingAndFilterCheck`, `turboReview`) VALUES (:connectionReview, :casingAndFilterCheck, :turboReview)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':connectionReview',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':casingAndFilterCheck',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':turboReview',$array_elements[2],PDO::PARAM_INT);
			$sql->execute();

			$id_AIS = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_AIS;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}


	function insert_fuel_system($array_elements)
	{
		$id_FS = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `Fuel_system` (`leakCheck`, `connectionCheck`, `filterSeparatorReview`, `auxiliaryPumpOrCylinderCheck`, `fuelTankCheck`) VALUES (:leakCheck, :connectionCheck, :filterSeparatorReview, :auxiliaryPumpOrCylinderCheck, :fuelTankCheck)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':leakCheck',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':connectionCheck',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':filterSeparatorReview',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':auxiliaryPumpOrCylinderCheck',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':fuelTankCheck',$array_elements[4],PDO::PARAM_INT);

			$sql->execute();

			$id_FS = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_FS;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}


	function insert_lubrication_system($array_elements)
	{
		$id_LS = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `lubrication_system` (`connectionCheck`, `filterCheck`, `filterChanges`, `conditionCheckAndOilLevel`, `oilChanges`) VALUES (:connectionCheck, :filterCheck, :filterChanges, :conditionCheckAndOilLevel, :oilChanges)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':connectionCheck',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':filterCheck',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':filterChanges',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':conditionCheckAndOilLevel',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':oilChanges',$array_elements[4],PDO::PARAM_INT);

			$sql->execute();

			$id_LS = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_LS;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}


	function insert_offline_jobs_electric_plant($array_elements)
	{
		$id_OJEP = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `offline_jobs_electric_plant` (`idLubricationSystem`, `idFuelSystem`, `idAirIntakeSystem`, `idCoolingSystem`, `idDirectCurrentSystem`,`idAlternatingCurrentSystem`) VALUES (:idLubricationSystem, :idFuelSystem, :idAirIntakeSystem, :idCoolingSystem, :idDirectCurrentSystem, :idAlternatingCurrentSystem)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':idLubricationSystem',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':idFuelSystem',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':idAirIntakeSystem',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':idCoolingSystem',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':idDirectCurrentSystem',$array_elements[4],PDO::PARAM_INT);
			$sql->bindParam(':idAlternatingCurrentSystem',$array_elements[5],PDO::PARAM_INT);

			$sql->execute();

			$id_OJEP = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_OJEP;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$conn->rollBack();
			return false;
		}
	}

	function insert_load_tests($array_elements)
	{
		$id_LT = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `load_tests` (`vl1N`, `vl2N`, `vl3N`, `vlL`, `hz`, `al1`, `al2`, `al3`, `batteryVoltage`, `amps`, `engineOilPressure`, `engineTemperature`, `RPM`, `previousHourMeterReading`, `currentHourMeterReading`, `loadTransfer`, `fullLevel`) VALUES (:vl1N, :vl2N, :vl3N, :vlL, :hz, :al1, :al2, :al3, :batteryVoltage, :amps, :engineOilPressure, :engineTemperature, :RPM, :previousHourMeterReading, :currentHourMeterReading, :loadTransfer, :fullLevel)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':vl1N',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':vl2N',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':vl3N',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':vlL',$array_elements[3],PDO::PARAM_STR);
			$sql->bindParam(':hz',$array_elements[4],PDO::PARAM_STR);
			$sql->bindParam(':al1',$array_elements[5],PDO::PARAM_STR);
			$sql->bindParam(':al2',$array_elements[6],PDO::PARAM_STR);
			$sql->bindParam(':al3',$array_elements[7],PDO::PARAM_STR);
			$sql->bindParam(':batteryVoltage',$array_elements[8],PDO::PARAM_STR);
			$sql->bindParam(':amps',$array_elements[9],PDO::PARAM_STR);
			$sql->bindParam(':engineOilPressure',$array_elements[10],PDO::PARAM_STR);
			$sql->bindParam(':engineTemperature',$array_elements[11],PDO::PARAM_STR);
			$sql->bindParam(':RPM',$array_elements[12],PDO::PARAM_STR);
			$sql->bindParam(':previousHourMeterReading',$array_elements[13],PDO::PARAM_STR);
			$sql->bindParam(':currentHourMeterReading',$array_elements[14],PDO::PARAM_STR);
			$sql->bindParam(':loadTransfer',$array_elements[15],PDO::PARAM_STR);
			$sql->bindParam(':fullLevel',$array_elements[16],PDO::PARAM_STR);

			$sql->execute();

			$id_LT = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_LT;
		}

		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}


	function insert_empty_tests($array_elements)
	{
		$id_ET = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `empty_tests` (`vl1N`, `vl2N`, `vl3N`, `vlL`, `hz`, `startingCurrentCC`, `batteryVoltage`, `amps`, `engineOilPressure`, `engineTemperature`, `RPM`) VALUES (:vl1N, :vl2N, :vl3N, :vlL, :hz, :startingCurrentCC, :batteryVoltage, :amps, :engineOilPressure, :engineTemperature, :RPM)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':vl1N',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':vl2N',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':vl3N',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':vlL',$array_elements[3],PDO::PARAM_STR);
			$sql->bindParam(':hz',$array_elements[4],PDO::PARAM_STR);
			$sql->bindParam(':startingCurrentCC',$array_elements[5],PDO::PARAM_STR);
			$sql->bindParam(':batteryVoltage',$array_elements[6],PDO::PARAM_STR);
			$sql->bindParam(':amps',$array_elements[7],PDO::PARAM_STR);
			$sql->bindParam(':engineOilPressure',$array_elements[8],PDO::PARAM_STR);
			$sql->bindParam(':engineTemperature',$array_elements[9],PDO::PARAM_STR);
			$sql->bindParam(':RPM',$array_elements[10],PDO::PARAM_STR);

			$sql->execute();

			$id_ET = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_ET;
		}

		catch(Exception $e)
		{
			echo $e->getMessage();
			$conn->rollBack();
			return false;
		}
	}

	function insert_register_power_plant_parameters($array_elements)
	{
		$id_RPPP = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `register_power_plant_parameters` (`idEmptyTests`, `idLoadTests`) VALUES (:idEmptyTests, :idLoadTests)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':idEmptyTests',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':idLoadTests',$array_elements[1],PDO::PARAM_INT);

			$sql->execute();

			$id_RPPP = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_RPPP;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}


	function return_cities_and_departmens_id($tokenCity)
	{
		$conn = Conect_bd("location");
		$n_array = array();

		try
		{
			$query = "SELECT `idCity`,`idDepartment` FROM cities WHERE `token` = '".$tokenCity."';";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($n_array,
					[$item["idCity"],
					$item["idDepartment"]]);
			}

			Disconect_bd($result,$conn);
			return $n_array;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function insert_new_client($array_elements)
	{
		$id_NCl = "";
		$conn = Conect_bd("clients");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `clients_info` (`documentClient`, `nameClient`, `emailClient`, `phoneClient`,	`clientFirmPath`) VALUES (:documentClient, :nameClient, :emailClient, :phoneClient, :clientFirmPath)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':documentClient',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':nameClient',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':emailClient',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':phoneClient',$array_elements[3],PDO::PARAM_STR);
			$sql->bindParam(':clientFirmPath',$array_elements[5],PDO::PARAM_STR);

			$sql->execute();

			$id_NCl = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_NCl;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$conn->rollBack();
			return false;
		}
	}

	function update_client_info($array_info)
	{
		$conn = Conect_bd("clients");
		$query = "UPDATE clients_info SET `nameClient`= :nameClient,`emailClient`= :emailClient,`phoneClient`= :phoneClient,`clientFirmPath`= :clientFirmPath WHERE `documentClient` = :documentClient;";
		$sql = $conn->prepare($query);

		$sql->bindParam(':documentClient',$array_info[0],PDO::PARAM_INT);
		$sql->bindParam(':nameClient',$array_info[1],PDO::PARAM_STR, 25);
		$sql->bindParam(':emailClient',$array_info[2],PDO::PARAM_STR,25);
		$sql->bindParam(':phoneClient',$array_info[3],PDO::PARAM_STR,25);
		$sql->bindParam(':clientFirmPath',$array_info[5],PDO::PARAM_STR,25);

		$sql->execute();

		if($sql->rowCount() > 0)
		{
			Disconect_bd($result,$conn);
			return true;
		}
		else
		{
			return false;
		}
	}


	function insert_general_information($array_elements)
	{
		$id_GI = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `general_information` (`date_general`, `startTime`, `endTime`, `department`,	`city`, `address`,	`idClient`, `qrPath`,	`idTypeMaintenance`, `observations`) VALUES (:date_general, :startTime, :endTime, :department, :city, :address, :idClient, :qrPath, :idTypeMaintenance, :observations)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':date_general',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':startTime',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':endTime',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':department',$array_elements[3],PDO::PARAM_STR);
			$sql->bindParam(':city',$array_elements[4],PDO::PARAM_STR);
			$sql->bindParam(':address',$array_elements[5],PDO::PARAM_STR);
			$sql->bindParam(':idClient',$array_elements[6],PDO::PARAM_STR);
			$sql->bindParam(':qrPath',$array_elements[7],PDO::PARAM_STR);
			$sql->bindParam(':idTypeMaintenance',$array_elements[8],PDO::PARAM_STR);
			$sql->bindParam(':observations',$array_elements[9],PDO::PARAM_STR);

			$sql->execute();

			$id_GI = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_GI;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}


	function search_id_technical_by_document_and_mail($document,$mail)
	{
		$conn = Conect_bd("reports");
		$id_Technical = "";

		try
		{
			$query = "SELECT `idTechnicalUser` FROM technical_users WHERE `documentTechnicalUser` = ".$document." AND `Email` = '".$mail."' AND `idStateUser` = 1 AND `idRole` = 1;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				$id_Technical = $item["idTechnicalUser"];
			}

			Disconect_bd($result,$conn);
			return $id_Technical;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function search_state_technical($document,$mail)
	{
		$conn = Conect_bd("reports");
		$id_state = "";

		try
		{
			$query = "SELECT `idStateUser` FROM technical_users WHERE `documentTechnicalUser` = ".$document." AND `Email` = '".$mail."' AND `idRole` = 1;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				$id_state = $item["idStateUser"];
			}

			Disconect_bd($result,$conn);
			return $id_state;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function insert_technicals_reports($array_elements)
	{
		$id_TR = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `technicals_reports` (`idTechnicalUser1`, `idTechnicalUser2`, `idTechnicalUser3`) VALUES (:idTechnicalUser1, :idTechnicalUser2, :idTechnicalUser3)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':idTechnicalUser1',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':idTechnicalUser2',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':idTechnicalUser3',$array_elements[2],PDO::PARAM_INT);

			$sql->execute();

			$id_TR = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_TR;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$conn->rollBack();
			return false;
		}
	}

	function insert_electrical_reports($array_elements)
	{
		$id_ER = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `electrical_reports` (`serialNumberER`,`idCellarGeneralInfoProduct`, `idClientInfo`, `idOfflineJobsEP`, `idRegisterPowerPlantParameters`, `idTechnicalsReportsER`, `idGeneralInformationER`) VALUES (:serialNumberER, :idCellarGeneralInfoProduct, :idClientInfo, :idOfflineJobsEP, :idRegisterPowerPlantParameters, :idTechnicalsReportsER, :idGeneralInformationER)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':serialNumberER',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':idCellarGeneralInfoProduct',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':idClientInfo',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':idOfflineJobsEP',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':idRegisterPowerPlantParameters',$array_elements[4],PDO::PARAM_INT);
			$sql->bindParam(':idTechnicalsReportsER',$array_elements[5],PDO::PARAM_INT);
			$sql->bindParam(':idGeneralInformationER',$array_elements[6],PDO::PARAM_INT);

			$sql->execute();

			$conn->commit();
			Disconect_bd($result,$conn);
			return true;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$conn->rollBack();
			return false;
		}
	}
