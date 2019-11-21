-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2019 a las 19:15:44
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--
CREATE DATABASE IF NOT EXISTS `inventario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bien`
--

CREATE TABLE `bien` (
  `idbien` int(11) NOT NULL,
  `codigointerno` varchar(80) DEFAULT NULL,
  `codigomined` varchar(80) DEFAULT NULL,
  `codigoitca` varchar(80) DEFAULT NULL,
  `idclasificacionbien` int(11) NOT NULL,
  `tipobien` varchar(30) NOT NULL,
  `descripcionbien` varchar(75) NOT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `serie` varchar(30) DEFAULT NULL,
  `idusuariocustodio` int(11) NOT NULL,
  `idubicacion` int(11) NOT NULL,
  `idestadobien` int(11) NOT NULL,
  `costobien` decimal(7,2) NOT NULL,
  `idfuentefinanciamiento` int(11) NOT NULL,
  `idtipocomprobante` int(11) NOT NULL,
  `numerocomprobante` int(11) NOT NULL,
  `fechaadquisicion` date NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `observaciones` text,
  `idusuarioregistro` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bien`
--

INSERT INTO `bien` (`idbien`, `codigointerno`, `codigomined`, `codigoitca`, `idclasificacionbien`, `tipobien`, `descripcionbien`, `marca`, `modelo`, `serie`, `idusuariocustodio`, `idubicacion`, `idestadobien`, `costobien`, `idfuentefinanciamiento`, `idtipocomprobante`, `numerocomprobante`, `fechaadquisicion`, `iddepartamento`, `observaciones`, `idusuarioregistro`, `fecharegistro`) VALUES
(18, 'ITCA-ZA-0288', '', '234206134', 1, 'mueble', 'mesa de madera blanca de dos niveles con cuatro rodos', '', '', '', 1, 9, 1, '0.00', 2, 1, 123456789, '2019-07-17', 7, 'Parece estar buena', 1, '0000-00-00 00:00:00'),
(19, '1254489', '123-543-56', '12345', 2, 'mueble', 'mueble color rojo', 'icasa', '', '2115454444', 1, 9, 1, '2.00', 2, 1, 1256, '2019-07-18', 1, 'en buen estado', 2, '2019-07-18 10:45:20'),
(20, '123456789', '123-1234-23', '1234', 1, 'escritorio', 'De madera', 'Power', 'HM124C', '12456', 1, 9, 1, '5.00', 4, 1, 12044, '2019-07-18', 3, 'La pintura está dañada', 1, '2019-07-18 15:18:42'),
(21, '12345678', '0822-123-15', '1234', 1, 'ventilador', 'negro', 'Gold Crown', 'M-007', '7800936', 2, 3, 1, '20.00', 4, 1, 56, '2019-07-18', 2, 'Buen estado', 2, '2019-07-18 15:26:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacionbien`
--

CREATE TABLE `clasificacionbien` (
  `idclasificacionbien` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clasificacionbien`
--

INSERT INTO `clasificacionbien` (`idclasificacionbien`, `nombre`) VALUES
(1, 'Activo Fijo'),
(2, 'Control Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigodepartamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `codigodepartamento`) VALUES
(1, 'Dirección Regional Zacatecoluca', '1516'),
(2, 'Administración Regional Zacatecoluca', '151601'),
(3, 'Bienestar Estudiantil Regional Zacatecoluca', '151602'),
(4, 'Investigación Regional Zacatecoluca', '151603'),
(5, 'Supervisión de la Calidad Regional Zacatecoluca', '151604'),
(6, 'Biblioteca Regional Zacatecoluca', '151605'),
(7, 'Técnico en Ingeniería de Sistemas Informáticos Regional Zacatecoluca', '151607'),
(8, 'Técnico en Hardware Computacional', '151608'),
(9, 'Técnico Superior Logística Global Regional Zacatecoluca', '151609'),
(10, 'Técnico Superior en Electrónica Regional Zacatecoluca', '151610'),
(11, 'Escuela de Ciencias Regional Zacatecoluca', '151613'),
(12, 'Proyección Social Regional Zacatecoluca', '151611'),
(13, 'Mantenimiento y Servicios Generales Regional Zacatecoluca', '151612');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemovimiento`
--

CREATE TABLE `detallemovimiento` (
  `iddetallemovimiento` int(11) NOT NULL,
  `idmovimiento` int(11) NOT NULL,
  `idbien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadobien`
--

CREATE TABLE `estadobien` (
  `idestadobien` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadobien`
--

INSERT INTO `estadobien` (`idestadobien`, `nombre`) VALUES
(1, 'Buen estado'),
(2, 'Deteriorado'),
(3, 'Inservible'),
(4, 'Descargo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentefinanciamiento`
--

CREATE TABLE `fuentefinanciamiento` (
  `idfuentefinanciamiento` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `codigofuentefinanciamiento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fuentefinanciamiento`
--

INSERT INTO `fuentefinanciamiento` (`idfuentefinanciamiento`, `nombre`, `codigofuentefinanciamiento`) VALUES
(1, 'Subsidio MINED', '12'),
(2, 'Carreras Técnicas', '38'),
(3, 'Educación Continua', '21'),
(4, 'Autogestión', '01'),
(5, 'Donación', '00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `idmovimiento` int(11) NOT NULL,
  `fechatraslado` date NOT NULL,
  `idbien` int(11) NOT NULL,
  `idusuariocustodio` int(11) NOT NULL,
  `idusuarionuevocustodio` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `idtipomovimiento` int(11) NOT NULL,
  `justificacion` varchar(100) NOT NULL,
  `centrocostosenvia` int(11) NOT NULL,
  `centrocostosrecibe` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocomprobante`
--

CREATE TABLE `tipocomprobante` (
  `idtipocomprobante` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocomprobante`
--

INSERT INTO `tipocomprobante` (`idtipocomprobante`, `nombre`) VALUES
(1, 'Factura'),
(2, 'Crédito fiscal'),
(3, 'Donación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimiento`
--

CREATE TABLE `tipomovimiento` (
  `idtipomovimiento` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipomovimiento`
--

INSERT INTO `tipomovimiento` (`idtipomovimiento`, `nombre`) VALUES
(1, 'Préstamo'),
(2, 'Traslado'),
(3, 'Salida'),
(4, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `nombre`) VALUES
(1, 'Encargado de inventario'),
(2, 'Custodio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `idubicacion` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`idubicacion`, `nombre`, `descripcion`) VALUES
(1, 'A1BE', 'Bienestar estudiantil'),
(2, 'A1OD', 'Oficina director'),
(3, 'A1DC', 'Departamento de calidad'),
(4, 'A1BA', 'Bodega administración'),
(5, 'A1OA', 'Oficinas administración'),
(6, 'A101', 'Mantenimiento y soporte técnico'),
(7, 'A102', 'Laboratorio mantenimiento'),
(8, 'A1SJ', 'Sala de juntas'),
(9, 'C101', 'Oficinas IAC'),
(10, 'C102', 'Centro de cómputo'),
(11, 'C201', 'Centro de cómputo'),
(12, 'C202', 'Centro de cómputo'),
(13, 'C301', 'Centro de cómputo electrónica'),
(14, 'C302', 'Centro de cómputo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `email`, `clave`, `idtipousuario`, `estado`) VALUES
(1, 'Oscar Armando', 'Sánchez Santos', 'oscar.sanchez@itca.edu.sv', '202cb962ac59075b964b07152d234b70', 1, 1),
(2, 'Carolina ', 'Burgos de Mundo', 'carolina.burgos@itca.edu.sv', '202cb962ac59075b964b07152d234b70', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`idbien`),
  ADD KEY `fk_bien_clasificacionbien` (`idclasificacionbien`),
  ADD KEY `fk_bien_estadobien` (`idestadobien`),
  ADD KEY `fk_bien_fuentefinanciamiento` (`idfuentefinanciamiento`),
  ADD KEY `fk_bien_tipocomprobante` (`idtipocomprobante`),
  ADD KEY `fk_bien_departamento` (`iddepartamento`),
  ADD KEY `fk_bien_usuario` (`idusuarioregistro`),
  ADD KEY `fk_bien_usuariocustodio` (`idusuariocustodio`),
  ADD KEY `fk_bien_idubicacion` (`idubicacion`);

--
-- Indices de la tabla `clasificacionbien`
--
ALTER TABLE `clasificacionbien`
  ADD PRIMARY KEY (`idclasificacionbien`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  ADD PRIMARY KEY (`iddetallemovimiento`),
  ADD KEY `fk_detallemovimiento_movimiento` (`idmovimiento`),
  ADD KEY `fk_detallemovimiento_bien` (`idbien`);

--
-- Indices de la tabla `estadobien`
--
ALTER TABLE `estadobien`
  ADD PRIMARY KEY (`idestadobien`);

--
-- Indices de la tabla `fuentefinanciamiento`
--
ALTER TABLE `fuentefinanciamiento`
  ADD PRIMARY KEY (`idfuentefinanciamiento`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idmovimiento`),
  ADD KEY `fk_movimiento_tipomovimiento` (`idtipomovimiento`),
  ADD KEY `fk_movimiento_usuario` (`idusuariocustodio`),
  ADD KEY `fk_movimiento_usuarionuevocustodio` (`idusuarionuevocustodio`),
  ADD KEY `fk_movimiento_ubicacion` (`destino`),
  ADD KEY `fk_movimiento_departamento_envia` (`centrocostosenvia`),
  ADD KEY `fk_movimiento_departamento_recibe` (`centrocostosrecibe`),
  ADD KEY `fk_movimiento_bien` (`idbien`);

--
-- Indices de la tabla `tipocomprobante`
--
ALTER TABLE `tipocomprobante`
  ADD PRIMARY KEY (`idtipocomprobante`);

--
-- Indices de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  ADD PRIMARY KEY (`idtipomovimiento`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`idubicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_tipousuario` (`idtipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bien`
--
ALTER TABLE `bien`
  MODIFY `idbien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `clasificacionbien`
--
ALTER TABLE `clasificacionbien`
  MODIFY `idclasificacionbien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  MODIFY `iddetallemovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadobien`
--
ALTER TABLE `estadobien`
  MODIFY `idestadobien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fuentefinanciamiento`
--
ALTER TABLE `fuentefinanciamiento`
  MODIFY `idfuentefinanciamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipocomprobante`
--
ALTER TABLE `tipocomprobante`
  MODIFY `idtipocomprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  MODIFY `idtipomovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `idubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bien`
--
ALTER TABLE `bien`
  ADD CONSTRAINT `fk_bien_clasificacionbien` FOREIGN KEY (`idclasificacionbien`) REFERENCES `clasificacionbien` (`idclasificacionbien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bien_departamento` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bien_estadobien` FOREIGN KEY (`idestadobien`) REFERENCES `estadobien` (`idestadobien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bien_fuentefinanciamiento` FOREIGN KEY (`idfuentefinanciamiento`) REFERENCES `fuentefinanciamiento` (`idfuentefinanciamiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bien_idubicacion` FOREIGN KEY (`idubicacion`) REFERENCES `ubicacion` (`idubicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bien_tipocomprobante` FOREIGN KEY (`idtipocomprobante`) REFERENCES `tipocomprobante` (`idtipocomprobante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bien_usuario` FOREIGN KEY (`idusuarioregistro`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bien_usuariocustodio` FOREIGN KEY (`idusuariocustodio`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallemovimiento`
--
ALTER TABLE `detallemovimiento`
  ADD CONSTRAINT `fk_detallemovimiento_bien` FOREIGN KEY (`idbien`) REFERENCES `bien` (`idbien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detallemovimiento_movimiento` FOREIGN KEY (`idmovimiento`) REFERENCES `movimiento` (`idmovimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `fk_movimiento_bien` FOREIGN KEY (`idbien`) REFERENCES `bien` (`idbien`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimiento_departamento_envia` FOREIGN KEY (`centrocostosenvia`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimiento_departamento_recibe` FOREIGN KEY (`centrocostosrecibe`) REFERENCES `departamento` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimiento_tipomovimiento` FOREIGN KEY (`idtipomovimiento`) REFERENCES `tipomovimiento` (`idtipomovimiento`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimiento_ubicacion` FOREIGN KEY (`destino`) REFERENCES `ubicacion` (`idubicacion`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimiento_usuario` FOREIGN KEY (`idusuariocustodio`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movimiento_usuarionuevocustodio` FOREIGN KEY (`idusuarionuevocustodio`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipousuario` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
