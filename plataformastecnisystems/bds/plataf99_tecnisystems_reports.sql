-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-09-2022 a las 16:51:16
-- Versión del servidor: 8.0.29-cll-lve
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataf99_tecnisystems_reports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `airIntake_system`
--

CREATE TABLE `airIntake_system` (
  `idAirIntakeSystem` int NOT NULL,
  `connectionReview` tinyint(1) NOT NULL,
  `casingAndFilterCheck` tinyint(1) NOT NULL,
  `turboReview` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `airIntake_system`
--

INSERT INTO `airIntake_system` (`idAirIntakeSystem`, `connectionReview`, `casingAndFilterCheck`, `turboReview`) VALUES
(1, 1, 0, 0),
(2, 1, 0, 0),
(3, 1, 0, 0),
(4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_condensing_unit`
--

CREATE TABLE `air_condensing_unit` (
  `idAirCondensingUnit` int NOT NULL,
  `airCondensingPlateDataHp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingPlateDataVol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingPlateDataAmp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingMeasurementsV11_12` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingMeasurementsV12_13` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingMeasurementsV13_14` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingAmpI1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingAmpI2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingAmpI3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingPressuresHigh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `airCondensingPressuresLow` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_condensing_unit`
--

INSERT INTO `air_condensing_unit` (`idAirCondensingUnit`, `airCondensingPlateDataHp`, `airCondensingPlateDataVol`, `airCondensingPlateDataAmp`, `airCondensingMeasurementsV11_12`, `airCondensingMeasurementsV12_13`, `airCondensingMeasurementsV13_14`, `airCondensingAmpI1`, `airCondensingAmpI2`, `airCondensingAmpI3`, `airCondensingPressuresHigh`, `airCondensingPressuresLow`) VALUES
(1, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_drive_unit`
--

CREATE TABLE `air_drive_unit` (
  `idAirDriveUnit` int NOT NULL,
  `airDriveUnitMotorHp` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitMotorVolt` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitMotorAmp` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitMotorRPM` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitMeasurementsV11_12` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitMeasurementsV12_13` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitMeasurementsV13_14` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitAmpI1` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitAmpI2` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airDriveUnitAmpI3` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_drive_unit`
--

INSERT INTO `air_drive_unit` (`idAirDriveUnit`, `airDriveUnitMotorHp`, `airDriveUnitMotorVolt`, `airDriveUnitMotorAmp`, `airDriveUnitMotorRPM`, `airDriveUnitMeasurementsV11_12`, `airDriveUnitMeasurementsV12_13`, `airDriveUnitMeasurementsV13_14`, `airDriveUnitAmpI1`, `airDriveUnitAmpI2`, `airDriveUnitAmpI3`) VALUES
(1, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_fan_motor`
--

CREATE TABLE `air_fan_motor` (
  `idAirFanMotor` int NOT NULL,
  `AirFanMotorRPM` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AirFanMotorVol` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AirFanMotorAmp` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AirFanMotorHp` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AirFanMotorAmpI1` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AirFanMotorAmpI2` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AirFanMotorAmpI3` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_fan_motor`
--

INSERT INTO `air_fan_motor` (`idAirFanMotor`, `AirFanMotorRPM`, `AirFanMotorVol`, `AirFanMotorAmp`, `AirFanMotorHp`, `AirFanMotorAmpI1`, `AirFanMotorAmpI2`, `AirFanMotorAmpI3`) VALUES
(1, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_report`
--

CREATE TABLE `air_report` (
  `idAirReport` int NOT NULL,
  `serialNumberReport` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `branchOffice` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idCellarGeneralInfoProduct` int NOT NULL,
  `idClientInfo` int NOT NULL,
  `idTechnicalsReports` int NOT NULL,
  `idGeneralInformation` int NOT NULL,
  `idAirTechnicalDataMeasurements` int NOT NULL,
  `idAirWorksAndRevisionsCarriedOut` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_report`
--

INSERT INTO `air_report` (`idAirReport`, `serialNumberReport`, `area`, `branchOffice`, `idCellarGeneralInfoProduct`, `idClientInfo`, `idTechnicalsReports`, `idGeneralInformation`, `idAirTechnicalDataMeasurements`, `idAirWorksAndRevisionsCarriedOut`) VALUES
(1, 'TRA2209011447000001', 'b', 'norte', 3, 1, 5, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_technical_data_measurements`
--

CREATE TABLE `air_technical_data_measurements` (
  `idAirTechnicalDataMeasurements` int NOT NULL,
  `idAirDriveUnit` int NOT NULL,
  `idAirCondensingUnit` int NOT NULL,
  `idAirFanMotor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_technical_data_measurements`
--

INSERT INTO `air_technical_data_measurements` (`idAirTechnicalDataMeasurements`, `idAirDriveUnit`, `idAirCondensingUnit`, `idAirFanMotor`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_works_and_revisions_carried_out`
--

CREATE TABLE `air_works_and_revisions_carried_out` (
  `idAirWorksAndRevisionsCarriedOut` int NOT NULL,
  `idWRDriveUnit` int NOT NULL,
  `idWRCondensingAndCompressorUnit` int NOT NULL,
  `idWRRefrigerationSystemInterconnection` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_works_and_revisions_carried_out`
--

INSERT INTO `air_works_and_revisions_carried_out` (`idAirWorksAndRevisionsCarriedOut`, `idWRDriveUnit`, `idWRCondensingAndCompressorUnit`, `idWRRefrigerationSystemInterconnection`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_w_r_condensing_and_compressor_unit`
--

CREATE TABLE `air_w_r_condensing_and_compressor_unit` (
  `idWRCondensingAndCompressorUnit` int NOT NULL,
  `generalCompressorUnitOperation` int NOT NULL,
  `internalAndExternalCleaningCompressorUnit` int NOT NULL,
  `snakeWashingCompressorUnit` int NOT NULL,
  `compressorUnitRotorOrFanSettings` int NOT NULL,
  `compressorUnitForcedVentilationTemperature` int NOT NULL,
  `generalAdjustmentOfCompressorUnitScrews` int NOT NULL,
  `reviewOfAccessoriesAndScrewsCompressorUnit` int NOT NULL,
  `compressorUnitNoise` int NOT NULL,
  `statusOfCompressorUnitSupports` int NOT NULL,
  `compressorUnitExhaust` int NOT NULL,
  `controlBoardBoltAdjustment` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_w_r_condensing_and_compressor_unit`
--

INSERT INTO `air_w_r_condensing_and_compressor_unit` (`idWRCondensingAndCompressorUnit`, `generalCompressorUnitOperation`, `internalAndExternalCleaningCompressorUnit`, `snakeWashingCompressorUnit`, `compressorUnitRotorOrFanSettings`, `compressorUnitForcedVentilationTemperature`, `generalAdjustmentOfCompressorUnitScrews`, `reviewOfAccessoriesAndScrewsCompressorUnit`, `compressorUnitNoise`, `statusOfCompressorUnitSupports`, `compressorUnitExhaust`, `controlBoardBoltAdjustment`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_w_r_drive_unit`
--

CREATE TABLE `air_w_r_drive_unit` (
  `idWRDriveUnit` int NOT NULL,
  `WRInternalExternalCleaning` int NOT NULL,
  `WRSnakeWashing` int NOT NULL,
  `WRAdjustmentOfStudBoltsOfRotorsBearings` int NOT NULL,
  `WRAirFilterWashing` int NOT NULL,
  `WRBeltTensionAndChange` int NOT NULL,
  `WRInspectionOfBearingsAndBearings` int NOT NULL,
  `WRDrainCleaning` int NOT NULL,
  `WRInternalInsulationCheck` int NOT NULL,
  `WRMachineRoomCleaning` int NOT NULL,
  `WRGeneralScrewAdjustment` int NOT NULL,
  `WRExpansionValveCheck` int NOT NULL,
  `WRInspectionElectricalAccessoriesAndScrews` int NOT NULL,
  `WROperationAndAlarmLamps` int NOT NULL,
  `WRElectricalConsumptionReview` int NOT NULL,
  `WRRemoteControlReview` int NOT NULL,
  `WRCondensatePumpCheck` int NOT NULL,
  `WRThermostatRevision` int NOT NULL,
  `WREngineInspection` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_w_r_drive_unit`
--

INSERT INTO `air_w_r_drive_unit` (`idWRDriveUnit`, `WRInternalExternalCleaning`, `WRSnakeWashing`, `WRAdjustmentOfStudBoltsOfRotorsBearings`, `WRAirFilterWashing`, `WRBeltTensionAndChange`, `WRInspectionOfBearingsAndBearings`, `WRDrainCleaning`, `WRInternalInsulationCheck`, `WRMachineRoomCleaning`, `WRGeneralScrewAdjustment`, `WRExpansionValveCheck`, `WRInspectionElectricalAccessoriesAndScrews`, `WROperationAndAlarmLamps`, `WRElectricalConsumptionReview`, `WRRemoteControlReview`, `WRCondensatePumpCheck`, `WRThermostatRevision`, `WREngineInspection`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_w_r_refrigeration_system_interconnection`
--

CREATE TABLE `air_w_r_refrigeration_system_interconnection` (
  `idWRRefrigerationSystemInterconnection` int NOT NULL,
  `insulationJacketAluminumCoolingSystem` int NOT NULL,
  `filterDrierCoolingSystem` int NOT NULL,
  `shearValvesCoolingSystem` int NOT NULL,
  `exhaustPipeAndAccessoriesCoolingSystem` int NOT NULL,
  `coolingSystemSupport` int NOT NULL,
  `coolingSystemSightGlass` int NOT NULL,
  `solenoidValveCoolingSystem` int NOT NULL,
  `suctionLineTempAndLiquidRefrigerationSystem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_w_r_refrigeration_system_interconnection`
--

INSERT INTO `air_w_r_refrigeration_system_interconnection` (`idWRRefrigerationSystemInterconnection`, `insulationJacketAluminumCoolingSystem`, `filterDrierCoolingSystem`, `shearValvesCoolingSystem`, `exhaustPipeAndAccessoriesCoolingSystem`, `coolingSystemSupport`, `coolingSystemSightGlass`, `solenoidValveCoolingSystem`, `suctionLineTempAndLiquidRefrigerationSystem`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alternating_current_system`
--

CREATE TABLE `alternating_current_system` (
  `idAlternatingCurrentSystem` int NOT NULL,
  `voltmeterReview` tinyint(1) NOT NULL,
  `frequencyMeterReview` tinyint(1) NOT NULL,
  `ammeterReview` tinyint(1) NOT NULL,
  `checkElectricalConnectionsAndTerminals` tinyint(1) NOT NULL,
  `breakerReview` tinyint(1) NOT NULL,
  `contactorsReview` tinyint(1) NOT NULL,
  `powerCableCheck` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alternating_current_system`
--

INSERT INTO `alternating_current_system` (`idAlternatingCurrentSystem`, `voltmeterReview`, `frequencyMeterReview`, `ammeterReview`, `checkElectricalConnectionsAndTerminals`, `breakerReview`, `contactorsReview`, `powerCableCheck`) VALUES
(1, 1, 1, 1, 0, 0, 0, 0),
(2, 1, 1, 1, 0, 0, 0, 0),
(3, 1, 1, 1, 1, 0, 0, 0),
(4, 1, 1, 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cooling_system`
--

CREATE TABLE `cooling_system` (
  `idCoolingSystem` int NOT NULL,
  `connectionCheck` tinyint(1) NOT NULL,
  `checkConditionStraps` tinyint(1) NOT NULL,
  `conditionCheckAndCoolantLevel` tinyint(1) NOT NULL,
  `radiatorConditionCheck` tinyint(1) NOT NULL,
  `waterLevelSensorCheck` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cooling_system`
--

INSERT INTO `cooling_system` (`idCoolingSystem`, `connectionCheck`, `checkConditionStraps`, `conditionCheckAndCoolantLevel`, `radiatorConditionCheck`, `waterLevelSensorCheck`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 0, 0, 1),
(4, 1, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direct_current_system`
--

CREATE TABLE `direct_current_system` (
  `idDirectCurrentSystem` int NOT NULL,
  `alternatorBeltCheck` tinyint(1) NOT NULL,
  `checkElectricalConnections` tinyint(1) NOT NULL,
  `batteryStatusAndAcidLevelCheck` tinyint(1) NOT NULL,
  `checkBatteryAndChargeTerminals` tinyint(1) NOT NULL,
  `batteryChargerReview` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `direct_current_system`
--

INSERT INTO `direct_current_system` (`idDirectCurrentSystem`, `alternatorBeltCheck`, `checkElectricalConnections`, `batteryStatusAndAcidLevelCheck`, `checkBatteryAndChargeTerminals`, `batteryChargerReview`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 0, 1, 0),
(4, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electrical_reports`
--

CREATE TABLE `electrical_reports` (
  `idElectricalReport` int NOT NULL,
  `serialNumberER` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idCellarGeneralInfoProduct` int NOT NULL,
  `idClientInfo` int NOT NULL,
  `idOfflineJobsEP` int NOT NULL,
  `idRegisterPowerPlantParameters` int NOT NULL,
  `idTechnicalsReportsER` int NOT NULL,
  `idGeneralInformationER` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `electrical_reports`
--

INSERT INTO `electrical_reports` (`idElectricalReport`, `serialNumberER`, `idCellarGeneralInfoProduct`, `idClientInfo`, `idOfflineJobsEP`, `idRegisterPowerPlantParameters`, `idTechnicalsReportsER`, `idGeneralInformationER`) VALUES
(1, 'TRE2208261134000001', 1, 1, 1, 1, 1, 1),
(2, 'TRE2208261100000002', 1, 1, 2, 2, 2, 2),
(3, 'TRE2208302241000003', 1, 1, 3, 3, 3, 3),
(4, 'TRE2208312104000004', 1, 1, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empty_tests`
--

CREATE TABLE `empty_tests` (
  `idEmptyTests` int NOT NULL,
  `vl1N` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vl2N` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vl3N` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vlL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hz` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `startingCurrentCC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `batteryVoltage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amps` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `engineOilPressure` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `engineTemperature` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RPM` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empty_tests`
--

INSERT INTO `empty_tests` (`idEmptyTests`, `vl1N`, `vl2N`, `vl3N`, `vlL`, `hz`, `startingCurrentCC`, `batteryVoltage`, `amps`, `engineOilPressure`, `engineTemperature`, `RPM`) VALUES
(1, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(2, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(3, '12v', '25amp', '12a', '12', '12', '12', '12', '12', '12', '12', '12'),
(4, '12v', '25amp', '12a', '12', '12', '12', '12', '12', '12', '12', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Fuel_system`
--

CREATE TABLE `Fuel_system` (
  `idFuelSystem` int NOT NULL,
  `leakCheck` tinyint(1) NOT NULL,
  `connectionCheck` tinyint(1) NOT NULL,
  `filterSeparatorReview` tinyint(1) NOT NULL,
  `auxiliaryPumpOrCylinderCheck` tinyint(1) NOT NULL,
  `fuelTankCheck` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Fuel_system`
--

INSERT INTO `Fuel_system` (`idFuelSystem`, `leakCheck`, `connectionCheck`, `filterSeparatorReview`, `auxiliaryPumpOrCylinderCheck`, `fuelTankCheck`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 0, 1, 1),
(4, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_information`
--

CREATE TABLE `general_information` (
  `idGeneralInformation` int NOT NULL,
  `date_general` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `department` int NOT NULL,
  `city` int NOT NULL,
  `address` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idClient` int NOT NULL,
  `qrPath` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idTypeMaintenance` int NOT NULL,
  `observations` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `general_information`
--

INSERT INTO `general_information` (`idGeneralInformation`, `date_general`, `startTime`, `endTime`, `department`, `city`, `address`, `idClient`, `qrPath`, `idTypeMaintenance`, `observations`) VALUES
(1, '2022-08-26', '04:05:00', '06:05:00', 6, 309, 'calle 1# 1- 1', 1, './../documents/qrs/QR_photo_serial_123.png', 2, 'N/A'),
(2, '2022-08-26', '04:05:00', '06:05:00', 6, 309, 'calle 1# 1- 1', 1, './../documents/qrs/QR_photo_serial_123.png', 2, 'N/A'),
(3, '2022-08-30', '10:00:00', '10:30:00', 6, 309, 'calle 1# 1- 1', 1, './../documents/qrs/QR_photo_serial_123.png', 1, 'maquina en perfecto estado de funcionamiento.'),
(4, '2022-08-30', '10:10:00', '10:30:00', 6, 309, 'calle 1# 1- 1', 1, './../documents/qrs/QR_photo_serial_123.png', 1, 'maquina en perfecto estado de funcionamiento.'),
(5, '2022-09-01', '17:05:00', '17:30:00', 6, 309, 'calle 1# 1- 1', 1, './../documents/qrs/QR_photo_serial_aire123.png', 1, 'maquina en perfecto estado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `load_tests`
--

CREATE TABLE `load_tests` (
  `idLoadTests` int NOT NULL,
  `vl1N` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vl2N` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vl3N` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vlL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hz` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `al1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `al2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `al3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `batteryVoltage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amps` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `engineOilPressure` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `engineTemperature` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RPM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `previousHourMeterReading` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `currentHourMeterReading` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `loadTransfer` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `fullLevel` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `load_tests`
--

INSERT INTO `load_tests` (`idLoadTests`, `vl1N`, `vl2N`, `vl3N`, `vlL`, `hz`, `al1`, `al2`, `al3`, `batteryVoltage`, `amps`, `engineOilPressure`, `engineTemperature`, `RPM`, `previousHourMeterReading`, `currentHourMeterReading`, `loadTransfer`, `fullLevel`) VALUES
(1, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'B', 'f'),
(2, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'B', 'f'),
(3, '12', '12', '23', '23v', '23hz', '12', '11', '1', '1', '11', '22', '33grados', '15rpm', '12', '14', 'M', 'm'),
(4, '12', '12', '23', '23v', '23hz', '12', '11', '1', '1', '11', '22', '33grados', '15rpm', '12', '14', 'M', 'm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lubrication_system`
--

CREATE TABLE `lubrication_system` (
  `idLubricationSystem` int NOT NULL,
  `connectionCheck` tinyint(1) NOT NULL,
  `filterCheck` tinyint(1) NOT NULL,
  `filterChanges` tinyint(1) NOT NULL,
  `conditionCheckAndOilLevel` tinyint(1) NOT NULL,
  `oilChanges` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lubrication_system`
--

INSERT INTO `lubrication_system` (`idLubricationSystem`, `connectionCheck`, `filterCheck`, `filterChanges`, `conditionCheckAndOilLevel`, `oilChanges`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offline_jobs_electric_plant`
--

CREATE TABLE `offline_jobs_electric_plant` (
  `idOfflineJobsEP` int NOT NULL,
  `idLubricationSystem` int NOT NULL,
  `idFuelSystem` int NOT NULL,
  `idAirIntakeSystem` int NOT NULL,
  `idCoolingSystem` int NOT NULL,
  `idDirectCurrentSystem` int NOT NULL,
  `idAlternatingCurrentSystem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `offline_jobs_electric_plant`
--

INSERT INTO `offline_jobs_electric_plant` (`idOfflineJobsEP`, `idLubricationSystem`, `idFuelSystem`, `idAirIntakeSystem`, `idCoolingSystem`, `idDirectCurrentSystem`, `idAlternatingCurrentSystem`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 2, 2, 2, 2, 2, 2),
(3, 3, 3, 3, 3, 3, 3),
(4, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pumps_reports_aditional_info`
--

CREATE TABLE `pumps_reports_aditional_info` (
  `idPumpsReportsAditionalInfo` int NOT NULL,
  `controlPanel` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `protection` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `hydroTank` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `workPressure` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `preload` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `electricFloat` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `hydraulicPart` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idCellarGeneralInfoProduct` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pumps_reports_aditional_info`
--

INSERT INTO `pumps_reports_aditional_info` (`idPumpsReportsAditionalInfo`, `controlPanel`, `protection`, `hydroTank`, `workPressure`, `preload`, `electricFloat`, `hydraulicPart`, `idCellarGeneralInfoProduct`) VALUES
(1, '123', '234', '456', '543', '123', '456', '7654', 4),
(2, '123', '234', '456', '543', '123', '456', '7654', 4),
(3, '123', '234', '456', '543', '123', '456', '7654', 4),
(4, '123', '123', '123', '123', '123', '123', '123', 4),
(5, '123', '123', '123', '123', '123', '123', '123', 4),
(6, '1', '2', '3', '4', '5', '6', '7', 4),
(7, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(8, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(9, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(10, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(11, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(12, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(13, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(14, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(15, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4),
(16, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pumps_reports_pumps_aditional`
--

CREATE TABLE `pumps_reports_pumps_aditional` (
  `idPumpsReportsPumpsAditional` int NOT NULL,
  `idPumpsReportsAditionalInfo1` int NOT NULL,
  `idPumpsReportsAditionalInfo2` int NOT NULL,
  `idPumpsReportsAditionalInfo3` int NOT NULL,
  `idPumpsReportsAditionalInfo4` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pump_report`
--

CREATE TABLE `pump_report` (
  `idPumpReport` int NOT NULL,
  `serialNumberReportPR` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idClientInfo` int NOT NULL,
  `idTechnicalsReportsPR` int NOT NULL,
  `idGeneralInformationPR` int NOT NULL,
  `idPumpsReportsPumpsAditional` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `register_power_plant_parameters`
--

CREATE TABLE `register_power_plant_parameters` (
  `idRegisterPowerPlantParameters` int NOT NULL,
  `idEmptyTests` int NOT NULL,
  `idLoadTests` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `register_power_plant_parameters`
--

INSERT INTO `register_power_plant_parameters` (`idRegisterPowerPlantParameters`, `idEmptyTests`, `idLoadTests`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_technical`
--

CREATE TABLE `role_technical` (
  `idRole` int NOT NULL,
  `Role` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `role_technical`
--

INSERT INTO `role_technical` (`idRole`, `Role`) VALUES
(1, 'técnico eléctrico'),
(2, 'técnico aire acondicionado'),
(3, 'técnico motobombas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_users`
--

CREATE TABLE `state_users` (
  `idStateUser` int NOT NULL,
  `StateUser` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `state_users`
--

INSERT INTO `state_users` (`idStateUser`, `StateUser`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `technicals_reports`
--

CREATE TABLE `technicals_reports` (
  `idTechnicalsReports` int NOT NULL,
  `idTechnicalUser1` int NOT NULL,
  `idTechnicalUser2` int NOT NULL,
  `idTechnicalUser3` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `technicals_reports`
--

INSERT INTO `technicals_reports` (`idTechnicalsReports`, `idTechnicalUser1`, `idTechnicalUser2`, `idTechnicalUser3`) VALUES
(1, 5, 0, 0),
(2, 5, 0, 0),
(3, 1, 0, 0),
(4, 1, 0, 0),
(5, 2, 0, 0),
(6, 3, 0, 0),
(7, 3, 0, 0),
(8, 3, 0, 0),
(9, 3, 0, 0),
(10, 3, 0, 0),
(11, 3, 0, 0),
(12, 3, 0, 0),
(13, 3, 0, 0),
(14, 3, 0, 0),
(15, 3, 0, 0),
(16, 3, 0, 0),
(17, 3, 0, 0),
(18, 3, 0, 0),
(19, 3, 0, 0),
(20, 3, 0, 0),
(21, 3, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `technical_users`
--

CREATE TABLE `technical_users` (
  `idTechnicalUser` int NOT NULL,
  `documentTechnicalUser` int NOT NULL,
  `TechnicalUser` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `Passw` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `userToken` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `path_technical_firm` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idRole` int NOT NULL,
  `idStateUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `technical_users`
--

INSERT INTO `technical_users` (`idTechnicalUser`, `documentTechnicalUser`, `TechnicalUser`, `Email`, `Passw`, `userToken`, `path_technical_firm`, `idRole`, `idStateUser`) VALUES
(1, 1057591776, 'electricoPrueba1', 'electricoPrueba1@gmail.com', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', '$2y$10$J0Hlyxq.LYd2aWsaaVVxv.VLnvprrrXkXzMTORj/VHmF/n.Cv0JqS', './imgs/', 1, 1),
(2, 1057591786, 'airePrueba1', 'airePrueba1@gmail.com', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', '$2y$10$9TQRMOLaMGxKFFNZJuTY2ObVHMscm43jSv0C89ANCzsqmHDeXXrNa', './imgs/', 2, 1),
(3, 1057591787, 'motobombaPrueba1', 'motobombaPrueba1@gmail.com', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', '$2y$10$d4IOhJFUmkPooge6nOiV2O1zRFDk8Mv9/JALgL5XqDPzYl8QTBSxC', './imgs/', 3, 1),
(5, 74185595, 'Omar', 'omardeyaruqui@gmail.com', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', '$2y$10$Gj1czFQgHG8PkTK7FgxsJOOz6jbQE7jY/mAf0upes2JmDYZrRiR3q', './imgs/', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_maintenance`
--

CREATE TABLE `type_maintenance` (
  `idTypeMaintenance` int NOT NULL,
  `TypeMaintenance` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `type_maintenance`
--

INSERT INTO `type_maintenance` (`idTypeMaintenance`, `TypeMaintenance`) VALUES
(1, 'preventivo'),
(2, 'correctivo'),
(3, 'inspección'),
(4, 'emergencia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `airIntake_system`
--
ALTER TABLE `airIntake_system`
  ADD PRIMARY KEY (`idAirIntakeSystem`);

--
-- Indices de la tabla `air_condensing_unit`
--
ALTER TABLE `air_condensing_unit`
  ADD PRIMARY KEY (`idAirCondensingUnit`);

--
-- Indices de la tabla `air_drive_unit`
--
ALTER TABLE `air_drive_unit`
  ADD PRIMARY KEY (`idAirDriveUnit`);

--
-- Indices de la tabla `air_fan_motor`
--
ALTER TABLE `air_fan_motor`
  ADD PRIMARY KEY (`idAirFanMotor`);

--
-- Indices de la tabla `air_report`
--
ALTER TABLE `air_report`
  ADD PRIMARY KEY (`idAirReport`),
  ADD KEY `idTechnicalsReports` (`idTechnicalsReports`),
  ADD KEY `idGeneralInformation` (`idGeneralInformation`),
  ADD KEY `idCellarGeneralInfoProduct` (`idCellarGeneralInfoProduct`),
  ADD KEY `idAirTechnicalDataMeasurements` (`idAirTechnicalDataMeasurements`),
  ADD KEY `idAirWorksAndRevisionsCarriedOut` (`idAirWorksAndRevisionsCarriedOut`);

--
-- Indices de la tabla `air_technical_data_measurements`
--
ALTER TABLE `air_technical_data_measurements`
  ADD PRIMARY KEY (`idAirTechnicalDataMeasurements`),
  ADD KEY `idAirDriveUnit` (`idAirDriveUnit`),
  ADD KEY `idAirCondensingUnit` (`idAirCondensingUnit`),
  ADD KEY `idAirFanMotor` (`idAirFanMotor`);

--
-- Indices de la tabla `air_works_and_revisions_carried_out`
--
ALTER TABLE `air_works_and_revisions_carried_out`
  ADD PRIMARY KEY (`idAirWorksAndRevisionsCarriedOut`),
  ADD KEY `idWRCondensingAndCompressorUnit` (`idWRCondensingAndCompressorUnit`),
  ADD KEY `idWRDriveUnit` (`idWRDriveUnit`),
  ADD KEY `idWRRefrigerationSystemInterconnection` (`idWRRefrigerationSystemInterconnection`);

--
-- Indices de la tabla `air_w_r_condensing_and_compressor_unit`
--
ALTER TABLE `air_w_r_condensing_and_compressor_unit`
  ADD PRIMARY KEY (`idWRCondensingAndCompressorUnit`);

--
-- Indices de la tabla `air_w_r_drive_unit`
--
ALTER TABLE `air_w_r_drive_unit`
  ADD PRIMARY KEY (`idWRDriveUnit`);

--
-- Indices de la tabla `air_w_r_refrigeration_system_interconnection`
--
ALTER TABLE `air_w_r_refrigeration_system_interconnection`
  ADD PRIMARY KEY (`idWRRefrigerationSystemInterconnection`);

--
-- Indices de la tabla `alternating_current_system`
--
ALTER TABLE `alternating_current_system`
  ADD PRIMARY KEY (`idAlternatingCurrentSystem`);

--
-- Indices de la tabla `cooling_system`
--
ALTER TABLE `cooling_system`
  ADD PRIMARY KEY (`idCoolingSystem`);

--
-- Indices de la tabla `direct_current_system`
--
ALTER TABLE `direct_current_system`
  ADD PRIMARY KEY (`idDirectCurrentSystem`);

--
-- Indices de la tabla `electrical_reports`
--
ALTER TABLE `electrical_reports`
  ADD PRIMARY KEY (`idElectricalReport`),
  ADD KEY `idGeneralInformationER` (`idGeneralInformationER`),
  ADD KEY `idTechnicalsReportsER` (`idTechnicalsReportsER`),
  ADD KEY `idOfflineJobsEP` (`idOfflineJobsEP`),
  ADD KEY `idRegisterPowerPlantParameters` (`idRegisterPowerPlantParameters`);

--
-- Indices de la tabla `empty_tests`
--
ALTER TABLE `empty_tests`
  ADD PRIMARY KEY (`idEmptyTests`);

--
-- Indices de la tabla `Fuel_system`
--
ALTER TABLE `Fuel_system`
  ADD PRIMARY KEY (`idFuelSystem`);

--
-- Indices de la tabla `general_information`
--
ALTER TABLE `general_information`
  ADD PRIMARY KEY (`idGeneralInformation`),
  ADD KEY `idTypeMaintenance` (`idTypeMaintenance`);

--
-- Indices de la tabla `load_tests`
--
ALTER TABLE `load_tests`
  ADD PRIMARY KEY (`idLoadTests`);

--
-- Indices de la tabla `lubrication_system`
--
ALTER TABLE `lubrication_system`
  ADD PRIMARY KEY (`idLubricationSystem`);

--
-- Indices de la tabla `offline_jobs_electric_plant`
--
ALTER TABLE `offline_jobs_electric_plant`
  ADD PRIMARY KEY (`idOfflineJobsEP`),
  ADD KEY `idLubricationSystem` (`idLubricationSystem`),
  ADD KEY `idFuelSystem` (`idFuelSystem`),
  ADD KEY `idAirIntakeSystem` (`idAirIntakeSystem`),
  ADD KEY `idCoolingSystem` (`idCoolingSystem`),
  ADD KEY `idDirectCurrentSystem` (`idDirectCurrentSystem`),
  ADD KEY `idAlternatingCurrentSystem` (`idAlternatingCurrentSystem`);

--
-- Indices de la tabla `pumps_reports_aditional_info`
--
ALTER TABLE `pumps_reports_aditional_info`
  ADD PRIMARY KEY (`idPumpsReportsAditionalInfo`);

--
-- Indices de la tabla `pumps_reports_pumps_aditional`
--
ALTER TABLE `pumps_reports_pumps_aditional`
  ADD PRIMARY KEY (`idPumpsReportsPumpsAditional`);

--
-- Indices de la tabla `pump_report`
--
ALTER TABLE `pump_report`
  ADD PRIMARY KEY (`idPumpReport`),
  ADD KEY `idTechnicalsReports` (`idTechnicalsReportsPR`),
  ADD KEY `idGeneralInformationPR` (`idGeneralInformationPR`),
  ADD KEY `idPumpsReportsPumpsAditional` (`idPumpsReportsPumpsAditional`);

--
-- Indices de la tabla `register_power_plant_parameters`
--
ALTER TABLE `register_power_plant_parameters`
  ADD PRIMARY KEY (`idRegisterPowerPlantParameters`),
  ADD KEY `idEmptyTests` (`idEmptyTests`),
  ADD KEY `idLoadTests` (`idLoadTests`);

--
-- Indices de la tabla `role_technical`
--
ALTER TABLE `role_technical`
  ADD PRIMARY KEY (`idRole`);

--
-- Indices de la tabla `state_users`
--
ALTER TABLE `state_users`
  ADD PRIMARY KEY (`idStateUser`);

--
-- Indices de la tabla `technicals_reports`
--
ALTER TABLE `technicals_reports`
  ADD PRIMARY KEY (`idTechnicalsReports`),
  ADD KEY `idTechnicalUser1` (`idTechnicalUser1`),
  ADD KEY `idTechnicalUser2` (`idTechnicalUser2`),
  ADD KEY `idTechnicalUser3` (`idTechnicalUser3`);

--
-- Indices de la tabla `technical_users`
--
ALTER TABLE `technical_users`
  ADD PRIMARY KEY (`idTechnicalUser`),
  ADD KEY `idRole` (`idRole`),
  ADD KEY `idStateUser` (`idStateUser`);

--
-- Indices de la tabla `type_maintenance`
--
ALTER TABLE `type_maintenance`
  ADD PRIMARY KEY (`idTypeMaintenance`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `airIntake_system`
--
ALTER TABLE `airIntake_system`
  MODIFY `idAirIntakeSystem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `air_condensing_unit`
--
ALTER TABLE `air_condensing_unit`
  MODIFY `idAirCondensingUnit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `air_drive_unit`
--
ALTER TABLE `air_drive_unit`
  MODIFY `idAirDriveUnit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `air_fan_motor`
--
ALTER TABLE `air_fan_motor`
  MODIFY `idAirFanMotor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `air_report`
--
ALTER TABLE `air_report`
  MODIFY `idAirReport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `air_technical_data_measurements`
--
ALTER TABLE `air_technical_data_measurements`
  MODIFY `idAirTechnicalDataMeasurements` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `air_works_and_revisions_carried_out`
--
ALTER TABLE `air_works_and_revisions_carried_out`
  MODIFY `idAirWorksAndRevisionsCarriedOut` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `air_w_r_condensing_and_compressor_unit`
--
ALTER TABLE `air_w_r_condensing_and_compressor_unit`
  MODIFY `idWRCondensingAndCompressorUnit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `air_w_r_drive_unit`
--
ALTER TABLE `air_w_r_drive_unit`
  MODIFY `idWRDriveUnit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `air_w_r_refrigeration_system_interconnection`
--
ALTER TABLE `air_w_r_refrigeration_system_interconnection`
  MODIFY `idWRRefrigerationSystemInterconnection` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alternating_current_system`
--
ALTER TABLE `alternating_current_system`
  MODIFY `idAlternatingCurrentSystem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cooling_system`
--
ALTER TABLE `cooling_system`
  MODIFY `idCoolingSystem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `direct_current_system`
--
ALTER TABLE `direct_current_system`
  MODIFY `idDirectCurrentSystem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `electrical_reports`
--
ALTER TABLE `electrical_reports`
  MODIFY `idElectricalReport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empty_tests`
--
ALTER TABLE `empty_tests`
  MODIFY `idEmptyTests` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Fuel_system`
--
ALTER TABLE `Fuel_system`
  MODIFY `idFuelSystem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `general_information`
--
ALTER TABLE `general_information`
  MODIFY `idGeneralInformation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `load_tests`
--
ALTER TABLE `load_tests`
  MODIFY `idLoadTests` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lubrication_system`
--
ALTER TABLE `lubrication_system`
  MODIFY `idLubricationSystem` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `offline_jobs_electric_plant`
--
ALTER TABLE `offline_jobs_electric_plant`
  MODIFY `idOfflineJobsEP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pumps_reports_aditional_info`
--
ALTER TABLE `pumps_reports_aditional_info`
  MODIFY `idPumpsReportsAditionalInfo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pumps_reports_pumps_aditional`
--
ALTER TABLE `pumps_reports_pumps_aditional`
  MODIFY `idPumpsReportsPumpsAditional` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pump_report`
--
ALTER TABLE `pump_report`
  MODIFY `idPumpReport` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `register_power_plant_parameters`
--
ALTER TABLE `register_power_plant_parameters`
  MODIFY `idRegisterPowerPlantParameters` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `role_technical`
--
ALTER TABLE `role_technical`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `state_users`
--
ALTER TABLE `state_users`
  MODIFY `idStateUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `technicals_reports`
--
ALTER TABLE `technicals_reports`
  MODIFY `idTechnicalsReports` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `technical_users`
--
ALTER TABLE `technical_users`
  MODIFY `idTechnicalUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `type_maintenance`
--
ALTER TABLE `type_maintenance`
  MODIFY `idTypeMaintenance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `air_report`
--
ALTER TABLE `air_report`
  ADD CONSTRAINT `air_report_ibfk_1` FOREIGN KEY (`idTechnicalsReports`) REFERENCES `technicals_reports` (`idTechnicalsReports`),
  ADD CONSTRAINT `air_report_ibfk_2` FOREIGN KEY (`idGeneralInformation`) REFERENCES `general_information` (`idGeneralInformation`),
  ADD CONSTRAINT `air_report_ibfk_3` FOREIGN KEY (`idAirTechnicalDataMeasurements`) REFERENCES `air_technical_data_measurements` (`idAirTechnicalDataMeasurements`),
  ADD CONSTRAINT `air_report_ibfk_4` FOREIGN KEY (`idAirWorksAndRevisionsCarriedOut`) REFERENCES `air_works_and_revisions_carried_out` (`idAirWorksAndRevisionsCarriedOut`);

--
-- Filtros para la tabla `air_technical_data_measurements`
--
ALTER TABLE `air_technical_data_measurements`
  ADD CONSTRAINT `air_technical_data_measurements_ibfk_1` FOREIGN KEY (`idAirDriveUnit`) REFERENCES `air_drive_unit` (`idAirDriveUnit`),
  ADD CONSTRAINT `air_technical_data_measurements_ibfk_2` FOREIGN KEY (`idAirCondensingUnit`) REFERENCES `air_condensing_unit` (`idAirCondensingUnit`),
  ADD CONSTRAINT `air_technical_data_measurements_ibfk_3` FOREIGN KEY (`idAirFanMotor`) REFERENCES `air_fan_motor` (`idAirFanMotor`);

--
-- Filtros para la tabla `air_works_and_revisions_carried_out`
--
ALTER TABLE `air_works_and_revisions_carried_out`
  ADD CONSTRAINT `air_works_and_revisions_carried_out_ibfk_1` FOREIGN KEY (`idWRCondensingAndCompressorUnit`) REFERENCES `air_w_r_condensing_and_compressor_unit` (`idWRCondensingAndCompressorUnit`),
  ADD CONSTRAINT `air_works_and_revisions_carried_out_ibfk_2` FOREIGN KEY (`idWRDriveUnit`) REFERENCES `air_w_r_drive_unit` (`idWRDriveUnit`),
  ADD CONSTRAINT `air_works_and_revisions_carried_out_ibfk_3` FOREIGN KEY (`idWRRefrigerationSystemInterconnection`) REFERENCES `air_w_r_refrigeration_system_interconnection` (`idWRRefrigerationSystemInterconnection`);

--
-- Filtros para la tabla `electrical_reports`
--
ALTER TABLE `electrical_reports`
  ADD CONSTRAINT `electrical_reports_ibfk_1` FOREIGN KEY (`idGeneralInformationER`) REFERENCES `general_information` (`idGeneralInformation`),
  ADD CONSTRAINT `electrical_reports_ibfk_2` FOREIGN KEY (`idTechnicalsReportsER`) REFERENCES `technicals_reports` (`idTechnicalsReports`),
  ADD CONSTRAINT `electrical_reports_ibfk_3` FOREIGN KEY (`idOfflineJobsEP`) REFERENCES `offline_jobs_electric_plant` (`idOfflineJobsEP`),
  ADD CONSTRAINT `electrical_reports_ibfk_4` FOREIGN KEY (`idRegisterPowerPlantParameters`) REFERENCES `register_power_plant_parameters` (`idRegisterPowerPlantParameters`);

--
-- Filtros para la tabla `general_information`
--
ALTER TABLE `general_information`
  ADD CONSTRAINT `general_information_ibfk_1` FOREIGN KEY (`idTypeMaintenance`) REFERENCES `type_maintenance` (`idTypeMaintenance`);

--
-- Filtros para la tabla `offline_jobs_electric_plant`
--
ALTER TABLE `offline_jobs_electric_plant`
  ADD CONSTRAINT `offline_jobs_electric_plant_ibfk_1` FOREIGN KEY (`idLubricationSystem`) REFERENCES `lubrication_system` (`idLubricationSystem`),
  ADD CONSTRAINT `offline_jobs_electric_plant_ibfk_2` FOREIGN KEY (`idFuelSystem`) REFERENCES `Fuel_system` (`idFuelSystem`),
  ADD CONSTRAINT `offline_jobs_electric_plant_ibfk_3` FOREIGN KEY (`idAirIntakeSystem`) REFERENCES `airIntake_system` (`idAirIntakeSystem`),
  ADD CONSTRAINT `offline_jobs_electric_plant_ibfk_4` FOREIGN KEY (`idCoolingSystem`) REFERENCES `cooling_system` (`idCoolingSystem`),
  ADD CONSTRAINT `offline_jobs_electric_plant_ibfk_5` FOREIGN KEY (`idDirectCurrentSystem`) REFERENCES `direct_current_system` (`idDirectCurrentSystem`),
  ADD CONSTRAINT `offline_jobs_electric_plant_ibfk_6` FOREIGN KEY (`idAlternatingCurrentSystem`) REFERENCES `alternating_current_system` (`idAlternatingCurrentSystem`);

--
-- Filtros para la tabla `pump_report`
--
ALTER TABLE `pump_report`
  ADD CONSTRAINT `pump_report_ibfk_1` FOREIGN KEY (`idTechnicalsReportsPR`) REFERENCES `technicals_reports` (`idTechnicalsReports`),
  ADD CONSTRAINT `pump_report_ibfk_2` FOREIGN KEY (`idGeneralInformationPR`) REFERENCES `general_information` (`idGeneralInformation`),
  ADD CONSTRAINT `pump_report_ibfk_3` FOREIGN KEY (`idPumpsReportsPumpsAditional`) REFERENCES `pumps_reports_pumps_aditional` (`idPumpsReportsPumpsAditional`);

--
-- Filtros para la tabla `register_power_plant_parameters`
--
ALTER TABLE `register_power_plant_parameters`
  ADD CONSTRAINT `register_power_plant_parameters_ibfk_1` FOREIGN KEY (`idEmptyTests`) REFERENCES `empty_tests` (`idEmptyTests`),
  ADD CONSTRAINT `register_power_plant_parameters_ibfk_2` FOREIGN KEY (`idLoadTests`) REFERENCES `load_tests` (`idLoadTests`);

--
-- Filtros para la tabla `technical_users`
--
ALTER TABLE `technical_users`
  ADD CONSTRAINT `technical_users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role_technical` (`idRole`),
  ADD CONSTRAINT `technical_users_ibfk_2` FOREIGN KEY (`idStateUser`) REFERENCES `state_users` (`idStateUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
