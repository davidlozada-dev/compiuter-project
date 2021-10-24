-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2021 at 11:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compiuter`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `cod_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`cod_cat`, `nom_cat`) VALUES
(1, 'PC'),
(2, 'Tablet'),
(3, 'Laptop'),
(4, 'Android'),
(5, 'IPhone');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `cod_cli` int(11) NOT NULL,
  `nom_cli` varchar(50) NOT NULL,
  `ape_cli` varchar(50) NOT NULL,
  `ced_cli` varchar(8) NOT NULL,
  `dir_cli` varchar(50) NOT NULL,
  `tel_cli` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`cod_cli`, `nom_cli`, `ape_cli`, `ced_cli`, `dir_cli`, `tel_cli`) VALUES
(1, 'yoli', 'perez', '12579687', 'concordia', '04120657363');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `cod_dia` int(11) NOT NULL,
  `fal_cli_dia` varchar(100) NOT NULL,
  `fal_ini_dia` varchar(100) NOT NULL,
  `sol_dia` varchar(100) DEFAULT NULL,
  `fky_equipos` int(11) NOT NULL,
  `fky_clientes` int(11) NOT NULL,
  `fky_empleados` int(11) NOT NULL,
  `fec_ent_dia` date NOT NULL,
  `fec_sal_dia` date NOT NULL,
  `est_dia` enum('A','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diagnosticos`
--

INSERT INTO `diagnosticos` (`cod_dia`, `fal_cli_dia`, `fal_ini_dia`, `sol_dia`, `fky_equipos`, `fky_clientes`, `fky_empleados`, `fec_ent_dia`, `fec_sal_dia`, `est_dia`) VALUES
(1, 'tarjeta ram', 'no sep', 'ssssssss', 1, 1, 1, '2021-10-24', '2021-10-24', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `cod_emp` int(11) NOT NULL,
  `nom_emp` varchar(50) NOT NULL,
  `ape_emp` varchar(50) NOT NULL,
  `ced_emp` varchar(8) NOT NULL,
  `cor_emp` varchar(355) NOT NULL,
  `cla_emp` varchar(355) DEFAULT NULL,
  `dir_emp` varchar(50) NOT NULL,
  `tel_emp` varchar(14) NOT NULL,
  `car_emp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`cod_emp`, `nom_emp`, `ape_emp`, `ced_emp`, `cor_emp`, `cla_emp`, `dir_emp`, `tel_emp`, `car_emp`) VALUES
(1, 'Naomi', 'Guerrero', '29649292', 'guerreronaomi83@gmail.com', '17e751ac320d788c8dae3315999e62ed1f6bf7df', 'La concordia', '04124202563', 'Administrador'),
(2, 'alexandra', 'guerrero', '26407700', 'alexandraguerrero33@gmail.com', '146ebcc349e7d21e7770915f64ae93acddc12abc', 'rotaria', '04125556666', 'Tecnico');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `cod_equ` int(11) NOT NULL,
  `ser_equ` varchar(20) NOT NULL,
  `des_equ` varchar(100) NOT NULL,
  `mar_equ` varchar(30) NOT NULL,
  `fky_categorias` int(11) NOT NULL,
  `fky_clientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`cod_equ`, `ser_equ`, `des_equ`, `mar_equ`, `fky_categorias`, `fky_clientes`) VALUES
(1, '15LOPOK', 'negro azul verde', 'lenovo', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `cod_fac` int(11) NOT NULL,
  `fec_fac` date NOT NULL,
  `mon_fac` float NOT NULL,
  `div_fac` varchar(20) NOT NULL,
  `des_fac` varchar(50) NOT NULL,
  `fky_diagnosticos` int(11) NOT NULL,
  `fky_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`cod_fac`, `fec_fac`, `mon_fac`, `div_fac`, `des_fac`, `fky_diagnosticos`, `fky_empleados`) VALUES
(1, '2021-10-24', 12, 'Dolares', 'sssss', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cod_cat`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cli`),
  ADD UNIQUE KEY `ced_cli` (`ced_cli`);

--
-- Indexes for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`cod_dia`),
  ADD KEY `fky_equipos` (`fky_equipos`),
  ADD KEY `fky_clientes` (`fky_clientes`),
  ADD KEY `fky_empleados` (`fky_empleados`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`cod_emp`),
  ADD UNIQUE KEY `ced_emp` (`ced_emp`),
  ADD UNIQUE KEY `cor_emp` (`cor_emp`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`cod_equ`),
  ADD KEY `fky_categorias` (`fky_categorias`),
  ADD KEY `fky_clientes` (`fky_clientes`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`cod_fac`),
  ADD KEY `fky_diagnosticos` (`fky_diagnosticos`),
  ADD KEY `fky_empleados` (`fky_empleados`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cod_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `cod_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `cod_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `cod_equ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `cod_fac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_ibfk_1` FOREIGN KEY (`fky_equipos`) REFERENCES `equipos` (`cod_equ`),
  ADD CONSTRAINT `diagnosticos_ibfk_2` FOREIGN KEY (`fky_clientes`) REFERENCES `clientes` (`cod_cli`),
  ADD CONSTRAINT `diagnosticos_ibfk_3` FOREIGN KEY (`fky_empleados`) REFERENCES `empleados` (`cod_emp`);

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`fky_categorias`) REFERENCES `categorias` (`cod_cat`),
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`fky_clientes`) REFERENCES `clientes` (`cod_cli`);

--
-- Constraints for table `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`fky_diagnosticos`) REFERENCES `diagnosticos` (`cod_dia`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`fky_empleados`) REFERENCES `empleados` (`cod_emp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
