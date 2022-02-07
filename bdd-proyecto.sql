-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 12:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd-proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidente`
--

CREATE TABLE `accidente` (
  `nro_referenciaAcc` int(11) NOT NULL,
  `fecha_acc` varchar(18) NOT NULL,
  `lugar_acc` varchar(30) NOT NULL,
  `hora_acc` varchar(16) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agente`
--

CREATE TABLE `agente` (
  `id_agente` int(11) NOT NULL,
  `Direc_Agente` text NOT NULL,
  `Tipo_agente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banda_salarial`
--

CREATE TABLE `banda_salarial` (
  `id_banda` int(11) NOT NULL,
  `banda_min` double NOT NULL,
  `banda_max` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id_beneficiario` int(11) NOT NULL,
  `Tipo_beneficiario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categoria_accidente`
--

CREATE TABLE `categoria_accidente` (
  `id_categoria` int(11) NOT NULL,
  `DescripCateg` text NOT NULL,
  `DescripSubCategoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categoria_vehiculo`
--

CREATE TABLE `categoria_vehiculo` (
  `id_categoria` int(11) NOT NULL,
  `DescripCateg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nb_ciudad` varchar(50) NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `apellido_cliente` varchar(15) NOT NULL,
  `Direc_Cliente` text NOT NULL,
  `calle` varchar(40) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `genero` char(1) NOT NULL,
  `fecha_nac` varchar(16) NOT NULL,
  `profesion` varchar(40) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `Tipo_cliente` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contrata_inmueble`
--

CREATE TABLE `contrata_inmueble` (
  `id_inmueble` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_agente` int(11) NOT NULL,
  `fecha_contrato` varchar(8) NOT NULL,
  `estado_contrato` varchar(12) NOT NULL,
  `monto_comision_Ag` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contrata_vehiculo`
--

CREATE TABLE `contrata_vehiculo` (
  `id_cliente` int(11) NOT NULL,
  `id_agente` int(11) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `fecha_contrato` int(18) NOT NULL,
  `recargo` decimal(10,0) NOT NULL,
  `descuentos` decimal(10,0) NOT NULL,
  `estado_contrato` varchar(12) NOT NULL,
  `monto_comision_Ag` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contrata_vida`
--

CREATE TABLE `contrata_vida` (
  `id_vida` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `id_agente` int(11) NOT NULL,
  `fecha_contrato` varchar(18) NOT NULL,
  `estado_contrato` varchar(12) NOT NULL,
  `monto_comision_Ag` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `fecha_inicio_empresa` varchar(10) NOT NULL,
  `Tipo_empleado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(10) NOT NULL,
  `nb_estado` varchar(30) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financiadora`
--

CREATE TABLE `financiadora` (
  `id_financiadora` int(11) NOT NULL,
  `direc_financ` text NOT NULL,
  `TlfFinanciadora` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inmueble`
--

CREATE TABLE `inmueble` (
  `id_inmueble` int(11) NOT NULL,
  `DirecInmueble` text NOT NULL,
  `valor` double NOT NULL,
  `contenido` text NOT NULL,
  `riesgos_auxiliares` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `involucra`
--

CREATE TABLE `involucra` (
  `nro_referenciaAcc` int(11) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `multa`
--

CREATE TABLE `multa` (
  `nro_referenciaMulta` int(11) NOT NULL,
  `fecha_multa` varchar(16) NOT NULL,
  `lugar_multa` varchar(30) NOT NULL,
  `hora_multa` varchar(8) NOT NULL,
  `importe` decimal(10,0) NOT NULL,
  `matricula` varchar(6) NOT NULL,
  `PuntajeNivelGravedadAcc` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(10) NOT NULL,
  `nb_municipio` varchar(50) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `nroPago` int(11) NOT NULL,
  `id_prestamo` int(11) NOT NULL,
  `fecha_pago` varchar(18) NOT NULL,
  `importe_pago` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(10) NOT NULL,
  `nb_pais` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parroquia`
--

CREATE TABLE `parroquia` (
  `id_parroquia` int(10) NOT NULL,
  `nb_parroquia` varchar(50) NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `CI` int(10) NOT NULL,
  `NombPersona` varchar(30) NOT NULL,
  `NumTlfPersona` int(20) NOT NULL,
  `Tipo_persona` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poliza`
--

CREATE TABLE `poliza` (
  `nro_poliza` int(10) NOT NULL,
  `descrip_poliza` text NOT NULL,
  `prima` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posee`
--

CREATE TABLE `posee` (
  `idPersona` int(11) NOT NULL,
  `matricula` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `importe_prestamo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prestario`
--

CREATE TABLE `prestario` (
  `id_prestamo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_financiadora` int(11) NOT NULL,
  `tipo_interes` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registro_siniestro`
--

CREATE TABLE `registro_siniestro` (
  `nro_siniestro` int(11) NOT NULL,
  `nro_poliza` int(11) NOT NULL,
  `fecha_siniestro` varchar(18) NOT NULL,
  `fecha_respuesta` varchar(18) NOT NULL,
  `id_rechazo` varchar(2) NOT NULL,
  `monto_reconocido` double NOT NULL,
  `monto_solicitado` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `id_perfil` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siniestro`
--

CREATE TABLE `siniestro` (
  `nro_siniestro` int(11) NOT NULL,
  `descripcion_siniestro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(10) NOT NULL,
  `nb_sucursal` varchar(50) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `activos` double NOT NULL,
  `idDirector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_cobertura`
--

CREATE TABLE `tipo_cobertura` (
  `id_tipo_cobertura` int(11) NOT NULL,
  `DescripTipoCobertura` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `titular`
--

CREATE TABLE `titular` (
  `id_cliente` int(11) NOT NULL,
  `nro_poliza` int(11) NOT NULL,
  `saldo_prima` decimal(10,0) NOT NULL,
  `fecha_uso_reciente` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trabaja`
--

CREATE TABLE `trabaja` (
  `idEmpleado` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_banda` int(11) NOT NULL,
  `fecha_inicio_sucursal` int(18) NOT NULL,
  `acumulado_salario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(30) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contraseña` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `edad` int(2) NOT NULL,
  `sexo` char(1) NOT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` varchar(6) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `annio` int(2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_tipo_cobertura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vida`
--

CREATE TABLE `vida` (
  `id_vida_salud` int(11) NOT NULL,
  `prima` int(30) NOT NULL,
  `cobertura` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accidente`
--
ALTER TABLE `accidente`
  ADD PRIMARY KEY (`nro_referenciaAcc`),
  ADD UNIQUE KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `agente`
--
ALTER TABLE `agente`
  ADD UNIQUE KEY `id_agente` (`id_agente`);

--
-- Indexes for table `banda_salarial`
--
ALTER TABLE `banda_salarial`
  ADD PRIMARY KEY (`id_banda`);

--
-- Indexes for table `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD UNIQUE KEY `id_beneficiario` (`id_beneficiario`);

--
-- Indexes for table `categoria_accidente`
--
ALTER TABLE `categoria_accidente`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `categoria_vehiculo`
--
ALTER TABLE `categoria_vehiculo`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD UNIQUE KEY `id_municipio` (`id_municipio`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `id_sucursal` (`id_sucursal`);

--
-- Indexes for table `contrata_inmueble`
--
ALTER TABLE `contrata_inmueble`
  ADD PRIMARY KEY (`id_inmueble`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `id_agente` (`id_agente`);

--
-- Indexes for table `contrata_vehiculo`
--
ALTER TABLE `contrata_vehiculo`
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `id_agente` (`id_agente`);

--
-- Indexes for table `contrata_vida`
--
ALTER TABLE `contrata_vida`
  ADD PRIMARY KEY (`id_vida`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `idPersona` (`idPersona`),
  ADD UNIQUE KEY `id_agente` (`id_agente`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD UNIQUE KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `id_pais` (`id_pais`);

--
-- Indexes for table `financiadora`
--
ALTER TABLE `financiadora`
  ADD PRIMARY KEY (`id_financiadora`);

--
-- Indexes for table `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inmueble`);

--
-- Indexes for table `involucra`
--
ALTER TABLE `involucra`
  ADD UNIQUE KEY `nro_referenciaAcc` (`nro_referenciaAcc`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD UNIQUE KEY `idPersona` (`idPersona`);

--
-- Indexes for table `multa`
--
ALTER TABLE `multa`
  ADD PRIMARY KEY (`nro_referenciaMulta`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD UNIQUE KEY `id_estado` (`id_estado`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`nroPago`),
  ADD UNIQUE KEY `id_prestamo` (`id_prestamo`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indexes for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id_parroquia`),
  ADD UNIQUE KEY `id_municipio` (`id_municipio`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `Tipo_persona` (`Tipo_persona`);

--
-- Indexes for table `poliza`
--
ALTER TABLE `poliza`
  ADD PRIMARY KEY (`nro_poliza`);

--
-- Indexes for table `posee`
--
ALTER TABLE `posee`
  ADD UNIQUE KEY `idPersona` (`idPersona`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`);

--
-- Indexes for table `prestario`
--
ALTER TABLE `prestario`
  ADD UNIQUE KEY `id_prestamo` (`id_prestamo`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `id_financiadora` (`id_financiadora`);

--
-- Indexes for table `registro_siniestro`
--
ALTER TABLE `registro_siniestro`
  ADD UNIQUE KEY `nro_poliza` (`nro_poliza`),
  ADD UNIQUE KEY `nro_siniestro` (`nro_siniestro`);

--
-- Indexes for table `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD UNIQUE KEY `id_perfil` (`id_perfil`,`id_usuario`),
  ADD UNIQUE KEY `id_perfil_2` (`id_perfil`),
  ADD KEY `rol_usuario_ibfk_2` (`id_usuario`);

--
-- Indexes for table `siniestro`
--
ALTER TABLE `siniestro`
  ADD PRIMARY KEY (`nro_siniestro`);

--
-- Indexes for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD UNIQUE KEY `id_ciudad` (`id_ciudad`),
  ADD UNIQUE KEY `idDirector` (`idDirector`);

--
-- Indexes for table `tipo_cobertura`
--
ALTER TABLE `tipo_cobertura`
  ADD PRIMARY KEY (`id_tipo_cobertura`);

--
-- Indexes for table `titular`
--
ALTER TABLE `titular`
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `nro_poliza` (`nro_poliza`);

--
-- Indexes for table `trabaja`
--
ALTER TABLE `trabaja`
  ADD UNIQUE KEY `idEmpleado` (`idEmpleado`),
  ADD UNIQUE KEY `id_sucursal` (`id_sucursal`),
  ADD UNIQUE KEY `id_banda` (`id_banda`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_ciudad` (`id_ciudad`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `id_categoria` (`id_categoria`),
  ADD UNIQUE KEY `id_tipo_cobertura` (`id_tipo_cobertura`);

--
-- Indexes for table `vida`
--
ALTER TABLE `vida`
  ADD PRIMARY KEY (`id_vida_salud`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accidente`
--
ALTER TABLE `accidente`
  MODIFY `nro_referenciaAcc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banda_salarial`
--
ALTER TABLE `banda_salarial`
  MODIFY `id_banda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria_accidente`
--
ALTER TABLE `categoria_accidente`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria_vehiculo`
--
ALTER TABLE `categoria_vehiculo`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contrata_inmueble`
--
ALTER TABLE `contrata_inmueble`
  MODIFY `id_inmueble` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contrata_vida`
--
ALTER TABLE `contrata_vida`
  MODIFY `id_vida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financiadora`
--
ALTER TABLE `financiadora`
  MODIFY `id_financiadora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inmueble` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `nroPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_cobertura`
--
ALTER TABLE `tipo_cobertura`
  MODIFY `id_tipo_cobertura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vida`
--
ALTER TABLE `vida`
  MODIFY `id_vida_salud` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accidente`
--
ALTER TABLE `accidente`
  ADD CONSTRAINT `accidente_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_accidente` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agente`
--
ALTER TABLE `agente`
  ADD CONSTRAINT `agente_ibfk_1` FOREIGN KEY (`id_agente`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agente_ibfk_2` FOREIGN KEY (`Tipo_agente`) REFERENCES `persona` (`Tipo_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`id_beneficiario`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beneficiario_ibfk_2` FOREIGN KEY (`Tipo_beneficiario`) REFERENCES `persona` (`Tipo_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`Tipo_cliente`) REFERENCES `persona` (`Tipo_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contrata_inmueble`
--
ALTER TABLE `contrata_inmueble`
  ADD CONSTRAINT `contrata_inmueble_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrata_inmueble_ibfk_2` FOREIGN KEY (`id_agente`) REFERENCES `agente` (`id_agente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contrata_vehiculo`
--
ALTER TABLE `contrata_vehiculo`
  ADD CONSTRAINT `contrata_vehiculo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrata_vehiculo_ibfk_2` FOREIGN KEY (`id_agente`) REFERENCES `agente` (`id_agente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contrata_vida`
--
ALTER TABLE `contrata_vida`
  ADD CONSTRAINT `contrata_vida_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrata_vida_ibfk_2` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrata_vida_ibfk_3` FOREIGN KEY (`id_agente`) REFERENCES `agente` (`id_agente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`Tipo_empleado`) REFERENCES `persona` (`Tipo_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `involucra`
--
ALTER TABLE `involucra`
  ADD CONSTRAINT `involucra_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `involucra_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `involucra_ibfk_3` FOREIGN KEY (`nro_referenciaAcc`) REFERENCES `accidente` (`nro_referenciaAcc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `multa`
--
ALTER TABLE `multa`
  ADD CONSTRAINT `multa_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posee`
--
ALTER TABLE `posee`
  ADD CONSTRAINT `posee_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posee_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestario`
--
ALTER TABLE `prestario`
  ADD CONSTRAINT `prestario_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestario_ibfk_2` FOREIGN KEY (`id_financiadora`) REFERENCES `financiadora` (`id_financiadora`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestario_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registro_siniestro`
--
ALTER TABLE `registro_siniestro`
  ADD CONSTRAINT `registro_siniestro_ibfk_1` FOREIGN KEY (`nro_poliza`) REFERENCES `poliza` (`nro_poliza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_siniestro_ibfk_2` FOREIGN KEY (`nro_siniestro`) REFERENCES `siniestro` (`nro_siniestro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `rol_usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sucursal_ibfk_2` FOREIGN KEY (`idDirector`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `titular`
--
ALTER TABLE `titular`
  ADD CONSTRAINT `titular_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `titular_ibfk_2` FOREIGN KEY (`nro_poliza`) REFERENCES `poliza` (`nro_poliza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_vehiculo` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`id_tipo_cobertura`) REFERENCES `tipo_cobertura` (`id_tipo_cobertura`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
