-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-09-2022 a las 16:26:36
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
-- Base de datos: `plataf99_tecnisystems_clients`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients_costumers_info`
--

CREATE TABLE `clients_costumers_info` (
  `idClientInfo` int NOT NULL,
  `idGeneralCostumerInfo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clients_costumers_info`
--

INSERT INTO `clients_costumers_info` (`idClientInfo`, `idGeneralCostumerInfo`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(5, 9),
(6, 10),
(7, 11),
(8, 12),
(9, 13),
(10, 14),
(11, 15),
(12, 16),
(13, 17),
(14, 18),
(15, 20),
(16, 21),
(17, 22),
(18, 23),
(19, 24),
(20, 25),
(21, 26),
(22, 27),
(23, 28),
(24, 29),
(25, 30),
(26, 31),
(28, 33),
(27, 34),
(29, 35),
(29, 36),
(30, 37),
(31, 38),
(32, 39),
(33, 40),
(34, 41),
(35, 42),
(36, 43),
(37, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients_info`
--

CREATE TABLE `clients_info` (
  `idClientInfo` int NOT NULL,
  `tokenClient` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_520_ci NOT NULL,
  `documentClient` int NOT NULL,
  `nameClient` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `emailClient` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `phoneClient` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `alternativePhoneClient` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `clientFirmPath` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `personInCharge` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idStateClient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clients_info`
--

INSERT INTO `clients_info` (`idClientInfo`, `tokenClient`, `documentClient`, `nameClient`, `emailClient`, `phoneClient`, `alternativePhoneClient`, `clientFirmPath`, `personInCharge`, `idStateClient`) VALUES
(1, '$2y$10$j6DSP3HKQQw6WyW/J/CW4uOk3XnglYpueOm.nDw6asYmmU/VVPGky', 1057594778, 'john jairo sas', 'johnLopez@gmail.com', '3001478596', 'NA', './../documents/firms/firm_1057594778.png', 'john jairo', 1),
(2, '$2y$10$l/YJlVDsSgEWXjXEO1meCepKPLy/HWgvOpKisHLwKPYPG7C.7tJh2', 1111111111, 'broadway restrepo', 'jrperezt@winnergroup.com', '3102938216', 'NA', './../documents/firms/firm_1111111111.png', 'jose rigoberto perez', 1),
(3, '$2y$10$6CfTFFQrsqh7vsD.8vvTyeyTcgYGBgI5hRJeAd2NIUR8SrAtl4pF6', 1111111111, 'rock jazz casino', 'jrperezt@winnergroup.com', '3102938216', 'NA', './../documents/firms/firm_1111111111.png', 'jose rigoberto perez', 1),
(4, '$2y$10$7/nJPKNo3CI5U1K1r5hrIuaobBd/J629sH6mV2Wyy/tQmp5jNT6XK', 1111111111, 'havana centro', 'mmarquezr@winnergroup.com', '3134580045', 'NA', './../documents/firms/firm_1111111111.png', 'Milton Marquez', 1),
(5, '$2y$10$lfMOqcH1yy8hkOS8Dkcge.Aj5yOcCC9/cL8Ea/wDamcKwU7cb61Su', 1111111111, 'broadway 2 plaza de las americas', 'jrperezt@winnergroup.com', '3102938216', 'NA', './../documents/firms/firm_1111111111.png', 'jose rogoberto perez', 1),
(6, '$2y$10$APffNfyimP6BGYVy6Hb/S.xf1jxbGoaAQGJ92H.FqMEZgSl.ZL6oe', 1111111111, 'broadway rionegro', 'afosoriog@winnergroup.com', '3173000670', 'NA', './../documents/firms/firm_1111111111.png', 'andres felipe osorio', 1),
(7, '$2y$10$EWN57/pFSMyxqfbC.kE3qOhHwx4reAXiIIYRVkY30V5PWaLg5vf2y', 1111111111, 'caribe casino la playa', 'srestrepoc@winnergroup.com', '3153839125', 'NA', './../documents/firms/firm_1111111111.png', 'sebastian restrepo', 1),
(8, '$2y$10$4mq9HjzhCNfUgMge31lCnuStTEoPluUq3CSwca/2voC4TTfAZ1Ulq', 1111111111, 'rio casino medellin', 'srestrepoc@winnergroup.com', '3153839125', 'NA', './../documents/firms/firm_1111111111.png', 'sebastian restrepo', 1),
(9, '$2y$10$ReQxbtinQu7vMTC2a8z3u.eWEAl8nlHsevtVWThQk9MyihzYGPVae', 1111111111, 'Circus bello', 'afosoriog@winnergroup.com', '3173000670', 'NA', './../documents/firms/firm_1111111111.png', 'andres felipe osorio', 1),
(10, '$2y$10$AY1hvaH/epLf0fuCKxIf8.62BEZb4md2T.PSDGZEhlp2WYTzzDqhS', 1111111111, 'broadway itagui2', 'afosoriog@winnergroup.com', '3173000670', 'NA', './../documents/firms/firm_1111111111.png', 'andres felipe osorio', 1),
(11, '$2y$10$xve.sX6u5I03985Csq8sHuP5B4ETwf4QnW87.YnAnwTKKDUPtHEh6', 1111111111, 'hollywood casino y café concert milla oro', 'srestrepoc@winnergroup.com', '3153839125', 'NA', './../documents/firms/firm_1111111111.png', 'sebastian restrepo', 1),
(12, '$2y$10$g8nZbT.1VveYANsKWOU2m./W9sTJZR7KP0F2c3rur2KqZH6Lf5Iae', 1111111111, 'havana casino la 70', 'srestrepoc@winnergroup.com', '3153839125', 'NA', './../documents/firms/firm_1111111111.png', 'sebastian restrepo', 1),
(13, '$2y$10$/FG/PI6ZNE3Cfy2jhdI9D.0J1QAq8y6tWnAyDtjJF5JjOwkd8Eyuu', 1111111111, 'havana casino la 80 broadway', 'afosoriog@winnergroup.com', '3173000670', 'NA', './../documents/firms/firm_1111111111.png', 'andres felipe osorio', 1),
(14, '$2y$10$p6Geqo0BVGsZXn6nbWjdeeOUoTT52NG5TJx39WVlIUHF3oBn.6RRa', 1111111111, 'broadway apartado', 'jrperezt@winnergroup.com', '3102938216', 'NA', './../documents/firms/firm_1111111111.png', 'jose rogoberto perez', 1),
(15, '$2y$10$c8s055RGwnweLB0njilbG.2UzQskIQAk.0B.7remCxgOj.kWwwP4a', 1111111111, 'condado armenia', 'gvarone@winnergroup.com', '3108576140', 'NA', './../documents/firms/firm_1111111111', 'gloria baron escobar', 1),
(16, '$2y$10$IC44ghZQvPt6DbRDrZ9HX.KA1OOG8CRLZWl36pYjkE0vrWz7lUsq2', 1111111111, 'havana casino plaza cali', 'gvarone@winnergroup.com', '3108576140', 'NA', './../documents/firms/firm_1111111111.png', 'gloria baron escobar', 1),
(17, '$2y$10$6oebzM/2Qj6TTxfJPjZAG.0.jtQTWUAvvDzznT5Y5s3vxWoYYpCAq', 1111111111, 'hollywood casino y café concert cali', 'gvarone@winnergroup.com', '3108576140', 'NA', './../documents/firms/firm_1111111111.png', 'gloria baron escobar', 1),
(18, '$2y$10$jAgYHXjHcLEtFmMlABUXSO9GBNmyF14GhqpZnCD3Cmaxr3Yt0ghta', 1111111111, 'broadway centro cali', 'gvarone@winnergroup.com', '3108576140', 'NA', './../documents/firms/firm_1111111111.png', 'gloria baron escobar', 1),
(19, '$2y$10$xfS5tq2QZ2zvQGyoC8U95uKhONkt3883XYXOXtXmBuqJLiCFZgw8e', 1111111111, 'rio casino cartagena', 'yjvillegasm@winnergroup.com', '3134759971', 'NA', './../documents/firms/firm_1111111111.png', 'yesid villegas', 1),
(20, '$2y$10$fx5MFeuXsxyTEcwrquyNH.l1u60iQFy9aKkhtYAJriA5djKzzdF5e', 1111111111, 'havana casino monteria', 'yjvillegasm@winnergroup.com', '3134759971', 'NA', './../documents/firms/firm_1111111111.png', 'yesid villegas', 1),
(21, '$2y$10$lP6YwJBqRyoHGpdCJ9MXvuAlTHh9cvH/c3JZFioDk2eIfMDLPv7ka', 1111111111, 'condado la 29 monteria', 'yjvillegasm@winnergroup.com', '3134759971', 'NA', './../documents/firms/firm_1111111111.png', 'yesid villegas', 1),
(22, '$2y$10$mMfI8zqGylgG2q5UVpXv8exAhT3wtU4WjksaoII19mcrROeKyojLO', 1111111111, 'broadway pereira', 'gvarone@winnergroup.com', '3108576140', 'NA', './../documents/firms/firm_1111111111.png', 'gloria baron escobar', 1),
(23, '$2y$10$5ZEcverM9H6Z/hLrUlxVmOv8hcrme85W4anLlK5Jm/8cLA4nFTQEi', 1111111111, 'rio casino pereira', 'gvarone@winnergroup.com', '3108576140', 'NA', './../documents/firms/firm_1111111111.png', 'gloria baron escobar', 1),
(24, '$2y$10$mK6fCg96Dh36bZLERMo06O78Ema4BFCKIcoKcsa48/qmdKsSiGMq2', 1111111111, 'rio casino sincelejo', 'yjvillegasm@winnergroup.com', '3134759971', 'NA', './../documents/firms/firm_1111111111.png', 'yesid villegas', 1),
(25, '$2y$10$1gNjEPRY1xa07g3MnVtjCu3gaqBZxAUY3VxRoxSpkz8wkiIr2jHkG', 1111111111, 'broadway sincelejo', 'yjvillegasm@winnergroup.com', '3134759971', 'NA', './../documents/firms/firm_1111111111.png', 'yesid villegas', 1),
(26, '$2y$10$bAbEWnAIkrvHY50VknknmOjuswR0emDDdQ6vdOc5tui3gW5AimRwO', 1111111111, 'condado villavicencio', 'jrperezt@winnergroup.com', '3102938216', 'NA', './../documents/firms/firm_1111111111.png', 'jose rogoberto perez', 1),
(27, '$2y$10$f9GWJj5yI071Ly8L7EtOSeEx/9sTbKbpw2ETtDAwOYUkRVkG/m5Mi', 1111111111, 'suppla la estrella medellin', 'edgar.obando@suppla.com', '3162331837', 'NA', './../documents/firms/firm_1111111111', 'edgar obando', 1),
(28, '$2y$10$qgxuU3kvl./wfKSVqbi5c.K9JMzpr/sjvkXmnrVgDbuxYDRkmu9s6', 1111111111, 'suppla medellin olaya', 'laura.gonzalez@dhl.com', '3102168691', 'NA', './../documents/firms/firm_1111111111.png', 'laura gonzalez', 1),
(29, '$2y$10$IBln44fpZZdlVCLhIwyif.Yc.sRPlf65wH/N34f.rC2x8nhePJwCK', 1111111111, 'suppla barranquilla PIC', 'renso.silvera@dhl.com', '3185481504', 'NA', './../documents/firms/firm_1111111111.png', 'renso silvera', 1),
(30, '$2y$10$uOmmj.H5rF/aQbDmVn7GKOnmsFhtk3/djzlVG2VxvlpNzo6qx0SSG', 1111111111, 'biomeriux', 'Josealberto.villamizarv@dhl.com', '3168701700', 'NA', './../documents/firms/firm_1111111111.png', 'alberto villamisar', 1),
(31, '$2y$10$64MXzYbUTcusPa7GjIUHW.nOqTOP1LDPq.K.c0zSHHw08H1bYioZe', 1111111111, 'grunenthal', 'Josealberto.villamizarv@dhl.com', '3168701700', 'NA', './../documents/firms/firm_1111111111.png', 'alberto villamisar', 1),
(32, '$2y$10$.yb6Ocx6Vr54f0oEPfIE2.yKSKYqwQQ4OluY6YnU3YopSgFaSEgdm', 1111111111, 'aduanas', 'Josealberto.villamizarv@dhl.com', '3168701700', 'NA', './../documents/firms/firm_1111111111.png', 'alberto villamisar', 1),
(33, '$2y$10$Gw6pcPI3IS0wta2PUzNA9.M7f9A2zXpNXqWoZ0gzfHlEcjawZMTpO', 1111111111, 'administrativa novartis', 'Josealberto.villamizarv@dhl.com', '3168701700', 'NA', './../documents/firms/firm_1111111111.png', 'alberto villamisar', 1),
(34, '$2y$10$61KweM2MBvmIWl50HsKgzu2AVyxy1O5npncfzEGaEFhPq.1jNagq6', 1111111111, 'americas', 'Josealberto.villamizarv@dhl.com', '3168701700', 'NA', './../documents/firms/firm_1111111111.png', 'alberto villamisar', 1),
(35, '$2y$10$BlwQnM24pIp8dyYa1kOXcuwPY6X.MIOoGY2vl4cYj2dOX0NptrU/O', 1111111111, 'cali salomia la francol', 'LauraDayana.MontenegroG@dhl.com', '3153305939', 'NA', './../documents/firms/firm_1111111111.png', 'laura dayana montenegro', 1),
(36, '$2y$10$mbMVCx.0V8ROTktuV5zWsOXYi9CioEeVxVo8brABYKqNdeuh/tWWu', 1111111111, 'cali salomia baxter', 'Carolina.RinconT@dhl.com', '3153324135', 'NA', './../documents/firms/firm_1111111111.png', 'carolina rincon', 1),
(37, '$2y$10$/2YDylnbidT71DhlwSJxEeV9cXH6m8PPVyo2CKHx8EF3rOfsbQ2g.', 1111111111, 'yumbo cortijo 9 multiusuario', 'Carolina.RinconT@dhl.com', '3153324135', 'NA', './../documents/firms/firm_1111111111.png', 'carolina rincon', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_machine`
--

CREATE TABLE `client_machine` (
  `idClient` int NOT NULL,
  `idTypeMachine` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `client_machine`
--

INSERT INTO `client_machine` (`idClient`, `idTypeMachine`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(28, 1),
(27, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_state`
--

CREATE TABLE `client_state` (
  `idStateClient` int NOT NULL,
  `stateClient` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `client_state`
--

INSERT INTO `client_state` (`idStateClient`, `stateClient`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_customer_information`
--

CREATE TABLE `general_customer_information` (
  `idGeneralCustomerInformation` int NOT NULL,
  `idDepartment` int NOT NULL,
  `idCity` int NOT NULL,
  `Address` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `general_customer_information`
--

INSERT INTO `general_customer_information` (`idGeneralCustomerInformation`, `idDepartment`, `idCity`, `Address`) VALUES
(1, 6, 309, 'calle 1# 1- 1'),
(2, 14, 642, 'carrera 18#17-53'),
(3, 14, 642, 'calle 82 #13-35'),
(4, 14, 642, 'carrera 7 #13-73'),
(5, 14, 642, 'calle 63#13-54'),
(6, 14, 642, 'av 19 #122-64'),
(7, 14, 642, 'carrera 7#21-70'),
(8, 14, 642, 'ac 58#127-59 lc 181a'),
(9, 14, 642, 'transversal 71D#6-94 SUR'),
(10, 2, 83, 'Cll 51 No 48 - 90 RIONEGRO'),
(11, 2, 83, 'Cll 52 No 46 - 34 MEDELLIN'),
(12, 2, 83, 'Cll 34 No 43 - 79 MEDELLIN'),
(13, 2, 83, 'Cra. 51 No 51 - 01 BELLO'),
(14, 2, 83, 'Cra. 50 No 49 - 78 ITAGUI'),
(15, 2, 83, 'CRA 43A No 3 SUR - 40 LC 101 MEDELLIN'),
(16, 2, 83, 'CIRCULAR 5 No 69 - 61 MEDELLIN'),
(17, 2, 83, 'Cra. 80 No. 48 B - 68 MEDELLIN'),
(18, 2, 23, 'Cll 99 No 102 - 25'),
(20, 24, 26, 'Cll 20 # 15 - 16 Local 102 -02'),
(21, 30, 860, 'calle 12 # 3-59'),
(22, 30, 860, 'calle 38 # 6n-35 cacino cc chipichape'),
(23, 30, 860, 'cra 4 #14-17'),
(24, 5, 176, 'Av San Martin No 5-145 Bocagrande'),
(25, 13, 508, 'CC ALAMEDA Cll 44 # 10 - 91 Lc 41-50'),
(26, 13, 508, 'calle 29#1-35'),
(27, 25, 904, 'Cra.8 No. 21 – 56'),
(28, 25, 904, 'av circunvalar 13-40 cc uniplex'),
(29, 28, 1020, 'carrera 25#23-108'),
(30, 28, 1020, 'carrera 18#23-20'),
(31, 20, 764, 'calle 39 # 31-48'),
(33, 2, 83, 'calle14#52-12'),
(34, 2, 36, 'carrera 50 #97b sur 277 b101-102'),
(35, 4, 145, 'calle 110#6-361 bod 6-7'),
(36, 4, 145, 'calle 110#6-361 parque'),
(37, 14, 642, 'cra 60 #22-50'),
(38, 14, 642, 'cra 60 #22-50'),
(39, 14, 642, 'cra 60 #22-50'),
(40, 14, 642, 'cra 60 #22-50'),
(41, 14, 642, 'avenida cra 39 # 18-63'),
(42, 30, 860, 'calle 47#6-7b'),
(43, 30, 860, 'calle 47#6-7b'),
(44, 30, 860, 'cra 35a#16-80 bod9 acopi yumbo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_machine_client`
--

CREATE TABLE `type_machine_client` (
  `idTypeMachineClient` int NOT NULL,
  `typeMachineClient` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `type_machine_client`
--

INSERT INTO `type_machine_client` (`idTypeMachineClient`, `typeMachineClient`) VALUES
(1, 'Planta eléctrica'),
(2, 'Aire acondicionado'),
(3, 'Motobomba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients_costumers_info`
--
ALTER TABLE `clients_costumers_info`
  ADD KEY `idClientInfo` (`idClientInfo`),
  ADD KEY `idGeneralCostumerInfo` (`idGeneralCostumerInfo`);

--
-- Indices de la tabla `clients_info`
--
ALTER TABLE `clients_info`
  ADD PRIMARY KEY (`idClientInfo`),
  ADD KEY `idStateClient` (`idStateClient`);

--
-- Indices de la tabla `client_machine`
--
ALTER TABLE `client_machine`
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idTypeMachine` (`idTypeMachine`);

--
-- Indices de la tabla `client_state`
--
ALTER TABLE `client_state`
  ADD PRIMARY KEY (`idStateClient`);

--
-- Indices de la tabla `general_customer_information`
--
ALTER TABLE `general_customer_information`
  ADD PRIMARY KEY (`idGeneralCustomerInformation`);

--
-- Indices de la tabla `type_machine_client`
--
ALTER TABLE `type_machine_client`
  ADD PRIMARY KEY (`idTypeMachineClient`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients_info`
--
ALTER TABLE `clients_info`
  MODIFY `idClientInfo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `client_state`
--
ALTER TABLE `client_state`
  MODIFY `idStateClient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `general_customer_information`
--
ALTER TABLE `general_customer_information`
  MODIFY `idGeneralCustomerInformation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `type_machine_client`
--
ALTER TABLE `type_machine_client`
  MODIFY `idTypeMachineClient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clients_costumers_info`
--
ALTER TABLE `clients_costumers_info`
  ADD CONSTRAINT `clients_costumers_info_ibfk_1` FOREIGN KEY (`idClientInfo`) REFERENCES `clients_info` (`idClientInfo`),
  ADD CONSTRAINT `clients_costumers_info_ibfk_2` FOREIGN KEY (`idGeneralCostumerInfo`) REFERENCES `general_customer_information` (`idGeneralCustomerInformation`);

--
-- Filtros para la tabla `clients_info`
--
ALTER TABLE `clients_info`
  ADD CONSTRAINT `clients_info_ibfk_1` FOREIGN KEY (`idStateClient`) REFERENCES `client_state` (`idStateClient`);

--
-- Filtros para la tabla `client_machine`
--
ALTER TABLE `client_machine`
  ADD CONSTRAINT `client_machine_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients_info` (`idClientInfo`),
  ADD CONSTRAINT `client_machine_ibfk_2` FOREIGN KEY (`idTypeMachine`) REFERENCES `type_machine_client` (`idTypeMachineClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
