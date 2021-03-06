-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2019 a las 04:20:10
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sahilices`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbclientes`
--

CREATE TABLE `dbclientes` (
  `idcliente` int(11) NOT NULL,
  `razonsocial` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `cuit` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbclientes`
--

INSERT INTO `dbclientes` (`idcliente`, `razonsocial`, `cuit`, `direccion`, `email`, `telefono`) VALUES
(5, 'YPF', '20315524661', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbconceptos`
--

CREATE TABLE `dbconceptos` (
  `idconcepto` int(11) NOT NULL,
  `concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `leyenda` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbconceptos`
--

INSERT INTO `dbconceptos` (`idconcepto`, `concepto`, `abreviatura`, `leyenda`, `activo`) VALUES
(1, 'ReparaciÃ³n de Lunetas', '', '', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbconceptosviaticos`
--

CREATE TABLE `dbconceptosviaticos` (
  `idconceptoviatico` int(11) NOT NULL,
  `refconceptos` int(11) NOT NULL,
  `valor` decimal(18,2) NOT NULL,
  `formula` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbcontactos`
--

CREATE TABLE `dbcontactos` (
  `idcontacto` int(11) NOT NULL,
  `refsectores` int(11) NOT NULL,
  `apellido` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nrodocumento` int(11) DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbcontactos`
--

INSERT INTO `dbcontactos` (`idcontacto`, `refsectores`, `apellido`, `nombre`, `nrodocumento`, `email`, `telefono`) VALUES
(1, 1, 'zaaaba', 'roberto', 32132112, 'asd@asd.com', '11211211');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbcotizaciondetalles`
--

CREATE TABLE `dbcotizaciondetalles` (
  `idcotizaciondetalle` int(11) NOT NULL,
  `refcotizaciones` int(11) NOT NULL,
  `refconceptos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciounitario` decimal(18,2) NOT NULL,
  `porcentajebonificado` decimal(5,2) NOT NULL,
  `reftipomonedas` int(11) NOT NULL,
  `rango` int(11) NOT NULL,
  `aplicatotal` bit(1) NOT NULL,
  `cargavieja` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbcotizaciones`
--

CREATE TABLE `dbcotizaciones` (
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

CREATE TABLE `dbcotizacionmovimientos` (
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

CREATE TABLE `dbempleados` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `dblistasprecios` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dblistasprecios`
--

INSERT INTO `dblistasprecios` (`idlistaprecio`, `nombre`, `refconceptos`, `precio1`, `precio2`, `precio3`, `precio4`, `iva`, `vigenciadesde`, `vigenciahasta`) VALUES
(1, 'Repa', 1, '150.00', '160.00', '180.00', '200.50', '0.21', '2019-01-01', '2019-12-31'),
(2, 'asdasd', 1, '1561.20', '16689.30', '1896.00', '1600.00', '0.21', '2019-01-01', '2019-10-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbnotificaciones`
--

CREATE TABLE `dbnotificaciones` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `dboportunidades` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dboportunidades`
--

INSERT INTO `dboportunidades` (`idoportunidad`, `empresa`, `contacto`, `telefono`, `email`, `comentarios`, `reftipostrabajos`, `refmotivosoportunidades`, `observaciones`, `refusuarios`, `refestados`, `refestadocotizacion`, `refcotizaciones`, `refsemaforos`, `fechacreacion`) VALUES
(1, 'YPF', 'Juan Carlos Tato', '0221 6184415', 'aranzazu@aif.org.ar', '', 4, 4, '', 1, 1, 1, 0, 3, '2019-01-09 04:38:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbplantas`
--

CREATE TABLE `dbplantas` (
  `idplanta` int(11) NOT NULL,
  `refclientes` int(11) NOT NULL,
  `planta` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `dbsectores` (
  `idsector` int(11) NOT NULL,
  `refplantas` int(11) NOT NULL,
  `sector` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dbsectores`
--

INSERT INTO `dbsectores` (`idsector`, `refplantas`, `sector`) VALUES
(1, 1, 'limpieza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbusuarios`
--

CREATE TABLE `dbusuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nombrecompleto` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `refroles` int(11) NOT NULL,
  `refcontactos` int(11) DEFAULT NULL,
  `refunidadesnegocios` int(11) NOT NULL,
  `refsector` int(11) NOT NULL,
  `imgurl` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dbusuarios`
--

INSERT INTO `dbusuarios` (`idusuario`, `usuario`, `password`, `nombrecompleto`, `email`, `refroles`, `refcontactos`, `refunidadesnegocios`, `refsector`, `imgurl`, `activo`) VALUES
(1, 'marcos', 'marcos', 'Marcos Safar', 'msredhotero@msn.com', 1, NULL, 0, 1, '', b'1'),
(2, 'guiddo', 'guido', 'GUIDO DE GIUST0', 'guiddone@gmail.com', 1, 1, 3, 1, 'granito.jpg', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predio_menu`
--

CREATE TABLE `predio_menu` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `predio_menu`
--

INSERT INTO `predio_menu` (`idmenu`, `url`, `icono`, `nombre`, `Orden`, `hover`, `permiso`, `administracion`, `torneo`, `reportes`, `grupo`) VALUES
(2, '../index.php', 'dashboard', 'Dashboard', 1, NULL, 'Administrador', b'0', b'1', b'0', 0),
(3, '../unidadesnegocios/', 'chevron_right', 'Unidad de Negocios', 2, NULL, 'Administrador', b'1', b'1', b'1', 3),
(4, '../empleados/', 'person_pin', 'Empleados', 6, NULL, 'Administrador', b'1', b'1', b'1', 0),
(5, '../tipostrabajos/', 'chevron_right', 'Tipos de Trabajos', 4, NULL, 'Administrador', b'1', b'1', b'1', 3),
(6, '../tipomoneda/', 'chevron_right', 'Tipo de Moneda', 5, NULL, 'Administrador', b'1', b'1', b'1', 3),
(7, '../tipoconceptos/', 'chevron_right', 'Tipo de Conceptos', 6, NULL, 'Administrador', b'1', b'1', b'1', 3),
(8, '../tipocliente/', 'chevron_right', 'Tipo de Cliente', 7, NULL, 'Administrador', b'1', b'1', b'1', 3),
(9, '../recursosnecesarios/', 'chevron_right', 'Recursos Necesarios', 8, NULL, 'Administrador', b'1', b'1', b'1', 3),
(10, '../motivosoportunidades/', 'chevron_right', 'Motivos de Oportunidades', 9, NULL, 'Administrador', b'1', b'1', b'1', 3),
(11, '../conceptos/', 'chevron_right', 'Conceptos', 10, NULL, 'Administrador', b'1', b'1', b'1', 3),
(12, '../plantas/', 'chevron_right', 'Plantas', 11, NULL, 'Administrador', b'1', b'1', b'1', 2),
(13, '../clientes/', 'person', 'Clientes', 7, NULL, 'Administrador', b'1', b'1', b'1', 0),
(14, '../listasprecios/', 'attach_money', 'Lista de Precios', 4, NULL, 'Administrador', b'1', b'1', b'1', 0),
(15, '../conceptos/', 'layers', 'Conceptos', 5, NULL, 'Administrador', b'1', b'1', b'1', 0),
(16, '../oportunidades/', 'ring_volume', 'Oportunidades', 3, NULL, 'Administrador', b'1', b'1', b'1', 0),
(17, '../usuarios/', 'computer', 'Usuarios', 8, NULL, 'Administrador', b'1', b'1', b'1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconfiguracion`
--

CREATE TABLE `tbconfiguracion` (
  `idconfiguracion` int(11) NOT NULL,
  `razonsocial` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `empresa` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sistema` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbconfiguracion`
--

INSERT INTO `tbconfiguracion` (`idconfiguracion`, `razonsocial`, `empresa`, `sistema`, `direccion`, `telefono`, `email`) VALUES
(1, 'Sahilices', 'Sahilices', 'Sahilices Gestion', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestadocotizacion`
--

CREATE TABLE `tbestadocotizacion` (
  `idestadocotizacion` int(11) NOT NULL,
  `estadocotizacion` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `tbestados` (
  `idestado` int(11) NOT NULL,
  `estado` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `icono` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `refformularios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbestados`
--

INSERT INTO `tbestados` (`idestado`, `estado`, `color`, `icono`, `orden`, `valor`, `refformularios`) VALUES
(1, 'Cargado', 'blue', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbformularios`
--

CREATE TABLE `tbformularios` (
  `idformulario` int(11) NOT NULL,
  `formulario` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbformularios`
--

INSERT INTO `tbformularios` (`idformulario`, `formulario`) VALUES
(1, 'Oportunidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmotivosoportunidades`
--

CREATE TABLE `tbmotivosoportunidades` (
  `idmotivooportunidad` int(11) NOT NULL,
  `motivo` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `tbrecursosnecesarios` (
  `idrecursonecesario` int(11) NOT NULL,
  `recursonecesario` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `letra` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbroles`
--

CREATE TABLE `tbroles` (
  `idrol` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbroles`
--

INSERT INTO `tbroles` (`idrol`, `descripcion`, `activo`) VALUES
(1, 'Administrador', b'1'),
(2, 'Jefe', b'1'),
(3, 'Empleado', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsemaforos`
--

CREATE TABLE `tbsemaforos` (
  `idsemaforo` int(11) NOT NULL,
  `color` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `desde` int(11) NOT NULL,
  `hasta` int(11) NOT NULL,
  `medida` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbsemaforos`
--

INSERT INTO `tbsemaforos` (`idsemaforo`, `color`, `desde`, `hasta`, `medida`) VALUES
(1, '<button type=\"button\" class=\"btn-chico bg-green btn-circle btn-circle-chico waves-effect waves-circle waves-float\">', 0, 5, 'd'),
(2, '<button type=\"button\" class=\"btn-chico bg-orange btn-circle btn-circle-chico waves-effect waves-circle waves-float\">', 6, 10, 'd'),
(3, '<button type=\"button\" class=\"btn-chico bg-red btn-circle btn-circle-chico waves-effect waves-circle waves-float\">', 11, 100, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoclientes`
--

CREATE TABLE `tbtipoclientes` (
  `idtipocliente` int(11) NOT NULL,
  `tipocliente` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoconceptos`
--

CREATE TABLE `tbtipoconceptos` (
  `idtipoconcepto` int(11) NOT NULL,
  `tipoconcepto` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipomonedas`
--

CREATE TABLE `tbtipomonedas` (
  `idtipomoneda` int(11) NOT NULL,
  `tipomoneda` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `abreviatura` varchar(3) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipostrabajos`
--

CREATE TABLE `tbtipostrabajos` (
  `idtipotrabajo` int(11) NOT NULL,
  `tipotrabajo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `tbunidadesnegocios` (
  `idunidadnegocio` int(11) NOT NULL,
  `unidadnegocio` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbunidadesnegocios`
--

INSERT INTO `tbunidadesnegocios` (`idunidadnegocio`, `unidadnegocio`, `activo`) VALUES
(1, 'Laboratirio', b'1'),
(2, 'Gerencia', b'1'),
(3, 'Contabilidad', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dbclientes`
--
ALTER TABLE `dbclientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `dbconceptos`
--
ALTER TABLE `dbconceptos`
  ADD PRIMARY KEY (`idconcepto`);

--
-- Indices de la tabla `dbconceptosviaticos`
--
ALTER TABLE `dbconceptosviaticos`
  ADD PRIMARY KEY (`idconceptoviatico`),
  ADD KEY `fk_cv_c_idx` (`refconceptos`);

--
-- Indices de la tabla `dbcontactos`
--
ALTER TABLE `dbcontactos`
  ADD PRIMARY KEY (`idcontacto`),
  ADD KEY `fk_contacto_sector_idx` (`refsectores`);

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
  ADD PRIMARY KEY (`idlistaprecio`),
  ADD KEY `fk_lista_conceptos_idx` (`refconceptos`);

--
-- Indices de la tabla `dbnotificaciones`
--
ALTER TABLE `dbnotificaciones`
  ADD PRIMARY KEY (`idnotificacion`);

--
-- Indices de la tabla `dboportunidades`
--
ALTER TABLE `dboportunidades`
  ADD PRIMARY KEY (`idoportunidad`),
  ADD KEY `fk_o_est_idx` (`refestados`),
  ADD KEY `fk_o_sem_idx` (`refsemaforos`),
  ADD KEY `fk_o_tt_idx` (`reftipostrabajos`),
  ADD KEY `fk_o_mo_idx` (`refmotivosoportunidades`),
  ADD KEY `fk_o_ec_idx` (`refestadocotizacion`);

--
-- Indices de la tabla `dbplantas`
--
ALTER TABLE `dbplantas`
  ADD PRIMARY KEY (`idplanta`),
  ADD KEY `fk_planta_cliente_idx` (`refclientes`);

--
-- Indices de la tabla `dbsectores`
--
ALTER TABLE `dbsectores`
  ADD PRIMARY KEY (`idsector`),
  ADD KEY `fk_sectores_planta_idx` (`refplantas`);

--
-- Indices de la tabla `dbusuarios`
--
ALTER TABLE `dbusuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_dbusuarios_tbroles1_idx` (`refroles`),
  ADD KEY `fk_dbusuarios_tbunidadesnegocios-idx` (`refunidadesnegocios`) USING BTREE,
  ADD KEY `fk_dbusuarios_dbsectores_idx` (`refsector`) USING BTREE;

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
-- AUTO_INCREMENT de la tabla `dbclientes`
--
ALTER TABLE `dbclientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dbconceptos`
--
ALTER TABLE `dbconceptos`
  MODIFY `idconcepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dbconceptosviaticos`
--
ALTER TABLE `dbconceptosviaticos`
  MODIFY `idconceptoviatico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dbcontactos`
--
ALTER TABLE `dbcontactos`
  MODIFY `idcontacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dblistasprecios`
--
ALTER TABLE `dblistasprecios`
  MODIFY `idlistaprecio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dbnotificaciones`
--
ALTER TABLE `dbnotificaciones`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dboportunidades`
--
ALTER TABLE `dboportunidades`
  MODIFY `idoportunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dbplantas`
--
ALTER TABLE `dbplantas`
  MODIFY `idplanta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dbsectores`
--
ALTER TABLE `dbsectores`
  MODIFY `idsector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dbusuarios`
--
ALTER TABLE `dbusuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `predio_menu`
--
ALTER TABLE `predio_menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbconfiguracion`
--
ALTER TABLE `tbconfiguracion`
  MODIFY `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbestadocotizacion`
--
ALTER TABLE `tbestadocotizacion`
  MODIFY `idestadocotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbestados`
--
ALTER TABLE `tbestados`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbformularios`
--
ALTER TABLE `tbformularios`
  MODIFY `idformulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbmotivosoportunidades`
--
ALTER TABLE `tbmotivosoportunidades`
  MODIFY `idmotivooportunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbrecursosnecesarios`
--
ALTER TABLE `tbrecursosnecesarios`
  MODIFY `idrecursonecesario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbroles`
--
ALTER TABLE `tbroles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbsemaforos`
--
ALTER TABLE `tbsemaforos`
  MODIFY `idsemaforo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbtipoclientes`
--
ALTER TABLE `tbtipoclientes`
  MODIFY `idtipocliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbtipoconceptos`
--
ALTER TABLE `tbtipoconceptos`
  MODIFY `idtipoconcepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbtipomonedas`
--
ALTER TABLE `tbtipomonedas`
  MODIFY `idtipomoneda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbtipostrabajos`
--
ALTER TABLE `tbtipostrabajos`
  MODIFY `idtipotrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbunidadesnegocios`
--
ALTER TABLE `tbunidadesnegocios`
  MODIFY `idunidadnegocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
