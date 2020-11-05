-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 nov 2020 om 09:26
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--
CREATE DATABASE IF NOT EXISTS `healthone` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `healthone`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artsen`
--

CREATE TABLE `artsen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `functie` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telnr` int(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `artsen`
--

INSERT INTO `artsen` (`id`, `naam`, `functie`, `adres`, `email`, `telnr`, `wachtwoord`, `role`) VALUES
(1809001, 'Harry Bannink', 'Oncoloog', 'Barnseweg 7, 3500 PP, Amerongen', 'h.bannink@big.nl', 644558877, 'Welkom123', '3'),
(1809002, 'Ties Kruise', 'KNO arts', 'Amsterdamse straatweg 81, 3572 LL, Utrecht', 't.kruise@big.nl', 612121212, 'Welkom123', '3'),
(1809003, 'Wilma van Tuyl', 'Kinderarts', 'Damrak 1, 1000 AA, Amsterdam', 'w.v.tuyl@big.nl', 204587458, 'Welkom123', '3'),
(1809004, 'NietPatient', 'GeenPatient', 'akwdwidwak, 1231ab, Den Haag', 'NietPatient@gmail.com', 644558877, 'Welkom123', '4');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijnen`
--

CREATE TABLE `medicijnen` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `werking` varchar(255) NOT NULL,
  `bijwerking` varchar(255) NOT NULL,
  `prijs` float(255,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medicijnen`
--

INSERT INTO `medicijnen` (`id`, `naam`, `werking`, `bijwerking`, `prijs`) VALUES
(1, 'diclofenac', 'pijnstiller, koortsverlagende werking, ontstekingsremmende werking. Goed bij acute pijn en chronische ziektes zoals reuma en jicht', 'pijn op de borst, kortademingheid, zwarte of zeer donkere ontlasting, ophoesten van bloed, blauwe plekken', 15.55),
(2, 'amoxicilline', 'breedspectrum antibioticum, actief tegen grampositieve en gramnegatieve bacteriën', 'braken, buikpijn, diarree, spijsverteringsstoornissen, huidirritaties, maagdarm-stoornissen', 12.85),
(3, 'omeprazol', 'remt de productie van overmatig maagzuur. Omeprazol behoort tot de klasse van protonremmers. Omeprazol wordt ingezet ter preventie en behandeling van maagzweren.', 'duizeligheid, verwarring, snelle en onregelmatige hartslag, schokkende spierbewegingen, zich schrikachtig voelen, spierkrampen, spierzwakte of slap gevoel.', 15.23);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artsen`
--
ALTER TABLE `artsen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artsen`
--
ALTER TABLE `artsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1809005;

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
