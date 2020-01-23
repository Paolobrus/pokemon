-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 11:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `allenatore`
--

CREATE TABLE `allenatore` (
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allenatore`
--

INSERT INTO `allenatore` (`nome`, `cognome`, `username`, `password`, `mail`) VALUES
('Paolo', 'Bruschini', 'Paolobrus', 'password', 'paolobrus01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `gameCode` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `exp` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `trainer` varchar(20) NOT NULL,
  `firstSpell` int(11) NOT NULL,
  `secondSpell` int(11) DEFAULT NULL,
  `thirdSpell` int(11) DEFAULT NULL,
  `fourthSpell` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`id`, `gameCode`, `nome`, `exp`, `level`, `trainer`, `firstSpell`, `secondSpell`, `thirdSpell`, `fourthSpell`) VALUES
(1, 4, 'Charmander', 15, 5, 'Paolobrus', 1, NULL, NULL, NULL),
(2, 25, 'Pikachu', 0, 10, 'Paolobrus', 1, NULL, NULL, NULL),
(3, 133, 'Eevee', 12, 7, 'Paolobrus', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spell`
--

CREATE TABLE `spell` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `damage` int(11) NOT NULL,
  `healing` int(11) NOT NULL,
  `stunChance` int(11) NOT NULL,
  `gameCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spell`
--

INSERT INTO `spell` (`id`, `name`, `type`, `damage`, `healing`, `stunChance`, `gameCode`) VALUES
(1, 'Tackle', 1, 25, 0, 0, 33);

-- --------------------------------------------------------

--
-- Table structure for table `spellrelation`
--

CREATE TABLE `spellrelation` (
  `idPokemon` int(11) NOT NULL,
  `idSpell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spellrelation`
--

INSERT INTO `spellrelation` (`idPokemon`, `idSpell`) VALUES
(1, 1),
(2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allenatore`
--
ALTER TABLE `allenatore`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer` (`trainer`),
  ADD KEY `firstSpell` (`firstSpell`),
  ADD KEY `secondSpell` (`secondSpell`),
  ADD KEY `thirdSpell` (`thirdSpell`),
  ADD KEY `fourthSpell` (`fourthSpell`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `spell`
--
ALTER TABLE `spell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spellrelation`
--
ALTER TABLE `spellrelation`
  ADD KEY `idPokemon` (`idPokemon`),
  ADD KEY `idSpell` (`idSpell`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_1` FOREIGN KEY (`trainer`) REFERENCES `allenatore` (`username`),
  ADD CONSTRAINT `pokemon_ibfk_2` FOREIGN KEY (`secondSpell`) REFERENCES `spell` (`id`),
  ADD CONSTRAINT `pokemon_ibfk_3` FOREIGN KEY (`thirdSpell`) REFERENCES `spell` (`id`),
  ADD CONSTRAINT `pokemon_ibfk_4` FOREIGN KEY (`fourthSpell`) REFERENCES `spell` (`id`),
  ADD CONSTRAINT `pokemon_ibfk_6` FOREIGN KEY (`firstSpell`) REFERENCES `spell` (`id`);

--
-- Constraints for table `spellrelation`
--
ALTER TABLE `spellrelation`
  ADD CONSTRAINT `spellrelation_ibfk_1` FOREIGN KEY (`idSpell`) REFERENCES `spell` (`id`),
  ADD CONSTRAINT `spellrelation_ibfk_2` FOREIGN KEY (`idPokemon`) REFERENCES `pokemon` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
