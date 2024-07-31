-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2024 a las 07:03:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmaciavernhes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar_event_master`
--

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `calendar_event_master`
--

INSERT INTO `calendar_event_master` (`event_id`, `event_name`, `event_start_date`, `event_end_date`) VALUES
(1, 'Vernhes', '2024-07-17', '2024-07-17'),
(2, 'Mayo', '2024-07-18', '2024-07-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_calendar`
--

CREATE TABLE `event_calendar` (
  `id_event_calendar` int(11) NOT NULL,
  `title` text NOT NULL,
  `start` text NOT NULL,
  `backgroundColor` text NOT NULL,
  `borderColor` text NOT NULL,
  `allDay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `event_calendar`
--

INSERT INTO `event_calendar` (`id_event_calendar`, `title`, `start`, `backgroundColor`, `borderColor`, `allDay`) VALUES
(1, 'Vernhes', 'new Date(\"2024/07/20\")', '#f56954', '#f56954', 'true'),
(2, 'Mayo', '2024/07/21', '#f56954', '#f56954', 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id_pharmacy` int(11) NOT NULL,
  `name_pharmacy` text NOT NULL,
  `address_pharmacy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pharmacy`
--

INSERT INTO `pharmacy` (`id_pharmacy`, `name_pharmacy`, `address_pharmacy`) VALUES
(6, 'Vernhes', 'Oro 499'),
(7, 'Sindical', 'Baldovino'),
(11, 'Quarteroni', 'Vicente Lopez 121'),
(12, 'Mayo', 'Bvard. Villegas 402'),
(13, 'Larrosa', 'Ameghino 282');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turner`
--

CREATE TABLE `turner` (
  `id_turner` int(11) NOT NULL,
  `id_pharmacy` int(11) NOT NULL,
  `name_pharmacy` text NOT NULL,
  `date_turner` text NOT NULL,
  `fullDay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turner`
--

INSERT INTO `turner` (`id_turner`, `id_pharmacy`, `name_pharmacy`, `date_turner`, `fullDay`) VALUES
(2, 7, 'Sindical', '07/13/2024', 1),
(5, 7, 'Sindical', '07/19/2024', 1),
(8, 6, 'Vernhes', '06/30/2024', 0),
(10, 6, 'Vernhes', '08/21/2024', 1),
(14, 6, 'Vernhes', '08/26/2024', 1),
(16, 6, 'Vernhes', '09/10/2024', 1),
(17, 6, 'Vernhes', '07/10/2024', 0),
(19, 6, 'Vernhes', '07/12/2024', 0),
(20, 7, 'Sindical', '07/12/2024', 0),
(21, 6, 'Vernhes', '07/15/2024', 0),
(22, 6, 'Vernhes', '07/17/2024', 0),
(30, 13, 'Larrosa', '07/31/2024', 1),
(32, 6, 'Vernhes', '07/31/2024', 1),
(37, 6, 'Vernhes', '07/23/2024', 1),
(40, 7, 'Sindical', '07/30/2024', 1),
(41, 11, 'Quarteroni', '08/02/2024', 1),
(42, 11, 'Quarteroni', '07/02/2024', 1),
(43, 7, 'Sindical', '07/09/2024', 1),
(44, 11, 'Quarteroni', '07/18/2024', 1),
(45, 6, 'Vernhes', '07/25/2024', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  ADD PRIMARY KEY (`event_id`);

--
-- Indices de la tabla `event_calendar`
--
ALTER TABLE `event_calendar`
  ADD PRIMARY KEY (`id_event_calendar`);

--
-- Indices de la tabla `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id_pharmacy`);

--
-- Indices de la tabla `turner`
--
ALTER TABLE `turner`
  ADD PRIMARY KEY (`id_turner`),
  ADD KEY `id_pharmacy` (`id_pharmacy`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `event_calendar`
--
ALTER TABLE `event_calendar`
  MODIFY `id_event_calendar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id_pharmacy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `turner`
--
ALTER TABLE `turner`
  MODIFY `id_turner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `turner`
--
ALTER TABLE `turner`
  ADD CONSTRAINT `turner_ibfk_1` FOREIGN KEY (`id_pharmacy`) REFERENCES `pharmacy` (`id_pharmacy`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
