-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-01-2014 a las 16:20:35
-- Versión del servidor: 5.5.28
-- Versión de PHP: 5.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fluDoc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesoServ`
--

CREATE TABLE IF NOT EXISTS `accesoServ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` int(11) DEFAULT NULL,
  `ingresoEl` datetime NOT NULL,
  `salidaEl` datetime DEFAULT NULL,
  `maquina` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9AB4874A71CAA3E7` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derivacion`
--

CREATE TABLE IF NOT EXISTS `derivacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `observacion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recepcionEl` datetime DEFAULT NULL,
  `docrec_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_82FAB41871CAA3E7` (`servicio_id`),
  KEY `IDX_82FAB4189F5A440B` (`estado_id`),
  KEY `IDX_82FAB418F3B83051` (`docrec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docRec`
--

CREATE TABLE IF NOT EXISTS `docRec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `creadoEl` datetime NOT NULL,
  `recepcionEl` datetime NOT NULL,
  `cite` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fechaDoc` datetime NOT NULL,
  `referencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institucionRem` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personaRem` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cargoRem` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folio` smallint(6) NOT NULL,
  `archivo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `modificadoEl` datetime DEFAULT NULL,
  `servicioActual_id` int(11) DEFAULT NULL,
  `estadoActual_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B35F0140DB38439E` (`usuario_id`),
  KEY `IDX_B35F01404496EC29` (`servicioActual_id`),
  KEY `IDX_B35F0140A1D83011` (`estadoActual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_acceso`
--

CREATE TABLE IF NOT EXISTS `gen_acceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `ingresoEl` datetime NOT NULL,
  `salidaEl` datetime DEFAULT NULL,
  `maquina` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1268771BDB38439E` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_estado`
--

CREATE TABLE IF NOT EXISTS `gen_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `gen_estado`
--

INSERT INTO `gen_estado` (`id`, `nombre`, `abreviatura`, `tipo`) VALUES
(1, 'Sin Recepcion', 'XRece', 'D'),
(2, 'Recepcionada', 'Recep', 'D'),
(3, 'Derivada', 'Deriv', 'D'),
(4, 'Pendiente', 'Pend', 'I'),
(5, 'Proceso', 'Proc', 'I'),
(6, 'Archivado', 'Archi', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_feriado`
--

CREATE TABLE IF NOT EXISTS `gen_feriado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `tipo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_infInst`
--

CREATE TABLE IF NOT EXISTS `gen_infInst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_noticia`
--

CREATE TABLE IF NOT EXISTS `gen_noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creadoEl` datetime NOT NULL,
  `desdeEl` date NOT NULL,
  `hastaEl` date NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_31205F96DB38439E` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `gen_noticia`
--

INSERT INTO `gen_noticia` (`id`, `creadoEl`, `desdeEl`, `hastaEl`, `descripcion`, `usuario_id`) VALUES
(1, '2013-08-20 08:48:55', '2013-09-02', '2013-09-02', 'Se empieza el desarrollo del sistema', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_perfil`
--

CREATE TABLE IF NOT EXISTS `gen_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `gen_perfil`
--

INSERT INTO `gen_perfil` (`id`, `nombre`) VALUES
(1, 'Root'),
(2, 'Jefe'),
(3, 'Normal'),
(4, 'Visita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_servicio`
--

CREATE TABLE IF NOT EXISTS `gen_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telf` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telfInterno` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CB86F22AAA08CB10` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_sucursal`
--

CREATE TABLE IF NOT EXISTS `gen_sucursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipMaqCli` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_usuario`
--

CREATE TABLE IF NOT EXISTS `gen_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `ingresoEl` date NOT NULL,
  `retiroEl` date DEFAULT NULL,
  `login` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creadoEl` datetime NOT NULL,
  `modifiEl` datetime DEFAULT NULL,
  `perfil_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2265B05DAA08CB10` (`login`),
  KEY `IDX_2265B05D57291544` (`perfil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `gen_usuario`
--

INSERT INTO `gen_usuario` (`id`, `nombre`, `ingresoEl`, `retiroEl`, `login`, `password`, `creadoEl`, `modifiEl`, `perfil_id`) VALUES
(1, 'Hans Galarza Cortez', '2013-09-02', NULL, 'hans', 'b65ca7c351e3a496bff9cfc44ff032e1', '2013-07-29 11:36:03', '2013-09-02 11:53:06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE IF NOT EXISTS `informe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `derivacion_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `creadoEl` datetime NOT NULL,
  `detalle` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7E75E1D9A9B547C4` (`derivacion_id`),
  KEY `IDX_7E75E1D99F5A440B` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesoServ`
--
ALTER TABLE `accesoServ`
  ADD CONSTRAINT `FK_9AB4874A71CAA3E7` FOREIGN KEY (`servicio_id`) REFERENCES `gen_servicio` (`id`);

--
-- Filtros para la tabla `derivacion`
--
ALTER TABLE `derivacion`
  ADD CONSTRAINT `FK_82FAB41871CAA3E7` FOREIGN KEY (`servicio_id`) REFERENCES `gen_servicio` (`id`),
  ADD CONSTRAINT `FK_82FAB4189F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `gen_estado` (`id`),
  ADD CONSTRAINT `FK_82FAB418F3B83051` FOREIGN KEY (`docrec_id`) REFERENCES `docRec` (`id`);

--
-- Filtros para la tabla `docRec`
--
ALTER TABLE `docRec`
  ADD CONSTRAINT `FK_B35F01404496EC29` FOREIGN KEY (`servicioActual_id`) REFERENCES `gen_servicio` (`id`),
  ADD CONSTRAINT `FK_B35F0140A1D83011` FOREIGN KEY (`estadoActual_id`) REFERENCES `gen_estado` (`id`),
  ADD CONSTRAINT `FK_B35F0140DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `gen_usuario` (`id`);

--
-- Filtros para la tabla `gen_acceso`
--
ALTER TABLE `gen_acceso`
  ADD CONSTRAINT `FK_1268771BDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `gen_usuario` (`id`);

--
-- Filtros para la tabla `gen_noticia`
--
ALTER TABLE `gen_noticia`
  ADD CONSTRAINT `FK_31205F96DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `gen_usuario` (`id`);

--
-- Filtros para la tabla `gen_usuario`
--
ALTER TABLE `gen_usuario`
  ADD CONSTRAINT `FK_2265B05D57291544` FOREIGN KEY (`perfil_id`) REFERENCES `gen_perfil` (`id`);

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `FK_7E75E1D99F5A440B` FOREIGN KEY (`estado_id`) REFERENCES `gen_estado` (`id`),
  ADD CONSTRAINT `FK_7E75E1D9A9B547C4` FOREIGN KEY (`derivacion_id`) REFERENCES `derivacion` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
