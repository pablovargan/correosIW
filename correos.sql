-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-01-2014 a las 10:13:08
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `correos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Contacto`
--

CREATE TABLE IF NOT EXISTS `Contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NOT NULL,
  `email` varchar(25) NOT NULL,
  `propietario` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `propietario` (`propietario`),
  KEY `propietario_2` (`propietario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Correo`
--

CREATE TABLE IF NOT EXISTS `Correo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(30) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `emisor` varchar(25) NOT NULL,
  `destinatario` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emisor` (`emisor`),
  KEY `destinatario` (`destinatario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Contacto`
--
ALTER TABLE `Contacto`
  ADD CONSTRAINT `Contacto_ibfk_1` FOREIGN KEY (`propietario`) REFERENCES `Usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Correo`
--
ALTER TABLE `Correo`
  ADD CONSTRAINT `Correo_ibfk_1` FOREIGN KEY (`emisor`) REFERENCES `Usuario` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
