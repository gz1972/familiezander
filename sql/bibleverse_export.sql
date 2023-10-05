-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 10.35.47.28:3306
-- Erstellungszeit: 27. Sep 2023 um 22:51
-- Server-Version: 8.0.33
-- PHP-Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `k181726_familiezander`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bibleverse`
--

CREATE TABLE `bibleverse` (
  `Id` int UNSIGNED NOT NULL,
  `UserId` int UNSIGNED NOT NULL,
  `BibleId` varchar(30) NOT NULL,
  `Book` varchar(30) NOT NULL,
  `BookShort` varchar(10) NOT NULL,
  `BookId` int NOT NULL,
  `Chapter` varchar(10) NOT NULL,
  `ChapterId` int NOT NULL,
  `Verse` varchar(15) NOT NULL,
  `VerseId` int NOT NULL,
  `Location` varchar(50) NOT NULL,
  `LocationShort` varchar(20) NOT NULL,
  `Text` varchar(1024) NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Bücher der Bibel, ein Tabelleneintrag je Buch';

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bibleverse`
--
ALTER TABLE `bibleverse`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bibleverse`
--
ALTER TABLE `bibleverse`
  MODIFY `Id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
