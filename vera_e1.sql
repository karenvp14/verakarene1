-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2021 a las 01:16:05
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vera_e1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id_banco` int(10) NOT NULL,
  `nombre_entidad` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`id_banco`, `nombre_entidad`, `direccion`, `correo`, `telefono`) VALUES
(1, 'Bolivariano', 'Junín 202 y Pedro Carbo, Guayaquil', 'banco_bolivariano@hotmail.com', 5505050),
(2, 'Pichincha', 'Av. Francisco de Orellana y Justino Cornejo Edif T', 'banco_pichincha@hotmail.com', 42692082),
(3, 'Produbanco', 'Pedro Carbo 604 E/ Luque y Aguirre, Guayaquil', 'produbanco@hotmail.com', 43702900),
(4, 'Guayaquil', 'Pichincha 107 (P. Icaza)', 'Guayaquil@hotmail.com', 43730100),
(5, 'Solidario', 'Av. 25 de Julio, Guayaquil 090102', 'Solidario_banco@hotmail.com', 42439551),
(6, 'Internacional S.A.', 'Av 9 de Octubre 117 y Malecón', 'Internacional.s.a@hotmail.com', 25003600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ci_cliente` int(10) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_cuenta` int(5) NOT NULL,
  `numero de cuenta` int(15) NOT NULL,
  `id_banco` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ci_cliente`, `Nombres`, `Apellidos`, `fecha_nacimiento`, `telefono`, `correo`, `direccion`, `id_cuenta`, `numero de cuenta`, `id_banco`) VALUES
(2, 'Andrea', 'Sinche', '1988-02-14', 1234567890, 'asinche@uagraria.edu.ec', 'La puntilla', 2, 347853355, 3),
(930729579, 'Karen', 'Pucuna', '1996-11-13', 42758677, 'kverapucuna@gmail.com', '22 Y Segundo Callejon Francisco Segura', 2, 2147483647, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuenta` int(10) NOT NULL,
  `tipo_cuenta` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `tipo_cuenta`) VALUES
(1, 'ahorro'),
(2, 'corriente'),
(3, 'cuenta amiga'),
(4, 'cuenta vecino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ci_cliente`),
  ADD KEY `id_banco` (`id_banco`),
  ADD KEY `id_cuenta` (`id_cuenta`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id_banco` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_banco`) REFERENCES `banco` (`id_banco`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
