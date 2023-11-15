-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-11-2023 a las 22:14:23
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_mascotas` int(30) NOT NULL,
  `Fecha_cita` date NOT NULL,
  `id_veterinario` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Tipo_doc` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Direccion` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Tipo_doc`, `id_cliente`, `Nombre`, `Apellido`, `Telefono`, `Direccion`) VALUES
('C.C', 127362, 'Sancho', 'Panza', 31273871, 'California Sur Mz7#45'),
('C.C', 127372, 'Sara', 'Rodriguez', 313737289, 'Castilla Mz6#164'),
('C.C', 237283, 'Sarai', 'Duque', 312738728, 'La florida Mz12#89'),
('C.C', 287834, 'Mariana', 'Suarez', 31277397, 'La Florida Mz3#12'),
('C.C', 1262376, 'Juan', 'Sanchez', 312017388, 'La Adiela Mz10#2'),
('C.C', 1273763, 'Niky', 'Castañeda', 31273722, 'California Mz18#13'),
('C.C', 1273817, 'Monica', 'Perez', 31273728, 'Monserrate Mz12#98'),
('C.C', 2283829, 'Camila', 'Osorio', 315876345, 'Simon Bolivar Mz4#3'),
('C.C', 2372773, 'Nicol', 'Restrepo', 312838237, 'Bosques de Pinares Mz10#145'),
('C.C', 17377378, 'Ana', 'Ramirez', 313549576, 'Bosques Mz3 #144');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial clinico`
--

CREATE TABLE `historial clinico` (
  `id_historial_clinico` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `Observacion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Diagnostico` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascotas` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `id_tipo_mascota` int(11) NOT NULL,
  `id_raza` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Sexo` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `Peso` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `id_tipo_alimentacion` int(30) NOT NULL,
  `id_historial_clinico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `id_razas` int(11) NOT NULL,
  `Nom_razas` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Raza_ descono` int(20) NOT NULL,
  `id_tipo_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo de alimentacion`
--

CREATE TABLE `tipo de alimentacion` (
  `id_tipo_alimentacion` int(11) NOT NULL,
  `Nom_tipo_alim` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Descono_tipo_alim` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo de mascota`
--

CREATE TABLE `tipo de mascota` (
  `id_tipo_mascota` int(11) NOT NULL,
  `Nom_tipo_mascota` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo de vacuna`
--

CREATE TABLE `tipo de vacuna` (
  `id_tipo_vacuna` int(11) NOT NULL,
  `Nom_tipo_vacuna` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_vacuna_descon` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id_vacunas` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_tipo_vacuna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `id_veterinario` int(11) NOT NULL,
  `Nom_veterinario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Num_doc` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`id_veterinario`, `Nom_veterinario`, `Telefono`, `Num_doc`) VALUES
(888, 'Camila', '3228826655', 1976272622),
(16515, 'Marta', '319188189', 1928822799),
(17161, 'Laura', '3928282828', 1725242424),
(27267, 'Victor', '3918918189', 1272726678),
(62625, 'jhojan', '3819181992', 1892781818),
(71919, 'Maria', '3028911999', 1732425555),
(72727, 'Carlos', '3728722878', 1752626569),
(171717, 'Lucia', '3819281819', 1928822989),
(722672, 'Javier', '319887765', 106753225),
(765445, 'Samara', '392828288', 18277227);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD UNIQUE KEY `id_mascotas` (`id_mascotas`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `id_veterinario` (`id_veterinario`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `historial clinico`
--
ALTER TABLE `historial clinico`
  ADD PRIMARY KEY (`id_historial_clinico`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascotas`),
  ADD UNIQUE KEY `id_clientes` (`id_clientes`),
  ADD UNIQUE KEY `id_tipo_alimentacion` (`id_tipo_alimentacion`),
  ADD KEY `id_raza` (`id_raza`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id_razas`),
  ADD UNIQUE KEY `id_tipo_mascota` (`id_tipo_mascota`);

--
-- Indices de la tabla `tipo de alimentacion`
--
ALTER TABLE `tipo de alimentacion`
  ADD PRIMARY KEY (`id_tipo_alimentacion`);

--
-- Indices de la tabla `tipo de mascota`
--
ALTER TABLE `tipo de mascota`
  ADD PRIMARY KEY (`id_tipo_mascota`);

--
-- Indices de la tabla `tipo de vacuna`
--
ALTER TABLE `tipo de vacuna`
  ADD PRIMARY KEY (`id_tipo_vacuna`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id_vacunas`),
  ADD UNIQUE KEY `id_mascota` (`id_mascota`),
  ADD UNIQUE KEY `id_tipo_vacuna` (`id_tipo_vacuna`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id_veterinario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17377379;

--
-- AUTO_INCREMENT de la tabla `historial clinico`
--
ALTER TABLE `historial clinico`
  MODIFY `id_historial_clinico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascotas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `id_razas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo de alimentacion`
--
ALTER TABLE `tipo de alimentacion`
  MODIFY `id_tipo_alimentacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo de mascota`
--
ALTER TABLE `tipo de mascota`
  MODIFY `id_tipo_mascota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo de vacuna`
--
ALTER TABLE `tipo de vacuna`
  MODIFY `id_tipo_vacuna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id_vacunas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id_veterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=765446;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_mascotas`) REFERENCES `mascotas` (`id_mascotas`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_veterinario`);

--
-- Filtros para la tabla `historial clinico`
--
ALTER TABLE `historial clinico`
  ADD CONSTRAINT `historial clinico_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascotas`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`id_raza`) REFERENCES `razas` (`id_razas`),
  ADD CONSTRAINT `mascotas_ibfk_2` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `razas`
--
ALTER TABLE `razas`
  ADD CONSTRAINT `razas_ibfk_1` FOREIGN KEY (`id_tipo_mascota`) REFERENCES `tipo de mascota` (`id_tipo_mascota`);

--
-- Filtros para la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD CONSTRAINT `vacunas_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascotas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
