-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 01:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nca_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `enmagatzematge`
--

CREATE TABLE `enmagatzematge` (
  `seccio` varchar(50) DEFAULT NULL,
  `subseccio` varchar(50) DEFAULT NULL,
  `id_producte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `llogater`
--

CREATE TABLE `llogater` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `cognoms` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestec`
--

CREATE TABLE `prestec` (
  `id_llogater` int(11) NOT NULL,
  `id_producte` int(11) NOT NULL,
  `dataInici` date DEFAULT NULL,
  `dataFi` date DEFAULT NULL,
  `retornat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productes`
--

CREATE TABLE `productes` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `arxivat` tinyint(1) DEFAULT NULL,
  `data` date DEFAULT current_timestamp(),
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productes`
--

INSERT INTO `productes` (`id`, `marca`, `model`, `foto`, `arxivat`, `data`, `categoria`) VALUES
(1, 'sexo', 'sexo', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAADwCAYAAABxLb1rAAAAAXNSR0IArs4c6QAAIABJREFUeF7tfQdYnMe19rsLuwssvXcEEiqghnpDxS1RnLjKduJ23eI4PXHKvelO7rWTm+IkTnXixMm1nbjIcdxl2bJsqxeEGggQvfcFtvf/P4O+NQgQu+x+swvM9zx5Yi1T33PmnTPnTFEAcMPHr3TzNT7mmJ7JVapwuAA47', 0, '2023-12-07', 'ert'),
(2, 'sexo', 'sexo', '', 1, '2023-12-05', 'ert'),
(3, 'nemo', 'seq', '', 0, '2023-12-28', 'wwwqs'),
(4, 'ew', 'qw', NULL, 1, '2023-12-05', 'ert'),
(5, 'nemo', 'seq', NULL, 1, '2023-11-29', 'wwwqs'),
(6, 'ew', 'seqss', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAADwCAYAAABxLb1rAAAAAXNSR0IArs4c6QAAIABJREFUeF7tfQdYnMe19rsLuwssvXcEEiqghnpDxS1RnLjKduJ23eI4PXHKvelO7rWTm+IkTnXixMm1nbjIcdxl2bJsqxeEGggQvfcFtvf/P4O+NQgQu+x+swvM9zx5Yi1T33PmnTPnTFEAcMPHr3TzNT7mmJ7JVapwuAA47', 1, '2023-12-28', 'sddsaw'),
(7, 'asgdasghUJKGAA', 'sdahuidasuydgasudsa', '1702813099656_imagen.png', 1, '2023-12-25', 'jhygasgsuyadgsaudgsaugdsag'),
(8, 'asdjkbdksjahdbjksajbkhdsakbjdskjabdbsa', 'dsnahoifhaiusgasuayskfgasdfas', '1702813307_imagen.', 0, '2023-12-07', 'doihasdnuiadsgfdauysfgsfa'),
(9, 'sdDASFASAds', 'eqwdasasdas', '1702813494_imagen.', 0, '2023-12-24', 'dsfafdsffs'),
(10, 'zxnxhjsdahuiduhiashduisuhiad', 'asdasdsaiodhasidhasidashuhdaid', '1702813603_imagen.png', 1, '2024-01-05', 'sdadsadw'),
(11, 'assaS<Z', 'DSADSADAS', '1702815830_imagen.', 0, '2023-12-20', 'sdadsadsadsss'),
(12, 'xz<czxcvczx', 'xczxczvdfzds', '1702815973_imagen.', 1, '2023-12-15', 'cvxzvcxz'),
(13, 'dszczx', 'zxcxzczx', '1702818218_imagen.', 1, '2023-12-25', 'zxcxzcz'),
(14, 'dawdas', 'sadsadsa', '1702818278_imagen.', 1, '2023-12-06', 'sddsaw'),
(15, 'dsabyfusgufysda', 'dafhuidsafuasufshuia', '1702818388_imagen.', 1, '2023-12-14', 'sdadsadsadsssdsaf'),
(16, 'xcvxv', 'c', '1702818969_imagen.', 1, '2023-12-24', 'sdadsadsadsss'),
(17, 'as', 'sw', '1702826847_imagen.', 1, '2023-12-14', 'wwwqs'),
(18, 'z', 'z', '1702827064_imagen.', 1, '2023-12-12', 'sddsaw'),
(19, '1', '1', '1702827699_imagen.', 0, '2023-12-01', '1'),
(20, 'w', 'w', '931677371872989234.png', 1, '2023-12-21', 's'),
(21, 'Alex Aiguade Alisultanov', 'z', 'Excal prime.png', 1, '2023-12-15', 'sddsaw'),
(22, NULL, NULL, 'imagen.png', NULL, NULL, NULL),
(23, NULL, NULL, 'imagen.png', NULL, NULL, NULL),
(24, NULL, NULL, 'imagen.png', NULL, NULL, NULL),
(25, NULL, NULL, 'imagen.png', NULL, NULL, NULL),
(26, 'nemo', 'z', 'Nazi Flag.png', 1, '2023-12-26', 'sexo'),
(27, '7777777777777777777', '7777777777777777777', 'Ibai.png', 0, '2023-11-26', '77777777777777777777'),
(28, NULL, NULL, 'imagen.png', NULL, NULL, NULL),
(29, 'borrar', 'borrar', 'labebesitabebelin.jpg', 0, '2023-12-21', 'borrar');

-- --------------------------------------------------------

--
-- Table structure for table `usuari`
--

CREATE TABLE `usuari` (
  `nomUsuari` varchar(255) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `cognoms` varchar(255) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `contrasenya` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usuari`
--

INSERT INTO `usuari` (`nomUsuari`, `nom`, `cognoms`, `dni`, `contrasenya`) VALUES
('5j8tepsm', 'N', 'igger', '49535056w', '$2y$10$c6Yb/zVOsfSsPUeNQ43Uou6md7lr8RW0vJh1UazLNxIXbo/h/o5BS'),
('AlfredoGodofredo', 'Alfredo', 'Godofredo', '49535056w', '$2y$10$Nd2zbND8PauyXH5ffBd6sucnKb9N.7OEKvAsa5KHqCPiRR1g2Iqyu'),
('banana', 'Alex', 'Aigaude', '21', '$2y$10$2kGJOJ9uDgcD9HVZuOpKDuDSNkDXsZIvPS2ZfYud8KX0xtd31exeO'),
('fds', 'uioo', 'asdfasd', 'sd', '$2y$10$0DneuBXbMXE8am4bk2fWKOjmj/3ayMtLhlumF7xP/izZxg0UG9vBe'),
('gay', 'gay', 'gay', 'gay', '$2y$10$7pytqyF.L6NGcwJHMaITuu2o94licTvFA7h1uLdNhGwuLpI70JA7S'),
('hola', 'hola', 'hola', 'hola', '$2y$10$.O6c2jIXb/24NLcexc8Yu.fm3nsSCiIOMM2yLgcG9U.AQdFS0fRRW'),
('w', 'Vaso', 'de agua', '2', '$2y$10$BDAkqYWFEUOTC9hXJ3Slw.MGj4Jv7/F54I6qVu4Aeh1TpgyBEuHki'),
('wer', 'tret', 'fdssdf', 'fsdfsd', '$2y$10$dscBh5ez8oOwmHofrk9SPuqhLqTQ4Dbgayuj9.oIRelyXKfYbeA1a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enmagatzematge`
--
ALTER TABLE `enmagatzematge`
  ADD PRIMARY KEY (`id_producte`);

--
-- Indexes for table `llogater`
--
ALTER TABLE `llogater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestec`
--
ALTER TABLE `prestec`
  ADD PRIMARY KEY (`id_llogater`,`id_producte`),
  ADD KEY `id_producte` (`id_producte`);

--
-- Indexes for table `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`nomUsuari`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productes`
--
ALTER TABLE `productes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enmagatzematge`
--
ALTER TABLE `enmagatzematge`
  ADD CONSTRAINT `Enmagatzematge_ibfk_1` FOREIGN KEY (`id_producte`) REFERENCES `productes` (`id`);

--
-- Constraints for table `prestec`
--
ALTER TABLE `prestec`
  ADD CONSTRAINT `Prestec_ibfk_1` FOREIGN KEY (`id_llogater`) REFERENCES `llogater` (`id`),
  ADD CONSTRAINT `Prestec_ibfk_2` FOREIGN KEY (`id_producte`) REFERENCES `productes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
