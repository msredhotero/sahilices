-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2019 a las 14:55:44
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sahilices`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbclienteestados`
--

CREATE TABLE IF NOT EXISTS `dbclienteestados` (
`idclienteestado` int(11) NOT NULL,
  `refclientes` int(11) NOT NULL,
  `refestados` int(11) NOT NULL,
  `comentarios` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbclienteestados`
--

INSERT INTO `dbclienteestados` (`idclienteestado`, `refclientes`, `refestados`, `comentarios`) VALUES
(1, 5, 2, 'Cliente Nuevo'),
(2, 6, 2, 'Cliente Nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbclientes`
--

CREATE TABLE IF NOT EXISTS `dbclientes` (
`idcliente` int(11) NOT NULL,
  `razonsocial` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `cuit` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbclientes`
--

INSERT INTO `dbclientes` (`idcliente`, `razonsocial`, `cuit`, `direccion`, `email`, `telefono`) VALUES
(5, 'YPF', '20315524661', '', '', ''),
(6, 'ElectroMedic', '23465468832', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbconceptos`
--

CREATE TABLE IF NOT EXISTS `dbconceptos` (
`idconcepto` int(11) NOT NULL,
  `reftipoconceptos` int(11) DEFAULT NULL,
  `concepto` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `leyenda` varchar(5000) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbconceptos`
--

INSERT INTO `dbconceptos` (`idconcepto`, `reftipoconceptos`, `concepto`, `abreviatura`, `leyenda`, `activo`) VALUES
(2, 1, 'Calibracion extendedor.', 'CE', 'Rango: 150 um\r\nId.: EEV-001\r\nProcedimiento: PC-004-05-I\r\nServicio de calibracion bajo lineamiento ISO 9001 con trazabilidad INTI', b'1'),
(3, 1, 'Calibracion picnometros 25', 'CP25', 'Rango: 25ml\r\nId.: P0 / P1\r\nProcedimiento: PC-003-01-O\r\nIncertidumbre: 0,05% del volumen.\r\nServicio de calibracion bajo lineamiento ISO 17025 acreditado OAA (Organismo Argentino\r\nde Acreditacion)', b'1'),
(4, 1, 'Calibracion picnometros 50', 'CP50', 'Rango: 50ml\r\nId.: PIV 000 / PIV 001\r\nProcedimiento: PC-003-01-O\r\nIncertidumbre: 0,05% del volumen\r\nServicio de calibracion bajo lineamiento ISO 17025 acreditado OAA (Organismo Argentino\r\nde Acreditacion)', b'1'),
(5, 1, 'Calibracion viscosometro stormer', 'CVS', 'Rango: 42 a 143 uk.\r\nId.: VSV-001\r\nProcedimiento: PC-005-04-I\r\nServicio de calibracion bajo lineamiento ISO 9001 con trazabilidad INTI', b'1'),
(6, 1, 'Proceso de gestion administrativa bonificado', 'PGAB', '', b'1'),
(7, 2, 'Nota mantenimiento', 'NM', '1.-La presente cotizaciÃ³n no contempla tareas de mantenimiento, limpieza, pintura, repuestos o cualquier actividad que deba ser realizada para dejar el instrumento en condiciones metrologicas. Los equipos entregados para su calibraciÃ³n deberÃ¡n estar limpios, en buen estado de funcionamiento y con sus correspondientes pilas, baterÃ­as, fuente de alimentaciÃ³n, etc. en sus estuches/cajas y/o elemento que garantice seguridad para su traslado/transporte, en caso de que se detecten desvÃ­os se informarÃ¡ y se realizara una cotizaciÃ³n para dar soluciÃ³n del inconveniente previa aprobaciÃ³n del usuario, de no aceptar la cotizaciÃ³n o no querer continuar con los trabajos, se facturarÃ¡ el 50 % del total cotizado por el servicio de calibraciÃ³n.\r\n', b'1'),
(8, 2, 'Nota Calibracion', 'NC', '2.-Nuestros servicios contemplan de ser necesario/requerido por el usuario/cliente ajuste y calibraciÃ³n despuÃ©s de calibrar informando ambos resultados siempre y cuando se cuente con manuales (en espaÃ±ol/inglÃ©s) y se pueda acceder a dichos parÃ¡metros.', b'1'),
(9, 3, 'Forma de Pago', 'FP', '15 DIAS FECHA DE FACTURACION. EL PAGO DEBERÃ REALIZARSE CON CHEQUE PROPIO EN PESOS ($) A NOMBRE DE SAHILICES HNOS.S.R.L. , NO A LA ORDEN, O TRANSFERENCIA BANCARIA.', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbconceptosviaticos`
--

CREATE TABLE IF NOT EXISTS `dbconceptosviaticos` (
`idconceptoviatico` int(11) NOT NULL,
  `refconceptos` int(11) NOT NULL,
  `valor` decimal(18,2) NOT NULL,
  `formula` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbcontactos`
--

CREATE TABLE IF NOT EXISTS `dbcontactos` (
`idcontacto` int(11) NOT NULL,
  `refsectores` int(11) NOT NULL,
  `apellido` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nrodocumento` int(11) DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbcontactos`
--

INSERT INTO `dbcontactos` (`idcontacto`, `refsectores`, `apellido`, `nombre`, `nrodocumento`, `email`, `telefono`) VALUES
(1, 1, 'zaaaba', 'roberto', 32132112, 'asd@asd.com', '11211211');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbcotizaciondetalles`
--

CREATE TABLE IF NOT EXISTS `dbcotizaciondetalles` (
`idcotizaciondetalle` int(11) NOT NULL,
  `refcotizaciones` int(11) NOT NULL,
  `refconceptos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciounitario` decimal(18,2) NOT NULL,
  `porcentajebonificado` decimal(5,2) NOT NULL,
  `reftipomonedas` int(11) NOT NULL,
  `rango` int(11) NOT NULL,
  `aplicatotal` bit(1) NOT NULL,
  `cargavieja` bit(1) NOT NULL,
  `concepto` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL,
  `leyenda` varchar(5000) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbcotizaciones`
--

CREATE TABLE IF NOT EXISTS `dbcotizaciones` (
`idcotizacion` int(11) NOT NULL,
  `refclientes` int(11) NOT NULL,
  `refestados` int(11) NOT NULL,
  `refcontactos` int(11) NOT NULL,
  `refmotivosoportunidades` int(11) NOT NULL,
  `reftipostrabajos` int(11) NOT NULL,
  `refusuarios` int(11) NOT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechacrea` datetime NOT NULL,
  `fechamodi` datetime NOT NULL,
  `usuariomodi` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbcotizacionmovimientos`
--

CREATE TABLE IF NOT EXISTS `dbcotizacionmovimientos` (
`idcotizacionmovimiento` int(11) NOT NULL,
  `refcotizaciondetalles` int(11) DEFAULT NULL,
  `refconceptos` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `preciounitario` decimal(18,2) DEFAULT NULL,
  `porcentajebonificado` decimal(5,2) DEFAULT NULL,
  `reftipomonedas` int(11) DEFAULT NULL,
  `rango` int(11) DEFAULT NULL,
  `aplicatotal` bit(1) DEFAULT NULL,
  `fechacrea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuariocrea` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbempleados`
--

CREATE TABLE IF NOT EXISTS `dbempleados` (
`idempleado` int(11) NOT NULL,
  `apellido` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nrodocumento` int(11) NOT NULL,
  `cuit` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `domicilio` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonofijo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonomovil` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbempleados`
--

INSERT INTO `dbempleados` (`idempleado`, `apellido`, `nombre`, `nrodocumento`, `cuit`, `fechanacimiento`, `domicilio`, `telefonofijo`, `telefonomovil`, `sexo`, `email`, `activo`) VALUES
(2, 'SAFAR', 'Marcos Saupurein', 31552466, '20315524661', '1985-05-20', '', '', '', 'M', '', b'1'),
(4, 'safar', 'asdasd', 31552467, '', '1966-10-11', '', '', '', 'F', '', b'1'),
(5, 'ricart2', 'daniela', 12312423, '56466456456', '2011-02-02', '', '564564', '', 'F', '', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dblistasprecios`
--

CREATE TABLE IF NOT EXISTS `dblistasprecios` (
`idlistaprecio` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `refconceptos` int(11) NOT NULL,
  `precio1` decimal(18,2) NOT NULL,
  `precio2` decimal(18,2) NOT NULL,
  `precio3` decimal(18,2) NOT NULL,
  `precio4` decimal(18,2) NOT NULL,
  `iva` decimal(5,2) NOT NULL,
  `vigenciadesde` date NOT NULL,
  `vigenciahasta` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dblistasprecios`
--

INSERT INTO `dblistasprecios` (`idlistaprecio`, `nombre`, `refconceptos`, `precio1`, `precio2`, `precio3`, `precio4`, `iva`, `vigenciadesde`, `vigenciahasta`) VALUES
(3, 'Lista 1', 3, '1795.00', '1815.00', '1855.00', '1885.00', '21.00', '1990-01-01', '2050-01-01'),
(4, 'Lista 1', 3, '1795.00', '1815.00', '1835.00', '1885.00', '21.00', '1990-01-01', '2050-01-01'),
(5, 'Lista 1', 4, '1795.00', '1815.00', '1835.00', '1885.00', '21.00', '1990-01-01', '2050-01-01'),
(6, 'Lista 1', 5, '4192.00', '4212.00', '4232.00', '4282.00', '21.00', '1990-01-01', '2050-01-01'),
(7, 'Lista 1', 6, '1290.00', '1290.00', '1290.00', '1290.00', '21.00', '1990-01-01', '2050-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbnotificaciones`
--

CREATE TABLE IF NOT EXISTS `dbnotificaciones` (
`idnotificacion` int(11) NOT NULL,
  `mensaje` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `idpagina` int(11) NOT NULL,
  `autor` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `destinatario` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `id1` int(11) DEFAULT NULL,
  `id2` int(11) DEFAULT NULL,
  `id3` int(11) DEFAULT NULL,
  `icono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estilo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `url` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `leido` bit(1) DEFAULT b'0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbnotificaciones`
--

INSERT INTO `dbnotificaciones` (`idnotificacion`, `mensaje`, `idpagina`, `autor`, `destinatario`, `id1`, `id2`, `id3`, `icono`, `estilo`, `fecha`, `url`, `leido`) VALUES
(1, 'Demora de Oportunidad', 1, 'Sistema', 'msredhotero@msn.com', 1, 0, 0, 'alarm', 'orange', '2019-01-15 08:22:02', 'oportunidades/oportunidad.php?id=', b'0'),
(2, 'Demora de Oportunidad', 1, 'Sistema', 'msredhotero@msn.com', 1, 0, 0, 'alarm', 'red', '2019-01-30 18:05:58', 'oportunidades/oportunidad.php?id=', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dboportunidades`
--

CREATE TABLE IF NOT EXISTS `dboportunidades` (
`idoportunidad` int(11) NOT NULL,
  `empresa` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comentarios` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `reftipostrabajos` int(11) NOT NULL,
  `refmotivosoportunidades` int(11) NOT NULL,
  `observaciones` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `refusuarios` int(11) NOT NULL,
  `refestados` int(11) NOT NULL,
  `refestadocotizacion` int(11) DEFAULT NULL,
  `refcotizaciones` int(11) DEFAULT NULL,
  `refsemaforos` int(11) NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dboportunidades`
--

INSERT INTO `dboportunidades` (`idoportunidad`, `empresa`, `contacto`, `telefono`, `email`, `comentarios`, `reftipostrabajos`, `refmotivosoportunidades`, `observaciones`, `refusuarios`, `refestados`, `refestadocotizacion`, `refcotizaciones`, `refsemaforos`, `fechacreacion`) VALUES
(1, 'YPF', 'Juan Carlos Tato', '0221 6184415', 'aranzazu@aif.org.ar', '', 4, 4, '', 1, 1, 1, 0, 3, '2019-01-09 04:38:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbplantas`
--

CREATE TABLE IF NOT EXISTS `dbplantas` (
`idplanta` int(11) NOT NULL,
  `refclientes` int(11) NOT NULL,
  `planta` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbplantas`
--

INSERT INTO `dbplantas` (`idplanta`, `refclientes`, `planta`) VALUES
(1, 5, 'Planta 1'),
(2, 5, 'Planta 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbsectores`
--

CREATE TABLE IF NOT EXISTS `dbsectores` (
`idsector` int(11) NOT NULL,
  `refplantas` int(11) NOT NULL,
  `sector` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbsectores`
--

INSERT INTO `dbsectores` (`idsector`, `refplantas`, `sector`) VALUES
(1, 1, 'limpieza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbtipotrabajoconceptos`
--

CREATE TABLE IF NOT EXISTS `dbtipotrabajoconceptos` (
`idtipotrabajoconcepto` int(11) NOT NULL,
  `reftipostrabajos` int(11) NOT NULL,
  `refconceptos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbusuarios`
--

CREATE TABLE IF NOT EXISTS `dbusuarios` (
`idusuario` int(11) NOT NULL,
  `usuario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `refroles` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombrecompleto` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `refcontactos` int(11) DEFAULT NULL,
  `activo` bit(1) DEFAULT b'0',
  `refunidadesnegocios` int(11) DEFAULT NULL,
  `refsector` int(11) DEFAULT NULL,
  `imgurl` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dbusuarios`
--

INSERT INTO `dbusuarios` (`idusuario`, `usuario`, `password`, `refroles`, `email`, `nombrecompleto`, `refcontactos`, `activo`, `refunidadesnegocios`, `refsector`, `imgurl`) VALUES
(1, 'marcos', 'marcos', 1, 'msredhotero@msn.com', 'Marcos Safar', NULL, b'1', 0, NULL, NULL),
(2, 'guiddo', 'guido', 1, 'guiddone@gmail.com', 'GUIDO DE GIUST0', 0, b'1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predio_menu`
--

CREATE TABLE IF NOT EXISTS `predio_menu` (
`idmenu` int(11) NOT NULL,
  `url` varchar(65) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Orden` smallint(6) DEFAULT NULL,
  `hover` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `permiso` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `administracion` bit(1) DEFAULT NULL,
  `torneo` bit(1) DEFAULT NULL,
  `reportes` bit(1) DEFAULT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `predio_menu`
--

INSERT INTO `predio_menu` (`idmenu`, `url`, `icono`, `nombre`, `Orden`, `hover`, `permiso`, `administracion`, `torneo`, `reportes`, `grupo`) VALUES
(2, '../index.php', 'dashboard', 'Dashboard', 1, NULL, 'Gerente', b'0', b'1', b'0', 0),
(3, '../unidadesnegocios/', 'chevron_right', 'Unidad de Negocios', 2, NULL, 'Gerente', b'1', b'1', b'1', 3),
(4, '../empleados/', 'person_pin', 'Empleados', 6, NULL, 'Gerente', b'1', b'1', b'1', 0),
(5, '../tipostrabajos/', 'chevron_right', 'Tipos de Trabajos', 4, NULL, 'Gerente', b'1', b'1', b'1', 3),
(6, '../tipomoneda/', 'chevron_right', 'Tipo de Moneda', 5, NULL, 'Gerente', b'1', b'1', b'1', 3),
(7, '../tipoconceptos/', 'chevron_right', 'Tipo de Conceptos', 6, NULL, 'Gerente', b'1', b'1', b'1', 3),
(8, '../tipocliente/', 'chevron_right', 'Tipo de Cliente', 7, NULL, 'Gerente', b'1', b'1', b'1', 3),
(9, '../recursosnecesarios/', 'chevron_right', 'Recursos Necesarios', 8, NULL, 'Gerente', b'1', b'1', b'1', 3),
(10, '../motivosoportunidades/', 'chevron_right', 'Motivos de Oportunidades', 9, NULL, 'Gerente', b'1', b'1', b'1', 3),
(11, '../conceptos/', 'chevron_right', 'Conceptos', 10, NULL, 'Gerente', b'1', b'1', b'1', 3),
(12, '../plantas/', 'chevron_right', 'Plantas', 11, NULL, 'Gerente', b'1', b'1', b'1', 2),
(13, '../clientes/', 'person', 'Clientes', 7, NULL, 'Gerente', b'1', b'1', b'1', 0),
(14, '../listasprecios/', 'attach_money', 'Lista de Precios', 4, NULL, 'Gerente', b'1', b'1', b'1', 0),
(15, '../conceptos/', 'layers', 'Conceptos', 5, NULL, 'Gerente', b'1', b'1', b'1', 0),
(16, '../oportunidades/', 'ring_volume', 'Oportunidades', 3, NULL, 'Gerente', b'1', b'1', b'1', 0),
(17, '../usuarios/', 'computer', 'Usuarios', 8, NULL, 'Gerente', b'1', b'1', b'1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconfiguracion`
--

CREATE TABLE IF NOT EXISTS `tbconfiguracion` (
`idconfiguracion` int(11) NOT NULL,
  `razonsocial` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `empresa` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sistema` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbconfiguracion`
--

INSERT INTO `tbconfiguracion` (`idconfiguracion`, `razonsocial`, `empresa`, `sistema`, `direccion`, `telefono`, `email`) VALUES
(1, 'Sahilices', 'Sahilices', 'Sahilices Gestion', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestadocotizacion`
--

CREATE TABLE IF NOT EXISTS `tbestadocotizacion` (
`idestadocotizacion` int(11) NOT NULL,
  `estadocotizacion` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbestadocotizacion`
--

INSERT INTO `tbestadocotizacion` (`idestadocotizacion`, `estadocotizacion`) VALUES
(1, ' '),
(2, 'Adjudicada'),
(3, 'No Adjudicada'),
(4, 'Facturada'),
(5, 'Anulada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestados`
--

CREATE TABLE IF NOT EXISTS `tbestados` (
`idestado` int(11) NOT NULL,
  `estado` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `icono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `refformularios` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbestados`
--

INSERT INTO `tbestados` (`idestado`, `estado`, `color`, `icono`, `orden`, `valor`, `refformularios`) VALUES
(1, 'Cargado', 'blue', NULL, 1, 1, 1),
(2, 'Bueno', 'green', NULL, 1, 1, 2),
(3, 'Regular', 'orange', NULL, 2, 1, 2),
(4, 'Malo', 'red', NULL, 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbformularios`
--

CREATE TABLE IF NOT EXISTS `tbformularios` (
`idformulario` int(11) NOT NULL,
  `formulario` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbformularios`
--

INSERT INTO `tbformularios` (`idformulario`, `formulario`) VALUES
(1, 'Oportunidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmotivosoportunidades`
--

CREATE TABLE IF NOT EXISTS `tbmotivosoportunidades` (
`idmotivooportunidad` int(11) NOT NULL,
  `motivo` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbmotivosoportunidades`
--

INSERT INTO `tbmotivosoportunidades` (`idmotivooportunidad`, `motivo`, `activo`) VALUES
(1, 'Visita del vendedor', b'1'),
(2, 'Llamadas por TE del vendedor', b'1'),
(3, 'Google o Web', b'1'),
(4, 'Por referencia de otro cliente', b'1'),
(5, 'Antiguo cliente de la empresa', b'1'),
(6, 'Otro', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrecursosnecesarios`
--

CREATE TABLE IF NOT EXISTS `tbrecursosnecesarios` (
`idrecursonecesario` int(11) NOT NULL,
  `recursonecesario` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `letra` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbroles`
--

CREATE TABLE IF NOT EXISTS `tbroles` (
`idrol` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbroles`
--

INSERT INTO `tbroles` (`idrol`, `descripcion`, `activo`) VALUES
(1, 'Gerente', b'1'),
(2, 'Jefe', b'1'),
(3, 'Supervisior', b'1'),
(4, 'Coordinador', b'1'),
(5, 'Tecnico', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsemaforos`
--

CREATE TABLE IF NOT EXISTS `tbsemaforos` (
`idsemaforo` int(11) NOT NULL,
  `color` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `desde` int(11) NOT NULL,
  `hasta` int(11) NOT NULL,
  `medida` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbsemaforos`
--

INSERT INTO `tbsemaforos` (`idsemaforo`, `color`, `desde`, `hasta`, `medida`) VALUES
(1, '<button type="button" class="btn-chico bg-green btn-circle btn-circle-chico waves-effect waves-circle waves-float">', 0, 5, 'd'),
(2, '<button type="button" class="btn-chico bg-orange btn-circle btn-circle-chico waves-effect waves-circle waves-float">', 6, 10, 'd'),
(3, '<button type="button" class="btn-chico bg-red btn-circle btn-circle-chico waves-effect waves-circle waves-float">', 11, 100, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoclientes`
--

CREATE TABLE IF NOT EXISTS `tbtipoclientes` (
`idtipocliente` int(11) NOT NULL,
  `tipocliente` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoconceptos`
--

CREATE TABLE IF NOT EXISTS `tbtipoconceptos` (
`idtipoconcepto` int(11) NOT NULL,
  `tipoconcepto` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbtipoconceptos`
--

INSERT INTO `tbtipoconceptos` (`idtipoconcepto`, `tipoconcepto`) VALUES
(1, 'Items'),
(2, 'Notas'),
(3, 'Forma de Pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipomonedas`
--

CREATE TABLE IF NOT EXISTS `tbtipomonedas` (
`idtipomoneda` int(11) NOT NULL,
  `tipomoneda` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(3) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbtipomonedas`
--

INSERT INTO `tbtipomonedas` (`idtipomoneda`, `tipomoneda`, `abreviatura`) VALUES
(1, 'Pesos Arg.', 'ARG'),
(2, 'Dolares Americanos', 'USD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipostrabajos`
--

CREATE TABLE IF NOT EXISTS `tbtipostrabajos` (
`idtipotrabajo` int(11) NOT NULL,
  `tipotrabajo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbtipostrabajos`
--

INSERT INTO `tbtipostrabajos` (`idtipotrabajo`, `tipotrabajo`, `activo`) VALUES
(1, 'MANTENIMIENTO', b'1'),
(2, 'VERIFICACIONES INTI', b'1'),
(3, 'PRODUCTOS/FABRICA', b'1'),
(4, 'LABORATORIO DE CALIBRACION', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbunidadesnegocios`
--

CREATE TABLE IF NOT EXISTS `tbunidadesnegocios` (
`idunidadnegocio` int(11) NOT NULL,
  `unidadnegocio` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbunidadesnegocios`
--

INSERT INTO `tbunidadesnegocios` (`idunidadnegocio`, `unidadnegocio`, `activo`) VALUES
(1, 'Gerencia Comercial', b'1'),
(2, 'Laboratorio', b'1'),
(3, 'Contabilidad', b'1'),
(4, 'Inv. Desarrollo', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dbclienteestados`
--
ALTER TABLE `dbclienteestados`
 ADD PRIMARY KEY (`idclienteestado`);

--
-- Indices de la tabla `dbclientes`
--
ALTER TABLE `dbclientes`
 ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `dbconceptos`
--
ALTER TABLE `dbconceptos`
 ADD PRIMARY KEY (`idconcepto`), ADD KEY `fk_c_tc_idx` (`reftipoconceptos`);

--
-- Indices de la tabla `dbconceptosviaticos`
--
ALTER TABLE `dbconceptosviaticos`
 ADD PRIMARY KEY (`idconceptoviatico`), ADD KEY `fk_cv_c_idx` (`refconceptos`);

--
-- Indices de la tabla `dbcontactos`
--
ALTER TABLE `dbcontactos`
 ADD PRIMARY KEY (`idcontacto`), ADD KEY `fk_contacto_sector_idx` (`refsectores`);

--
-- Indices de la tabla `dbcotizaciondetalles`
--
ALTER TABLE `dbcotizaciondetalles`
 ADD PRIMARY KEY (`idcotizaciondetalle`);

--
-- Indices de la tabla `dbcotizaciones`
--
ALTER TABLE `dbcotizaciones`
 ADD PRIMARY KEY (`idcotizacion`);

--
-- Indices de la tabla `dbcotizacionmovimientos`
--
ALTER TABLE `dbcotizacionmovimientos`
 ADD PRIMARY KEY (`idcotizacionmovimiento`);

--
-- Indices de la tabla `dbempleados`
--
ALTER TABLE `dbempleados`
 ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `dblistasprecios`
--
ALTER TABLE `dblistasprecios`
 ADD PRIMARY KEY (`idlistaprecio`), ADD KEY `fk_lista_conceptos_idx` (`refconceptos`);

--
-- Indices de la tabla `dbnotificaciones`
--
ALTER TABLE `dbnotificaciones`
 ADD PRIMARY KEY (`idnotificacion`);

--
-- Indices de la tabla `dboportunidades`
--
ALTER TABLE `dboportunidades`
 ADD PRIMARY KEY (`idoportunidad`), ADD KEY `fk_o_est_idx` (`refestados`), ADD KEY `fk_o_sem_idx` (`refsemaforos`), ADD KEY `fk_o_tt_idx` (`reftipostrabajos`), ADD KEY `fk_o_mo_idx` (`refmotivosoportunidades`), ADD KEY `fk_o_ec_idx` (`refestadocotizacion`);

--
-- Indices de la tabla `dbplantas`
--
ALTER TABLE `dbplantas`
 ADD PRIMARY KEY (`idplanta`), ADD KEY `fk_planta_cliente_idx` (`refclientes`);

--
-- Indices de la tabla `dbsectores`
--
ALTER TABLE `dbsectores`
 ADD PRIMARY KEY (`idsector`), ADD KEY `fk_sectores_planta_idx` (`refplantas`);

--
-- Indices de la tabla `dbtipotrabajoconceptos`
--
ALTER TABLE `dbtipotrabajoconceptos`
 ADD PRIMARY KEY (`idtipotrabajoconcepto`), ADD KEY `fk_tc_t_idx` (`reftipostrabajos`), ADD KEY `fk_tc_c_idx` (`refconceptos`);

--
-- Indices de la tabla `dbusuarios`
--
ALTER TABLE `dbusuarios`
 ADD PRIMARY KEY (`idusuario`), ADD KEY `fk_dbusuarios_tbroles1_idx` (`refroles`);

--
-- Indices de la tabla `predio_menu`
--
ALTER TABLE `predio_menu`
 ADD PRIMARY KEY (`idmenu`);

--
-- Indices de la tabla `tbconfiguracion`
--
ALTER TABLE `tbconfiguracion`
 ADD PRIMARY KEY (`idconfiguracion`);

--
-- Indices de la tabla `tbestadocotizacion`
--
ALTER TABLE `tbestadocotizacion`
 ADD PRIMARY KEY (`idestadocotizacion`);

--
-- Indices de la tabla `tbestados`
--
ALTER TABLE `tbestados`
 ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `tbformularios`
--
ALTER TABLE `tbformularios`
 ADD PRIMARY KEY (`idformulario`);

--
-- Indices de la tabla `tbmotivosoportunidades`
--
ALTER TABLE `tbmotivosoportunidades`
 ADD PRIMARY KEY (`idmotivooportunidad`);

--
-- Indices de la tabla `tbrecursosnecesarios`
--
ALTER TABLE `tbrecursosnecesarios`
 ADD PRIMARY KEY (`idrecursonecesario`);

--
-- Indices de la tabla `tbroles`
--
ALTER TABLE `tbroles`
 ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tbsemaforos`
--
ALTER TABLE `tbsemaforos`
 ADD PRIMARY KEY (`idsemaforo`);

--
-- Indices de la tabla `tbtipoclientes`
--
ALTER TABLE `tbtipoclientes`
 ADD PRIMARY KEY (`idtipocliente`);

--
-- Indices de la tabla `tbtipoconceptos`
--
ALTER TABLE `tbtipoconceptos`
 ADD PRIMARY KEY (`idtipoconcepto`);

--
-- Indices de la tabla `tbtipomonedas`
--
ALTER TABLE `tbtipomonedas`
 ADD PRIMARY KEY (`idtipomoneda`);

--
-- Indices de la tabla `tbtipostrabajos`
--
ALTER TABLE `tbtipostrabajos`
 ADD PRIMARY KEY (`idtipotrabajo`);

--
-- Indices de la tabla `tbunidadesnegocios`
--
ALTER TABLE `tbunidadesnegocios`
 ADD PRIMARY KEY (`idunidadnegocio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dbclienteestados`
--
ALTER TABLE `dbclienteestados`
MODIFY `idclienteestado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dbclientes`
--
ALTER TABLE `dbclientes`
MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `dbconceptos`
--
ALTER TABLE `dbconceptos`
MODIFY `idconcepto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `dbconceptosviaticos`
--
ALTER TABLE `dbconceptosviaticos`
MODIFY `idconceptoviatico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dbcontactos`
--
ALTER TABLE `dbcontactos`
MODIFY `idcontacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `dbcotizaciondetalles`
--
ALTER TABLE `dbcotizaciondetalles`
MODIFY `idcotizaciondetalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dbcotizaciones`
--
ALTER TABLE `dbcotizaciones`
MODIFY `idcotizacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dbcotizacionmovimientos`
--
ALTER TABLE `dbcotizacionmovimientos`
MODIFY `idcotizacionmovimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dbempleados`
--
ALTER TABLE `dbempleados`
MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `dblistasprecios`
--
ALTER TABLE `dblistasprecios`
MODIFY `idlistaprecio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `dbnotificaciones`
--
ALTER TABLE `dbnotificaciones`
MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dboportunidades`
--
ALTER TABLE `dboportunidades`
MODIFY `idoportunidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `dbplantas`
--
ALTER TABLE `dbplantas`
MODIFY `idplanta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dbsectores`
--
ALTER TABLE `dbsectores`
MODIFY `idsector` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `dbtipotrabajoconceptos`
--
ALTER TABLE `dbtipotrabajoconceptos`
MODIFY `idtipotrabajoconcepto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dbusuarios`
--
ALTER TABLE `dbusuarios`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `predio_menu`
--
ALTER TABLE `predio_menu`
MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tbconfiguracion`
--
ALTER TABLE `tbconfiguracion`
MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbestadocotizacion`
--
ALTER TABLE `tbestadocotizacion`
MODIFY `idestadocotizacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbestados`
--
ALTER TABLE `tbestados`
MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbformularios`
--
ALTER TABLE `tbformularios`
MODIFY `idformulario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbmotivosoportunidades`
--
ALTER TABLE `tbmotivosoportunidades`
MODIFY `idmotivooportunidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbrecursosnecesarios`
--
ALTER TABLE `tbrecursosnecesarios`
MODIFY `idrecursonecesario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbroles`
--
ALTER TABLE `tbroles`
MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbsemaforos`
--
ALTER TABLE `tbsemaforos`
MODIFY `idsemaforo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbtipoclientes`
--
ALTER TABLE `tbtipoclientes`
MODIFY `idtipocliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbtipoconceptos`
--
ALTER TABLE `tbtipoconceptos`
MODIFY `idtipoconcepto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbtipomonedas`
--
ALTER TABLE `tbtipomonedas`
MODIFY `idtipomoneda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbtipostrabajos`
--
ALTER TABLE `tbtipostrabajos`
MODIFY `idtipotrabajo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbunidadesnegocios`
--
ALTER TABLE `tbunidadesnegocios`
MODIFY `idunidadnegocio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dbconceptos`
--
ALTER TABLE `dbconceptos`
ADD CONSTRAINT `fk_c_tc` FOREIGN KEY (`reftipoconceptos`) REFERENCES `tbtipoconceptos` (`idtipoconcepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbconceptosviaticos`
--
ALTER TABLE `dbconceptosviaticos`
ADD CONSTRAINT `fk_cv_c` FOREIGN KEY (`refconceptos`) REFERENCES `dbcontactos` (`idcontacto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbcontactos`
--
ALTER TABLE `dbcontactos`
ADD CONSTRAINT `fk_contacto_sector` FOREIGN KEY (`refsectores`) REFERENCES `dbsectores` (`idsector`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dblistasprecios`
--
ALTER TABLE `dblistasprecios`
ADD CONSTRAINT `fk_lista_conceptos` FOREIGN KEY (`refconceptos`) REFERENCES `dbconceptos` (`idconcepto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dboportunidades`
--
ALTER TABLE `dboportunidades`
ADD CONSTRAINT `fk_o_ec` FOREIGN KEY (`refestadocotizacion`) REFERENCES `tbestadocotizacion` (`idestadocotizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_o_est` FOREIGN KEY (`refestados`) REFERENCES `tbestados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_o_mo` FOREIGN KEY (`refmotivosoportunidades`) REFERENCES `tbmotivosoportunidades` (`idmotivooportunidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_o_sem` FOREIGN KEY (`refsemaforos`) REFERENCES `tbsemaforos` (`idsemaforo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_o_tt` FOREIGN KEY (`reftipostrabajos`) REFERENCES `tbtipostrabajos` (`idtipotrabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbplantas`
--
ALTER TABLE `dbplantas`
ADD CONSTRAINT `fk_planta_cliente` FOREIGN KEY (`refclientes`) REFERENCES `dbclientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbsectores`
--
ALTER TABLE `dbsectores`
ADD CONSTRAINT `fk_sectores_planta` FOREIGN KEY (`refplantas`) REFERENCES `dbplantas` (`idplanta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbtipotrabajoconceptos`
--
ALTER TABLE `dbtipotrabajoconceptos`
ADD CONSTRAINT `fk_tc_c` FOREIGN KEY (`refconceptos`) REFERENCES `dbconceptos` (`idconcepto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tc_t` FOREIGN KEY (`reftipostrabajos`) REFERENCES `tbtipostrabajos` (`idtipotrabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
