<?php
	include CORE."conection.php";

	function search_info_client($id)
	{
		$conn = Conect_bd("clients");
		$array_clients = array();

		try
		{
			$query = "SELECT documentClient,nameClient,phoneClient,clientFirmPath,personInCharge FROM clients_info WHERE idClientInfo = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_clients,[
					"documentClient" => $item["documentClient"],
					"nameClient" => $item["nameClient"],
					"phoneClient" => $item["phoneClient"],
					"clientFirmPath" => $item["clientFirmPath"],
					"personInCharge" => $item["personInCharge"]]);
				}

				Disconect_bd($result,$conn);
				return $array_clients;

			}
			catch (Exception $e)
			{
				return false;
			}
		}

	function search_info_technicals($id)
	{
		$conn = Conect_bd("reports");
		$array_technicals = array();

		try
		{
			$query = "SELECT documentTechnicalUser,TechnicalUser,Email FROM technical_users WHERE idTechnicalUser = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_technicals,[
					"documentTechnicalUser" => $item["documentTechnicalUser"],
					"TechnicalUser" => $item["TechnicalUser"],
					"Email" => $item["Email"]]);
				}

				Disconect_bd($result,$conn);
				return $array_technicals;

			}
			catch (Exception $e)
			{
				return false;
			}
		}

	function search_info_cellar_products($id)
	{

		$conn = Conect_bd("cellar");
		$array_cellar_info = array();

		try
		{
			$query = "SELECT cgip.serialProduct,cgip.Product,cgip.Brand,cep.powerPlant,cep.powerPlantModel,cep.powerPlantSerie,cep.motor,cep.motorModel,cep.motorSerie,cep.generator,cep.generatorSerie,cep.generatorKw,cep.generatorKwa,cep.generatorPhases,cep.generatorVolt,arep.oilAmount,arep.oilReference,arep.fuelAmount,arep.fuelReference,arep.airAmount,arep.airReference,arep.separatorAmount,arep.separatorReference,arep.refrigerantAmount,arep.refrigerantReference,arep.engineoilAmount,arep.engineoilReference,arep.otherAmount,arep.otherReference FROM cellar_electric_products cep,amount_reference_electric_products arep,cellar_general_info_products cgip WHERE arep.idAmountReferenceElectricProducts = cep.idAmountReferenceElectricProducts AND cep.idCellarGeneralInfoProduct = cgip.idCellarGeneralInfoProduct AND cgip.idCellarGeneralInfoProduct = ".$id.";";


			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_cellar_info,[
					"serialProduct" => $item["serialProduct"],
					"Product" => $item["Product"],
					"Brand" => $item["Brand"],
					"powerPlant" => $item["powerPlant"],
					"powerPlantModel" => $item["powerPlantModel"],
					"powerPlantSerie" => $item["powerPlantSerie"],
					"motor" => $item["motor"],
					"motorModel" => $item["motorModel"],
					"motorSerie" => $item["motorSerie"],
					"generator" => $item["generator"],
					"generatorSerie" => $item["generatorSerie"],
					"generatorKw" => $item["generatorKw"],
					"generatorKwa" => $item["generatorKwa"],
					"generatorPhases" => $item["generatorPhases"],
					"generatorVolt" => $item["generatorVolt"],
					"oilAmount" => $item["oilAmount"],
					"oilReference" => $item["oilReference"],
					"fuelAmount" => $item["fuelAmount"],
					"fuelReference" => $item["fuelReference"],
					"airAmount" => $item["airAmount"],
					"airReference" => $item["airReference"],
					"separatorAmount" => $item["separatorAmount"],
					"separatorReference" => $item["separatorReference"],
					"refrigerantAmount" => $item["refrigerantAmount"],
					"refrigerantReference" => $item["refrigerantReference"],
					"engineoilAmount" => $item["engineoilAmount"],
					"engineoilReference" => $item["engineoilReference"],
					"otherAmount" => $item["otherAmount"],
					"otherReference" => $item["otherReference"]]);
				}

				Disconect_bd($result,$conn);
				return $array_cellar_info;

			}
			catch (Exception $e)
			{
				return false;
			}
		}

	function search_info_cellar_air_products($id)
	{
		$conn = Conect_bd("cellar");
		$array_cellar_info = array();

		try
		{
			$query = "SELECT
			cgip.serialProduct, cgip.Product, cgip.Brand, cgip.pathDatasheet, cgip.pathQR, cgip.idSupplier, cgip.idProductStatus,
			cacp.capacity,
			act.AirConditioningTypes
			FROM
			cellar_general_info_products cgip,
			cellar_air_conditioning_products cacp,
			air_conditioning_types act
			WHERE
			act.idAirConditioningTypes = cacp.idAirConditioningTypes
			AND cacp.idCellarGeneralInfoProduct = cgip.idCellarGeneralInfoProduct
			AND cgip.idTypeProduct = 2
			AND cgip.idCellarGeneralInfoProduct = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_cellar_info,[
					"serialProduct" => $item["serialProduct"],
					"Product" => $item["Product"],
					"Brand" => $item["Brand"],
					"pathDatasheet" => $item["pathDatasheet"],
					"pathQR" => $item["pathQR"],
					"idSupplier" => $item["idSupplier"],
					"idProductStatus" => $item["idProductStatus"],
					"capacity" => $item["capacity"],
					"AirConditioningTypes" => $item["AirConditioningTypes"]]);
				}

				Disconect_bd($result,$conn);
				return $array_cellar_info;

			}
			catch (Exception $e)
			{
				return false;
			}
		}

	function search_electrical_and_general_reports_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_e = array();

		try
		{
			$query = "SELECT er.serialNumberER,er.idCellarGeneralInfoProduct,er.idClientInfo,er.idOfflineJobsEP,er.idRegisterPowerPlantParameters,er.idTechnicalsReportsER,er.idGeneralInformationER,gi.date_general,gi.startTime,gi.endTime,gi.department,gi.city,gi.address,gi.idClient,gi.qrPath,gi.idTypeMaintenance,gi.observations,tr.idTechnicalUser1,tr.idTechnicalUser2,tr.idTechnicalUser3 FROM electrical_reports er,general_information gi, technicals_reports tr WHERE gi.idGeneralInformation = er.idGeneralInformationER AND er.idElectricalReport = ".$id." AND tr.idTechnicalsReports = er.idTechnicalsReportsER ORDER BY idElectricalReport DESC;";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
        array_push($array_report_e,[
        "serialNumberER" => $item["serialNumberER"],
        "idCellarGeneralInfoProduct" => $item["idCellarGeneralInfoProduct"],
        "idClientInfo" => $item["idClientInfo"],
        "idOfflineJobsEP" => $item["idOfflineJobsEP"],
        "idRegisterPowerPlantParameters" => $item["idRegisterPowerPlantParameters"],
        "idTechnicalsReportsER" => $item["idTechnicalsReportsER"],
        "idGeneralInformationER" => $item["idGeneralInformationER"],
				"date_general" => $item["date_general"],
				"startTime" => $item["startTime"],
				"endTime" => $item["endTime"],
				"department" => $item["department"],
				"city" => $item["city"],
				"address" => $item["address"],
				"qrPath" => $item["qrPath"],
				"idTypeMaintenance" => $item["idTypeMaintenance"],
				"observations" => $item["observations"],
				"idTechnicalUser1" => $item["idTechnicalUser1"],
				"idTechnicalUser2" => $item["idTechnicalUser2"],
				"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_e;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_offline_jobs_electric_plant_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_e = array();

		try
		{
			$query = "SELECT ls.filterCheck,ls.filterChanges,ls.conditionCheckAndOilLevel,ls.oilChanges,
			fs.leakCheck,fs.filterSeparatorReview,fs.auxiliaryPumpOrCylinderCheck,fs.fuelTankCheck,
			ais.connectionReview,ais.casingAndFilterCheck,ais.turboReview,cs.checkConditionStraps,cs.conditionCheckAndCoolantLevel,cs.radiatorConditionCheck,cs.waterLevelSensorCheck,
			dcs.alternatorBeltCheck,dcs.checkElectricalConnections,dcs.batteryStatusAndAcidLevelCheck,dcs.checkBatteryAndChargeTerminals,dcs.batteryChargerReview,
			acs.voltmeterReview,acs.frequencyMeterReview,acs.frequencyMeterReview,acs.ammeterReview,acs.checkElectricalConnectionsAndTerminals,acs.breakerReview,acs.contactorsReview,acs.powerCableCheck
			FROM offline_jobs_electric_plant ojep, lubrication_system ls, Fuel_system fs, airIntake_system ais, cooling_system cs, direct_current_system dcs, alternating_current_system acs
			WHERE ls.idLubricationSystem = ojep.idLubricationSystem AND
			fs.idFuelSystem = ojep.idFuelSystem AND
			ais.idAirIntakeSystem = ojep.idAirIntakeSystem AND
			cs.idCoolingSystem = ojep.idCoolingSystem AND
			dcs.idDirectCurrentSystem = ojep.idDirectCurrentSystem AND
			acs.idAlternatingCurrentSystem = ojep.idAlternatingCurrentSystem AND idOfflineJobsEP = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
        array_push($array_report_e,[
					"filterCheck" => $item["filterCheck"],
					"filterChanges" => $item["filterChanges"],
					"conditionCheckAndOilLevel" => $item["conditionCheckAndOilLevel"],
					"oilChanges" => $item["oilChanges"],
					"leakCheck" => $item["leakCheck"],
					"filterSeparatorReview" => $item["filterSeparatorReview"],
					"auxiliaryPumpOrCylinderCheck" => $item["auxiliaryPumpOrCylinderCheck"],
					"fuelTankCheck" => $item["fuelTankCheck"],
					"connectionReview" => $item["connectionReview"],
					"casingAndFilterCheck" => $item["casingAndFilterCheck"],
					"turboReview" => $item["turboReview"],
					"checkConditionStraps" => $item["checkConditionStraps"],
					"conditionCheckAndCoolantLevel" => $item["conditionCheckAndCoolantLevel"],
					"radiatorConditionCheck" => $item["radiatorConditionCheck"],
					"waterLevelSensorCheck" => $item["waterLevelSensorCheck"],
					"alternatorBeltCheck" => $item["alternatorBeltCheck"],
					"checkElectricalConnections" => $item["checkElectricalConnections"],
					"batteryStatusAndAcidLevelCheck" => $item["batteryStatusAndAcidLevelCheck"],
					"checkBatteryAndChargeTerminals" => $item["checkBatteryAndChargeTerminals"],
					"batteryChargerReview" => $item["batteryChargerReview"],
					"voltmeterReview" => $item["voltmeterReview"],
					"frequencyMeterReview" => $item["frequencyMeterReview"],
					"ammeterReview" => $item["ammeterReview"],
					"checkElectricalConnectionsAndTerminals" => $item["checkElectricalConnectionsAndTerminals"],
					"breakerReview" => $item["breakerReview"],
					"contactorsReview" => $item["contactorsReview"],
					"powerCableCheck" => $item["powerCableCheck"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_e;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_check_connection_offline_jobs($element,$id)
	{
		$conn = Conect_bd("reports");
		$result_search = "";

		try
		{
			if ($element == "ls")
			{
				$query = "SELECT ls.connectionCheck FROM lubrication_system ls, offline_jobs_electric_plant ojep WHERE ls.idLubricationSystem = ojep.idLubricationSystem AND idOfflineJobsEP = ".$id.";";
			}
			else if ($element == "fs")
			{
				$query = "SELECT fs.connectionCheck FROM Fuel_system fs, offline_jobs_electric_plant ojep WHERE fs.idFuelSystem = ojep.idFuelSystem AND idOfflineJobsEP = ".$id.";";
			}
			else if ($element == "cs")
			{
				$query = "SELECT cs.connectionCheck FROM cooling_system cs, offline_jobs_electric_plant ojep WHERE cs.idCoolingSystem = ojep.idCoolingSystem AND idOfflineJobsEP = ".$id.";";
			}

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				$result_search = $item["connectionCheck"];
			}

			Disconect_bd($result,$conn);
			return $result_search;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function search_power_plant_parameters_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_e = array();

		try
		{
			$query = "SELECT idEmptyTests, idLoadTests FROM register_power_plant_parameters WHERE idRegisterPowerPlantParameters = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
        array_push($array_report_e,[
					"idEmptyTests" => $item["idEmptyTests"],
					"idLoadTests" => $item["idLoadTests"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_e;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_empty_test_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_e = array();

		try
		{
			$query = "SELECT vl1N,vl2N,vl3N,vlL,hz,startingCurrentCC,batteryVoltage,amps,engineOilPressure,engineTemperature,RPM FROM empty_tests WHERE idEmptyTests = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
        array_push($array_report_e,[
					"vl1N" => $item["vl1N"],
					"vl2N" => $item["vl2N"],
					"vl3N" => $item["vl3N"],
					"vlL" => $item["vlL"],
					"hz" => $item["hz"],
					"startingCurrentCC" => $item["startingCurrentCC"],
					"batteryVoltage" => $item["batteryVoltage"],
					"amps" => $item["amps"],
					"engineOilPressure" => $item["engineOilPressure"],
					"engineTemperature" => $item["engineTemperature"],
					"RPM" => $item["RPM"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_e;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_load_test_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_e = array();

		try
		{
			$query = "SELECT vl1N,vl2N,vl3N,vlL,hz,al1,al2,al3,batteryVoltage,amps,engineOilPressure,engineTemperature,RPM,previousHourMeterReading,currentHourMeterReading,loadTransfer,fullLevel FROM load_tests WHERE idLoadTests = ".$id.";";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($array_report_e,[
					"vl1N" => $item["vl1N"],
					"vl2N" => $item["vl2N"],
					"vl3N" => $item["vl3N"],
					"vlL" => $item["vlL"],
					"hz" => $item["hz"],
					"al1" => $item["al1"],
					"al2" => $item["al2"],
					"al3" => $item["al3"],
					"batteryVoltage" => $item["batteryVoltage"],
					"amps" => $item["amps"],
					"engineOilPressure" => $item["engineOilPressure"],
					"engineTemperature" => $item["engineTemperature"],
					"RPM" => $item["RPM"],
					"previousHourMeterReading" => $item["previousHourMeterReading"],
					"currentHourMeterReading" => $item["currentHourMeterReading"],
					"loadTransfer" => $item["loadTransfer"],
					"fullLevel" => $item["fullLevel"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_e;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function search_air_and_general_reports_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_a = array();

		try
		{
			$query = "SELECT ar.serialNumberReport, ar.area, ar.branchOffice,ar.idCellarGeneralInfoProduct,ar.idClientInfo,ar.idTechnicalsReports,ar.idGeneralInformation,ar.idAirTechnicalDataMeasurements,ar.idAirWorksAndRevisionsCarriedOut,gi.date_general,gi.startTime,gi.endTime,gi.department,gi.city,gi.address,gi.idClient,gi.qrPath,gi.idTypeMaintenance,gi.observations,tr.idTechnicalUser1,tr.idTechnicalUser2,tr.idTechnicalUser3 FROM air_report ar,general_information gi, technicals_reports tr WHERE gi.idGeneralInformation = ar.idGeneralInformation AND ar.idAirReport = ".$id." AND tr.idTechnicalsReports = ar.idTechnicalsReports ORDER BY idAirReport DESC;";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_report_a,[
					"serialNumberReport" => $item["serialNumberReport"],
					"area" => $item["area"],
					"branchOffice" => $item["branchOffice"],
					"idCellarGeneralInfoProduct" => $item["idCellarGeneralInfoProduct"],
					"idClientInfo" => $item["idClientInfo"],
					"idTechnicalsReports" => $item["idTechnicalsReports"],
					"idGeneralInformation" => $item["idGeneralInformation"],
					"idAirTechnicalDataMeasurements" => $item["idAirTechnicalDataMeasurements"],
					"idAirWorksAndRevisionsCarriedOut" => $item["idAirWorksAndRevisionsCarriedOut"],
					"date_general" => $item["date_general"],
					"startTime" => $item["startTime"],
					"endTime" => $item["endTime"],
					"department" => $item["department"],
					"city" => $item["city"],
					"address" => $item["address"],
					"idClient" => $item["idClient"],
					"qrPath" => $item["qrPath"],
					"idTypeMaintenance" => $item["idTypeMaintenance"],
					"observations" => $item["observations"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}
			Disconect_bd($result,$conn);
			return $array_report_a;
		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function search_air_technical_data_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_a = array();

		try
		{
			$query = "SELECT
			adu.airDriveUnitMotorHp, adu.airDriveUnitMotorVolt ,adu.airDriveUnitMotorAmp, adu.airDriveUnitMotorRPM, adu.airDriveUnitMeasurementsV11_12, adu.airDriveUnitMeasurementsV12_13, adu.airDriveUnitMeasurementsV13_14, adu.airDriveUnitAmpI1, adu.airDriveUnitAmpI2, adu.airDriveUnitAmpI3,
			acu.airCondensingPlateDataHp, acu.airCondensingPlateDataVol, acu.airCondensingPlateDataAmp, acu.airCondensingMeasurementsV11_12, acu.airCondensingMeasurementsV12_13, acu.airCondensingMeasurementsV13_14, acu.airCondensingAmpI1, acu.airCondensingAmpI2, acu.airCondensingAmpI3, acu.airCondensingPressuresHigh, acu.airCondensingPressuresLow,
			afm.AirFanMotorRPM, afm.AirFanMotorVol, afm.AirFanMotorAmp, afm.AirFanMotorHp, afm.AirFanMotorAmpI1, afm.AirFanMotorAmpI2, afm.AirFanMotorAmpI3
			FROM
			air_technical_data_measurements atdm,
			air_drive_unit adu,
			air_condensing_unit acu,
			air_fan_motor afm
			WHERE
			afm.idAirFanMotor = atdm.idAirFanMotor
			AND acu.idAirCondensingUnit = atdm.idAirCondensingUnit
			AND adu.idAirDriveUnit = atdm.idAirDriveUnit
			AND atdm.idAirTechnicalDataMeasurements = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_report_a,[
					"airDriveUnitMotorHp" => $item["airDriveUnitMotorHp"],
					"airDriveUnitMotorVolt" => $item["airDriveUnitMotorVolt"],
					"airDriveUnitMotorAmp" => $item["airDriveUnitMotorAmp"],
					"airDriveUnitMotorRPM" => $item["airDriveUnitMotorRPM"],
					"airDriveUnitMeasurementsV11_12" => $item["airDriveUnitMeasurementsV11_12"],
					"airDriveUnitMeasurementsV12_13" => $item["airDriveUnitMeasurementsV12_13"],
					"airDriveUnitMeasurementsV13_14" => $item["airDriveUnitMeasurementsV13_14"],
					"airDriveUnitAmpI1" => $item["airDriveUnitAmpI1"],
					"airDriveUnitAmpI2" => $item["airDriveUnitAmpI2"],
					"airDriveUnitAmpI3" => $item["airDriveUnitAmpI3"],
					"airCondensingPlateDataHp" => $item["airCondensingPlateDataHp"],
					"airCondensingPlateDataVol" => $item["airCondensingPlateDataVol"],
					"airCondensingPlateDataAmp" => $item["airCondensingPlateDataAmp"],
					"airCondensingMeasurementsV11_12" => $item["airCondensingMeasurementsV11_12"],
					"airCondensingMeasurementsV12_13" => $item["airCondensingMeasurementsV12_13"],
					"airCondensingMeasurementsV13_14" => $item["airCondensingMeasurementsV13_14"],
					"airCondensingAmpI1" => $item["airCondensingAmpI1"],
					"airCondensingAmpI2" => $item["airCondensingAmpI2"],
					"airCondensingAmpI3" => $item["airCondensingAmpI3"],
					"airCondensingPressuresHigh" => $item["airCondensingPressuresHigh"],
					"airCondensingPressuresLow" => $item["airCondensingPressuresLow"],
					"AirFanMotorRPM" => $item["AirFanMotorRPM"],
					"AirFanMotorVol" => $item["AirFanMotorVol"],
					"AirFanMotorAmp" => $item["AirFanMotorAmp"],
					"AirFanMotorHp" => $item["AirFanMotorHp"],
					"AirFanMotorAmpI1" => $item["AirFanMotorAmpI1"],
					"AirFanMotorAmpI2" => $item["AirFanMotorAmpI2"],
					"AirFanMotorAmpI3" => $item["AirFanMotorAmpI3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_a;

		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function search_air_works_and_revisions_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_a = array();

		try
		{
			$query = "SELECT
			adu.WRInternalExternalCleaning, adu.WRSnakeWashing, adu.WRAdjustmentOfStudBoltsOfRotorsBearings, adu.WRAirFilterWashing, adu.WRBeltTensionAndChange, adu.WRInspectionOfBearingsAndBearings, adu.WRDrainCleaning, adu.WRInternalInsulationCheck, adu.WRMachineRoomCleaning, adu.WRGeneralScrewAdjustment, adu.WRExpansionValveCheck, adu.WRInspectionElectricalAccessoriesAndScrews, adu.WROperationAndAlarmLamps, adu.WRElectricalConsumptionReview, adu.WRRemoteControlReview, adu.WRCondensatePumpCheck, adu.WRThermostatRevision, adu.WREngineInspection,
			ccu.generalCompressorUnitOperation, ccu.internalAndExternalCleaningCompressorUnit, ccu.snakeWashingCompressorUnit, ccu.compressorUnitRotorOrFanSettings, ccu.compressorUnitForcedVentilationTemperature, ccu.generalAdjustmentOfCompressorUnitScrews, ccu.reviewOfAccessoriesAndScrewsCompressorUnit, ccu.compressorUnitNoise, ccu.statusOfCompressorUnitSupports, ccu.compressorUnitExhaust, ccu.controlBoardBoltAdjustment,
			rsi.insulationJacketAluminumCoolingSystem, rsi.filterDrierCoolingSystem, rsi.shearValvesCoolingSystem, rsi.exhaustPipeAndAccessoriesCoolingSystem, rsi.coolingSystemSupport, rsi.coolingSystemSightGlass, rsi.solenoidValveCoolingSystem, rsi.suctionLineTempAndLiquidRefrigerationSystem
			FROM
			air_w_r_refrigeration_system_interconnection rsi,
			air_w_r_condensing_and_compressor_unit ccu,
			air_w_r_drive_unit adu,
			air_works_and_revisions_carried_out wrco
			WHERE
			rsi.idWRRefrigerationSystemInterconnection = wrco.idWRRefrigerationSystemInterconnection
			AND ccu.idWRCondensingAndCompressorUnit = wrco.idWRCondensingAndCompressorUnit
			AND adu.idWRDriveUnit = wrco.idWRDriveUnit
			AND idAirWorksAndRevisionsCarriedOut = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_report_a,[
					"WRInternalExternalCleaning" => $item["WRInternalExternalCleaning"],
					"WRSnakeWashing" => $item["WRSnakeWashing"],
					"WRAdjustmentOfStudBoltsOfRotorsBearings" => $item["WRAdjustmentOfStudBoltsOfRotorsBearings"],
					"WRAirFilterWashing" => $item["WRAirFilterWashing"],
					"WRBeltTensionAndChange" => $item["WRBeltTensionAndChange"],
					"WRInspectionOfBearingsAndBearings" => $item["WRInspectionOfBearingsAndBearings"],
					"WRDrainCleaning" => $item["WRDrainCleaning"],
					"WRInternalInsulationCheck" => $item["WRInternalInsulationCheck"],
					"WRMachineRoomCleaning" => $item["WRMachineRoomCleaning"],
					"WRGeneralScrewAdjustment" => $item["WRGeneralScrewAdjustment"],
					"WRExpansionValveCheck" => $item["WRExpansionValveCheck"],
					"WRInspectionElectricalAccessoriesAndScrews" => $item["WRInspectionElectricalAccessoriesAndScrews"],
					"WROperationAndAlarmLamps" => $item["WROperationAndAlarmLamps"],
					"WRElectricalConsumptionReview" => $item["WRElectricalConsumptionReview"],
					"WRRemoteControlReview" => $item["WRRemoteControlReview"],
					"WRCondensatePumpCheck" => $item["WRCondensatePumpCheck"],
					"WRThermostatRevision" => $item["WRThermostatRevision"],
					"WREngineInspection" => $item["WREngineInspection"],
					"generalCompressorUnitOperation" => $item["generalCompressorUnitOperation"],
					"internalAndExternalCleaningCompressorUnit" => $item["internalAndExternalCleaningCompressorUnit"],
					"snakeWashingCompressorUnit" => $item["snakeWashingCompressorUnit"],
					"compressorUnitRotorOrFanSettings" => $item["compressorUnitRotorOrFanSettings"],
					"compressorUnitForcedVentilationTemperature" => $item["compressorUnitForcedVentilationTemperature"],
					"generalAdjustmentOfCompressorUnitScrews" => $item["generalAdjustmentOfCompressorUnitScrews"],
					"reviewOfAccessoriesAndScrewsCompressorUnit" => $item["reviewOfAccessoriesAndScrewsCompressorUnit"],
					"compressorUnitNoise" => $item["compressorUnitNoise"],
					"statusOfCompressorUnitSupports" => $item["statusOfCompressorUnitSupports"],
					"compressorUnitExhaust" => $item["compressorUnitExhaust"],
					"controlBoardBoltAdjustment" => $item["controlBoardBoltAdjustment"],
					"insulationJacketAluminumCoolingSystem" => $item["insulationJacketAluminumCoolingSystem"],
					"filterDrierCoolingSystem" => $item["filterDrierCoolingSystem"],
					"shearValvesCoolingSystem" => $item["shearValvesCoolingSystem"],
					"exhaustPipeAndAccessoriesCoolingSystem" => $item["exhaustPipeAndAccessoriesCoolingSystem"],
					"coolingSystemSupport" => $item["coolingSystemSupport"],
					"coolingSystemSightGlass" => $item["coolingSystemSightGlass"],
					"solenoidValveCoolingSystem" => $item["solenoidValveCoolingSystem"],
					"suctionLineTempAndLiquidRefrigerationSystem" => $item["suctionLineTempAndLiquidRefrigerationSystem"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_a;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_pumps_and_general_reports_info($id)
	{
		$conn = Conect_bd("reports");
		$array_report_p = array();

		try
		{
			$query = "SELECT
			pr.serialNumberReportPR, pr.idClientInfo, pr.idTechnicalsReportsPR, pr.idGeneralInformationPR,
			prpa.idPumpsReportsAditionalInfo1, prpa.idPumpsReportsAditionalInfo2, prpa.idPumpsReportsAditionalInfo3, prpa.idPumpsReportsAditionalInfo4,
			gi.date_general,gi.startTime,gi.endTime,gi.department,gi.city,gi.address,gi.idClient,gi.qrPath,gi.idTypeMaintenance,gi.observations,tr.idTechnicalUser1,tr.idTechnicalUser2,tr.idTechnicalUser3
			FROM pump_report pr, pumps_reports_pumps_aditional prpa, general_information gi, technicals_reports tr
			WHERE gi.idGeneralInformation = pr.idGeneralInformationPR AND pr.idPumpReport = ".$id." AND tr.idTechnicalsReports = pr.idTechnicalsReportsPR AND prpa.idPumpsReportsPumpsAditional = pr.idPumpsReportsPumpsAditional ORDER BY idPumpReport DESC;";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_report_p,[
					"serialNumberReportPR" => $item["serialNumberReportPR"],
					"idClientInfo" => $item["idClientInfo"],
					"idTechnicalsReportsPR" => $item["idTechnicalsReportsPR"],
					"idGeneralInformationPR" => $item["idGeneralInformationPR"],
					"idPumpsReportsAditionalInfo1" => $item["idPumpsReportsAditionalInfo1"],
					"idPumpsReportsAditionalInfo2" => $item["idPumpsReportsAditionalInfo2"],
					"idPumpsReportsAditionalInfo3" => $item["idPumpsReportsAditionalInfo3"],
					"idPumpsReportsAditionalInfo4" => $item["idPumpsReportsAditionalInfo4"],
					"date_general" => $item["date_general"],
					"startTime" => $item["startTime"],
					"endTime" => $item["endTime"],
					"department" => $item["department"],
					"city" => $item["city"],
					"address" => $item["address"],
					"idClient" => $item["idClient"],
					"qrPath" => $item["qrPath"],
					"idTypeMaintenance" => $item["idTypeMaintenance"],
					"observations" => $item["observations"],
					"idTechnicalUser1" => $item["idTechnicalUser1"],
					"idTechnicalUser2" => $item["idTechnicalUser2"],
					"idTechnicalUser3" => $item["idTechnicalUser3"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_p;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_aditional_info_pumps($id)
	{
		$conn = Conect_bd("reports");
		$array_report_ap = array();

		try
		{
			$query = "SELECT controlPanel, protection, hydroTank, workPressure, preload, electricFloat, hydraulicPart, idCellarGeneralInfoProduct FROM pumps_reports_aditional_info WHERE idPumpsReportsAditionalInfo = ".$id.";";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($array_report_ap,[
					"controlPanel" => $item["controlPanel"],
					"protection" => $item["protection"],
					"hydroTank" => $item["hydroTank"],
					"workPressure" => $item["workPressure"],
					"preload" => $item["preload"],
					"electricFloat" => $item["electricFloat"],
					"hydraulicPart" => $item["hydraulicPart"],
					"idCellarGeneralInfoProduct" => $item["idCellarGeneralInfoProduct"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_ap;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function search_info_pumps_cellar($id)
	{
		$conn = Conect_bd("cellar");
		$array_report_cp = array();

		try
		{
			$query = "SELECT
			cgip.serialProduct, cgip.Product, cgip.Brand, cgip.pathDatasheet, cgip.pathQR, cgip.idTypeProduct, cgip.idSupplier,
			cpp.voltage, cpp.hp, cpp.amps, cpp.capacity,
			pt.pumpType
			FROM
			cellar_general_info_products cgip,
			cellar_pumps_products cpp,
			pump_types pt
			WHERE
			cpp.idCellarGeneralInfoProduct = cgip.idCellarGeneralInfoProduct
			AND pt.idPumpType = cpp.idPumpType
			AND cgip.idCellarGeneralInfoProduct = ".$id.";";

			$result = $conn->query($query);
			foreach ($result as $item)
			{
				array_push($array_report_cp,[
					"serialProduct" => $item["serialProduct"],
					"Product" => $item["Product"],
					"Brand" => $item["Brand"],
					"pathDatasheet" => $item["pathDatasheet"],
					"pathQR" => $item["pathQR"],
					"idTypeProduct" => $item["idTypeProduct"],
					"idSupplier" => $item["idSupplier"],
					"voltage" => $item["voltage"],
					"hp" => $item["hp"],
					"amps" => $item["amps"],
					"capacity" => $item["capacity"],
					"pumpType" => $item["pumpType"]]);
			}

			Disconect_bd($result,$conn);
			return $array_report_cp;

		}
		catch (Exception $e)
		{
			return false;
		}
	}
