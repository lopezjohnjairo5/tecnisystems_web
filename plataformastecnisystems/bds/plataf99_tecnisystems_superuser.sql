-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-09-2022 a las 16:27:25
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
-- Base de datos: `plataf99_tecnisystems_superuser`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_superuser`
--

CREATE TABLE `state_superuser` (
  `idStateSuperuser` int NOT NULL,
  `stateSuperuser` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `state_superuser`
--

INSERT INTO `state_superuser` (`idStateSuperuser`, `stateSuperuser`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superuser_users`
--

CREATE TABLE `superuser_users` (
  `idSuperuser` int NOT NULL,
  `Superuser` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `SuperuserDocument` int NOT NULL,
  `SuperuserEmail` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `SuperuserPass` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `superUserToken` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `idStateSuperuser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `superuser_users`
--

INSERT INTO `superuser_users` (`idSuperuser`, `Superuser`, `SuperuserDocument`, `SuperuserEmail`, `SuperuserPass`, `superUserToken`, `idStateSuperuser`) VALUES
(2, 'superusuario', 999999999, 'superusuario@gmail.com', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', '$2y$10$tKZzuE6UnaQAVhSumqcxWelJP1s58QrmyHfiF0kGTExFWh9rv77Qy', 1),
(4, 'Rocio', 1007343180, 'tecnisystemssecop@gmail.com', '$2y$10$p4pyV4gekub4KDyuaj0fjurozYUHvfnXpLOiapstjZ5yFAGQAHBvy', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', 1),
(5, 'john', 123123123, 'lopezjohnjairo5@gmail.com', '$2y$10$Ip8BZiWnNPB7MwhvVpdC4OFzh7Z4IWMUTNCzxA/dWqYhcJUABtyFa', '$2y$10$kIGqewtMlrlwwduup..yF.KtTq4ywnnX3LJD4mBxtFO8nzPEPLiSS', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `state_superuser`
--
ALTER TABLE `state_superuser`
  ADD PRIMARY KEY (`idStateSuperuser`);

--
-- Indices de la tabla `superuser_users`
--
ALTER TABLE `superuser_users`
  ADD PRIMARY KEY (`idSuperuser`),
  ADD KEY `idStateSuperuser` (`idStateSuperuser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `state_superuser`
--
ALTER TABLE `state_superuser`
  MODIFY `idStateSuperuser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `superuser_users`
--
ALTER TABLE `superuser_users`
  MODIFY `idSuperuser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `superuser_users`
--
ALTER TABLE `superuser_users`
  ADD CONSTRAINT `superuser_users_ibfk_1` FOREIGN KEY (`idStateSuperuser`) REFERENCES `state_superuser` (`idStateSuperuser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
