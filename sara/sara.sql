-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2016 a las 16:41:49
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
  `N equipos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `estado`, `numero`, `capacidad`, `N equipos`) VALUES
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
  `estado` int(11) NOT NULL,
  `descrip` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `aula` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `tipo`, `hora`, `fecha`, `aula`, `usuario`) VALUES
(1, 2, '15:31:48', '2016-01-09', 114, 123456),
(2, 0, '17:55:02', '2016-01-09', 114, 1234),
(3, 3, '20:43:08', '2016-01-10', 114, 123456),
(4, 3, '09:45:05', '2016-01-10', 114, 123456),
(5, 1, '16:02:46', '2016-01-10', 109, 1234567),
(6, 1, '16:06:08', '2016-01-10', 109, 1234567),
(7, 1, '16:06:50', '2016-01-10', 113, 2345678),
(8, 1, '16:14:08', '2016-01-10', 113, 2345678),
(9, 3, '16:15:34', '2016-01-10', 113, 2345678),
(10, 4, '16:16:02', '2016-01-10', 113, 2345678),
(11, 4, '16:17:37', '2016-01-10', 113, 2345678),
(12, 3, '16:19:28', '2016-01-10', 109, 2345678),
(13, 3, '16:28:54', '2016-01-10', 109, 2345678),
(14, 1, '16:29:53', '2016-01-10', 117, 1017223828),
(15, 1, '16:41:15', '2016-01-10', 117, 1017223828),
(16, 1, '16:41:49', '2016-01-10', 117, 1017223828),
(17, 1, '16:43:23', '2016-01-10', 117, 1017223828),
(18, 3, '16:44:21', '2016-01-10', 117, 1017223828),
(19, 3, '16:46:46', '2016-01-10', 117, 1017223828),
(20, 3, '16:47:44', '2016-01-10', 117, 1017223828),
(21, 3, '16:48:32', '2016-01-10', 117, 1017223828),
(22, 3, '16:49:08', '2016-01-10', 117, 1017223828),
(23, 3, '16:53:41', '2016-01-10', 117, 1017223828),
(24, 4, '16:54:36', '2016-01-10', 117, 1017223828),
(25, 4, '16:56:38', '2016-01-10', 117, 1017223828),
(26, 4, '16:56:53', '2016-01-10', 117, 1017223828),
(27, 4, '16:57:06', '2016-01-10', 117, 1017223828),
(28, 4, '00:57:47', '2016-01-11', 117, 1017223828),
(29, 3, '00:58:25', '2016-01-11', 117, 1017223828),
(30, 3, '15:52:59', '2016-01-11', 114, 123456),
(31, 1, '15:53:45', '2016-01-11', 101, 1017223828),
(32, 4, '15:53:56', '2016-01-11', 101, 1017223828),
(33, 2, '17:20:49', '2016-01-11', 118, 1234567),
(34, 0, '17:25:41', '2016-01-11', 118, 123456),
(35, 2, '17:28:57', '2016-01-11', 118, 123456),
(36, 1, '00:00:00', '2016-02-18', 113, 1017223828),
(37, 1, '00:00:00', '2016-03-10', 113, 1017223828),
(38, 0, '00:00:00', '2016-02-18', 113, 1017223828);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacion`
--

CREATE TABLE IF NOT EXISTS `ocupacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aula` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `doc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ocupacion`
--

INSERT INTO `ocupacion` (`id`, `aula`, `fecha`, `hora`, `doc`) VALUES
(1, 114, '2016-01-09', '17:54:13', 1234),
(2, 114, '2016-01-09', '17:55:02', 1234),
(3, 109, '2016-01-10', '16:02:46', 1234567),
(4, 109, '2016-01-10', '16:06:08', 1234567),
(5, 113, '2016-01-10', '16:06:50', 2345678);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `hora`, `fecha`, `docente`, `curso`, `aula`, `doc`) VALUES
(1, 14, '2016-01-09', 'Miguel Montoya', 'deutsch', 109, 1017223828),
(2, 12, '2016-01-09', 'Miguel Montoya', 'algo', 111, 1017223828),
(3, 8, '2016-01-09', 'Miguel Montoya', 'algo', 118, 1017223828),
(4, 18, '2016-01-10', 'Miguel Montoya', 'asd', 114, 1017223828),
(5, 14, '2016-01-10', 'Miguel Montoya', 'esto', 109, 1017223828),
(6, 14, '2016-01-10', 'daniel man', 'adasd', 118, 1234567),
(7, 14, '2016-01-10', 'Otro ese', 'adasd', 207, 2345678),
(8, 16, '2016-01-10', 'Otro ese', 'adasd', 113, 2345678),
(9, 16, '2016-01-10', 'daniel man', 'adasd', 109, 1234567),
(10, 16, '2016-01-10', 'Miguel Montoya', 'adasd', 117, 1017223828),
(11, 14, '2016-01-11', 'Miguel Montoya', 'awsdgb', 101, 1017223828),
(12, 14, '2016-01-11', 'daniel man', 'ad', 108, 1234567),
(13, 14, '2016-01-11', 'Otro ese', '165', 105, 2345678),
(14, 12, '2016-01-11', 'Miguel Montoya', 'sdg', 111, 1017223828),
(17, 8, '2016-01-13', 'Miguel Montoya', 'as%3Czdfdf', 117, 1017223828),
(19, 10, '2016-01-16', 'Miguel Montoya', 'dfgd', 107, 1017223828),
(20, 10, '2016-01-16', 'daniel man', 'vcbg', 109, 1234567);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nombre`, `apellidos`, `doc`) VALUES
(1, 1, 'Miguel', 'Montoya', 1017223828),
(3, 2, 'man', 'ese', 1234),
(6, 1, 'daniel', 'man', 1234567),
(7, 1, 'Otro', 'ese', 2345678),
(8, 2, 'ultimo', 'kkk', 3456789);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
