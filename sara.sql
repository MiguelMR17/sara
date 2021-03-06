-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2016 a las 13:36:52
-- Versión del servidor: 5.6.15-log
-- Versión de PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `usuario`, `clave`) VALUES
(1, 'admin', '9dbf7c1488382487931d10235fc84a74bff5d2f4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `equipos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `estado`, `numero`, `capacidad`, `equipos`) VALUES
(1, 1, 101, 0, 4),
(2, 1, 102, 0, 3),
(3, 1, 103, 0, 0),
(4, 1, 104, 0, 0),
(5, 1, 105, 0, 0),
(6, 1, 106, 0, 0),
(7, 1, 107, 0, 2),
(8, 1, 108, 0, 0),
(9, 1, 109, 0, 0),
(10, 1, 110, 0, 0),
(11, 1, 111, 0, 0),
(12, 1, 112, 0, 0),
(13, 1, 113, 0, 0),
(14, 1, 114, 0, 0),
(15, 1, 115, 0, 0),
(16, 1, 116, 0, 0),
(17, 1, 117, 0, 0),
(18, 1, 118, 0, 0),
(19, 1, 201, 0, 0),
(20, 1, 202, 0, 0),
(21, 1, 203, 0, 0),
(22, 1, 204, 0, 0),
(23, 1, 205, 0, 0),
(24, 1, 206, 0, 0),
(25, 1, 207, 0, 0),
(26, 1, 208, 0, 0),
(27, 1, 209, 0, 0),
(28, 1, 210, 0, 0),
(29, 1, 211, 0, 0),
(30, 1, 212, 0, 0),
(31, 1, 213, 0, 1),
(32, 1, 214, 0, 0),
(33, 1, 215, 0, 0),
(34, 1, 216, 0, 0),
(35, 1, 217, 0, 0),
(36, 1, 218, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descrip` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `aula` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `estado`, `descrip`, `aula`, `codigo`) VALUES
(1, 'Funciona', 'Un PC', 101, 'PC-001'),
(2, 'Funciona', 'Un PC', 101, 'PC-002'),
(3, 'Funciona', 'Un PC', 101, 'PC-003'),
(4, 'Funciona', 'Un PC', 101, 'PC-004'),
(5, 'Funciona', 'Un PC', 102, 'PC-005'),
(6, 'Malo', 'Un PC', 102, 'PC-006'),
(7, 'Funciona', 'Un PC', 102, 'PC-007'),
(8, 'Funciona', 'Un PC', 207, 'PC-325'),
(9, 'Funciona', 'Un PC', 207, 'PC-326'),
(10, 'Poseido', 'Un PC', 213, 'PC-666');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `aula` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `tipo`, `hora`, `fecha`, `aula`, `usuario`) VALUES
(1, 1, '06:40:04', '2016-01-18', 102, 111111111),
(2, 6, '06:40:27', '2016-01-18', 102, 0),
(3, 0, '06:40:04', '2016-02-18', 102, 444444444),
(4, 0, '06:40:04', '2016-02-20', 102, 444444444),
(5, 0, '06:40:04', '2016-02-25', 102, 444444444),
(6, 1, '06:40:04', '2016-03-25', 102, 222222222),
(7, 1, '06:40:04', '2016-03-26', 102, 222222222),
(8, 1, '06:40:04', '2016-04-07', 102, 333333333),
(9, 1, '06:40:04', '2016-04-11', 202, 333333333),
(10, 1, '06:40:04', '2016-03-11', 202, 333333333),
(11, 1, '06:40:04', '2016-02-11', 202, 333333333),
(12, 0, '06:40:04', '2016-01-11', 202, 555555555),
(13, 2, '07:31:16', '2016-01-18', 202, 222222222),
(14, 2, '07:31:35', '2016-01-18', 111, 222222222),
(15, 0, '07:31:35', '2016-01-18', 111, 444444444),
(16, 4, '07:35:17', '2016-01-18', 111, 222222222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `docente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `curso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `aula` int(11) NOT NULL,
  `doc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `hora`, `fecha`, `docente`, `curso`, `aula`, `doc`) VALUES
(1, 6, '2016-01-18', 'Uno Profe Sor', 'mate', 102, 111111111),
(2, 8, '2016-01-18', 'Uno Profe Sor', 'mate', 112, 111111111),
(3, 8, '2016-01-18', 'Dos Profe Sora', 'lecto', 102, 222222222),
(4, 8, '2016-01-18', 'Tres Maes Tro', 'calculo', 213, 333333333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `doc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nombre`, `apellidos`, `doc`) VALUES
(1, 1, 'Uno', 'Profe Sor', 111111111),
(2, 1, 'Dos', 'Profe Sora', 222222222),
(3, 1, 'Tres', 'Maes Tro', 333333333),
(4, 2, 'Cuatro', 'Moni Tor', 444444444),
(5, 2, 'Cinco', 'Moni Tora', 555555555);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
