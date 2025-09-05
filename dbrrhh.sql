-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2025 a las 02:21:42
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
-- Base de datos: `dbrrhh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `dui` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `casa` varchar(20) DEFAULT NULL,
  `estado_civil` varchar(25) DEFAULT NULL,
  `fotografia` varchar(150) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `telefono`, `dui`, `fecha_nacimiento`, `departamento`, `distrito`, `colonia`, `calle`, `casa`, `estado_civil`, `fotografia`, `fecha_registro`) VALUES
(4, 'Madelinne', '72449101', '00000000-7', '2023-07-03', 'Morazán', 'Morazán Sur', 'Corinto', 'Las Delicias', 'n43', 'Casado', 'imagen_2025-07-23_101431832.png', '2025-09-04 22:16:54'),
(5, 'Harold', '4712-8471', '00000000-6', '1997-06-17', 'Mamador', 'Mamador plus', 'Albion', 'Online', 'ThetFort', 'Soltero', 'Captura de pantalla 2025-04-29 234913.png', '2025-09-05 00:02:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `pwd`) VALUES
(1, 'Pablo', 'pablito.giron65@gmail.com', '12345'),
(2, 'Kratos07p', 'kratos@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dui` (`dui`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
