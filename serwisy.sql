-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 17, 2024 at 11:24 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serwisy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `id_urzadzenia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `solucje`
--

CREATE TABLE `solucje` (
  `id` int(11) NOT NULL,
  `rodzaj` varchar(20) NOT NULL,
  `model` varchar(40) NOT NULL,
  `kod_bledu` varchar(10) NOT NULL,
  `opis` text NOT NULL,
  `solucja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solucje`
--

INSERT INTO `solucje` (`id`, `rodzaj`, `model`, `kod_bledu`, `opis`, `solucja`) VALUES
(1, 'inwerter', 'SML-III 5.6', 'f09', 'inwerter nie daje 230 na wyjście', ''),
(2, 'inwerter', 'POW-HVM 5.5', '09', 'nie ma 230 na wyjście', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `solucje`
--
ALTER TABLE `solucje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solucje`
--
ALTER TABLE `solucje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
