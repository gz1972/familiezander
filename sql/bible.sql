
--
-- Tabellenstruktur für Tabelle `bible`
--
CREATE TABLE IF NOT EXISTS `bible` (
  `Id` int(10) unsigned NOT NULL,    -- eindeutige Bibel-ID (ein Tabelleneintrag je Bibelübersetzung)
  `Name` varchar(30) NOT NULL,
  `Uri` varchar(1024) NOT NULL,      -- URI zur Bibel
  `Timestamp` datetime NOT NULL      -- der Zeitstempel,wann der auf dem Gerät Vers ausgewählt wurde
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bibelübersetzungen';

INSERT INTO `bible` (`Id`, `Name`, `Uri`, `Timestamp`) VALUES
(1, 'Elberfelder 1905', 'http://www.familiezander.de/bibeltexte/elb.json', '2022-09-06 19:34:00'),
(2, 'Neue evangelistische Übersetzung (NeÜ)', 'http://www.familiezander.de/bibeltexte/neu.json', '2022-09-06 19:36:00')

--
-- Indizes für die Tabelle `bible`
--
ALTER TABLE `bible`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT für Tabelle `bible`
--
ALTER TABLE `bible`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



