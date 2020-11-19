-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 nov 2020 om 13:38
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
-- Tabelstructuur voor tabel `apothekers`
--

CREATE TABLE `apothekers` (
  `user_id` int(255) NOT NULL,
  `apotheek_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artsen`
--

CREATE TABLE `artsen` (
  `user_id` int(255) NOT NULL,
  `functie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `artsen`
--

INSERT INTO `artsen` (`user_id`, `functie`) VALUES
(1809001, 'Oncoloog'),
(1809002, 'Kno arts'),
(1809003, 'Kinderarts');

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
(2, 'amoxicilline', 'breedspectrum antibioticum, actief tegen grampositieve en gramnegatieve bacteriën', 'braken, buikpijn, diarree, spijsverteringsstoornissen, huidirritaties, maagdarm-stoornissen', 11.51),
(3, 'omeprazol', 'remt de productie van overmatig maagzuur. Omeprazol behoort tot de klasse van protonremmers. Omeprazol wordt ingezet ter preventie en behandeling van maagzweren.', 'duizeligheid, verwarring, snelle en onregelmatige hartslag, schokkende spierbewegingen, zich schrikachtig voelen, spierkrampen, spierzwakte of slap gevoel.', 15.23),
(192, 'diclofenac', 'pijnstiller, koortsverlagende werking, ontstekingsremmende werking. Goed bij acute pijn en chronische ziektes zoals reuma en jicht', 'pijn op de borst, kortademingheid, zwarte of zeer donkere ontlasting, ophoesten van bloed, blauwe plekken', 6.90);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patienten`
--

CREATE TABLE `patienten` (
  `id` int(255) NOT NULL,
  `verznnr` varchar(255) NOT NULL,
  `arts_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `patienten`
--

INSERT INTO `patienten` (`id`, `verznnr`, `arts_id`, `user_id`) VALUES
(1233, 'ZK250012018', 1809001, 1809004),
(1234, 'ZK250022015', 1809001, 1809005),
(1235, 'ZK250032000', 1809003, 1809006);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recepten`
--

CREATE TABLE `recepten` (
  `recept_id` int(11) NOT NULL,
  `med_id` int(255) NOT NULL,
  `patient_id` int(255) NOT NULL,
  `hoeveelheid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `recepten`
--

INSERT INTO `recepten` (`recept_id`, `med_id`, `patient_id`, `hoeveelheid`) VALUES
(4, 2, 1809004, 3),
(5, 2, 1809004, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `volnaam` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telnr` int(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `volnaam`, `adres`, `email`, `telnr`, `wachtwoord`, `role`) VALUES
(1809001, 'Harry Bannink', 'Baarnseweg 7, 3500 PP, Amerongen', 'h.bannink@big.nl', 644558877, '7bca025eff4fb877bea86faac56c909b65c97adfba23b7c1fb6b9772d34b420e', 3),
(1809002, 'Ties Kruise', 'Amsterdamse straatweg 81, 3572 LL, Utrecht', 't.kruise@big.nl', 612121212, '7bca025eff4fb877bea86faac56c909b65c97adfba23b7c1fb6b9772d34b420e', 3),
(1809003, 'Wilma van Tuyl', 'Damrak 1, 1000 AA, Amsterdam', 'w.v.tuyl@big.nl', 204587458, '7bca025eff4fb877bea86faac56c909b65c97adfba23b7c1fb6b9772d34b420e', 3),
(1809004, 'Kees Verkerk', 'Markt 1, PT, Den Haag', 'k.verkerk@xs4all.nl', 701234567, '7bca025eff4fb877bea86faac56c909b65c97adfba23b7c1fb6b9772d34b420e', 0),
(1809005, 'Hilbert	van der	Duim', 'Markt 2, 2500 PT, Den Haag', 'h.v.d.duim@xs4all.nl', 702154871, '7bca025eff4fb877bea86faac56c909b65c97adfba23b7c1fb6b9772d34b420e', 0),
(1809006, 'Yvonne van Gennip', 'Markt 3, 2500 PT, Den Haag', 'y.v.gennip@xs4all.nl', 709876549, '7bca025eff4fb877bea86faac56c909b65c97adfba23b7c1fb6b9772d34b420e', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `apothekers`
--
ALTER TABLE `apothekers`
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `artsen`
--
ALTER TABLE `artsen`
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `patienten`
--
ALTER TABLE `patienten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arts_id` (`arts_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD PRIMARY KEY (`recept_id`),
  ADD KEY `medicijn` (`med_id`),
  ADD KEY `patient` (`patient_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `medicijnen`
--
ALTER TABLE `medicijnen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT voor een tabel `patienten`
--
ALTER TABLE `patienten`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;

--
-- AUTO_INCREMENT voor een tabel `recepten`
--
ALTER TABLE `recepten`
  MODIFY `recept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1809007;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `apothekers`
--
ALTER TABLE `apothekers`
  ADD CONSTRAINT `apothekers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `artsen`
--
ALTER TABLE `artsen`
  ADD CONSTRAINT `artsen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `patienten`
--
ALTER TABLE `patienten`
  ADD CONSTRAINT `fk_patienten_artsen` FOREIGN KEY (`arts_id`) REFERENCES `artsen` (`user_id`),
  ADD CONSTRAINT `fk_patienten_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD CONSTRAINT `fk_recept_medicijn` FOREIGN KEY (`med_id`) REFERENCES `medicijnen` (`id`),
  ADD CONSTRAINT `fk_recept_patient` FOREIGN KEY (`patient_id`) REFERENCES `patienten` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
