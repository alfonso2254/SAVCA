-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 26-01-2020 a las 00:37:50
-- Versión del servidor: 5.0.45
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `cotizaciones`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias`
-- 

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL auto_increment,
  `iva` varchar(10) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `rank` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- 
-- Volcar la base de datos para la tabla `categorias`
-- 

INSERT INTO `categorias` VALUES (1, '12.00', 'Bolivares', 'Administrador');
INSERT INTO `categorias` VALUES (2, '16.00', 'Dolares', 'Usuario');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clientes`
-- 

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL auto_increment,
  `rif_cedula` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `telefonos` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `nro_nit` varchar(50) NOT NULL,
  `usuario_crea` varchar(30) NOT NULL,
  `fecha_crea` date NOT NULL,
  `usuario_mod` varchar(30) NOT NULL,
  `fecha_mod` date NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `cedula` (`rif_cedula`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `clientes`
-- 

INSERT INTO `clientes` VALUES (4, '17865411', 'CARLOS CABRERA', 'NUEVO CLIENTE COTIZACIÃ“N', '04265151759', 'CARACAS', 'CARLOS C', '123456', 'ccabre03', '2018-09-24', '', '0000-00-00');
INSERT INTO `clientes` VALUES (5, 'J-31053339-3', 'VACCINES & MEDICAL SUPPLIES C.A.', '', '0414-2408376', 'CARACAS', 'JACQUELINE NAVAS', '', 'ccabre03', '2018-09-26', '', '0000-00-00');
INSERT INTO `clientes` VALUES (6, '12', 'INVERSIONES WK INTERNACIONAL', '', '99999999', 'ccs', 'Douglas', '', 'ccabre03', '2018-09-26', '', '0000-00-00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ingresos_usuarios`
-- 

CREATE TABLE `ingresos_usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `ip` varchar(100) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `acceso` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(12) NOT NULL,
  `info` varchar(500) NOT NULL,
  `navegador` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `ingresos_usuarios`
-- 

INSERT INTO `ingresos_usuarios` VALUES (1, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2018-09-27', '06:50:42 pm', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');
INSERT INTO `ingresos_usuarios` VALUES (2, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2018-09-28', '09:05:48 pm', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');
INSERT INTO `ingresos_usuarios` VALUES (3, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2018-09-29', '08:10:06 pm', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');
INSERT INTO `ingresos_usuarios` VALUES (4, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2018-09-30', '12:28:11 pm', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');
INSERT INTO `ingresos_usuarios` VALUES (5, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2018-10-02', '11:38:25 am', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');
INSERT INTO `ingresos_usuarios` VALUES (6, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2019-04-04', '12:48:50 pm', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');
INSERT INTO `ingresos_usuarios` VALUES (7, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2019-04-04', '09:18:45 pm', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');
INSERT INTO `ingresos_usuarios` VALUES (8, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2019-10-26', '03:28:02 pm', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');
INSERT INTO `ingresos_usuarios` VALUES (9, '127.0.0.1', 'ccabre03', 'Carlos Cabrera', 'Ingreso', '2019-11-20', '12:11:35 am', 'Windows NT CARLOSPC 6.2 build 9200 WINNT', 'Google Chrome');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `modulos`
-- 

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL auto_increment,
  `id_modulo` varchar(50) NOT NULL,
  `desc_modulo` varchar(50) NOT NULL,
  `pagina` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_modulo` (`id_modulo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `modulos`
-- 

INSERT INTO `modulos` VALUES (3, 'DAR_PERMISOS', 'Dar Permisos a Modulo a los usuarios', 'asignar_permisos.php');
INSERT INTO `modulos` VALUES (6, 'VER_USUARIOS', 'Ver Listado de Usuarios del Sistema', 'ver_usuarios.php');
INSERT INTO `modulos` VALUES (2, 'AGREGAR_USUARIOS', 'Agregar Usuario al Sistema', 'registro_usuarios.php');
INSERT INTO `modulos` VALUES (4, 'VER_CLIENTES', 'Ver Listado de Clientes Registrados', 'ver_clientes.php');
INSERT INTO `modulos` VALUES (1, 'AGREGAR_CLIENTES', 'Agregar Clientes', 'registro_cliente.php');
INSERT INTO `modulos` VALUES (5, 'QUITAR_PERMISOS', 'Quitar Permisos a Modulo a los usuarios', 'quitar_permisos.php');
INSERT INTO `modulos` VALUES (7, 'AGREGAR_PRESUPUESTO', 'Registro de Presupuestos', 'registro_presupuesto.php');
INSERT INTO `modulos` VALUES (8, 'VER_PRESUPUESTOS', 'Listado de Presupuestos', 'ver_presupuestos.php');
INSERT INTO `modulos` VALUES (9, 'MODIFICAR_PRESUPUESTO', 'Actualizar información del Presupuesto', 'modificar_presupuesto.php');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `permisos_usuarios`
-- 

CREATE TABLE `permisos_usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `id_modulo` varchar(70) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `usuariocrea` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `PK` (`id_modulo`(50))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Volcar la base de datos para la tabla `permisos_usuarios`
-- 

INSERT INTO `permisos_usuarios` VALUES (6, 'QUITAR_PERMISOS', 'ccabre03', '2018-02-18', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (3, 'VER_USUARIOS', 'ccabre03', '2018-02-18', '');
INSERT INTO `permisos_usuarios` VALUES (5, 'VER_CLIENTES', 'ccabre03', '2018-02-18', '');
INSERT INTO `permisos_usuarios` VALUES (4, 'AGREGAR_USUARIOS', 'ccabre03', '2018-02-18', '');
INSERT INTO `permisos_usuarios` VALUES (2, 'AGREGAR_CLIENTES', 'ccabre03', '2018-02-18', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (1, 'DAR_PERMISOS', 'ccabre03', '2018-02-18', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (7, 'AGREGAR_PRESUPUESTO', 'ccabre03', '2018-09-24', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (8, 'VER_PRESUPUESTOS', 'ccabre03', '2018-09-25', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (9, 'MODIFICAR_PRESUPUESTO', 'ccabre03', '2018-09-27', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (10, 'AGREGAR_CLIENTES', 'bryan.quintana', '2018-09-30', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (11, 'AGREGAR_PRESUPUESTO', 'bryan.quintana', '2018-09-30', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (12, 'AGREGAR_USUARIOS', 'bryan.quintana', '2018-09-30', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (13, 'DAR_PERMISOS', 'bryan.quintana', '2018-09-30', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (14, 'MODIFICAR_PRESUPUESTO', 'bryan.quintana', '2018-09-30', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (15, 'QUITAR_PERMISOS', 'bryan.quintana', '2018-09-30', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (16, 'VER_CLIENTES', 'bryan.quintana', '2018-09-30', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (17, 'VER_PRESUPUESTOS', 'bryan.quintana', '2018-09-30', 'ccabre03');
INSERT INTO `permisos_usuarios` VALUES (18, 'VER_USUARIOS', 'bryan.quintana', '2018-09-30', 'ccabre03');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `presupuestos`
-- 

CREATE TABLE `presupuestos` (
  `id_presupuesto` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `desc_item` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `precio_total` varchar(20) NOT NULL,
  `iva` varchar(10) NOT NULL,
  `moneda` varchar(20) NOT NULL,
  `facturado` varchar(2) NOT NULL,
  `numero_factura` varchar(10) NOT NULL,
  `usuario_crea` varchar(20) NOT NULL,
  `fecha_crea` date NOT NULL,
  `hora_crea` varchar(15) NOT NULL,
  `usuario_mod` varchar(20) NOT NULL,
  `fecha_mod` date NOT NULL,
  `hora_mod` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_presupuesto`,`id_item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `presupuestos`
-- 

INSERT INTO `presupuestos` VALUES (2, 201809252, 4, 1, 'CAMARA DE SEGURIDAD', 10, '5000', '50000', '12.00', 'Bolivares', 'SI', '201904051', 'ccabre03', '2018-09-25', '11:04:45 am', 'ccabre03', '2019-04-05', '');
INSERT INTO `presupuestos` VALUES (3, 201809253, 4, 1, 'VIGILANCIA', 1, '150', '150', '', 'Dolares', '', '', 'ccabre03', '2018-09-25', '11:11:59 am', '', '0000-00-00', '');
INSERT INTO `presupuestos` VALUES (3, 201809253, 4, 2, 'CAMARAS', 5, '20', '100', '', 'Dolares', '', '', 'ccabre03', '2018-09-25', '11:11:59 am', '', '0000-00-00', '');
INSERT INTO `presupuestos` VALUES (4, 201809254, 4, 1, 'DVR SONY', 2, '1100', '2200', '12.00', 'Bolivares', '', '', 'ccabre03', '2018-09-25', '11:23:53 am', 'ccabre03', '2019-04-04', '12:25:42 pm');
INSERT INTO `presupuestos` VALUES (4, 201809254, 4, 2, 'CAAMARAS SONY', 3, '2100', '6300', '12.00', 'Bolivares', '', '', 'ccabre03', '2018-09-25', '11:23:53 am', 'ccabre03', '2019-04-04', '12:25:42 pm');
INSERT INTO `presupuestos` VALUES (5, 201809255, 4, 1, 'cam', 2, '50', '100', '', 'Dolares', '', '', 'ccabre03', '2018-09-25', '12:01:35 pm', 'ccabre03', '2019-04-04', '09:00:44 pm');
INSERT INTO `presupuestos` VALUES (6, 201809266, 6, 1, 'DVR 4 CANALES AVTECH', 1, '75000', '75000', '16', 'Bolivares', 'SI', '20180210', 'ccabre03', '2018-09-26', '12:31:18 am', 'ccabre03', '2019-04-04', '10:37:30 pm');
INSERT INTO `presupuestos` VALUES (6, 201809266, 6, 2, 'MEMORIA RAM 1 GB', 1, '17000', '17000', '16', 'Bolivares', 'SI', '20180210', 'ccabre03', '2018-09-26', '12:31:18 am', 'ccabre03', '2019-04-04', '10:37:30 pm');
INSERT INTO `presupuestos` VALUES (6, 201809266, 6, 3, 'VIDEO BALUMS PASIVO', 2, '3800', '7600', '16', 'Bolivares', 'SI', '20180210', 'ccabre03', '2018-09-26', '12:31:18 am', 'ccabre03', '2019-04-04', '10:37:30 pm');
INSERT INTO `presupuestos` VALUES (6, 201809266, 6, 4, 'CONECTORES MACHO HEMBRA 12 V', 2, '1200', '2400', '16', 'Bolivares', 'SI', '20180210', 'ccabre03', '2018-09-26', '12:31:18 am', 'ccabre03', '2019-04-04', '10:37:30 pm');
INSERT INTO `presupuestos` VALUES (6, 201809266, 6, 5, 'INSTALACIÓN Y RECONFIGURACION', 1, '40000', '40000', '16', 'Bolivares', 'SI', '20180210', 'ccabre03', '2018-09-26', '12:31:18 am', 'ccabre03', '2019-04-04', '10:37:30 pm');
INSERT INTO `presupuestos` VALUES (6, 201809266, 6, 6, 'SERVICIO DNS REMOTO MOVIL', 1, '15000', '15000', '16', 'Bolivares', 'SI', '20180210', 'ccabre03', '2018-09-26', '12:31:18 am', 'ccabre03', '2019-04-04', '10:37:30 pm');
INSERT INTO `presupuestos` VALUES (6, 201809266, 6, 7, 'RECONFIGURACION COMPUTADORA', 1, '15000', '15000', '16', 'Bolivares', 'SI', '20180210', 'ccabre03', '2018-09-26', '12:31:18 am', 'ccabre03', '2019-04-04', '10:37:30 pm');
INSERT INTO `presupuestos` VALUES (6, 201809266, 6, 8, 'DNS PRIMARIO PARA DENEGACIÓN NAVEGACIÓN  NAVEGACIÓN ', 1, '25000', '25000', '16', 'Bolivares', 'SI', '20180210', 'ccabre03', '2018-09-26', '12:31:18 am', 'ccabre03', '2019-04-04', '10:37:30 pm');
INSERT INTO `presupuestos` VALUES (7, 201904047, 4, 1, 'camara', 2, '500', '1000', '', 'Bolivares', 'SI', '555', 'ccabre03', '2019-04-04', '12:20:44 pm', 'ccabre03', '2019-04-04', '');
INSERT INTO `presupuestos` VALUES (7, 201904047, 4, 2, 'dvr', 1, '1000', '1000', '', 'Bolivares', 'SI', '555', 'ccabre03', '2019-04-04', '12:20:44 pm', 'ccabre03', '2019-04-04', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `estatus` varchar(10) NOT NULL,
  `usuario_crea` varchar(30) NOT NULL,
  `fecha_crea` date NOT NULL,
  `usuario_mod` varchar(30) NOT NULL,
  `fecha_mod` date NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'Jesus Marquez', 'jmarquez', 'jm123456', 'jesusmarquezxd14@gmail.com', 'Administrador', 'Activo', '', '0000-00-00', '', '');

