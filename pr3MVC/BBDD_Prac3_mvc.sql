-- phpMyAdmin SQL
-- version 3.4.5
--
-- Servidor: localhost
-- Tiempo de generación: 29-10-2018 a las 15:35:29
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8


--
-- Base de datos: `ejemplo_mvc`
--
CREATE DATABASE `ejemplo_mvc` ;
USE `ejemplo_mvc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

