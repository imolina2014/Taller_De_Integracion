-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2017 at 01:54 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2847271_imolina`
--

-- --------------------------------------------------------

--
-- Table structure for table `incidentes`
--

CREATE TABLE `incidentes` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` text COLLATE utf8_unicode_ci NOT NULL,
  `COORDENADAS` geometry NOT NULL,
  `FECHA` date NOT NULL,
  `CATEGORIA` enum('Accidente','Delito') COLLATE utf8_unicode_ci NOT NULL,
  `TIPO` enum('Robo con violencia','Asalto','Portonazo','Parricidio','Infanticidio','Secuestro','Sustraccion de menores','Colision vehicular','Choque multiple','Incendio','Derrumbes','Atropello de peatones','Otro','Asesinato') COLLATE utf8_unicode_ci NOT NULL,
  `NRO_DENUNCIA` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CALLE` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `incidentes`
--

INSERT INTO `incidentes` (`ID`, `DESCRIPCION`, `COORDENADAS`, `FECHA`, `CATEGORIA`, `TIPO`, `NRO_DENUNCIA`, `CALLE`) VALUES
(5, 'Prueba 3', '\0\0\0\0\0\0\0è‰MŸD[C¿¡I‰Ã#R¿', '2017-10-16', 'Accidente', 'Incendio', 'doN5+LqI60sqwH9oSnfU', 'Cacique Huentu 1815-1845, Temuco, IX Regi√≥n, Chile'),
(3, 'Uno', '\0\0\0\0\0\0\0Ù„ñE[C¿Õ˝z*Ã#R¿', '2017-10-16', 'Accidente', 'Incendio', 'X0n6wG0qNrAbC/VQJYwE', 'Cacique Cheuquellan 1760-1784, Temuco, IX Regi√≥n, Chile'),
(4, 'Prueba 2 ', '\0\0\0\0\0\0\0è‰MŸD[C¿¡I‰Ã#R¿', '2017-10-16', 'Accidente', 'Incendio', 'tsKvRXwZ+gJqO+bSm20W', 'Cacique Huentu 1815-1845, Temuco, IX Regi√≥n, Chile');

-- --------------------------------------------------------

--
-- Table structure for table `incidentes3`
--

CREATE TABLE `incidentes3` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` text,
  `COORDENADAS` text,
  `FECHA` date DEFAULT NULL,
  `CATEGORIA` enum('Accidente','Delito') DEFAULT NULL,
  `TIPO` enum('Robo con violencia','Asalto','Portonazo','Parricidio','Infanticidio','Secuestro','Sustraccion de menores','Colision vehicular','Choque multiple','Incendio','Derrumbes','Atropello de peatones','Otro','Asesinato') DEFAULT NULL,
  `NRO_DENUNCIA` text,
  `CALLE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidentes3`
--

