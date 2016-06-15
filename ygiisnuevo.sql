-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 03:33 PM
-- Server version: 5.6.27
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ygiisnuevo`
--

-- --------------------------------------------------------

--
-- Table structure for table `albumes`
--

CREATE TABLE `albumes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albumes`
--

INSERT INTO `albumes` (`id`, `id_usuario`, `nombre`, `fecha`) VALUES
(17, 91, '2016-06-12', '2016-06-11 18:04:40'),
(18, 91, '2016-06-12', '2016-06-11 18:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`id`, `id_album`, `id_usuario`, `ruta`, `fecha`) VALUES
(79, 17, 91, 'useruploads/912016-06-12-03-04-40Nike-Mercurial-Vapor-Radiant-blancas-multicolor-2016-3.jpg', '2016-06-11 18:04:40'),
(80, 17, 91, 'useruploads/912016-06-12-03-04-40nike-what-the-mercurial-6.jpg', '2016-06-11 18:04:40'),
(81, 18, 91, 'useruploads/912016-06-12-03-05-30unnamed.jpg', '2016-06-11 18:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `texto` text NOT NULL,
  `multimedia` varchar(255) NOT NULL,
  `fecha_subida` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `id_usuario`, `texto`, `multimedia`, `fecha_subida`) VALUES
(20, 91, 'Hizo una publicación', 'useruploads/912016-06-12-03-04-40Nike-Mercurial-Vapor-Radiant-blancas-multicolor-2016-3.jpg,useruploads/912016-06-12-03-04-40nike-what-the-mercurial-6.jpg,', '2016-06-11 18:04:40'),
(21, 91, 'Hizo una publicación', 'useruploads/912016-06-12-03-05-30unnamed.jpg,', '2016-06-11 18:05:30'),
(22, 91, 'Otra vez esto es una prueba', '', '2016-06-11 18:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `genero` char(1) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `about` text,
  `fecha_registro` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `correo`, `contrasena`, `genero`, `fecha_nacimiento`, `about`, `fecha_registro`, `token`, `status`) VALUES
(91, 'JOSÉ ANTONIO', 'BECERRA ROMERO', 'jose_fakir@hotmail.com', '5140106451340684a8beddcfae8ccb37', 'H', '1950-01-01', NULL, '2016-06-05 00:00:00', 'OXUya2ZtbXVwcD80Ym94ITRwbXM=', '1'),
(92, 'JOSÉ ANTONIO', 'BECERRA ROMERO', 'jbecerraromero@gmail.com', '5140106451340684a8beddcfae8ccb37', 'H', '1950-01-01', NULL, '2016-06-08 00:00:00', 'bXBhIXhxZGQ4ITAxZjk2eTRsIS0=', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albumes`
--
ALTER TABLE `albumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
