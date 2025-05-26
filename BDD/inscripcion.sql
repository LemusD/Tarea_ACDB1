-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2025 a las 04:05:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inscripcion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nombre_curso` varchar(60) NOT NULL,
  `duracion_horas` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `nombre_curso`, `duracion_horas`, `idDocente`) VALUES
(1, 'FUNDAMENTOS DE PROGRAMACION I', 80, 1),
(2, 'INGLES BASICO', 60, 2),
(3, 'JAVA BASICO', 40, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `idDocente` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `nro_doc` varchar(15) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`idDocente`, `nombre`, `apellido`, `nro_doc`, `correo`, `password`) VALUES
(1, 'Fernando', 'Vergara', '1796852356', 'daniel@gmail.com', '$2y$10$MQz0APTu2p2dqBUjyjNfnuLcUt6qXCsSCstxF9WG1CwUpq1UJNFj2'),
(2, 'Angelica', 'Vargas', '2350960086', 'daniel@gmail.com', '$2y$10$O.9naGYyIA8bHlZ5nvMG6.BLc.JBR.kbzUjokVJGOpkoHqyDdijx.'),
(3, 'Nicole', 'Echeverria', '2350960098', 'daniel@gmail.com', '$2y$10$GRqcPn7xgpg1sid.ypNKZOk86yK8YYQAKrxbncSMoSPXBpOdb92wW'),
(4, 'Monica', 'Bermejo', '1707895528', 'daniel@gmail.com', '$2y$10$dHXGYzs19jr.b/4f5sZKge9x/8LbaYogXLI7lvY.OcvT49/eQE.Lq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `nro_doc` varchar(15) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `nombre`, `apellido`, `nro_doc`, `correo`, `password`) VALUES
(1, 'daniel', 'Lemus', '1716969504', 'daniel@gmail.com', '$2y$10$sTR/rPyA.uEqcXc/ObDxQuvCD7cw2E/9tNEnzZ3g82Xa5qvCD6bV2'),
(2, 'Carolina', 'Lemus', '1716969553', 'daniel@gmail.com', '$2y$10$XGqrRM8G67rCsdjqQzFBjOl89xqS8r/V26/h6PPRvIash1QV59Cme');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_curso`
--

CREATE TABLE `inscripcion_curso` (
  `idInscripcion` int(11) NOT NULL,
  `fch_Inscripcion` datetime NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `inscripcion_curso`
--

INSERT INTO `inscripcion_curso` (`idInscripcion`, `fch_Inscripcion`, `idEstudiante`, `idCurso`) VALUES
(6, '2025-05-25 21:20:41', 1, 1),
(7, '2025-05-25 21:20:45', 2, 1),
(8, '2025-05-25 21:44:28', 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`),
  ADD KEY `idDocente` (`idDocente`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`idDocente`),
  ADD UNIQUE KEY `nro_doc` (`nro_doc`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD UNIQUE KEY `nro_doc` (`nro_doc`);

--
-- Indices de la tabla `inscripcion_curso`
--
ALTER TABLE `inscripcion_curso`
  ADD PRIMARY KEY (`idInscripcion`),
  ADD KEY `idEstudiante` (`idEstudiante`,`idCurso`),
  ADD KEY `idCurso` (`idCurso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `idDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inscripcion_curso`
--
ALTER TABLE `inscripcion_curso`
  MODIFY `idInscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`idDocente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripcion_curso`
--
ALTER TABLE `inscripcion_curso`
  ADD CONSTRAINT `inscripcion_curso_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_curso_ibfk_2` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
