<?php
  include "../config/paths.php";
  require (FPDFPATH."fpdf.php");
  include "../config/generals.php";
  include MODELS."download_report_model.php";
  include GENERALFUNC."search_state_user.php";
  include GENERALFUNC."search_by_location.php";
  include GENERALFUNC."limit_size_words.php";
  include GENERALFUNC."end_session.php";


  $type_report = $_GET["type_report"];
  $id_report = $_GET["id_report"];


  session_start();

  if (search_state_user($_SESSION["administrative_user"][0],$_SESSION["administrative_user"][2],$_SESSION["administrative_user"][4]))
  {
    if ($type_report == "electrico")
    {
      $array_electrical_full = array();

      include TEMPLATESPDF."template_pdf_report_electrical.php";

      $array_result_electrical = search_electrical_and_general_reports_info($id_report);
      $array_offline_jobs_electrical = search_offline_jobs_electric_plant_info($array_result_electrical[0]["idOfflineJobsEP"]);
      $array_power_plant_parameters = search_power_plant_parameters_info($array_result_electrical[0]["idRegisterPowerPlantParameters"]);
      $array_cellar_info_product = search_info_cellar_products($array_result_electrical[0]["idCellarGeneralInfoProduct"]);
      $array_empty_tests = search_empty_test_info($array_power_plant_parameters[0]["idEmptyTests"]);
      $array_load_tests = search_load_test_info($array_power_plant_parameters[0]["idLoadTests"]);

      $array_info_client = search_info_client($array_result_electrical[0]["idClientInfo"]);
      $array_city_and_department = search_city_and_department_by_id($array_result_electrical[0]["city"],$array_result_electrical[0]["department"]);


      if ($array_result_electrical)
      {

        array_push($array_electrical_full,[
          "serialNumberER" => $array_result_electrical[0]["serialNumberER"],
          "idCellarGeneralInfoProduct" => $array_result_electrical[0]["idCellarGeneralInfoProduct"],
          "idClientInfo" => $array_result_electrical[0]["idClientInfo"],
          "idOfflineJobsEP" => $array_result_electrical[0]["idOfflineJobsEP"],
          "idRegisterPowerPlantParameters" => $array_result_electrical[0]["idRegisterPowerPlantParameters"],
          "idTechnicalsReportsER" => $array_result_electrical[0]["idTechnicalsReportsER"],
          "idGeneralInformationER" => $array_result_electrical[0]["idGeneralInformationER"],
          "date_general" => $array_result_electrical[0]["date_general"],
          "startTime" => $array_result_electrical[0]["startTime"],
          "endTime" => $array_result_electrical[0]["endTime"],
          "address" => $array_result_electrical[0]["address"],
          "qrPath" => $array_result_electrical[0]["qrPath"],
          "idTypeMaintenance" => $array_result_electrical[0]["idTypeMaintenance"],
          "observations" => $array_result_electrical[0]["observations"],
          "idTechnicalUser1" => $array_result_electrical[0]["idTechnicalUser1"],
          "idTechnicalUser2" => $array_result_electrical[0]["idTechnicalUser2"],
          "idTechnicalUser3" => $array_result_electrical[0]["idTechnicalUser3"]]);

      }
      else
      {
        array_push($array_electrical_full,[
          "serialNumberER" => "N/A",
          "idCellarGeneralInfoProduct" => "N/A",
          "idClientInfo" => "N/A",
          "idOfflineJobsEP" => "N/A",
          "idRegisterPowerPlantParameters" => "N/A",
          "idTechnicalsReportsER" => "N/A",
          "idGeneralInformationER" => "N/A",
          "date_general" => "N/A",
          "startTime" => "N/A",
          "endTime" => "N/A",
          "address" => "N/A",
          "qrPath" => "N/A",
          "idTypeMaintenance" => "N/A",
          "observations" => "N/A",
          "idTechnicalUser1" => "N/A",
          "idTechnicalUser2" => "N/A",
          "idTechnicalUser3" => "N/A"]);

      }
      if ($array_offline_jobs_electrical)
      {

        $ls_connectionCheck = search_check_connection_offline_jobs("ls",$array_result_electrical[0]["idOfflineJobsEP"]);
        $fs_connectionCheck = search_check_connection_offline_jobs("fs",$array_result_electrical[0]["idOfflineJobsEP"]);
        $cs_connectionCheck = search_check_connection_offline_jobs("cs",$array_result_electrical[0]["idOfflineJobsEP"]);

        array_push($array_electrical_full,[
          "ls_connectionCheck" => $ls_connectionCheck,
          "filterCheck" => $array_offline_jobs_electrical[0]["filterCheck"],
          "filterChanges" => $array_offline_jobs_electrical[0]["filterChanges"],
          "conditionCheckAndOilLevel" => $array_offline_jobs_electrical[0]["conditionCheckAndOilLevel"],
          "oilChanges" => $array_offline_jobs_electrical[0]["oilChanges"],
          "leakCheck" => $array_offline_jobs_electrical[0]["leakCheck"],
          "fs_connectionCheck" => $fs_connectionCheck,
          "filterSeparatorReview" => $array_offline_jobs_electrical[0]["filterSeparatorReview"],
          "auxiliaryPumpOrCylinderCheck" => $array_offline_jobs_electrical[0]["auxiliaryPumpOrCylinderCheck"],
          "fuelTankCheck" => $array_offline_jobs_electrical[0]["fuelTankCheck"],
          "connectionReview" => $array_offline_jobs_electrical[0]["connectionReview"],
          "casingAndFilterCheck" => $array_offline_jobs_electrical[0]["casingAndFilterCheck"],
          "turboReview" => $array_offline_jobs_electrical[0]["turboReview"],
          "cs_connectionCheck" => $cs_connectionCheck,
          "checkConditionStraps" => $array_offline_jobs_electrical[0]["checkConditionStraps"],
          "conditionCheckAndCoolantLevel" => $array_offline_jobs_electrical[0]["conditionCheckAndCoolantLevel"],
          "radiatorConditionCheck" => $array_offline_jobs_electrical[0]["radiatorConditionCheck"],
          "waterLevelSensorCheck" => $array_offline_jobs_electrical[0]["waterLevelSensorCheck"],
          "alternatorBeltCheck" => $array_offline_jobs_electrical[0]["alternatorBeltCheck"],
          "checkElectricalConnections" => $array_offline_jobs_electrical[0]["checkElectricalConnections"],
          "batteryStatusAndAcidLevelCheck" => $array_offline_jobs_electrical[0]["batteryStatusAndAcidLevelCheck"],
          "checkBatteryAndChargeTerminals" => $array_offline_jobs_electrical[0]["checkBatteryAndChargeTerminals"],
          "batteryChargerReview" => $array_offline_jobs_electrical[0]["batteryChargerReview"],
          "voltmeterReview" => $array_offline_jobs_electrical[0]["voltmeterReview"],
          "frequencyMeterReview" => $array_offline_jobs_electrical[0]["frequencyMeterReview"],
          "ammeterReview" => $array_offline_jobs_electrical[0]["ammeterReview"],
          "checkElectricalConnectionsAndTerminals" => $array_offline_jobs_electrical[0]["checkElectricalConnectionsAndTerminals"],
          "breakerReview" => $array_offline_jobs_electrical[0]["breakerReview"],
          "contactorsReview" => $array_offline_jobs_electrical[0]["contactorsReview"],
          "powerCableCheck" => $array_offline_jobs_electrical[0]["powerCableCheck"]]);

      }
      else
      {
        array_push($array_electrical_full,[
          "ls_connectionCheck" => "N/A",
          "filterCheck" => "N/A",
          "filterChanges" => "N/A",
          "conditionCheckAndOilLevel" => "N/A",
          "oilChanges" => "N/A",
          "leakCheck" => "N/A",
          "fs_connectionCheck" => "N/A",
          "filterSeparatorReview" => "N/A",
          "auxiliaryPumpOrCylinderCheck" => "N/A",
          "fuelTankCheck" => "N/A",
          "connectionReview" => "N/A",
          "casingAndFilterCheck" => "N/A",
          "turboReview" => "N/A",
          "cs_connectionCheck" => "N/A",
          "checkConditionStraps" => "N/A",
          "conditionCheckAndCoolantLevel" => "N/A",
          "radiatorConditionCheck" => "N/A",
          "waterLevelSensorCheck" => "N/A",
          "alternatorBeltCheck" => "N/A",
          "checkElectricalConnections" => "N/A",
          "batteryStatusAndAcidLevelCheck" => "N/A",
          "checkBatteryAndChargeTerminals" => "N/A",
          "batteryChargerReview" => "N/A",
          "voltmeterReview" => "N/A",
          "frequencyMeterReview" => "N/A",
          "ammeterReview" => "N/A",
          "checkElectricalConnectionsAndTerminals" => "N/A",
          "breakerReview" => "N/A",
          "contactorsReview" => "N/A",
          "powerCableCheck" => "N/A"]);
      }
      if ($array_cellar_info_product)
      {

        array_push($array_electrical_full,[
          "serialProduct" => $array_cellar_info_product[0]["serialProduct"],
          "Product" => $array_cellar_info_product[0]["Product"],
          "Brand" => $array_cellar_info_product[0]["Brand"],
          "powerPlant" => $array_cellar_info_product[0]["powerPlant"],
          "powerPlantModel" => $array_cellar_info_product[0]["powerPlantModel"],
          "powerPlantSerie" => $array_cellar_info_product[0]["powerPlantSerie"],
          "motor" => $array_cellar_info_product[0]["motor"],
          "motorModel" => $array_cellar_info_product[0]["motorModel"],
          "motorSerie" => $array_cellar_info_product[0]["motorSerie"],
          "generator" => $array_cellar_info_product[0]["generator"],
          "generatorSerie" => $array_cellar_info_product[0]["generatorSerie"],
          "generatorKw" => $array_cellar_info_product[0]["generatorKw"],
          "generatorKwa" => $array_cellar_info_product[0]["generatorKwa"],
          "generatorPhases" => $array_cellar_info_product[0]["generatorPhases"],
          "generatorVolt" => $array_cellar_info_product[0]["generatorVolt"],
          "oilAmount" => $array_cellar_info_product[0]["oilAmount"],
          "oilReference" => $array_cellar_info_product[0]["oilReference"],
          "fuelAmount" => $array_cellar_info_product[0]["fuelAmount"],
          "fuelReference" => $array_cellar_info_product[0]["fuelReference"],
          "airAmount" => $array_cellar_info_product[0]["airAmount"],
          "airReference" => $array_cellar_info_product[0]["airReference"],
          "separatorAmount" => $array_cellar_info_product[0]["separatorAmount"],
          "separatorReference" => $array_cellar_info_product[0]["separatorReference"],
          "refrigerantAmount" => $array_cellar_info_product[0]["refrigerantAmount"],
          "refrigerantReference" => $array_cellar_info_product[0]["refrigerantReference"],
          "engineoilAmount" => $array_cellar_info_product[0]["engineoilAmount"],
          "engineoilReference" => $array_cellar_info_product[0]["engineoilReference"],
          "otherAmount" => $array_cellar_info_product[0]["otherAmount"],
          "otherReference" => $array_cellar_info_product[0]["otherReference"]]);

      }
      else
      {
          array_push($array_electrical_full,[
            "serialProduct" => "N/A",
            "Product" => "N/A",
            "Brand" => "N/A",
            "powerPlant" => "N/A",
            "powerPlantModel" => "N/A",
            "powerPlantSerie" => "N/A",
            "motor" => "N/A",
            "motorModel" => "N/A",
            "motorSerie" => "N/A",
            "generator" => "N/A",
            "generatorSerie" => "N/A",
            "generatorKw" => "N/A",
            "generatorKwa" => "N/A",
            "generatorPhases" => "N/A",
            "generatorVolt" => "N/A",
            "oilAmount" => "N/A",
            "oilReference" => "N/A",
            "fuelAmount" => "N/A",
            "fuelReference" => "N/A",
            "airAmount" => "N/A",
            "airReference" => "N/A",
            "separatorAmount" => "N/A",
            "separatorReference" => "N/A",
            "refrigerantAmount" => "N/A",
            "refrigerantReference" => "N/A",
            "engineoilAmount" => "N/A",
            "engineoilReference" => "N/A",
            "otherAmount" => "N/A",
            "otherReference" => "N/A"]);
      }
      if ($array_empty_tests)
      {

        array_push($array_electrical_full,[
          "empty_vl1N" => $array_empty_tests[0]["vl1N"],
          "empty_vl2N" => $array_empty_tests[0]["vl2N"],
          "empty_vl3N" => $array_empty_tests[0]["vl3N"],
          "empty_vlL" => $array_empty_tests[0]["vlL"],
          "empty_hz" => $array_empty_tests[0]["hz"],
          "empty_startingCurrentCC" => $array_empty_tests[0]["startingCurrentCC"],
          "empty_batteryVoltage" => $array_empty_tests[0]["batteryVoltage"],
          "empty_amps" => $array_empty_tests[0]["amps"],
          "empty_engineOilPressure" => $array_empty_tests[0]["engineOilPressure"],
          "empty_engineTemperature" => $array_empty_tests[0]["engineTemperature"],
          "empty_RPM" => $array_empty_tests[0]["RPM"]]);

      }
      else
      {
        array_push($array_electrical_full,[
          "empty_vl1N" => "N/A",
          "empty_vl2N" => "N/A",
          "empty_vl3N" => "N/A",
          "empty_vlL" => "N/A",
          "empty_hz" => "N/A",
          "empty_startingCurrentCC" => "N/A",
          "empty_batteryVoltage" => "N/A",
          "empty_amps" => "N/A",
          "empty_engineOilPressure" => "N/A",
          "empty_engineTemperature" => "N/A",
          "empty_RPM" => "N/A"]);
      }
      if ($array_load_tests)
      {

        array_push($array_electrical_full,[
          "load_vl1N" => $array_load_tests[0]["vl1N"],
          "load_vl2N" => $array_load_tests[0]["vl2N"],
          "load_vl3N" => $array_load_tests[0]["vl3N"],
          "load_vlL" => $array_load_tests[0]["vlL"],
          "load_hz" => $array_load_tests[0]["hz"],
          "load_al1" => $array_load_tests[0]["al1"],
          "load_al2" => $array_load_tests[0]["al2"],
          "load_al3" => $array_load_tests[0]["al3"],
          "load_batteryVoltage" => $array_load_tests[0]["batteryVoltage"],
          "load_amps" => $array_load_tests[0]["amps"],
          "load_engineOilPressure" => $array_load_tests[0]["engineOilPressure"],
          "load_engineTemperature" => $array_load_tests[0]["engineTemperature"],
          "load_RPM" => $array_load_tests[0]["RPM"],
          "load_previousHourMeterReading" => $array_load_tests[0]["previousHourMeterReading"],
          "load_currentHourMeterReading" => $array_load_tests[0]["currentHourMeterReading"],
          "load_loadTransfer" => $array_load_tests[0]["loadTransfer"],
          "load_fullLevel" => $array_load_tests[0]["fullLevel"]]);

      }
      else
      {
        array_push($array_electrical_full,[
          "load_vl1N" => "N/A",
          "load_vl2N" => "N/A",
          "load_vl3N" => "N/A",
          "load_vlL" => "N/A",
          "load_hz" => "N/A",
          "load_al1" => "N/A",
          "load_al2" => "N/A",
          "load_al3" => "N/A",
          "load_batteryVoltage" => "N/A",
          "load_amps" => "N/A",
          "load_engineOilPressure" => "N/A",
          "load_engineTemperature" => "N/A",
          "load_RPM" => "N/A",
          "load_previousHourMeterReading" => "N/A",
          "load_currentHourMeterReading" => "N/A",
          "load_loadTransfer" => "N/A",
          "load_fullLevel" => "N/A"]);
      }
      if ($array_info_client)
      {
        array_push($array_electrical_full,[
          "documentClient" => $array_info_client[0]["documentClient"],
          "nameClient" => $array_info_client[0]["nameClient"],
          "phoneClient" => $array_info_client[0]["phoneClient"],
          "clientFirmPath" => $array_info_client[0]["clientFirmPath"],
          "personInCharge" => $array_info_client[0]["personInCharge"]]);
      }
      else
      {
        array_push($array_electrical_full,[
          "documentClient" => "N/A",
          "nameClient" => "N/A",
          "phoneClient" => "N/A",
          "clientFirmPath" => "N/A",
          "personInCharge" => "N/A"]);
      }
      if ($array_city_and_department)
      {
        array_push($array_electrical_full,[
          "department" => $array_city_and_department[0]["Department"],
          "city" => $array_city_and_department[0]["City"]]);
      }
      else
      {
        array_push($array_electrical_full,[
          "department" => "N/A",
          "city" => "N/A"]);
      }


      for ($i=1; $i <= 3; $i++)
      {

        $array_info_technicals = search_info_technicals($array_result_electrical[0]["idTechnicalUser".$i]);
        if($array_info_technicals)
        {
          array_push($array_electrical_full,[
            "documentTechnicalUser" => $array_info_technicals[0]["documentTechnicalUser"],
            "TechnicalUser" => $array_info_technicals[0]["TechnicalUser"],
            "Email" => $array_info_technicals[0]["Email"]]);
        }
        else
        {
          array_push($array_electrical_full,[
            "documentTechnicalUser" => "N/A",
            "TechnicalUser" => "N/A",
            "Email" => "N/A"]);
        }
      }

      try
      {
        template_pdf_electrical($array_electrical_full);
        // print_r($array_electrical_full);
      }
      catch (\Exception $e)
      {
        echo $e;
      }

    }
    else if ($type_report == "aire")
    {
      $array_air_full = array();
      include TEMPLATESPDF."template_pdf_report_air.php";
      $array_result_air = search_air_and_general_reports_info($id_report);
      $array_info_client = search_info_client($array_result_air[0]["idClientInfo"]);
      $array_city_and_department_air = search_city_and_department_by_id($array_result_air[0]["city"],$array_result_air[0]["department"]);
      $array_technical_data_info = search_air_technical_data_info($array_result_air[0]["idAirTechnicalDataMeasurements"]);
      $array_works_and_revisions_info = search_air_works_and_revisions_info($array_result_air[0]["idAirWorksAndRevisionsCarriedOut"]);
      $array_cellar_air_info_product = search_info_cellar_air_products($array_result_air[0]["idCellarGeneralInfoProduct"]);

      if ($array_result_air)
      {
        array_push($array_air_full,[
          "serialNumberReport" => $array_result_air[0]["serialNumberReport"],
          "area" => $array_result_air[0]["area"],
          "branchOffice" => $array_result_air[0]["branchOffice"],
          "idCellarGeneralInfoProduct" => $array_result_air[0]["idCellarGeneralInfoProduct"],
          "idClientInfo" => $array_result_air[0]["idClientInfo"],
          "idTechnicalsReports" => $array_result_air[0]["idTechnicalsReports"],
          "idGeneralInformation" => $array_result_air[0]["idGeneralInformation"],
          "idAirTechnicalDataMeasurements" => $array_result_air[0]["idAirTechnicalDataMeasurements"],
          "idAirWorksAndRevisionsCarriedOut" => $array_result_air[0]["idAirWorksAndRevisionsCarriedOut"],
          "date_general" => $array_result_air[0]["date_general"],
          "startTime" => $array_result_air[0]["startTime"],
          "endTime" => $array_result_air[0]["endTime"],
          "address" => $array_result_air[0]["address"],
          "idClient" => $array_result_air[0]["idClient"],
          "qrPath" => $array_result_air[0]["qrPath"],
          "idTypeMaintenance" => $array_result_air[0]["idTypeMaintenance"],
          "observations" => $array_result_air[0]["observations"],
          "idTechnicalUser1" => $array_result_air[0]["idTechnicalUser1"],
          "idTechnicalUser2" => $array_result_air[0]["idTechnicalUser2"],
          "idTechnicalUser3" => $array_result_air[0]["idTechnicalUser3"]]);
      }
      else
      {
        array_push($array_air_full,[
          "serialNumberReport" => "N/A",
          "area" => "N/A",
          "branchOffice" => "N/A",
          "idCellarGeneralInfoProduct" => "N/A",
          "idClientInfo" => "N/A",
          "idTechnicalsReports" => "N/A",
          "idGeneralInformation" => "N/A",
          "idAirTechnicalDataMeasurements" => "N/A",
          "idAirWorksAndRevisionsCarriedOut" => "N/A",
          "date_general" => "N/A",
          "startTime" => "N/A",
          "endTime" => "N/A",
          "address" => "N/A",
          "idClient" => "N/A",
          "qrPath" => "N/A",
          "idTypeMaintenance" => "N/A",
          "observations" => "N/A",
          "idTechnicalUser1" => "N/A",
          "idTechnicalUser2" => "N/A",
          "idTechnicalUser3" => "N/A"]);
      }

      if ($array_info_client)
      {
        array_push($array_air_full,[
          "documentClient" => $array_info_client[0]["documentClient"],
          "nameClient" => $array_info_client[0]["nameClient"],
          "phoneClient" => $array_info_client[0]["phoneClient"],
          "clientFirmPath" => $array_info_client[0]["clientFirmPath"],
          "personInCharge" => $array_info_client[0]["personInCharge"]]);
      }
      else
      {
        array_push($array_air_full,[
          "documentClient" => "N/A",
          "nameClient" => "N/A",
          "phoneClient" => "N/A",
          "clientFirmPath" => "N/A",
          "personInCharge" => "N/A"]);
      }

      if ($array_city_and_department_air)
      {
        array_push($array_air_full,[
          "department" => $array_city_and_department_air[0]["Department"],
          "city" => $array_city_and_department_air[0]["City"]]);
      }
      else
      {
        array_push($array_air_full,[
          "department" =>  "N/A",
          "city" => "N/A"]);
      }

      if ($array_technical_data_info)
      {
        array_push($array_air_full,[
          "airDriveUnitMotorHp" => $array_technical_data_info[0]["airDriveUnitMotorHp"],
          "airDriveUnitMotorVolt" => $array_technical_data_info[0]["airDriveUnitMotorVolt"],
          "airDriveUnitMotorAmp" => $array_technical_data_info[0]["airDriveUnitMotorAmp"],
          "airDriveUnitMotorRPM" => $array_technical_data_info[0]["airDriveUnitMotorRPM"],
          "airDriveUnitMeasurementsV11_12" => $array_technical_data_info[0]["airDriveUnitMeasurementsV11_12"],
          "airDriveUnitMeasurementsV12_13" => $array_technical_data_info[0]["airDriveUnitMeasurementsV12_13"],
          "airDriveUnitMeasurementsV13_14" => $array_technical_data_info[0]["airDriveUnitMeasurementsV13_14"],
          "airDriveUnitAmpI1" => $array_technical_data_info[0]["airDriveUnitAmpI1"],
          "airDriveUnitAmpI2" => $array_technical_data_info[0]["airDriveUnitAmpI2"],
          "airDriveUnitAmpI3" => $array_technical_data_info[0]["airDriveUnitAmpI3"],
          "airCondensingPlateDataHp" => $array_technical_data_info[0]["airCondensingPlateDataHp"],
          "airCondensingPlateDataVol" => $array_technical_data_info[0]["airCondensingPlateDataVol"],
          "airCondensingPlateDataAmp" => $array_technical_data_info[0]["airCondensingPlateDataAmp"],
          "airCondensingMeasurementsV11_12" => $array_technical_data_info[0]["airCondensingMeasurementsV11_12"],
          "airCondensingMeasurementsV12_13" => $array_technical_data_info[0]["airCondensingMeasurementsV12_13"],
          "airCondensingMeasurementsV13_14" => $array_technical_data_info[0]["airCondensingMeasurementsV13_14"],
          "airCondensingAmpI1" => $array_technical_data_info[0]["airCondensingAmpI1"],
          "airCondensingAmpI2" => $array_technical_data_info[0]["airCondensingAmpI2"],
          "airCondensingAmpI3" => $array_technical_data_info[0]["airCondensingAmpI3"],
          "airCondensingPressuresHigh" => $array_technical_data_info[0]["airCondensingPressuresHigh"],
          "airCondensingPressuresLow" => $array_technical_data_info[0]["airCondensingPressuresLow"],
          "AirFanMotorRPM" => $array_technical_data_info[0]["AirFanMotorRPM"],
          "AirFanMotorVol" => $array_technical_data_info[0]["AirFanMotorVol"],
          "AirFanMotorAmp" => $array_technical_data_info[0]["AirFanMotorAmp"],
          "AirFanMotorHp" => $array_technical_data_info[0]["AirFanMotorHp"],
          "AirFanMotorAmpI1" => $array_technical_data_info[0]["AirFanMotorAmpI1"],
          "AirFanMotorAmpI2" => $array_technical_data_info[0]["AirFanMotorAmpI2"],
          "AirFanMotorAmpI3" => $array_technical_data_info[0]["AirFanMotorAmpI3"]]);
      }
      else
      {
        array_push($array_air_full,[
          "airDriveUnitMotorHp" => "N/A",
          "airDriveUnitMotorVolt" => "N/A",
          "airDriveUnitMotorAmp" => "N/A",
          "airDriveUnitMotorRPM" => "N/A",
          "airDriveUnitMeasurementsV11_12" => "N/A",
          "airDriveUnitMeasurementsV12_13" => "N/A",
          "airDriveUnitMeasurementsV13_14" => "N/A",
          "airDriveUnitAmpI1" => "N/A",
          "airDriveUnitAmpI2" => "N/A",
          "airDriveUnitAmpI3" => "N/A",
          "airCondensingPlateDataHp" => "N/A",
          "airCondensingPlateDataVol" => "N/A",
          "airCondensingPlateDataAmp" => "N/A",
          "airCondensingMeasurementsV11_12" => "N/A",
          "airCondensingMeasurementsV12_13" => "N/A",
          "airCondensingMeasurementsV13_14" => "N/A",
          "airCondensingAmpI1" => "N/A",
          "airCondensingAmpI2" => "N/A",
          "airCondensingAmpI3" => "N/A",
          "airCondensingPressuresHigh" => "N/A",
          "airCondensingPressuresLow" => "N/A",
          "AirFanMotorRPM" => "N/A",
          "AirFanMotorVol" => "N/A",
          "AirFanMotorAmp" => "N/A",
          "AirFanMotorHp" => "N/A",
          "AirFanMotorAmpI1" => "N/A",
          "AirFanMotorAmpI2" => "N/A",
          "AirFanMotorAmpI3" => "N/A"]);
      }

      if ($array_works_and_revisions_info)
      {
        array_push($array_air_full,[
          "WRInternalExternalCleaning" => $array_works_and_revisions_info[0]["WRInternalExternalCleaning"],
          "WRSnakeWashing" => $array_works_and_revisions_info[0]["WRSnakeWashing"],
          "WRAdjustmentOfStudBoltsOfRotorsBearings" => $array_works_and_revisions_info[0]["WRAdjustmentOfStudBoltsOfRotorsBearings"],
          "WRAirFilterWashing" => $array_works_and_revisions_info[0]["WRAirFilterWashing"],
          "WRBeltTensionAndChange" => $array_works_and_revisions_info[0]["WRBeltTensionAndChange"],
          "WRInspectionOfBearingsAndBearings" => $array_works_and_revisions_info[0]["WRInspectionOfBearingsAndBearings"],
          "WRDrainCleaning" => $array_works_and_revisions_info[0]["WRDrainCleaning"],
          "WRInternalInsulationCheck" => $array_works_and_revisions_info[0]["WRInternalInsulationCheck"],
          "WRMachineRoomCleaning" => $array_works_and_revisions_info[0]["WRMachineRoomCleaning"],
          "WRGeneralScrewAdjustment" => $array_works_and_revisions_info[0]["WRGeneralScrewAdjustment"],
          "WRExpansionValveCheck" => $array_works_and_revisions_info[0]["WRExpansionValveCheck"],
          "WRInspectionElectricalAccessoriesAndScrews" => $array_works_and_revisions_info[0]["WRInspectionElectricalAccessoriesAndScrews"],
          "WROperationAndAlarmLamps" => $array_works_and_revisions_info[0]["WROperationAndAlarmLamps"],
          "WRElectricalConsumptionReview" => $array_works_and_revisions_info[0]["WRElectricalConsumptionReview"],
          "WRRemoteControlReview" => $array_works_and_revisions_info[0]["WRRemoteControlReview"],
          "WRCondensatePumpCheck" => $array_works_and_revisions_info[0]["WRCondensatePumpCheck"],
          "WRThermostatRevision" => $array_works_and_revisions_info[0]["WRThermostatRevision"],
          "WREngineInspection" => $array_works_and_revisions_info[0]["WREngineInspection"],
          "generalCompressorUnitOperation" => $array_works_and_revisions_info[0]["generalCompressorUnitOperation"],
          "internalAndExternalCleaningCompressorUnit" => $array_works_and_revisions_info[0]["internalAndExternalCleaningCompressorUnit"],
          "snakeWashingCompressorUnit" => $array_works_and_revisions_info[0]["snakeWashingCompressorUnit"],
          "compressorUnitRotorOrFanSettings" => $array_works_and_revisions_info[0]["compressorUnitRotorOrFanSettings"],
          "compressorUnitForcedVentilationTemperature" => $array_works_and_revisions_info[0]["compressorUnitForcedVentilationTemperature"],
          "generalAdjustmentOfCompressorUnitScrews" => $array_works_and_revisions_info[0]["generalAdjustmentOfCompressorUnitScrews"],
          "reviewOfAccessoriesAndScrewsCompressorUnit" => $array_works_and_revisions_info[0]["reviewOfAccessoriesAndScrewsCompressorUnit"],
          "controlBoardBoltAdjustment" => $array_works_and_revisions_info[0]["controlBoardBoltAdjustment"],
          "compressorUnitNoise" => $array_works_and_revisions_info[0]["compressorUnitNoise"],
          "statusOfCompressorUnitSupports" => $array_works_and_revisions_info[0]["statusOfCompressorUnitSupports"],
          "compressorUnitExhaust" => $array_works_and_revisions_info[0]["compressorUnitExhaust"],
          "insulationJacketAluminumCoolingSystem" => $array_works_and_revisions_info[0]["insulationJacketAluminumCoolingSystem"],
          "filterDrierCoolingSystem" => $array_works_and_revisions_info[0]["filterDrierCoolingSystem"],
          "shearValvesCoolingSystem" => $array_works_and_revisions_info[0]["shearValvesCoolingSystem"],
          "exhaustPipeAndAccessoriesCoolingSystem" => $array_works_and_revisions_info[0]["exhaustPipeAndAccessoriesCoolingSystem"],
          "coolingSystemSupport" => $array_works_and_revisions_info[0]["coolingSystemSupport"],
          "coolingSystemSightGlass" => $array_works_and_revisions_info[0]["coolingSystemSightGlass"],
          "solenoidValveCoolingSystem" => $array_works_and_revisions_info[0]["solenoidValveCoolingSystem"],
          "suctionLineTempAndLiquidRefrigerationSystem" => $array_works_and_revisions_info[0]["suctionLineTempAndLiquidRefrigerationSystem"]]);
      }
      else
      {
        array_push($array_air_full,[
          "WRInternalExternalCleaning" => "N/A",
          "WRSnakeWashing" => "N/A",
          "WRAdjustmentOfStudBoltsOfRotorsBearings" => "N/A",
          "WRAirFilterWashing" => "N/A",
          "WRBeltTensionAndChange" => "N/A",
          "WRInspectionOfBearingsAndBearings" => "N/A",
          "WRDrainCleaning" => "N/A",
          "WRInternalInsulationCheck" => "N/A",
          "WRMachineRoomCleaning" => "N/A",
          "WRGeneralScrewAdjustment" => "N/A",
          "WRExpansionValveCheck" => "N/A",
          "WRInspectionElectricalAccessoriesAndScrews" => "N/A",
          "WROperationAndAlarmLamps" => "N/A",
          "WRElectricalConsumptionReview" => "N/A",
          "WRRemoteControlReview" => "N/A",
          "WRCondensatePumpCheck" => "N/A",
          "WRThermostatRevision" => "N/A",
          "WREngineInspection" => "N/A",
          "generalCompressorUnitOperation" => "N/A",
          "internalAndExternalCleaningCompressorUnit" => "N/A",
          "snakeWashingCompressorUnit" => "N/A",
          "compressorUnitRotorOrFanSettings" => "N/A",
          "compressorUnitForcedVentilationTemperature" => "N/A",
          "generalAdjustmentOfCompressorUnitScrews" => "N/A",
          "reviewOfAccessoriesAndScrewsCompressorUnit" => "N/A",
          "compressorUnitNoise" => "N/A",
          "statusOfCompressorUnitSupports" => "N/A",
          "compressorUnitExhaust" => "N/A",
          "controlBoardBoltAdjustment" => "N/A",
          "insulationJacketAluminumCoolingSystem" => "N/A",
          "filterDrierCoolingSystem" => "N/A",
          "shearValvesCoolingSystem" => "N/A",
          "exhaustPipeAndAccessoriesCoolingSystem" => "N/A",
          "coolingSystemSupport" => "N/A",
          "coolingSystemSightGlass" => "N/A",
          "solenoidValveCoolingSystem" => "N/A",
          "suctionLineTempAndLiquidRefrigerationSystem" => "N/A"]);
      }

      if ($array_cellar_air_info_product)
      {
        array_push($array_air_full,[
          "serialProduct" => $array_cellar_air_info_product[0]["serialProduct"],
          "Product" => $array_cellar_air_info_product[0]["Product"],
          "Brand" => $array_cellar_air_info_product[0]["Brand"],
          "pathDatasheet" => $array_cellar_air_info_product[0]["pathDatasheet"],
          "pathQR" => $array_cellar_air_info_product[0]["pathQR"],
          "idSupplier" => $array_cellar_air_info_product[0]["idSupplier"],
          "idProductStatus" => $array_cellar_air_info_product[0]["idProductStatus"],
          "capacity" => $array_cellar_air_info_product[0]["capacity"],
          "AirConditioningTypes" => $array_cellar_air_info_product[0]["AirConditioningTypes"]]);
      }
      else
      {
        array_push($array_air_full,[
          "serialProduct" => "N/A",
          "Product" => "N/A",
          "Brand" => "N/A",
          "pathDatasheet" => "N/A",
          "pathQR" => "N/A",
          "idSupplier" => "N/A",
          "idProductStatus" => "N/A",
          "capacity" => "N/A",
          "AirConditioningTypes" => "N/A"]);
      }

      for ($i=1; $i <= 3; $i++)
      {
        $array_info_technicals = search_info_technicals($array_result_air[0]["idTechnicalUser".$i]);
        if ($array_info_technicals)
        {
          array_push($array_air_full,[
            "documentTechnicalUser" => $array_info_technicals[0]["documentTechnicalUser"],
            "TechnicalUser" => $array_info_technicals[0]["TechnicalUser"],
            "Email" => $array_info_technicals[0]["Email"]]);
        }
        else
        {
          array_push($array_air_full,[
            "documentTechnicalUser" => "N/A",
            "TechnicalUser" => "N/A",
            "Email" => "N/A"]);
        }
      }

      template_pdf_air($array_air_full);

    }
    else if ($type_report == "motobomba")
    {
      $array_pump_full = array();

      include TEMPLATESPDF."template_pdf_report_pump.php";
      $array_result_pump = search_pumps_and_general_reports_info($id_report);
      $array_info_client = search_info_client($array_result_pump[0]["idClientInfo"]);
      $array_city_and_department_air = search_city_and_department_by_id($array_result_pump[0]["city"],$array_result_pump[0]["department"]);

      if ($array_result_pump)
      {
        array_push($array_pump_full,[
          "serialNumberReportPR" => $array_result_pump[0]["serialNumberReportPR"],
          "idClientInfo" => $array_result_pump[0]["idClientInfo"],
          "idTechnicalsReportsPR" => $array_result_pump[0]["idTechnicalsReportsPR"],
          "idGeneralInformationPR" => $array_result_pump[0]["idGeneralInformationPR"],
          "date_general" => $array_result_pump[0]["date_general"],
          "startTime" => $array_result_pump[0]["startTime"],
          "endTime" => $array_result_pump[0]["endTime"],
          "department" => $array_city_and_department_air[0]["Department"],
          "city" => $array_city_and_department_air[0]["City"],
          "address" => $array_result_pump[0]["address"],
          "idClient" => $array_result_pump[0]["idClient"],
          "qrPath" => $array_result_pump[0]["qrPath"],
          "idTypeMaintenance" => $array_result_pump[0]["idTypeMaintenance"],
          "observations" => $array_result_pump[0]["observations"]]);
      }
      else
      {
        array_push($array_pump_full,[
          "serialNumberReportPR" => "N/A",
          "idClientInfo" => "N/A",
          "idTechnicalsReportsPR" => "N/A",
          "idGeneralInformationPR" => "N/A",
          "date_general" => "N/A",
          "startTime" => "N/A",
          "endTime" => "N/A",
          "department" => "N/A",
          "city" => "N/A",
          "address" => "N/A",
          "idClient" => "N/A",
          "qrPath" => "N/A",
          "idTypeMaintenance" => "N/A",
          "observations" => "N/A"]);
      }

      if ($array_info_client)
      {
        array_push($array_pump_full,[
          "documentClient" => $array_info_client[0]["documentClient"],
          "nameClient" => $array_info_client[0]["nameClient"],
          "phoneClient" => $array_info_client[0]["phoneClient"],
          "clientFirmPath" => $array_info_client[0]["clientFirmPath"],
          "personInCharge" => $array_info_client[0]["personInCharge"]]);
      }
      else
      {
        array_push($array_pump_full,[
          "documentClient" => "N/A",
          "nameClient" => "N/A",
          "phoneClient" => "N/A",
          "clientFirmPath" => "N/A",
          "personInCharge" => "N/A"]);
      }

      for ($j=1; $j <= 4; $j++)
      {
        $array_info_pumps_aditional = search_aditional_info_pumps($array_result_pump[0]["idPumpsReportsAditionalInfo".$j]);
        $array_info_pumps_cellar = search_info_pumps_cellar($array_info_pumps_aditional[0]["idCellarGeneralInfoProduct"]);

        //annadiendo informacion adicional
        if ($array_info_pumps_aditional)
        {
          array_push($array_pump_full,[
            "controlPanel" => $array_info_pumps_aditional[0]["controlPanel"],
            "protection" => $array_info_pumps_aditional[0]["protection"],
            "hydroTank" => $array_info_pumps_aditional[0]["hydroTank"],
            "workPressure" => $array_info_pumps_aditional[0]["workPressure"],
            "preload" => $array_info_pumps_aditional[0]["preload"],
            "electricFloat" => $array_info_pumps_aditional[0]["electricFloat"],
            "hydraulicPart" => $array_info_pumps_aditional[0]["hydraulicPart"]]);
        }
        else
        {
          array_push($array_pump_full,[
            "controlPanel" => "N/A",
            "protection" => "N/A",
            "hydroTank" => "N/A",
            "workPressure" => "N/A",
            "preload" => "N/A",
            "electricFloat" => "N/A",
            "hydraulicPart" => "N/A"]);
        }

        if ($array_info_pumps_cellar)
        {
          array_push($array_pump_full,[
            "serialProduct" => $array_info_pumps_cellar[0]["serialProduct"],
            "Product" => $array_info_pumps_cellar[0]["Product"],
            "Brand" => $array_info_pumps_cellar[0]["Brand"],
            "pathDatasheet" => $array_info_pumps_cellar[0]["pathDatasheet"],
            "pathQR" => $array_info_pumps_cellar[0]["pathQR"],
            "idTypeProduct" => $array_info_pumps_cellar[0]["idTypeProduct"],
            "idSupplier" => $array_info_pumps_cellar[0]["idSupplier"],
            "voltage" => $array_info_pumps_cellar[0]["voltage"],
            "hp" => $array_info_pumps_cellar[0]["hp"],
            "amps" => $array_info_pumps_cellar[0]["amps"],
            "capacity" => $array_info_pumps_cellar[0]["capacity"],
            "pumpType" => $array_info_pumps_cellar[0]["pumpType"]]);
        }
        else
        {
          array_push($array_pump_full,[
            "serialProduct" => "N/A",
            "Product" => "N/A",
            "Brand" => "N/A",
            "pathDatasheet" => "N/A",
            "pathQR" => "N/A",
            "idTypeProduct" => "N/A",
            "idSupplier" => "N/A",
            "voltage" => "N/A",
            "hp" => "N/A",
            "amps" => "N/A",
            "capacity" => "N/A",
            "pumpType" => "N/A"]);
        }
      }

      for ($i=1; $i <= 3; $i++)
      {
        $array_info_technicals = search_info_technicals($array_result_pump[0]["idTechnicalUser".$i]);
        if ($array_info_technicals)
        {
          array_push($array_pump_full,[
            "documentTechnicalUser" => $array_info_technicals[0]["documentTechnicalUser"],
            "TechnicalUser" => $array_info_technicals[0]["TechnicalUser"],
            "Email" => $array_info_technicals[0]["Email"]]);
        }
        else
        {
          array_push($array_pump_full,[
            "documentTechnicalUser" => "N/A",
            "TechnicalUser" => "N/A",
            "Email" => "N/A"]);
        }
      }
      template_pdf_pump($array_pump_full);
    }
  }
  else
  {
    end_session();
    echo "Redirigir";
  }