INSERT INTO `incidentes3` (`ID`, `DESCRIPCION`, `COORDENADAS`, `FECHA`, `CATEGORIA`, `TIPO`, `NRO_DENUNCIA`, `CALLE`) VALUES
(56, 'Pruebas de ingreso encriptacion doble', '-38.7130158,-72.5594288', '2017-09-27', 'Accidente', 'Incendio', 'in5BZGfyQrhxBiap3aHeIyaYy2UwtGuUbgky+9Xn3mMPKZFRL1rFPs+BEGEcCvU5h4Qfl8Ico2YN4LbwzirKThb5L2ZiIVK/L8ePWg+d2rGb4U43Qhmq9BYeeBsBdAOH+sI8OiJuH0IL+bHSVTlJ57S7Q110FZRSk+gWaj3MmlZ75yl/xPKavdyAhQJbRNXa+X6ttdKj3jI+yMZGJrhgcWk8rLhJIUnW8QwTQ0sF4OwGWGHUN0T8l8ccOTAPZgxQruqKFtjgBCUbYXFEpP+8sf4ko0GoBMRWEX8YNEM/SCzCrBXKi91xVVFiLZT0WK/JZ2V/DqqnOCE7sZJ96K82sQ==', 'Cacique Huentu 1815-1845, Temuco, IX Regi√≥n, Chile'),
(57, 'Pruebas de ingreso encriptacion doble segunda ', '-38.7130158,-72.5594288', '2017-09-27', 'Accidente', 'Incendio', 'S2fwTFlyVMWwF4EMd6RFxEj1c0z92ZdjQMCMICTKA/QJCsdQrI645PGRz24EkHBMmDpMQaUxrhA+XlAga2jD3ZZ/NdVNXeE+X1J/1hNaN6iOa4Z+poei2aYEG7ZcFRM7A/08grIFjzmEyVZlk0tXreo7P57XAZF7cdQlKDsYBpuTlaI0jAzrwpbKjkmT+kiuSj+qHyM32ml88NYAWPAEBNennwObHaPYepjaE8RZG2FzAsAK5NFtMzhEIB+qJsPUujAkIWKr1xew0XVD2sOSpCLpTGCrA9D1YqQO8W5DdR8CGr13qLa+6iOkFJDt6suXqvI1wgDhV3E6FYOYMK8d+g==', 'Cacique Huentu 1815-1845, Temuco, IX Regi√≥n, Chile'),
(58, 'Prueba reuni√≥n ', '-38.7031416,-72.5488693', '2017-09-27', 'Accidente', 'Derrumbes', 'S1kqnVpnDTdSvIDMZtyxvtNtXk/YUfKxb07Rf+U+DfAinugiHUAiC7pxDZMkZI19eziJE/I9szVBUKLns9aqgBiM5HCWl/J3DfUerwi29HjOt6Qk/bqQ53xzwBotvBI1Hak2pyUpLkasWO8BWmzTVEEIUIGzuFqWmLZ1w38MJlbdXEYclj85LxgignA/l6DyZVyidl027qH3e7ILvUWVkIPCTzUNh2xX5RteKVU2A2HALZ1FFiazOEGoChRzOxGre5fINK0bqtbucJ1eKX40hrbAoj9L/4YbfYJ0Uz6G8Q0LEN2MS/EEzAcJZ+6L9zLHM2SptmnJXuQty18iDCkjCQ==', 'Rudecindo Ortega 3239-3813, Temuco, IX Regi√≥n, Chile'),
(59, 'Secuestraron a mi gatito', '-38.71251505667953,-72.56019935087892', '2017-09-27', 'Delito', 'Secuestro', 'omkBlxq+kD4bT4qVViW5CEX8fihXW3aWYAC8S+ohai0TIpdT9m//wGCP8xp8w6ZilIEvWKI4+E4vTW5FEuLEdqhmJKt5OES2cMJdEIcuKfEwlcrlcphGphWRHlGJYBtI4dy5Cq3sTOTl5mdDcQdGfKgs/LQvPA5MZPFRFFxu7uAbrhyzBOyHuj2UN6gyU+QK51zQ89dAn+TDpNbmHqe8qnTS6iasI7fGR4yQhM1rKPHDZaLWHNiVYeqX3/16XwUIaOOW1IFhcrx9LICLztBLSFjNyUpnIfLYUSOPPTRX+OP9X+RDa3b/EF0+uoTelq/CdcDfzzGWKrxYWbZ+piy1oA==', 'Rudecindo Ortega 1800, Temuco, IX Regi√≥n, Chile'),
(60, 'Me atropellaron y me pare ', '-38.7029503,-72.548939', '2017-09-28', 'Accidente', 'Atropello de peatones', 'M60wKPIr3kIeOZtaTGaIJ2W51rl1+4tCff3QftflzCgJXpHvK5vW/b1IXDuNbJC4vH3oj5mmafrD2UME1/fO8NNGTXZTKF7rG7SXbqxeOp6cunKcXdWx0C1FpYtu7GLvIHVSO1YYW/C50xRPYPoyEvXngLmSJddhMJ/XLoed9641tR84v/4AE642gona4OJFZktK3kl16mebHleVLdZy5dzbTnzeKsSjG8oj8JXok7rqn1Phx7lWU/mRp7bo3zGDm/5szgPEfXLkGTawsCxd7MskJDNo2L4xazTi5LQSXfGL48nwLl5dLrbqL2p+WtEvFhjZ6867lJKaG6vXSUT3bg==', 'Rudecindo Ortega 3239-3813, Temuco, IX Regi√≥n, Chile'),
(61, 'Piedraaaaaassss', '-38.716881222798975,-72.54413248144533', '2017-09-28', 'Accidente', 'Derrumbes', 'QOO23GUx7VuZ4ak/J5ZBISg5FAccW0ZFG72Vy1MtxasHBaFRIPT0JmHzHQDNo4mSBRUkgQHzTpf6y/dVE6RkFmtgNZmbmb/jSkE1HnsfzxHA1C4yOmTfyVMxV7C3BDeE8LkG9L1YZeL7UMvsxz/H4qtQe+YdecuzH1xYeQYXT1Bq4xzEm4216RvQHf+nzxVMXWpg9U9XoduEUgKa8uIzNSaduC/NMAlCCmv/drCAwTkqaYjKx4sBgOwanA4wiM1NlCPGdTHQ0ELn8VK3tF0s5JORm3+0CJjahnI5yfzbZtbTTF0TiKoFB3yhwhXBwRE4sAb6QzjNlk6DdOD+pai2aQ==', 'Panamericana Sur, Temuco, IX Regi√≥n, Chile'),
(62, '', ',', '2017-10-02', '', '', 'aJV/Sgm5ZClmouECeJve3SnJL9rXAIqasD56I8i//lvrnUQvtwcmiTt8fGlCu7xTqmwOumkkPcuIm5ZON2X8AKkeoOSi5n/uchKrtqP3RAlwtVTNqWOaaKwP2lAx/fPKdwDkB74cPdwN05aOYYb2lGbk8ykSb/D6lqxC1dgLmIxMBRqwCQw0irCW5frHoJhLQ5EnAZKD6zMk7v5IFs1FuZz7k8fHN9AhzhFhnJAsIVZudCTXAjUfUjhIP+nf2AIDvN8T4HFgFLgEaxci/pvdPsea7RsQbM/PoSVyl0HdSa4qVd1/y/03gRi5wveEs/6/LjlSHFMTULGAn8+fj5EWJg==', ''),
(63, '', '-38.7029556,-72.5489368', '2017-10-02', '', '', 'lLCU9DSRDIxhzus8tr3TiA8BTRnQo2MbAVvTuCDt4urKTsP0NY502V32Lue5sAmDRZ+FjxGT382PjqjW8o/zbVPT+59zogsAx4nJBINf8V5c+m7O9UaEEwNyIK1clGofLCQoFloasUb02x2CSGZeBlGb3TSGX/kfPYkNzxHu15HWBWd/qIpfGWeBH8IWeP3tf5WF6QDJR3uSfyy7wOjfdAAMsyTTfvdLT95u2piQ1wVEqof2AoaJ/Uosk9pA31a0GH2q6boPp4cxM6rS6l/UpZjRWhp8Gg1SgGh2FGW6+dLPwCHu1CeebK+G04NSRsE15oEthCXY+InKt44XrS5baA==', 'Rudecindo Ortega 3239-3813, Temuco, IX Regi√≥n, Chile'),
(64, 'Prueba ', '-38.7110443,-73.1537478', '2017-10-08', 'Accidente', 'Incendio', 'Gn+90MT/PqgrEEKhc/IBkPhQoroB7EP1s4I8zUmfJ9GhvazYVsHM19Rvr3yPi413sThLaNiJFQ4CfdmFIcS0YKQaKaflJ1dHDlMZvhjUlSRVDyBQbf3vx8gIay2vVqjjLkRGaATk2De0vrtGZ8ewmpEN7YuFn2MlWAQKlLJUIALXM4MmQzTipSeJxX1O51e1vrjzvCSwaXKcrX5/oFGC6b8KyvxGH1lKDbFY8ArUx/C8XIWvmWC0PUOcw+HZ2rLzEaJPdCcRJ0kXfkc3PQ4pQe9EKu8rrelSHa+QHgMOWu4ushJLFTk30dmZwbloetC+XrSHVed0ew2xBY0lwjCQ0g==', 'Alcalde Holzaphel, Carahue, IX Regi√≥n, Chile'),
(65, '', ',', '2017-10-16', '', '', 'FPvd8xzkXYOKvJ9CUWHiQT9wEpkjN4G/SZf9guQrxcT3uh/KBBqoLxfT0zcl7KDEoDbDcTb5yH1WywzdalGhXr1Ddq8HFO7sZoi0HhCLmJzfuS6vptEba1I+yjH58CN3TlvqDtZq7n8+DpX77ivEqF6O1imqWQp8PtGXy4RWeAgGk00QPoJOqcPySk+2bADmAhlH7xfIKT+nhUl3lqWbyrte0vwD08PAbcc8/pmgpUXxuLac5wB+KF4ocSyuFIrrJSg+rPVR2eO/YWzLoZlmOXNzJrOAag6I8Qcm756hbvNFDxhn9cG5hi0u75UERSxsDlWJj7TzKUqICkPmdmxulw==', '');

