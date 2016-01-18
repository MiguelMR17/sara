-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2016 a las 12:25:37
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
(1, 1, 101, 0, 0),
(2, 1, 102, 0, 0),
(3, 1, 103, 0, 0),
(4, 1, 104, 0, 0),
(5, 1, 105, 0, 0),
(6, 1, 106, 0, 0),
(7, 1, 107, 0, 0),
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
(31, 1, 213, 0, 0),
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
