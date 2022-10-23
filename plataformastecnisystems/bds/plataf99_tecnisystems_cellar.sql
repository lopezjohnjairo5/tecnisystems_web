-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-09-2022 a las 16:26:15
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
-- Base de datos: `plataf99_tecnisystems_cellar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `air_conditioning_types`
--

CREATE TABLE `air_conditioning_types` (
  `idAirConditioningTypes` int NOT NULL,
  `AirConditioningTypes` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `air_conditioning_types`
--

INSERT INTO `air_conditioning_types` (`idAirConditioningTypes`, `AirConditioningTypes`) VALUES
(1, 'Mini Split'),
(2, 'Split'),
(3, 'Portátil'),
(4, 'Sistema de Extracción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amount_reference_electric_products`
--

CREATE TABLE `amount_reference_electric_products` (
  `idAmountReferenceElectricProducts` int NOT NULL,
  `oilAmount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `oilReference` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `fuelAmount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `fuelReference` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airAmount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `airReference` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `separatorAmount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `separatorReference` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `refrigerantAmount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `refrigerantReference` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `engineOilAmount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `engineOilReference` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `otherAmount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `otherReference` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `amount_reference_electric_products`
--

INSERT INTO `amount_reference_electric_products` (`idAmountReferenceElectricProducts`, `oilAmount`, `oilReference`, `fuelAmount`, `fuelReference`, `airAmount`, `airReference`, `separatorAmount`, `separatorReference`, `refrigerantAmount`, `refrigerantReference`, `engineOilAmount`, `engineOilReference`, `otherAmount`, `otherReference`) VALUES
(1, '1', '2', '1', '2', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'NA'),
(2, '1', '1', '2', '2', '3', '4', '4', '5', '6', '7', '8', '9', 'NA', 'NA'),
(3, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA'),
(4, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellar_air_conditioning_products`
--

CREATE TABLE `cellar_air_conditioning_products` (
  `idCellarAirConditioningProducts` int NOT NULL,
  `capacity` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idAirConditioningTypes` int NOT NULL,
  `idCellarGeneralInfoProduct` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cellar_air_conditioning_products`
--

INSERT INTO `cellar_air_conditioning_products` (`idCellarAirConditioningProducts`, `capacity`, `idAirConditioningTypes`, `idCellarGeneralInfoProduct`) VALUES
(1, 'NA', 1, 1),
(2, 'NA', 1, 2),
(3, '123', 2, 3),
(4, 'NA', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellar_electric_products`
--

CREATE TABLE `cellar_electric_products` (
  `idCellarElectricProducts` int NOT NULL,
  `powerPlant` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `powerPlantModel` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `powerPlantSerie` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `motor` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `motorModel` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `motorSerie` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `generator` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `generatorSerie` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `generatorKw` int NOT NULL,
  `generatorKwa` int NOT NULL,
  `generatorPhases` int NOT NULL,
  `generatorVolt` int NOT NULL,
  `idAmountReferenceElectricProducts` int NOT NULL,
  `idCellarGeneralInfoProduct` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cellar_electric_products`
--

INSERT INTO `cellar_electric_products` (`idCellarElectricProducts`, `powerPlant`, `powerPlantModel`, `powerPlantSerie`, `motor`, `motorModel`, `motorSerie`, `generator`, `generatorSerie`, `generatorKw`, `generatorKwa`, `generatorPhases`, `generatorVolt`, `idAmountReferenceElectricProducts`, `idCellarGeneralInfoProduct`) VALUES
(1, 'oka', 'modelodeplanta1', '12v', 'v8', 'NA', 'NA', 'dask', 'd23', 123, 234, 234, 456, 1, 1),
(2, 'oka', 'modelodeplanta1', '12v', 'v8', 's21', 'du22', 'NA', 'v233', 123, 123, 123, 123, 2, 2),
(3, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0, 0, 0, 3, 3),
(4, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0, 0, 0, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellar_general_info_products`
--

CREATE TABLE `cellar_general_info_products` (
  `idCellarGeneralInfoProduct` int NOT NULL,
  `serialProduct` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `Product` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `Brand` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `pathDatasheet` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `pathQR` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idTypeProduct` int NOT NULL,
  `idSupplier` int NOT NULL,
  `idProductStatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cellar_general_info_products`
--

INSERT INTO `cellar_general_info_products` (`idCellarGeneralInfoProduct`, `serialProduct`, `Product`, `Brand`, `pathDatasheet`, `pathQR`, `idTypeProduct`, `idSupplier`, `idProductStatus`) VALUES
(1, '123', 'gato', 'plantaE', 'https://plataformastecnisystems.com/tecnisystems_cellar/files/doc_te.pdf', 'https://plataformastecnisystems.com/tecnisystems_cellar/qr_imgs/123_gato.png', 1, 1, 1),
(2, '123456789', 'producto_prueba', 'prueba', 'https://plataformastecnisystems.com/tecnisystems_cellar/files/doc_te.pdf', 'https://plataformastecnisystems.com/tecnisystems_cellar/qr_imgs/123456789_producto_prueba.png', 1, 1, 1),
(3, 'aire123', 'aire_acondicionado', 'fresh', 'NA', 'https://plataformastecnisystems.com/tecnisystems_cellar/qr_imgs/aire123_aire_acondicionado.png', 2, 1, 2),
(4, '12345', 'motobomba', 'deep', 'NA', 'https://plataformastecnisystems.com/tecnisystems_cellar/qr_imgs/motobomba123_motobomba.png', 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellar_pumps_products`
--

CREATE TABLE `cellar_pumps_products` (
  `idCellarPumpsProducts` int NOT NULL,
  `voltage` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `hp` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `amps` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `capacity` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idPumpType` int NOT NULL,
  `idCellarGeneralInfoProduct` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cellar_pumps_products`
--

INSERT INTO `cellar_pumps_products` (`idCellarPumpsProducts`, `voltage`, `hp`, `amps`, `capacity`, `idPumpType`, `idCellarGeneralInfoProduct`) VALUES
(1, '0', 'NA', 'NA', 'NA', 1, 1),
(2, '0', 'NA', 'NA', 'NA', 1, 2),
(3, '0', 'NA', 'NA', 'NA', 1, 3),
(4, '110v', '200hp', '1250amp', '150l', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellar_record`
--

CREATE TABLE `cellar_record` (
  `idRecord` int NOT NULL,
  `Record` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `dateRecord` datetime NOT NULL,
  `idCellarUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellar_users`
--

CREATE TABLE `cellar_users` (
  `idCellarUser` int NOT NULL,
  `documentCellarUser` int NOT NULL,
  `CellarUser` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `UserToken` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idStateCellarUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cellar_users`
--

INSERT INTO `cellar_users` (`idCellarUser`, `documentCellarUser`, `CellarUser`, `Email`, `Password`, `UserToken`, `idStateCellarUser`) VALUES
(1, 555555555, 'bodegaPrueba1', 'bodegaPrueba1@gmail.com', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', '$2y$10$Es62OJu.6vPzs7HSfROQfOTdLc3ec2suuZVIZyb2btsxI4oAZi/iS', 1),
(3, 1057581776, 'john', 'lopezjohnjairo5@gmail.com', '$2y$10$apyYgIFD0MbVjFcRdJ/SYOpMtuQCnIXC7QgasMZS.c.6CkPErEKnW', '$2y$10$mq7/yno6Ne0UdIf2fz16GOypNgWi0jjpNDpEN1IdzMJBn4N5PwfsC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_resume`
--

CREATE TABLE `product_resume` (
  `idProductResume` int NOT NULL,
  `productResume` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `dateResume` date NOT NULL,
  `idCellarGeneralInfoProduct` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_status`
--

CREATE TABLE `product_status` (
  `idProductStatus` int NOT NULL,
  `productStatus` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `product_status`
--

INSERT INTO `product_status` (`idProductStatus`, `productStatus`) VALUES
(1, 'en bodega'),
(2, 'operativo'),
(3, 'no operativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pump_types`
--

CREATE TABLE `pump_types` (
  `idPumpType` int NOT NULL,
  `pumpType` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pump_types`
--

INSERT INTO `pump_types` (`idPumpType`, `pumpType`) VALUES
(1, 'Presión'),
(2, 'Sumergible'),
(3, 'Contra Incendios'),
(4, 'Elevación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_cellar_users`
--

CREATE TABLE `state_cellar_users` (
  `idStateCellarUser` int NOT NULL,
  `StateCellarUser` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `state_cellar_users`
--

INSERT INTO `state_cellar_users` (`idStateCellarUser`, `StateCellarUser`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `idSupplier` int NOT NULL,
  `tokenSupplier` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `Supplier` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `officeAddress` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idDepartment` int NOT NULL,
  `idCity` int NOT NULL,
  `Email` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `phone1` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `phone2` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`idSupplier`, `tokenSupplier`, `Supplier`, `officeAddress`, `idDepartment`, `idCity`, `Email`, `phone1`, `phone2`) VALUES
(1, '$2y$10$d4JNQagTVwQGLrfq0V102u2JJq75Q4NeltR9K3hMC3TSfDoqHBlJ.', 'jorge', 'cra15#4-5', 2, 13, 'jorgeasociados@yahoo.com', '3005874960', 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_products`
--

CREATE TABLE `type_products` (
  `idTypeProduct` int NOT NULL,
  `Type` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `type_products`
--

INSERT INTO `type_products` (`idTypeProduct`, `Type`) VALUES
(1, 'eléctrico'),
(2, 'aire acondicionado'),
(3, 'motobomba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `air_conditioning_types`
--
ALTER TABLE `air_conditioning_types`
  ADD PRIMARY KEY (`idAirConditioningTypes`);

--
-- Indices de la tabla `amount_reference_electric_products`
--
ALTER TABLE `amount_reference_electric_products`
  ADD PRIMARY KEY (`idAmountReferenceElectricProducts`);

--
-- Indices de la tabla `cellar_air_conditioning_products`
--
ALTER TABLE `cellar_air_conditioning_products`
  ADD PRIMARY KEY (`idCellarAirConditioningProducts`),
  ADD KEY `idAirConditioningTypes` (`idAirConditioningTypes`),
  ADD KEY `idCellarGeneralInfoProduct` (`idCellarGeneralInfoProduct`);

--
-- Indices de la tabla `cellar_electric_products`
--
ALTER TABLE `cellar_electric_products`
  ADD PRIMARY KEY (`idCellarElectricProducts`),
  ADD KEY `idCellarGeneralInfoProduct` (`idCellarGeneralInfoProduct`),
  ADD KEY `idAmountReferenceElectricProducts` (`idAmountReferenceElectricProducts`);

--
-- Indices de la tabla `cellar_general_info_products`
--
ALTER TABLE `cellar_general_info_products`
  ADD PRIMARY KEY (`idCellarGeneralInfoProduct`),
  ADD KEY `idSupplier` (`idSupplier`),
  ADD KEY `idTypeProduct` (`idTypeProduct`),
  ADD KEY `idProductStatus` (`idProductStatus`);

--
-- Indices de la tabla `cellar_pumps_products`
--
ALTER TABLE `cellar_pumps_products`
  ADD PRIMARY KEY (`idCellarPumpsProducts`),
  ADD KEY `idPumpType` (`idPumpType`),
  ADD KEY `idCellarGeneralInfoProduct` (`idCellarGeneralInfoProduct`);

--
-- Indices de la tabla `cellar_record`
--
ALTER TABLE `cellar_record`
  ADD PRIMARY KEY (`idRecord`),
  ADD KEY `idCellarUser` (`idCellarUser`);

--
-- Indices de la tabla `cellar_users`
--
ALTER TABLE `cellar_users`
  ADD PRIMARY KEY (`idCellarUser`),
  ADD KEY `cellar_users_ibfk_1` (`idStateCellarUser`);

--
-- Indices de la tabla `product_resume`
--
ALTER TABLE `product_resume`
  ADD PRIMARY KEY (`idProductResume`),
  ADD KEY `idCellarProduct` (`idCellarGeneralInfoProduct`);

--
-- Indices de la tabla `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`idProductStatus`);

--
-- Indices de la tabla `pump_types`
--
ALTER TABLE `pump_types`
  ADD PRIMARY KEY (`idPumpType`);

--
-- Indices de la tabla `state_cellar_users`
--
ALTER TABLE `state_cellar_users`
  ADD PRIMARY KEY (`idStateCellarUser`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indices de la tabla `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`idTypeProduct`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `air_conditioning_types`
--
ALTER TABLE `air_conditioning_types`
  MODIFY `idAirConditioningTypes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `amount_reference_electric_products`
--
ALTER TABLE `amount_reference_electric_products`
  MODIFY `idAmountReferenceElectricProducts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cellar_air_conditioning_products`
--
ALTER TABLE `cellar_air_conditioning_products`
  MODIFY `idCellarAirConditioningProducts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cellar_electric_products`
--
ALTER TABLE `cellar_electric_products`
  MODIFY `idCellarElectricProducts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cellar_general_info_products`
--
ALTER TABLE `cellar_general_info_products`
  MODIFY `idCellarGeneralInfoProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cellar_pumps_products`
--
ALTER TABLE `cellar_pumps_products`
  MODIFY `idCellarPumpsProducts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cellar_record`
--
ALTER TABLE `cellar_record`
  MODIFY `idRecord` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cellar_users`
--
ALTER TABLE `cellar_users`
  MODIFY `idCellarUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `product_resume`
--
ALTER TABLE `product_resume`
  MODIFY `idProductResume` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_status`
--
ALTER TABLE `product_status`
  MODIFY `idProductStatus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pump_types`
--
ALTER TABLE `pump_types`
  MODIFY `idPumpType` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `state_cellar_users`
--
ALTER TABLE `state_cellar_users`
  MODIFY `idStateCellarUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `idSupplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `type_products`
--
ALTER TABLE `type_products`
  MODIFY `idTypeProduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cellar_air_conditioning_products`
--
ALTER TABLE `cellar_air_conditioning_products`
  ADD CONSTRAINT `cellar_air_conditioning_products_ibfk_1` FOREIGN KEY (`idAirConditioningTypes`) REFERENCES `air_conditioning_types` (`idAirConditioningTypes`),
  ADD CONSTRAINT `cellar_air_conditioning_products_ibfk_2` FOREIGN KEY (`idCellarGeneralInfoProduct`) REFERENCES `cellar_general_info_products` (`idCellarGeneralInfoProduct`);

--
-- Filtros para la tabla `cellar_electric_products`
--
ALTER TABLE `cellar_electric_products`
  ADD CONSTRAINT `cellar_electric_products_ibfk_1` FOREIGN KEY (`idCellarGeneralInfoProduct`) REFERENCES `cellar_general_info_products` (`idCellarGeneralInfoProduct`),
  ADD CONSTRAINT `cellar_electric_products_ibfk_2` FOREIGN KEY (`idAmountReferenceElectricProducts`) REFERENCES `amount_reference_electric_products` (`idAmountReferenceElectricProducts`);

--
-- Filtros para la tabla `cellar_general_info_products`
--
ALTER TABLE `cellar_general_info_products`
  ADD CONSTRAINT `cellar_general_info_products_ibfk_1` FOREIGN KEY (`idSupplier`) REFERENCES `suppliers` (`idSupplier`),
  ADD CONSTRAINT `cellar_general_info_products_ibfk_2` FOREIGN KEY (`idTypeProduct`) REFERENCES `type_products` (`idTypeProduct`),
  ADD CONSTRAINT `cellar_general_info_products_ibfk_3` FOREIGN KEY (`idProductStatus`) REFERENCES `product_status` (`idProductStatus`);

--
-- Filtros para la tabla `cellar_pumps_products`
--
ALTER TABLE `cellar_pumps_products`
  ADD CONSTRAINT `cellar_pumps_products_ibfk_1` FOREIGN KEY (`idPumpType`) REFERENCES `pump_types` (`idPumpType`),
  ADD CONSTRAINT `cellar_pumps_products_ibfk_2` FOREIGN KEY (`idCellarGeneralInfoProduct`) REFERENCES `cellar_general_info_products` (`idCellarGeneralInfoProduct`);

--
-- Filtros para la tabla `cellar_record`
--
ALTER TABLE `cellar_record`
  ADD CONSTRAINT `cellar_record_ibfk_1` FOREIGN KEY (`idCellarUser`) REFERENCES `cellar_users` (`idCellarUser`);

--
-- Filtros para la tabla `cellar_users`
--
ALTER TABLE `cellar_users`
  ADD CONSTRAINT `cellar_users_ibfk_1` FOREIGN KEY (`idStateCellarUser`) REFERENCES `state_cellar_users` (`idStateCellarUser`);

--
-- Filtros para la tabla `product_resume`
--
ALTER TABLE `product_resume`
  ADD CONSTRAINT `product_resume_ibfk_1` FOREIGN KEY (`idCellarGeneralInfoProduct`) REFERENCES `cellar_general_info_products` (`idCellarGeneralInfoProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
