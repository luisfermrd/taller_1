-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2022 a las 03:09:56
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE DATABASE IF NOT EXISTS seguros;

USE seguros;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizar`
--

CREATE TABLE `cotizar` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `basico` int(11) NOT NULL,
  `estandar` int(11) NOT NULL,
  `premiun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizar`
--

INSERT INTO `cotizar` (`id`, `tipo`, `basico`, `estandar`, `premiun`) VALUES
(1, 'vida', 1000, 1500, 2000),
(2, 'vivienda', 1800, 2300, 3000),
(3, 'vehiculo', 1700, 2200, 2800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `more_users`
--

CREATE TABLE `more_users` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `names` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `more_users`
--

INSERT INTO `more_users` (`id`, `tipo_documento`, `names`, `email`) VALUES
(100222927, 'Tarjeta de identidad', 'Pedro Lopez', 'pedro@gmail.com'),
(1002222222, 'Cedula de ciudadania', 'Katiusca Miranda', 'katiusca@gmail.com'),
(1002229711, 'Cedula de ciudadania', 'Amina Lucia', 'luisfermrd05@gmail.com'),
(1002229788, 'Cedula de ciudadania', 'Luis Miranda', 'luisfermrd05@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `ref_pago` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `pago` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  `cancelado` tinyint(1) NOT NULL DEFAULT 0,
  `reclamado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`ref_pago`, `valor`, `pago`, `activo`, `cancelado`, `reclamado`) VALUES
('800841522', 40500, 1, 1, 0, 2),
('6926683094', 116000, 1, 1, 0, 0),
('9138641587', 80000, 1, 1, 0, 0),
('7242944562', 39000, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `ref_pago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `fecha_solicitud`, `estado`, `ref_pago`) VALUES
(1, '2022-11-04', 1, '800841522');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `names` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo_documento`, `names`, `email`, `password`, `rol`, `active`) VALUES
(100222927, 'Tarjeta de identidad', 'Pedro Lopez', 'pedro@gmail.com', '$2y$15$.gnAhy2mItf7DYQ1jFx3YeVTzCYz4fj8ArqskQN.Q1JUhEFS7HiXO', 0, 1),
(1002229788, 'Cedula de ciudadania', 'Luis Miranda', 'luisfermrd05@gmail.com', '$2y$15$.f2dchScGYPaUFAGX9K2wea7JwCutOfMvoey.kFa80p9HZYUSxGnW', 0, 1),
(1002229789, 'Cedula de ciudadania', 'Luis Fernando', 'luisfer-mrd@hotmail.com', '$2y$15$oqLrB1xkkyWsU9YvK9PxC.AVkcx1B.kBnXXb.LyXpa5JEDp0tHsa6', 1, 1),
(1193150679, 'Cedula de ciudadania', 'Cielo Tordecilla', 'milu061216@gmail.com', '$2y$15$Tt/CS4H7rGlh94D8FGKyiO8OJUOBQUPYW212JmBd050g.EvOl4dMC', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vida`
--

CREATE TABLE `vida` (
  `id_user` int(11) NOT NULL,
  `id_beneficiario` int(11) NOT NULL,
  `fecha_nacimineto` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `ingresos` int(11) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `medicamento` varchar(20) NOT NULL,
  `cual` varchar(100) NOT NULL,
  `eps_ips` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `ref_pago` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `plan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vida`
--

INSERT INTO `vida` (`id_user`, `id_beneficiario`, `fecha_nacimineto`, `sexo`, `estado_civil`, `celular`, `direccion`, `ciudad`, `ingresos`, `profesion`, `medicamento`, `cual`, `eps_ips`, `fecha_inicio`, `fecha_fin`, `ref_pago`, `tipo`, `plan`) VALUES
(1002229788, 1002229788, '2000-08-20', 'Masculino', 'Soltero', '3017998748', 'Los corrales', 'Purisima', 1000000, 'Ing. sistemas', 'No', 'No aplica', 'nueva eps', '2022-11-03', '2022-11-30', '800841522', 'Seguro de vida', 'estandar'),
(1002229788, 1002229711, '2002-01-30', 'Femenino', 'Soltero', '3221201202', 'Los corrales', 'Purisima', 1000000, 'Adm. Finanzas', 'No', 'No aplica', 'nueva eps', '2022-11-03', '2022-12-31', '6926683094', 'Seguro de vida', 'premiun'),
(100222927, 100222927, '2002-06-11', 'Masculino', 'Union libre', '3017998748', 'los andes', 'Lorica', 2000000, 'Ing. sistemas', 'No', 'No aplica', 'mutual ser', '2022-11-04', '2022-12-14', '9138641587', 'Seguro de vida', 'premiun'),
(1002229788, 1002222222, '2002-02-13', 'Femenino', 'Union libre', '3106026177', 'Los corrales', 'Purisima', 900000, 'Adm. de todo', 'No', 'No aplica', 'mutual ser', '2022-11-04', '2022-11-30', '7242944562', 'Seguro de vida', 'estandar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `more_users`
--
ALTER TABLE `more_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