-- --------------------------------------------------------

--
-- Table structure for table `sectores`
--

CREATE TABLE `sectores` (
  `ID_SECTOR` int(11) NOT NULL,
  `ID_DUE√ëO` int(11) NOT NULL,
  `NOMBRE` varchar(25) DEFAULT NULL,
  `POS1` varchar(10) DEFAULT NULL,
  `POS2` varchar(10) DEFAULT NULL,
  `POS3` varchar(10) DEFAULT NULL,
  `POS4` varchar(10) DEFAULT NULL,
  `TIPO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CONTRASE√ëA` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE`, `CONTRASE√ëA`) VALUES
(5, 'MARCELO', '123'),
(6, 'pola', 'q'),
(7, 'alex', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incidentes`
--
ALTER TABLE `incidentes`
  ADD PRIMARY KEY (`ID`),
  ADD SPATIAL KEY `COORDENADAS` (`COORDENADAS`);

--
-- Indexes for table `incidentes3`
--
ALTER TABLE `incidentes3`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`ID_SECTOR`),
  ADD KEY `ID_DUE√ëO` (`ID_DUE√ëO`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incidentes`
--
ALTER TABLE `incidentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `incidentes3`
--
ALTER TABLE `incidentes3`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `sectores`
--
ALTER TABLE `sectores`
  MODIFY `ID_SECTOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sectores`
--
ALTER TABLE `sectores`
  ADD CONSTRAINT `sectores_ibfk_1` FOREIGN KEY (`ID_DUE√ëO`) REFERENCES `usuarios` (`ID_USUARIO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
