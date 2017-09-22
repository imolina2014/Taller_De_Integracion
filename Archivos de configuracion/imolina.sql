-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-09-2017 a las 22:06:14
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
  `COORDENADAS` text,
  `FECHA` date DEFAULT NULL,
  `CATEGORIA` enum('Accidente','Delito') DEFAULT NULL,
  `TIPO` enum('Robo con violencia','Asalto','Portonazo','Parricidio','Infanticidio','Secuestro','Sustraccion de menores','Colision vehicular','Choque multiple','Incendio','Derrumbes','Atropello de peatones','Otro','Asesinato') DEFAULT NULL,
  `NRO_DENUNCIA` text,
  `CALLE` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `incidentes`
--

INSERT INTO `incidentes` (`ID`, `DESCRIPCION`, `COORDENADAS`, `FECHA`, `CATEGORIA`, `TIPO`, `NRO_DENUNCIA`, `CALLE`) VALUES
(10, 'Accidente frente a mi casa. 4 autos involucrados', '43.465187,-80.522372', '2017-09-18', 'Accidente', 'Choque multiple', 'kEpyyG/LqCU5UobwAC25Y+bt20ZUScYdI3Qz09ZRcTI9olb8IfPNjgeOcogCFT6KLKKaRgF6yKEEmoUNTH36DIllsB5EUix/D1g9Dwq1MI25Uoz3K0Cv7mfKM+b3Et5cWLqJwNlwdosDNrZH0b3+SB2/tSAMktgr6otq4+N3kN+bYi26HDSBUn7HJ9KgIp4/ip7NKBEIkkjuJ60lmupHgcd4TtEEj3RDtXo2UB+4dB5n1fS+nC86oXKpdkbskwcUBvaunZDKkzNQ4UfWLrZt9iekEUb4fn5W8hY+7qLNS8DJ3L6aux/Nhrx6Qvrezel4yfN0UqPDhtZFdDhyst43DQ==', ''),
(11, 'Impactaron dos vehiculos de frente. Uno rojo y otro azul.', '43.465187,-80.522372', '2017-09-18', 'Accidente', 'Colision vehicular', 'bFKJaVbasvT656lZosPS5IQ6eJW8H8vnio/yTHQ7zB4XdQxDb0vdJbJmVJpzIAc165SLQnF+JbYdh2AtttFJNAqpILytvauxZFsN12tqxCyXP8dny0/EemI247aXDiUu3kxRtDkPf7TeKIM+5+5vOSl6qfalaALT2+ze6Fyhgai2Cm5aaZzQsL36UQoD3ibRmDikqXW2nwfqgwJCpmW9+nJT4cltBGw2e9uIQANcNo0dKFaAbJHiLaGcSGV8/q/9MEWjSNwMKMcry9gW54+kqcbqWL8XKQuCaCfBNU9KJC02Hz2DwQ+xn1yIRROERBBiOb9EYe47cWsu2Ug+iIcIRQ==', ''),
(12, 'Un vehÃ­culo se estÃ¡ quemando en la plaza ', '-38.7110596,-73.1537802', '2017-09-18', 'Accidente', 'Incendio', 'dd240ZUQnwJEObu8DTUhTtZoZx6kQiQrqr8U4WEPSd/QRMciJl75Dq2QZ9Vk3mBQGT+kw9cYY0BnXNFQ8Oy4TH5zYQ3SnnfOYISyi/o2twn9p2AnV2JWRi4paZCsTt9bWxIbjqyTg8bo2ReyHvni2KQPdVkLm0DjPIEmkWQ5CF6QVRHuD2Tf0V+EmhL35MeCeqespIhfkepUwaRFNW8uN3eE6C2DVu9nGAZyxYIum256w8lOMxFhtzHmarSnBQN6X9F26PoFevwqt8k33LHIMS7x2K7OdegJ3mitIcDj9+cykeMnAFPY2xQ/CUjJh+9YiadOrFkNHfxXzgOiuwHmWA==', ''),
(13, 'Ahhhh', '-38.7029566,-72.5489354', '2017-09-18', 'Accidente', 'Incendio', 'W7Rr6nxmHdcy1gX+tLa+372B8JFSQNtxTmYOvbd+bCnYRK7SUrMqIGDGavRDgpXD1QS0wcRTzGLMXhLeKQ8T3E2amfcaH6IzG92l9qkTIPEDy2RuS2q5SmvD0ErZLHLC90zxfJsPKxXJQD7J+FOiA/s6kxwfF0ngAteRFdnKGiAq9ZCDYLp20kqtQob8+dRDVSL7qyOS11ta6zBRkR/nmdyEtPTjQhm+kFtaRbdrWiMd/WTp9IFZXDNCoYAmGvZ25r04sq9qv3geLIf8LEkrp46xHJzGctR17Zjq5Ze5dgcoiJqs+pc+38C0u9aLCy0bIXb5XdhCnyDXG2z3Tb/OCQ==', ''),
(14, 'El wn quedÃ³ pa la caga', '-38.7145463,-72.556529', '2017-09-18', 'Accidente', 'Choque multiple', 'FA9NzW1uP+AMIn7RjDYhRLWUKq6FUo9d1rt3drJspM21ymC17Mm1blXtxlU18DaR3LXRRYZrajvV8gllsZXNfV61iZSrinVZ7YOsZ0FktlFY82rnQ4O0X2wmOxndp3JDg+EeEpDK7yfLYS902FGQijzxcuutp39F6XyCr/rM1+YnQ4zR3vFF+Hp/t3zvQitQGVE8gpXbn9329GgrzNkbN8P2fyMqG6F5QncncRCeeqxxYSSJmCy5fMISXJIw5eu6AjfqBwUIIVZvGjJAhBChqQSZFhxN++ni6XpHrUt9xxxm0KciHFE9Uz9jwzmPS0indMM+vjy17ehIPtyOsAAodg==', ''),
(15, 'INGRESANDO PHP', '356987', '2017-09-01', 'Accidente', 'Robo con violencia', '7879', ''),
(16, '', '43.465187,-80.522372', '2017-09-18', 'Accidente', 'Derrumbes', 'jHyz0CsECl2+XF8sp8SldSF7SUXXhGFH7Vp19KTpsNHrokMcYoo59KfZvaM1/EUSn8y2oWZGTVD/IFkT/KyDEBJI2ZoLeVSooGsh+EIMtZg0d2EviGM/85UA+AmZCK3e83eseJ/RvDEFHf+WDxxkk/qXKx84u4BcnRmA7ybO0eB6YvsIGnEXb6tnyHSYkOqgxfzi/xwZ5iI1JP8rKpdGHrZAo29NSZM87sMlZ9/QZFptFQOMiMHt8HceKtxpKMhw7UuwgPmA1jLjrRFrWizMcvvsEUAY/+lRpu93TZ72siZSF704pcqvmLhfMCZD5uLpMbleqQjsrvSBRoUcvFmCWw==', ''),
(17, 'chocaron dos vehÃ­culos', '-38.7031611,-72.5492454', '2017-09-18', 'Accidente', 'Colision vehicular', 'T76+oQfxLTlaPUFbj9mrZnL7LC3kB8y1+noI+L3EvPoXuXRejjC5GGCg+iAHMmk74tCjUxE8/AyYnn2rPMqRTg8jL4m9Fi5sOQZdSS7rYKqvKuGbNAR8euhPOUMPvXueTxwRb4aLsYRIFbD5c3p1ojYZYyfu9/Ze2HbgJkOv9xL86Lvn5xun4Qf5WSbluq7h2oBRyTm8s+JH4GKu1AjQV7rcwd8BiG8iaYUfnHsYK6tVfFVn99BjFcdSU5jsYQq1LPzXcZRL0N1IN6GAWdnubQAPBOns4zs2f8ZOoubajQb+wyBjctt/IhXm5qnpq8U2jNoFugKssxKUuS7V0NL1ZA==', ''),
(18, 'Me robaron los zapatos', '-38.7358723,-72.5828218', '2017-09-21', 'Delito', 'Asalto', 'iLKAkTNAcOtgd+xI0chXWgqJibhpGqiEUI4srbzVj2goDt/M5xRma42IQLPVXI+8usTljeDlSnpUYRmmJsuBbdrC/rgKqQv2b3yIvHlGWbj16FFOGCu68QVyHU8G8n6sXNHDvFVwM+UiRsXOCoXzG9boCt5wawl4id8PiDW+kkrZ7vSxiNV3mZSKg1u55QHOfsX/rc3i+t6RrxnsE4c/hDab80X0oK6zfLoyHW5OdAzqzlD2XLYnw/uhSTP4Qfc2wflefZ+g7iHxx/OG6WFeBPxZA/iW7oHQTt88wpcjpQ9B+kARUWs2RUVtnHe/u1LX+6InMq6OBIaz4h4fA+fPPw==', ''),
(19, 'Cuatico', '-38.743775,-72.5847966', '2017-09-21', 'Accidente', 'Colision vehicular', 'RULXjTlMmTGsidyv9ytuvBAWLeGa2YwkgYFROiGZ58hDR6D+bThcj9eKtRJQExv12Xs7pafopwOKtHXzBcpRfyAS0Ac3R2F/zvnEX/KMQ1OeJEGJj/DQBwu5ygzirtJGCcEF8bQ56dqgqLwLlqj18WvUS3JdQkI9QWsBzMZmRZRFmGlpe6bdFGnfDpJzdnD4AVYizRXlMvoerAexAyYHYXqfs9Ps+RthO9kG5ClAvhd7zKn4iSt08zCvxvH9z0mQs/CqNtKK6uTkXNy4EHpVlKy0Dvo7ZH7Tj/LDOstyXIICkgw/DoJgLVk3z3FeCSU11s/HKo2eEMaMmchiARkxEw==', ''),
(20, 'Se estÃ¡ quemando mi casa', ',', '2017-09-21', 'Accidente', 'Incendio', 'UlDqZ08umny7k5kPSVgEODw//VD93ZjLX3oVLfBsWzXbX5gNvTt9J8YOb3aFJ2xdPCFkmmuYgM5gcOIT8wo0/PBZRQEEplAaeXIrlgVSpuk+WxS1bwgi13GINABoY7vxppZwfbTntJUpkAMTD1Hin2cwBKC0coY9iCulTzL5gX3wCN43tdLCXn9h43z6GWWx38XtDlnDXj7Ka55pLlPaSMVV05c3Qa6vTP6U6g7bVxPshSYhe+VVwPa8dCRBSK6vnVzOFQ7Iwcrf7Avqpc2qudmKHFoLbjc8mh3ItI4eyIEv7J088VUd+g/e2GGfWiHTKwiBgamFTE8WoI9+i+Aoqw==', ''),
(21, 'PRIMERA PRUEBA DE CALLE', '43.465187,-80.522372', '2017-09-21', 'Accidente', 'Colision vehicular', 'I4GodPPvP3TSKrSZCSjGV2meADwyYCsPHqTMLUPHZAxaYwWfk+fnoBj6/ZpYZbya9JGFcUmgchOGAXoyo+FXbaF5k5hnSzpBTmKDPcn3tzOvVBLpXjH/q/zawCKx13Guv5mJiiYvyEECdIaKRBTr8t1W92Q//nihBsO4hzElZZG7///SJWajINotgBtIUWzcDR76FKRnYQ+ABw8TAlSISEfXngZwp77k4S/OxgbQCLdE3ftVNAaOkRpXPvFVF3mkNJZt6sKbs+1XRJ5RSYZ+QxbFhwdJQGDBeVWnDQf22PA8a9Cg3xhSwDO0A3lhWJGEl7k6/bO8n4NuyyE03hBaeA==', '2 King St S, Waterloo, ON N2J 1N9, CanadÃ¡'),
(22, 'Hola', '-38.7109871,-73.15388860000002', '2017-09-21', 'Accidente', 'Choque multiple', 'iE7YDMY6chTH47ULm7+YkteIrjl5j45/DGwhDdYO72zU+TdVxPEvwRWFyE1WhvzFu4uufCfH+xd5fbrFqnZ4+wF7yoTOAl1S62U+vyjPMLToY3f0lL3xoaBhsfez3cl2eoRxwxku0lLm75N154gN3anlJu6QQmR3j963Pga92Y1A5FTodqI1OwufrWfFP/x9SjhSZJCmkPxe2gyH5JS5czPJgvt2KUeVMaQCuQhaExTPlle64EtvVjAoDtd74x9i5wIl+JYJDmFLFBCl3rlHw3X+C9UdA37cx41OCmTVmzxDU4eKa/M19yMoY/0mBF4yP6/lUOczKBEfmcNiioncdw==', 'Alcalde Holzaphel, Carahue, IX RegiÃ³n, Chile'),
(23, 'Chao', '-38.71214698403822,-73.16261323022462', '2017-09-21', 'Accidente', 'Colision vehicular', 'dSLaE53Nsx0cDQrLgm/yXgdaEeq7DpqO7ySvERcWzah0uYT/LaxvDEE7/RM9evUIWgwolEcdV54f6pjfHWsr/kktRCnvGd8H8Z0RpFJLuK83DlapM56/5mi1YSl8HhhzFfjn+6Bn9Wk3pY9scy+XVqBCTOgIYaglOHf9UqGQ2EZIN8JUa3wvkSmmZRc3h4AakZgs7/O9ItQhbkd0OqPYGmuN09cUp7/rKAK354qVPxZ01fL/Atd4ILN29VOgj6Z1vi5CV5bN0YOd0zv7RMmBQoIPxfjGEHrXRvjCsIUL8oVVIEk5qHJpBxQu4EYfAMjHSLtj2ePs3EzWu9MVt0gVfg==', 'Las Heras, Carahue, IX RegiÃ³n, Chile'),
(24, 'HOLASI', '-33.448889699999995,-70.6692655', '2017-09-21', 'Delito', 'Asalto', 'PntBEu68M3KsH5tGr9Wn7X2fRHlcQIbiKKRxKpkwQZMNSmKkl0rihgVCMnQ2RNf/HudXlE/9/i3Z3b8ztP9dg7ImqYpRLURF7CkMFzec6G+ZrpEjGl3K4VSkpuamR1rvEpQy7IHDQ6kI7fBk4MKuWo6Xz3ug9KAr7JqlrwBtlPqftt8cAYZBhqA132F+xpKUQH5rYDDINRhP3mQDxCOIcVnmlR34DygK0qgsKLA4Mp0+42MMGrWqE8l0XJ7VyHRCrgytknlTDDUyimGLkfNdARaY+nkbse/Ek5XYdWNBgeXXvLK5Pk7tHTvN1dRKlTwo10qphDMKgkHZUuvjZSHJKQ==', 'Virginia Opazo 15, Santiago, RegiÃ³n Metropolitana, Chile'),
(25, 'HOLASI', '-33.448889699999995,-70.6692655', '2017-09-21', 'Delito', 'Parricidio', 'iS4C2YwYgYEB5AqCfOhe+BR4r/M0cSTTSZ0ruVE1aTlkhPKniDq/jOjo44aK7piRLzsxMGzHHsMaO7ge9wciHkwWGckYosG4WA7lag4Ayow73PNXA5fZYKLsCvoHA/8mMFR7XwtIo2WzhygJ0rltBZxlOMD14xH9lixNVqsQNY+ocbKTCipqCQTe0Z8pdpdygYKFNvRHkfmOEBhDbmPtD6cuaffMnCG7wMuWT8YrnDpxkuHsHikx1pSvq6G/YGqbvJqzW5ZwFUhgYbPrizRQ02QEIgabMqGMaQwO0Gk5zqhh7GJMavlnUTJ75fR5cZs+863OgXJNDh3n6NF9c4DreA==', 'Virginia Opazo 15, Santiago, RegiÃ³n Metropolitana, Chile'),
(26, 'HOLASI3', '-33.49256398295753,-70.67784856884765', '2017-09-21', 'Delito', 'Parricidio', 'gbrSvYas0Dp4a1a1Y7kzYf11yRzm1k81c837khqb4HWG+SdsHwOZ0GpKmhtx7w5CpTpLPwLrxhTRVh6z7jD33FsLw17X0NRdjFPRMKz22O2SOyTvKExY+Uq32zvUjnRKsUvt9pZBFTBlX9tSZ4Uu4TV86C5TsqXRybwXKbK/0O6DRcMZeISz6fYbkHkASDuUIwVCl2HQduI3w5FM/rJh+v5fUG0LEnPgquIGdU4jSr6pLb7U2tpRGr/nMZQhN1lS/lu37rriN57Cgo6su5vDrx3oWWL9seOqkSY6EEX1REuyUs3stTbKBLH4D5WBJ4n5zXyx4MsCX+s770eMzmRFdw==', 'RaÃºl Fuica 5073, Pedro Aguirre Cerda, RegiÃ³n Metropolitana, Chile'),
(27, 'Prueba final ', '-38.712250131432974,-73.16078371645511', '2017-09-21', 'Accidente', 'Incendio', 'ANRxQVzpk96BoZw1Dcz3l7qJS2xmEJy0Fs+Dh6U0SoCorr6ZRrSVDdw/5/0f4ql1NoUMHlT8fd8N0dyA4ZLW+wy3OtS1Q7z6rGnDnJ3g5QBq0PN26LGipqwrkfo6V2dJWeg8QLe6TrFly/DCmou4Cvt6jLC73pIxqe0e8j0lbnlQ9F9l+KCOn6aS+6KHuQo7HbSl98+1rKF7YJiduQkkGKaZaZUt94WnJaUD+SE2z2sXn+30s3LM/vgxIMr/yzrGqE5XDst3q+nyjDuSAOOK+cdl1PgxTIYVG8ZTtNJkuZAlGxSwHVhXHUwccmk4MYvFJvG0W2mKtXFauGwPqgMfZA==', 'Anibal Pinto, Carahue, IX RegiÃ³n, Chile'),
(28, 'Me mataron', '-38.71318765293981,-73.16808292497558', '2017-09-21', 'Delito', 'Infanticidio', 'GCBfTxWgAQOwyL+5hC4bSrtz2EN6SWomRBcgOD982hDsKMYkYRrEICB++FXUJoqh1OtQ9ZkL2j4hwr8LP4D7SzVY65Sd4Q7qEWFPmWZci/Mx+e5ek45uhxRmZYwpIpUw8Rt/3xe4vIAQGL8lPOfSoTg4loRPWwKYR8q8us52UIjKcXLixWKZelIi5cp8Pf6z9XDojlMGvb7fKsgRJaVc1Mq6Tq3dyEHA1JcsAL/cwMldTIxg2acO2Je/url+sipcWyCXuWVO3iWfeZKRedjgXxJQ+z14n6cAhjSyCDMVxTKMnC34ewkVasttKGmlHNPEo85yfiVmROMZs8iZe1weHg==', 'S-40, Carahue, IX RegiÃ³n, Chile'),
(29, 'Aloaloalo sisi', '-38.7121424,-73.1572719', '2017-09-21', 'Accidente', 'Incendio', 'bnHGyY6QqiXxEsIH3G9cY1Vb+W0lhkeEutH6az1Bh4IpDXHuaGVN4Ou8+DwuMb35SiJUxSEXl4m4VcxbaUA6zdvy+ryli6f3Bcl8ln0dAS1naYm+JADq7CIUyW5p4r5KP0ttAGDaEpvEUWDhMUVlQhnOwaMjMhfkpTLZgfVlI4mqactGzVBjInKcc3ivPb546CVwoS4+3CYf4pDg92lB+GmnKo+IP+lvjtwK1Ce6HwNZonjJINsFuIooLeWXXVpU+Ax+uAsN5tOO0ziv49yGLXXtBUuAbFJShF8W5CSMj6r0SdG7fQnEkOcUCK5DTNxJxWsBBld6VpgkzugmgX11nw==', 'Almagro, Carahue, IX RegiÃ³n, Chile'),
(30, 'Aloaloalo sisi nonono', '-38.715122658832954,-73.16782907468263', '2017-09-21', 'Accidente', 'Incendio', 'i50lIXNYGu/VDWUNDIm+2lVuPKf0JSudzqajbSoKmjZfYou/6wIlcUaX8CxdDSI2mFgjo9Pd+y6q9cl34/C7NUjvOGh4wWqpG+kUzBA+a/Up/qfvfA/t71SJTZToSfYRolJDlQmdFrAC0pycK+wp8+u/8MeXJhRkLxGG2TeMSiY2eyxdCzY4gn2ZoHfTKPwiKOc3cKflY9+g6eH2OwRYPz3QvqFAlI4SWvgHoJA6LNfkeGf7jzhfDiZwVgJU8WtEDrAuTmjBJL7cuAEpE8x+ljLTmHgzyAvU8qyYkoidCc2IOMmgWeSVzyrqIJXUAJr5bMUsgU4Wqvd4XYZtEkACtg==', 'S-40, Carahue, IX RegiÃ³n, Chile');

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
