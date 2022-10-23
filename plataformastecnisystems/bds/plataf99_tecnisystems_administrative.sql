-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-09-2022 a las 16:26:08
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
-- Base de datos: `plataf99_tecnisystems_administrative`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrative_state_users`
--

CREATE TABLE `administrative_state_users` (
  `idAdministrativeStateUsers` int NOT NULL,
  `AdministrativeStateUsers` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrative_state_users`
--

INSERT INTO `administrative_state_users` (`idAdministrativeStateUsers`, `AdministrativeStateUsers`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrative_users`
--

CREATE TABLE `administrative_users` (
  `idAdministrativeUser` int NOT NULL,
  `AdministrativeDocument` int NOT NULL,
  `AdministrativeUser` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AdministrativeEmail` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AdministrativePass` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `AdministrativeToken` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idAdministrativeStateUsers` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administrative_users`
--

INSERT INTO `administrative_users` (`idAdministrativeUser`, `AdministrativeDocument`, `AdministrativeUser`, `AdministrativeEmail`, `AdministrativePass`, `AdministrativeToken`, `idAdministrativeStateUsers`) VALUES
(1, 666666666, 'administrativoPrueba1', 'administrativoPrueba1@gmail.com', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', '$2y$10$nh22Gy1sHcoQFjTcBTJU4O9He/cTk9NZjKWC6XdVdel0Czj9cU8fG', 1),
(2, 17414870, 'Germán', 'gertet37@yahoo.com', '$2y$10$PpZEeGmJPOpGqAP2YxmLc.qt/MnwXEDHTpGx00VfYspS6odusvJ7a', '$2y$10$j9LWlWoJm1hKpuFPxiiR0uWgmTn5bcTJDOY4Srsq.PaNT0LuvGBcC', 1),
(4, 1007343180, 'Rocio', 'tecnisystemssecop@gmail.com', '$2y$10$1VkkXmwi3mnNC/jOVbsbGuhDYAL/cFntjdvXpBEmG5uRIs6qUlSTi', '$2y$10$vGBZKos45jKDXeyS6hwmHON3ROyJmY7v4j/yZEcJ1Qz6HI414j9Wu', 1),
(5, 1010223602, 'Luisa', 'ventas@tecnisystems.com.co', '$2y$10$9GkLGkBp6wWnh0j4Km5v/.6JDI29ykDqjWrfqw9Qdo8wjguARFcta', '$2y$10$/3gfZktdmvofV6Wgz4kZN.GMDg8f2dC5Wb/TTnPOqJzUd4vv3jTga', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrative_state_users`
--
ALTER TABLE `administrative_state_users`
  ADD PRIMARY KEY (`idAdministrativeStateUsers`);

--
-- Indices de la tabla `administrative_users`
--
ALTER TABLE `administrative_users`
  ADD PRIMARY KEY (`idAdministrativeUser`),
  ADD KEY `idAdministrativeStateUsers` (`idAdministrativeStateUsers`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrative_state_users`
--
ALTER TABLE `administrative_state_users`
  MODIFY `idAdministrativeStateUsers` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `administrative_users`
--
ALTER TABLE `administrative_users`
  MODIFY `idAdministrativeUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrative_users`
--
ALTER TABLE `administrative_users`
  ADD CONSTRAINT `administrative_users_ibfk_1` FOREIGN KEY (`idAdministrativeStateUsers`) REFERENCES `administrative_state_users` (`idAdministrativeStateUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
