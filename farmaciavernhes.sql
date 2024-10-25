-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2024 a las 21:31:54
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
-- Estructura de tabla para la tabla `perfumery`
--

CREATE TABLE `perfumery` (
  `id_perfumery` int(11) NOT NULL,
  `name_perfumery` text NOT NULL,
  `file_perfumery` text NOT NULL,
  `order_perfumery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id_pharmacy` int(11) NOT NULL,
  `name_pharmacy` text NOT NULL,
  `address_pharmacy` text NOT NULL,
  `halfday_pharmacy` text NOT NULL,
  `fullday_pharmacy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name_users` text NOT NULL,
  `email_users` text NOT NULL,
  `email_encrypted_users` text NOT NULL,
  `password_users` text NOT NULL,
  `actived_users` int(11) NOT NULL,
  `isSuperuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `name_users`, `email_users`, `email_encrypted_users`, `password_users`, `actived_users`, `isSuperuser`) VALUES
(1, 'Elias', 'eliasbrucart@gmail.com', '9d1c12324fd691d3764a4c1a8ea9d8bc', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 1, 1);

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
-- Indices de la tabla `perfumery`
--
ALTER TABLE `perfumery`
  ADD PRIMARY KEY (`id_perfumery`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

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
-- AUTO_INCREMENT de la tabla `perfumery`
--
ALTER TABLE `perfumery`
  MODIFY `id_perfumery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id_pharmacy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turner`
--
ALTER TABLE `turner`
  MODIFY `id_turner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
