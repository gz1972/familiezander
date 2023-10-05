-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 10.35.47.28:3306
-- Erstellungszeit: 27. Sep 2023 um 23:01
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
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `UserId` int UNSIGNED NOT NULL,
  `Email` varchar(52) NOT NULL,
  `UserToken` binary(16) NOT NULL,
  `UserTokenText` varchar(36) GENERATED ALWAYS AS (insert(insert(insert(insert(hex(`UserToken`),9,0,_utf8mb3'-'),14,0,_utf8mb3'-'),19,0,_utf8mb3'-'),24,0,_utf8mb3'-')) VIRTUAL,
  `Registered` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LoginErrCount` int NOT NULL,
  `LockedUntil` datetime DEFAULT NULL,
  `LastPwChange` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='In dieser Tabelle werden die Benutzer gespeichert';

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
