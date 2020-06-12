-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 02:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpavlovic`
--

-- --------------------------------------------------------

--
-- Table structure for table `donacija`
--

CREATE TABLE `donacija` (
  `ID_donacija` int(11) NOT NULL,
  `Ime` varchar(30) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `Jelo` varchar(30) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `Kolicina` int(2) NOT NULL,
  `Preuzimanje` varchar(15) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `Lokacija` varchar(30) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `Vrijeme_od` time NOT NULL,
  `Vrijeme_do` time NOT NULL,
  `Datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_mysql561_ci;

--
-- Dumping data for table `donacija`
--

INSERT INTO `donacija` (`ID_donacija`, `Ime`, `Jelo`, `Kolicina`, `Preuzimanje`, `Lokacija`, `Vrijeme_od`, `Vrijeme_do`, `Datum`) VALUES
(8, 'Marko', 'Lazanje', 3, 'Dostavljam', 'Rijeka 15', '17:00:00', '19:00:00', '2020-06-04'),
(9, 'Sandra', 'Meso s roštilja', 2, 'Ne dostavljam', 'Rijeka 102', '15:00:00', '18:00:00', '2020-06-04'),
(10, 'Marko', 'Lazanje', 2, 'Dostavljam', 'Rijeka 12', '12:00:00', '15:00:00', '2020-06-04'),
(11, 'Marko', 'Pašta', 2, 'Dostavljam', 'Rijeka 12', '12:00:00', '14:00:00', '2020-06-11'),
(12, 'Marko', 'Burger', 2, 'Ne dostavljam', 'Rijeka 12', '14:00:00', '16:00:00', '2020-06-11'),
(13, 'Sandra', 'Pizza', 3, 'Ne dostavljam', 'Rijeka 12', '14:00:00', '17:00:00', '2020-06-12'),
(14, 'Marko', 'Lazanje', 3, 'Dostavljam', 'Opatija 3', '15:00:00', '19:00:00', '2020-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `Ime` varchar(30) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `Lozinka` varchar(100) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_mysql561_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_user`, `Ime`, `Email`, `Lozinka`, `Status`) VALUES
(41, 'Marko', 'marko@gmail.com', '9efe9a5a1da5f41a4eb7599f2715dc24abf5bbc8', 'Donator'),
(42, 'Sandra', 'sandra@gmail.com', 'cad1524360e58851cd0ae1e82b75ff5283474667', 'Donator'),
(43, 'Marija', 'marija@gmail.com', '4a2ef43ca952d2a376688ce73d4e56722260f6f5', 'Potrebiti'),
(44, 'Sven', 'sven@gmail.com', 'dd860110a62b19214c4ee03aec0abffecb4e86b8', 'Potrebiti'),
(45, 'Sanja', 'sanja@sanja', '7f7d66453bd8736b8ed06a1646d2b0dcaf322bdd', 'Potrebiti');

-- --------------------------------------------------------

--
-- Table structure for table `zelim`
--

CREATE TABLE `zelim` (
  `ID_zelim` int(11) NOT NULL,
  `ID_korisnik` int(11) NOT NULL,
  `Lokacija` varchar(100) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `Kontakt` varchar(50) COLLATE utf8mb4_croatian_mysql561_ci NOT NULL,
  `ID_br_donacije` int(11) NOT NULL,
  `Kod` int(11) NOT NULL,
  `br` int(11) NOT NULL,
  `Datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_mysql561_ci;

--
-- Dumping data for table `zelim`
--

INSERT INTO `zelim` (`ID_zelim`, `ID_korisnik`, `Lokacija`, `Kontakt`, `ID_br_donacije`, `Kod`, `br`, `Datum`) VALUES
(40, 43, 'Rijeka 22', '38551243223', 8, 37530, 1, '2020-06-04'),
(41, 44, 'Rijeka 10', '38551243223', 10, 42660, 1, '2020-06-04'),
(42, 44, 'Rijeka', '051234334', 14, 73990, 1, '2020-06-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donacija`
--
ALTER TABLE `donacija`
  ADD PRIMARY KEY (`ID_donacija`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- Indexes for table `zelim`
--
ALTER TABLE `zelim`
  ADD PRIMARY KEY (`ID_zelim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donacija`
--
ALTER TABLE `donacija`
  MODIFY `ID_donacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `zelim`
--
ALTER TABLE `zelim`
  MODIFY `ID_zelim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
