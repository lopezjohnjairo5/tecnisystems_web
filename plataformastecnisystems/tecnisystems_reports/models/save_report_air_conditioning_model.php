<?php
	include CORE."conection.php";

	function insert_air_fan_motor_info($array_elements)
	{
		$id_afmi = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_fan_motor` (`AirFanMotorRPM`, `AirFanMotorVol`, `AirFanMotorAmp`, `AirFanMotorHp`, `AirFanMotorAmpI1`, `AirFanMotorAmpI2`, `AirFanMotorAmpI3`) VALUES (:AirFanMotorRPM, :AirFanMotorVol, :AirFanMotorAmp, :AirFanMotorHp, :AirFanMotorAmpI1, :AirFanMotorAmpI2, :AirFanMotorAmpI3)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':AirFanMotorRPM',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':AirFanMotorVol',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':AirFanMotorAmp',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':AirFanMotorHp',$array_elements[3],PDO::PARAM_STR);
			$sql->bindParam(':AirFanMotorAmpI1',$array_elements[4],PDO::PARAM_STR);
			$sql->bindParam(':AirFanMotorAmpI2',$array_elements[5],PDO::PARAM_STR);
			$sql->bindParam(':AirFanMotorAmpI3',$array_elements[6],PDO::PARAM_STR);

			$sql->execute();

			$id_afmi = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_afmi;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$conn->rollBack();
			return false;
		}
	}

	function insert_air_condensing_unit_info($array_elements)
	{
		$id_acui = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_condensing_unit` (`airCondensingPlateDataHp`, `airCondensingPlateDataVol`, `airCondensingPlateDataAmp`, `airCondensingMeasurementsV11_12`, `airCondensingMeasurementsV12_13`, `airCondensingMeasurementsV13_14`, `airCondensingAmpI1`, `airCondensingAmpI2`, `airCondensingAmpI3`, `airCondensingPressuresHigh`, `airCondensingPressuresLow`) VALUES (:airCondensingPlateDataHp, :airCondensingPlateDataVol, :airCondensingPlateDataAmp, :airCondensingMeasurementsV11_12, :airCondensingMeasurementsV12_13, :airCondensingMeasurementsV13_14, :airCondensingAmpI1, :airCondensingAmpI2, :airCondensingAmpI3, :airCondensingPressuresHigh, :airCondensingPressuresLow)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':airCondensingPlateDataHp',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingPlateDataVol',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingPlateDataAmp',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingMeasurementsV11_12',$array_elements[3],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingMeasurementsV12_13',$array_elements[4],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingMeasurementsV13_14',$array_elements[5],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingAmpI1',$array_elements[6],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingAmpI2',$array_elements[7],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingAmpI3',$array_elements[8],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingPressuresHigh',$array_elements[9],PDO::PARAM_STR);
			$sql->bindParam(':airCondensingPressuresLow',$array_elements[10],PDO::PARAM_STR);

			$sql->execute();

			$id_acui = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_acui;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$conn->rollBack();
			return false;
		}
	}

	function insert_air_drive_unit_info($array_elements)
	{
		$id_adui = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_drive_unit` (`airDriveUnitMotorHp`, `airDriveUnitMotorVolt`, `airDriveUnitMotorAmp`, `airDriveUnitMotorRPM`, `airDriveUnitMeasurementsV11_12`, `airDriveUnitMeasurementsV12_13`, `airDriveUnitMeasurementsV13_14`, `airDriveUnitAmpI1`, `airDriveUnitAmpI2`, `airDriveUnitAmpI3`) VALUES (:airDriveUnitMotorHp, :airDriveUnitMotorVolt, :airDriveUnitMotorAmp, :airDriveUnitMotorRPM, :airDriveUnitMeasurementsV11_12, :airDriveUnitMeasurementsV12_13, :airDriveUnitMeasurementsV13_14, :airDriveUnitAmpI1, :airDriveUnitAmpI2, :airDriveUnitAmpI3)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':airDriveUnitMotorHp',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitMotorVolt',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitMotorAmp',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitMotorRPM',$array_elements[3],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitMeasurementsV11_12',$array_elements[4],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitMeasurementsV12_13',$array_elements[5],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitMeasurementsV13_14',$array_elements[6],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitAmpI1',$array_elements[7],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitAmpI2',$array_elements[8],PDO::PARAM_STR);
			$sql->bindParam(':airDriveUnitAmpI3',$array_elements[9],PDO::PARAM_STR);

			$sql->execute();

			$id_adui = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_adui;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_air_wr_refrigeration_system_info($array_elements)
	{
		$id_awrsi = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_w_r_refrigeration_system_interconnection`
			(`insulationJacketAluminumCoolingSystem`, `filterDrierCoolingSystem`, `shearValvesCoolingSystem`, `exhaustPipeAndAccessoriesCoolingSystem`, `coolingSystemSupport`, `coolingSystemSightGlass`, `solenoidValveCoolingSystem`, `suctionLineTempAndLiquidRefrigerationSystem`) VALUES (:insulationJacketAluminumCoolingSystem, :filterDrierCoolingSystem, :shearValvesCoolingSystem, :exhaustPipeAndAccessoriesCoolingSystem, :coolingSystemSupport, :coolingSystemSightGlass, :solenoidValveCoolingSystem, :suctionLineTempAndLiquidRefrigerationSystem)";


			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':insulationJacketAluminumCoolingSystem',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':filterDrierCoolingSystem',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':shearValvesCoolingSystem',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':exhaustPipeAndAccessoriesCoolingSystem',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':coolingSystemSupport',$array_elements[4],PDO::PARAM_INT);
			$sql->bindParam(':coolingSystemSightGlass',$array_elements[5],PDO::PARAM_INT);
			$sql->bindParam(':solenoidValveCoolingSystem',$array_elements[6],PDO::PARAM_INT);
			$sql->bindParam(':suctionLineTempAndLiquidRefrigerationSystem',$array_elements[7],PDO::PARAM_INT);

			$sql->execute();

			$id_awrsi = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_awrsi;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_air_wr_condensing_and_compressor_info($array_elements)
	{
		$id_awcci = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_w_r_condensing_and_compressor_unit`
			(`generalCompressorUnitOperation`, `internalAndExternalCleaningCompressorUnit`, `snakeWashingCompressorUnit`, `compressorUnitRotorOrFanSettings`, `compressorUnitForcedVentilationTemperature`, `generalAdjustmentOfCompressorUnitScrews`, `reviewOfAccessoriesAndScrewsCompressorUnit`, `compressorUnitNoise`, `statusOfCompressorUnitSupports`, `compressorUnitExhaust`, `controlBoardBoltAdjustment`) VALUES (:generalCompressorUnitOperation, :internalAndExternalCleaningCompressorUnit, :snakeWashingCompressorUnit, :compressorUnitRotorOrFanSettings, :compressorUnitForcedVentilationTemperature, :generalAdjustmentOfCompressorUnitScrews, :reviewOfAccessoriesAndScrewsCompressorUnit, :compressorUnitNoise, :statusOfCompressorUnitSupports, :compressorUnitExhaust, :controlBoardBoltAdjustment)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':generalCompressorUnitOperation',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':internalAndExternalCleaningCompressorUnit',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':snakeWashingCompressorUnit',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':compressorUnitRotorOrFanSettings',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':compressorUnitForcedVentilationTemperature',$array_elements[4],PDO::PARAM_INT);
			$sql->bindParam(':generalAdjustmentOfCompressorUnitScrews',$array_elements[5],PDO::PARAM_INT);
			$sql->bindParam(':reviewOfAccessoriesAndScrewsCompressorUnit',$array_elements[6],PDO::PARAM_INT);
			$sql->bindParam(':compressorUnitNoise',$array_elements[7],PDO::PARAM_INT);
			$sql->bindParam(':statusOfCompressorUnitSupports',$array_elements[8],PDO::PARAM_INT);
			$sql->bindParam(':compressorUnitExhaust',$array_elements[9],PDO::PARAM_INT);
			$sql->bindParam(':controlBoardBoltAdjustment',$array_elements[10],PDO::PARAM_INT);


			$sql->execute();

			$id_awcci = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_awcci;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_air_wr_drive_unit_info($array_elements)
	{
		$id_awdui = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_w_r_drive_unit` (`WRInternalExternalCleaning`, `WRSnakeWashing`, `WRAdjustmentOfStudBoltsOfRotorsBearings`, `WRAirFilterWashing`, `WRBeltTensionAndChange`, `WRInspectionOfBearingsAndBearings`, `WRDrainCleaning`, `WRInternalInsulationCheck`, `WRMachineRoomCleaning`, `WRGeneralScrewAdjustment`, `WRExpansionValveCheck`, `WRInspectionElectricalAccessoriesAndScrews`, `WROperationAndAlarmLamps`, `WRElectricalConsumptionReview`, `WRRemoteControlReview`, `WRCondensatePumpCheck`, `WRThermostatRevision`, `WREngineInspection`) VALUES (:WRInternalExternalCleaning, :WRSnakeWashing, :WRAdjustmentOfStudBoltsOfRotorsBearings, :WRAirFilterWashing, :WRBeltTensionAndChange, :WRInspectionOfBearingsAndBearings, :WRDrainCleaning, :WRInternalInsulationCheck, :WRMachineRoomCleaning, :WRGeneralScrewAdjustment, :WRExpansionValveCheck, :WRInspectionElectricalAccessoriesAndScrews, :WROperationAndAlarmLamps, :WRElectricalConsumptionReview, :WRRemoteControlReview, :WRCondensatePumpCheck, :WRThermostatRevision, :WREngineInspection)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':WRInternalExternalCleaning',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':WRSnakeWashing',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':WRAdjustmentOfStudBoltsOfRotorsBearings',$array_elements[2],PDO::PARAM_INT);
			$sql->bindParam(':WRAirFilterWashing',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':WRBeltTensionAndChange',$array_elements[4],PDO::PARAM_INT);
			$sql->bindParam(':WRInspectionOfBearingsAndBearings',$array_elements[5],PDO::PARAM_INT);
			$sql->bindParam(':WRDrainCleaning',$array_elements[6],PDO::PARAM_INT);
			$sql->bindParam(':WRInternalInsulationCheck',$array_elements[7],PDO::PARAM_INT);
			$sql->bindParam(':WRMachineRoomCleaning',$array_elements[8],PDO::PARAM_INT);
			$sql->bindParam(':WRGeneralScrewAdjustment',$array_elements[9],PDO::PARAM_INT);
			$sql->bindParam(':WRExpansionValveCheck',$array_elements[10],PDO::PARAM_INT);
			$sql->bindParam(':WRInspectionElectricalAccessoriesAndScrews',$array_elements[11],PDO::PARAM_INT);
			$sql->bindParam(':WROperationAndAlarmLamps',$array_elements[12],PDO::PARAM_INT);
			$sql->bindParam(':WRElectricalConsumptionReview',$array_elements[13],PDO::PARAM_INT);
			$sql->bindParam(':WRRemoteControlReview',$array_elements[14],PDO::PARAM_INT);
			$sql->bindParam(':WRCondensatePumpCheck',$array_elements[15],PDO::PARAM_INT);
			$sql->bindParam(':WRThermostatRevision',$array_elements[16],PDO::PARAM_INT);
			$sql->bindParam(':WREngineInspection',$array_elements[17],PDO::PARAM_INT);

			$sql->execute();

			$id_awdui = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_awdui;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}


	function insert_air_technical_data_info($array_elements)
	{
		$id_atdi = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_technical_data_measurements` (`idAirDriveUnit`, `idAirCondensingUnit`, `idAirFanMotor`) VALUES (:idAirDriveUnit, :idAirCondensingUnit, :idAirFanMotor)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':idAirDriveUnit',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':idAirCondensingUnit',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':idAirFanMotor',$array_elements[2],PDO::PARAM_INT);

			$sql->execute();

			$id_atdi = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_atdi;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_air_works_and_revisions_carried_out_info($array_elements)
	{
		$id_awrcoi = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_works_and_revisions_carried_out` (`idWRDriveUnit`, `idWRCondensingAndCompressorUnit`, `idWRRefrigerationSystemInterconnection`) VALUES (:idWRDriveUnit, :idWRCondensingAndCompressorUnit, :idWRRefrigerationSystemInterconnection)";

			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':idWRDriveUnit',$array_elements[0],PDO::PARAM_INT);
			$sql->bindParam(':idWRCondensingAndCompressorUnit',$array_elements[1],PDO::PARAM_INT);
			$sql->bindParam(':idWRRefrigerationSystemInterconnection',$array_elements[2],PDO::PARAM_INT);

			$sql->execute();

			$id_awrcoi = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_awrcoi;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}

	function insert_air_report_info($array_elements)
	{
		$id_ari = "";
		$conn = Conect_bd("reports");

		try
		{
			$conn->beginTransaction();
			$insertSql = "INSERT INTO `air_report` (`serialNumberReport`, `area`, `branchOffice`, `idCellarGeneralInfoProduct`, `idClientInfo`, `idTechnicalsReports`, `idGeneralInformation`, `idAirTechnicalDataMeasurements`, `idAirWorksAndRevisionsCarriedOut`) VALUES ( :serialNumberReport, :area, :branchOffice, :idCellarGeneralInfoProduct, :idClientInfo, :idTechnicalsReports, :idGeneralInformation, :idAirTechnicalDataMeasurements, :idAirWorksAndRevisionsCarriedOut)";
			$sql = $conn->prepare($insertSql);

			$sql->bindParam(':serialNumberReport',$array_elements[0],PDO::PARAM_STR);
			$sql->bindParam(':area',$array_elements[1],PDO::PARAM_STR);
			$sql->bindParam(':branchOffice',$array_elements[2],PDO::PARAM_STR);
			$sql->bindParam(':idCellarGeneralInfoProduct',$array_elements[3],PDO::PARAM_INT);
			$sql->bindParam(':idClientInfo',$array_elements[4],PDO::PARAM_INT);
			$sql->bindParam(':idTechnicalsReports',$array_elements[5],PDO::PARAM_INT);
			$sql->bindParam(':idGeneralInformation',$array_elements[6],PDO::PARAM_INT);
			$sql->bindParam(':idAirTechnicalDataMeasurements',$array_elements[7],PDO::PARAM_INT);
			$sql->bindParam(':idAirWorksAndRevisionsCarriedOut',$array_elements[8],PDO::PARAM_INT);

			$sql->execute();

			$id_ari = $conn->lastInsertId();
			$conn->commit();

			Disconect_bd($result,$conn);
			return $id_ari;
		}
		catch(Exception $e)
		{
				echo $e->getMessage();
				$conn->rollBack();
				return false;
		}
	}
