-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 10:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rol`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Secretaria'),
(3, 'Docente');

-- --------------------------------------------------------

--
-- Table structure for table `estudiantes_nuevo_ingreso`
--

CREATE TABLE `estudiantes_nuevo_ingreso` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `lugar_nacimiento` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `persona_que_suministra` varchar(255) NOT NULL,
  `parentesco` varchar(255) NOT NULL,
  `direccion_calle` varchar(255) NOT NULL,
  `direccion_linea2` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `grado` varchar(50) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `talla_camisa` varchar(10) NOT NULL,
  `talla_pantalon` varchar(10) NOT NULL,
  `talla_zapato` varchar(10) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `estatura` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estudiantes_nuevo_ingreso`
--

INSERT INTO `estudiantes_nuevo_ingreso` (`id`, `nombres`, `apellidos`, `lugar_nacimiento`, `fecha_nacimiento`, `nacionalidad`, `edad`, `persona_que_suministra`, `parentesco`, `direccion_calle`, `direccion_linea2`, `pais`, `ciudad`, `estado`, `codigo_postal`, `grado`, `periodo`, `fecha`, `talla_camisa`, `talla_pantalon`, `talla_zapato`, `peso`, `estatura`) VALUES
(17, 'gabobo', 'Colmenarez Calanche', 'El Palito', '2024-02-14', 'df', 1, 'sdf', 'sfs', 'sdf', 'sdf', 'sf', 'sfs', 'sdf', '12333', 'd', 'dfg', '2024-02-22', 'dg', 'dfg', 'dfg', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contraseña`, `id_cargo`) VALUES
(1, 'Gabriel Colmenarez', 'Gabriel', 'gabriel', 1),
(2, 'Jesus Torrealba', 'Jesus', 'jesus', 2),
(3, 'Sergio Mendoza', 'Sergio', 'sergio', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estudiantes_nuevo_ingreso`
--
ALTER TABLE `estudiantes_nuevo_ingreso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estudiantes_nuevo_ingreso`
--
ALTER TABLE `estudiantes_nuevo_ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
