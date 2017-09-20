-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-09-2017 a las 14:50:01
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `imolina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes`
--

CREATE TABLE IF NOT EXISTS `incidentes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` text,
  `COORDENADAS` varchar(30) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `CATEGORIA` enum('Accidente','Delito') DEFAULT NULL,
  `TIPO` enum('Robo con violencia','Asalto','Portonazo','Parricidio','Infanticidio','Secuestro','Sustracción de menores','Colisión Vehicular','Choque múltiple','Incendio','Derrumbes','Atropello de peatones','Otro','Asesinato') DEFAULT NULL,
  `NRO_DENUNCIA` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `incidentes`
--

INSERT INTO `incidentes` (`ID`, `DESCRIPCION`, `COORDENADAS`, `FECHA`, `CATEGORIA`, `TIPO`, `NRO_DENUNCIA`) VALUES
(1, 'Ocurrio un accidente frente a mi casa y el auto se incendio', '12133425,3423412', '2017-09-18', 'Accidente', 'Incendio', 'b2+PR5DtYHP0JOyJlbJWk2Uk/SGdyjURxP7hkm1SF4u9e/IAGiLgz9BWmANy658MLbJlWA04zjb8v0i6TkUXKRE5Xn5uBctDJ4Obtbpd/6qJaSlQdQcA7N7fqPv62slaGKn47/d2mpu97hxgnNxV60+F76GJh4cyD0tWmOUjywxNpLXRCqi0+HY0hgxnHGBuozBUvFJAMZVNOSA4UWQV3eF4NOljfv4KC30Wh80RbuveH4gs0H2+0c5frhq58jv1sIPw9yVEh5ecW+TJ93HQpe9rUhlJ40/eLUn9c9MMPvCuY08AtzkDe97l6nVPc+RAiiHCEoGkpQRUBWhBOhhunQ=='),
(2, 'Un sujeto armado se llevo a un niño de la poblacion ', '2132343232,324132', '2017-09-19', 'Delito', 'Sustracción de menores', 'QHei9Fe8R5JicnJ68hcO3W8EX3z5PDPpfZ4DUEYEtdcnAFK+gBPSFNUXmIEBpevsyaEUQlTQvMbB6FhWIS2IZSTFpeoe2SPmK3gqmY8Ss58jeO2uk68L7+4E7guuaO3GNWPgS1d7Jh1YB1cykeqpdT2bpEZlDWeNjk0tJxmkeS8+78l+4++NvOuMsP5fhSmgif5znY+ISVp0pBRMEZ9iBvHAQJJqxNBRPmNIV+qCKULKaMQ1nMRo4M+PpVGfod/CddXSG4GFM7vxXHuT8liJc4kjtwJ/pXcY+mt6kMELKXtnPJ8gInhIUx90rF4DqXCLKhWbWlo/3ifrM/IPyuaprg=='),
(3, 'Se desmorono el cerro frente a mi casa y algunos autos chocaron', '23214,2343', '2017-09-19', 'Accidente', 'Derrumbes', 'lgdVbZAQUCd/WUHhmM0M2zSGC7xrZtRKO/0zsBwpijJCkqwKasZ7WiVYKTZ/zrpTnPCoxwgeyXTRkETZbnnyQVSKmuT4WCfPWMQNEJYMdRdJG0xCfnBd4+EgRRsF57G/A0frBJVqJRPuFD5WRYOwR5ZRP4+dq5sinKfnH9Cles4AH4TidVDcOdGtVbn6sVGD4Ocb9TRGB1NC5Wp/RfpPebYYigMaIPNK1Pf8/xRpoDUALpnWdNC1pMBt/eIekpQAc6L6c/slFhlOEFSj0yeSvNik//6DZXZgaEj3ZogXC0OHpLh1OP3oZu1XPrA9QMgcf4yFeo2Ax7RNB9JvreSvgg==');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE IF NOT EXISTS `sectores` (
  `ID_SECTOR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DUEÑO` int(11) NOT NULL,
  `NOMBRE` varchar(25) DEFAULT NULL,
  `POS1` varchar(10) DEFAULT NULL,
  `POS2` varchar(10) DEFAULT NULL,
  `POS3` varchar(10) DEFAULT NULL,
  `POS4` varchar(10) DEFAULT NULL,
  `TIPO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_SECTOR`),
  KEY `ID_DUEÑO` (`ID_DUEÑO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CONTRASEÑA` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE`, `CONTRASEÑA`) VALUES
(5, 'MARCELO', '123');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD CONSTRAINT `sectores_ibfk_1` FOREIGN KEY (`ID_DUEÑO`) REFERENCES `usuarios` (`ID_USUARIO`);
