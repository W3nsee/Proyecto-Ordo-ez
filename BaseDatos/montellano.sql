-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 05:52:41
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
-- Base de datos: `montellano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `contrasena` varchar(24) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido_paterno` varchar(24) DEFAULT NULL,
  `apellido_materno` varchar(24) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `contrasena`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `telefono`, `correo`) VALUES
(1, 'itto666', 'Maya Yanet', 'Arteaga', 'Eusebio', '2006-08-04', '3121162685', 'marteaga3@ucol.mx'),
(2, 'jorge123', 'Jorge Arath', 'Guzman', 'Sandoval', '2006-04-03', '3121543659', 'jorge44@ucol.mx'),
(4, 'ariel444', 'Ariel Alejandro', 'Betancourt', 'Orozco', '2006-04-12', '3124587623', 'ariel77@ucol.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `contrasena` varchar(16) NOT NULL,
  `nombre` varchar(24) NOT NULL,
  `apellido_paterno` varchar(24) NOT NULL,
  `apellido_materno` varchar(24) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(14) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `id_salon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `contrasena`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `telefono`, `correo`, `sexo`, `id_salon`) VALUES
(92, 'maya333', 'Arataki ', 'itto', 'Eusebio', '2024-05-04', 312116, 'itto@gmail.com', 'M', '2'),
(96, 'ittogod666', 'mi esposo', 'itto', 'mi vida', '2024-05-31', 312116, 'ITTO@GMAIL.COM', 'M', '2'),
(97, 'deqwrewq', 'jose luis', 'juarez', 'lopez', '2024-05-15', 212666, 'joseluis@gmail.com', 'M', '7'),
(101, 'jcarlos', 'juan carlos', 'perez', 'aaaa', '2024-05-03', 3452, 'jcarlos@gmail.com', 'M', '7'),
(102, 'pepito', 'pepito', 'Perez', 'Jimenez', '2024-06-11', 35346, 'lol@gmail.com', 'M', '1'),
(103, 'joha', 'johana', 'gutierrez', 'lopez', '2024-05-07', 31246732, 'johana4@gmail.com', 'F', '5'),
(105, 'Araeu240306', 'Arataki Itto', 'eusebio', 'arteaga', '2024-03-06', 312, 'arataki54@gmail.com', 'M', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id`, `nombre`) VALUES
(1, 'Progra I'),
(2, 'sistemas'),
(4, 'progra II'),
(7, 'matematicas'),
(8, 'EspaÃ±ol'),
(9, 'Ciencias'),
(13, 'Caifanes'),
(15, 'Topollillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_alumno` int(11) DEFAULT NULL,
  `id_asignatura` int(24) DEFAULT NULL,
  `parcial_1` float DEFAULT NULL,
  `parcial_2` float DEFAULT NULL,
  `parcial_3` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_alumno`, `id_asignatura`, `parcial_1`, `parcial_2`, `parcial_3`) VALUES
(97, 4, NULL, 7.2, 8.2),
(97, 1, 2.1, 0, 8.9),
(101, 4, 8.7, 9.8, NULL),
(96, 7, 8.1, 7.2, NULL),
(92, 1, 0, NULL, NULL),
(92, 4, NULL, 7.2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas_asistencia`
--

CREATE TABLE `faltas_asistencia` (
  `id` int(11) NOT NULL,
  `id_asignatura` varchar(24) DEFAULT NULL,
  `nombre_asignatura` varchar(24) DEFAULT NULL,
  `alumno_id` int(12) DEFAULT NULL,
  `nombre_alumno` varchar(24) DEFAULT NULL,
  `apellido_paterno` varchar(24) DEFAULT NULL,
  `apellido_materno` varchar(24) DEFAULT NULL,
  `fecha_falta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `faltas_asistencia`
--

INSERT INTO `faltas_asistencia` (`id`, `id_asignatura`, `nombre_asignatura`, `alumno_id`, `nombre_alumno`, `apellido_paterno`, `apellido_materno`, `fecha_falta`) VALUES
(1, '2', 'sistemas', 97, 'jose luis', 'juarez', 'lopez', '2024-05-23'),
(2, '2', 'sistemas', 92, 'Arataki ', 'itto', 'Eusebio', '2024-05-01'),
(3, '4', 'progra II', 97, 'jose luis', 'juarez', 'lopez', '2024-05-24'),
(4, '1', 'Progra I', 97, 'jose luis', 'juarez', 'lopez', '2024-05-01'),
(5, '1', 'Progra I', 97, 'jose luis', 'juarez', 'lopez', '2024-05-20'),
(6, '2', 'sistemas', 92, 'Arataki ', 'itto', 'Eusebio', '2024-05-29'),
(7, '1', 'Progra I', 97, 'jose luis', 'juarez', 'lopez', '2024-05-09'),
(8, '7', 'matematicas', 96, 'mi esposo', 'itto', 'mi vida', '2024-06-03'),
(9, '4', 'progra II', 92, 'Arataki ', 'itto', 'Eusebio', '2024-05-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_asignatura` int(11) NOT NULL,
  `dia` varchar(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_asignatura`, `dia`, `hora_inicio`, `hora_final`) VALUES
(8, 'Lunes', '02:05:00', '03:00:00'),
(9, 'Lunes', '19:40:00', '20:50:00'),
(9, 'Martes', '19:40:00', '20:50:00'),
(13, 'Martes', '20:30:00', '21:30:00'),
(13, 'Jueves', '03:30:00', '04:30:00'),
(13, 'Viernes', '21:30:00', '22:30:00'),
(14, 'Lunes', '06:13:00', '18:15:00'),
(15, 'Martes', '18:16:00', '18:17:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impartir`
--

CREATE TABLE `impartir` (
  `id_asignatura` int(24) DEFAULT NULL,
  `nombre_asignatura` varchar(24) DEFAULT NULL,
  `id_maestro` int(24) DEFAULT NULL,
  `nombre_maestro` varchar(24) DEFAULT NULL,
  `apellido_paterno` varchar(24) DEFAULT NULL,
  `apellido_materno` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `impartir`
--

INSERT INTO `impartir` (`id_asignatura`, `nombre_asignatura`, `id_maestro`, `nombre_maestro`, `apellido_paterno`, `apellido_materno`) VALUES
(1, 'Progra I', 2, 'hugo cesar', 'ponce', 'suarez'),
(2, 'sistemas', 1, 'Angel', 'OrdoÃ±ez', 'Ayala'),
(4, 'progra II', 2, 'hugo cesar', 'ponce', 'suarez'),
(7, 'matematicas', 5, 'Gerardo ', 'itto', 'SuÃ¡rez'),
(8, 'EpaÃ±ol', 5, 'Gerardo ', 'itto', 'SuÃ¡rez'),
(9, 'Ciencias', 2, 'hugo cesar', 'ponce', 'suarez'),
(10, 'topollillo', 2, 'hugo cesar', 'ponce', 'suarez'),
(11, 'sociales', 2, 'hugo cesar', 'ponce', 'suarez'),
(12, 'Jose Maria', 2, 'hugo cesar', 'ponce', 'suarez'),
(13, 'Caifanes', 5, 'Gerardo ', 'itto', 'Ayala'),
(14, 'pepito', 2, 'hugo cesar', 'ponce', 'suarez'),
(15, 'Topollillo', 5, 'Gerardo ', 'itto', 'Ayala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id` int(11) NOT NULL,
  `contrasena` varchar(16) NOT NULL,
  `nombre` varchar(24) NOT NULL,
  `apellido_paterno` varchar(24) NOT NULL,
  `apellido_materno` varchar(24) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(14) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`id`, `contrasena`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `telefono`, `correo`, `sexo`) VALUES
(1, 'angel123', 'Angel', 'OrdoÃ±ez', 'Ayala', '2024-05-21', 2147483647, 'aordonez@ucol.mx', 'M'),
(2, 'hugo333', 'hugo cesar', 'ponce', 'suarez', '2024-05-07', 212666, 'hugo3@ucol.mx', 'M'),
(5, 'gera', 'Gerardo ', 'itto', 'SuÃ¡rez', '2024-06-05', 666, 'gerardo @ucol.mx', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_asignatura` int(24) NOT NULL,
  `nombre_asignatura` varchar(24) NOT NULL,
  `id_alumno` int(24) NOT NULL,
  `nombre_alumno` varchar(24) NOT NULL,
  `apellido_paterno` varchar(24) NOT NULL,
  `apellido_materno` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_asignatura`, `nombre_asignatura`, `id_alumno`, `nombre_alumno`, `apellido_paterno`, `apellido_materno`) VALUES
(1, 'Progra I', 97, 'jose luis', 'juarez', 'lopez'),
(4, 'progra II', 101, 'juan carlos', 'perez', 'aaaa'),
(4, 'progra II', 97, 'jose luis', 'juarez', 'lopez'),
(2, 'sistemas', 92, 'Arataki ', 'itto', 'Eusebio'),
(2, 'sistemas', 97, 'jose luis', 'juarez', 'lopez'),
(1, 'Progra I', 92, 'Arataki ', 'itto', 'Eusebio'),
(4, 'progra II', 92, 'Arataki ', 'itto', 'Eusebio'),
(7, 'matematicas', 102, 'pepito', 'Perez', 'Jimenez'),
(7, 'matematicas', 96, 'mi esposo', 'itto', 'mi vida'),
(13, 'charly', 101, 'juan carlos', 'perez', 'aaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `id` int(11) NOT NULL,
  `grado` varchar(1) NOT NULL,
  `grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`id`, `grado`, `grupo`) VALUES
(1, '1', 'A'),
(2, '1', 'B'),
(3, '1', 'C'),
(4, '2', 'A'),
(5, '2', 'B'),
(6, '2', 'C'),
(7, '3', 'A'),
(8, '3', 'B'),
(9, '3', 'C');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faltas_asistencia`
--
ALTER TABLE `faltas_asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `faltas_asistencia`
--
ALTER TABLE `faltas_asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
