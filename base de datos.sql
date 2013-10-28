-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-10-2013 a las 14:08:18
-- Versión del servidor: 5.1.33
-- Versión de PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `galicia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(16) NOT NULL,
  `Cuit` bigint(11) NOT NULL,
  `FechAcred` date NOT NULL,
  `TipoCuenta` varchar(1) NOT NULL,
  `Moneda` int(1) NOT NULL,
  `Folio` int(7) NOT NULL,
  `Digito1` int(1) NOT NULL,
  `Sucursal` int(3) NOT NULL,
  `Digito2` int(1) NOT NULL,
  `CBU` varchar(26) NOT NULL,
  `CodTransac` int(2) NOT NULL,
  `TipoTransc` int(1) NOT NULL,
  `Importe` int(10) NOT NULL,
  `Referencia` varchar(15) NOT NULL,
  `IdCliente` varchar(22) NOT NULL,
  `FecMov` date NOT NULL,
  `Filler` varchar(17) NOT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `detalle`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Empresa` int(6) NOT NULL,
  `Cuit` bigint(11) NOT NULL,
  `TipoCuenta` varchar(1) NOT NULL,
  `CBU` varchar(26) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `Nombre`, `Empresa`, `Cuit`, `TipoCuenta`, `CBU`) VALUES
(1, 'TMS Group S.A.', 3, 33677032699, 'A', '9223372036854775807');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ente`
--

CREATE TABLE IF NOT EXISTS `ente` (
  `id_ente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(16) NOT NULL,
  `Cuit` bigint(11) NOT NULL,
  `TipoCuenta` varchar(1) NOT NULL,
  `Digito1` int(1) NOT NULL,
  `Sucursal` int(3) NOT NULL,
  `Digito2` int(1) NOT NULL,
  `CBU` varchar(26) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_ente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `ente`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `footer`
--

CREATE TABLE IF NOT EXISTS `footer` (
  `id_footer` int(11) NOT NULL AUTO_INCREMENT,
  `TipoRegistro` text NOT NULL,
  `Empresas` int(6) NOT NULL,
  `CantRegistros` int(7) NOT NULL,
  `Filler` varchar(135) NOT NULL,
  PRIMARY KEY (`id_footer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `footer`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `id_header` int(11) NOT NULL AUTO_INCREMENT,
  `Header` varchar(3) NOT NULL,
  `Empresa` int(6) NOT NULL,
  `Cuit` bigint(11) NOT NULL,
  `TipoCuenta` varchar(1) NOT NULL,
  `Moneda` int(1) NOT NULL DEFAULT '0',
  `Folio` int(7) NOT NULL DEFAULT '0',
  `Digito1` int(1) NOT NULL DEFAULT '0',
  `Sucursal` int(3) NOT NULL DEFAULT '0',
  `Digito2` int(1) NOT NULL DEFAULT '0',
  `CBU` varchar(26) NOT NULL DEFAULT '0',
  `Importe` int(10) NOT NULL DEFAULT '0',
  `FecAcred` date NOT NULL,
  `Filler` varchar(72) NOT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `header`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE IF NOT EXISTS `movimiento` (
  `id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_ente` int(11) NOT NULL,
  `id_header` int(11) NOT NULL,
  `id_detalle` int(11) NOT NULL,
  `id_footer` int(11) NOT NULL,
  PRIMARY KEY (`id_movimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `movimiento`
--
