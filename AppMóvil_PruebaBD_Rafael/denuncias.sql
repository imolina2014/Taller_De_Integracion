-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2017 a las 20:15:49
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `denuncias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes`
--

CREATE TABLE `incidentes` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` text,
  `COORDENADAS` varchar(30) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `CATEGORIA` enum('Accidente','Delito') DEFAULT NULL,
  `TIPO` enum('Robo con violencia','Asalto','Portonazo','Parricidio','Infanticidio','Secuestro','Sustracción de menores','Colisión Vehicular','Choque múltiple','Incendio','Derrumbes','Atropello de peatones','Otro') DEFAULT NULL,
  `NRO_DENUNCIA` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidentes`
--

INSERT INTO `incidentes` (`ID`, `DESCRIPCION`, `COORDENADAS`, `FECHA`, `CATEGORIA`, `TIPO`, `NRO_DENUNCIA`) VALUES
(1, 'NCJDNVJSEVS', '12133425,3423412', '2017-09-18', 'Accidente', 'Incendio', 232),
(2, '23wrgve', '2132343232,324132', '2017-09-19', 'Accidente', 'Sustracción de menores', 12),
(3, 'aesrvsbsrebe', '23214,2343', '2017-09-19', 'Accidente', 'Derrumbes', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `ID_SECTOR` int(11) NOT NULL,
  `ID_DUEÑO` int(11) NOT NULL,
  `NOMBRE` varchar(25) DEFAULT NULL,
  `POS1` varchar(10) DEFAULT NULL,
  `POS2` varchar(10) DEFAULT NULL,
  `POS3` varchar(10) DEFAULT NULL,
  `POS4` varchar(10) DEFAULT NULL,
  `TIPO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CONTRASEÑA` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`ID_SECTOR`),
  ADD KEY `ID_DUEÑO` (`ID_DUEÑO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `ID_SECTOR` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD CONSTRAINT `ID_DUEÑO` FOREIGN KEY (`ID_DUEÑO`) REFERENCES `usuarios` (`ID_USUARIO`),
  ADD CONSTRAINT `sectores_ibfk_1` FOREIGN KEY (`ID_DUEÑO`) REFERENCES `usuarios` (`ID_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
