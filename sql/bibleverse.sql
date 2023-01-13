--
-- Tabellenstruktur für Tabelle `bibleverse`
--
CREATE TABLE IF NOT EXISTS `bibleverse` (
  `Id` int(10) unsigned NOT NULL,      -- eindeutige Vers-ID (Buch- + Kapitelübergreifend) (ein Tabelleneintrag je Vers)
  `UserId` int(10) unsigned NOT NULL,  -- Referenz in Usertabelle
  `BibleId` varchar(30) NOT NULL,      -- Referenz zur verwendeten Bibel
  `Book` varchar(30) NOT NULL,         -- "1.Mose" (ohne Leerzeichen)
  `BookShort` varchar(10) NOT NULL,    -- "1.Mo"
  `BookId` int(10) NOT NULL,           -- Referenz zu bnumber in der BibelStruktur
  `Chapter` varchar(10) NOT NULL,      -- "13"
  `ChapterId` int(10) NOT NULL,        -- Referenz zu cnumber in der BibelStruktur
  `Verse` varchar(15) NOT NULL,        -- "6-8,12"
  `VerseId` int(10) NOT NULL,          -- Referenz zu vnumber in der BibelStruktur (bei mehreren versen wird der erste Vers referenziert)
  `Location` varchar(50) NOT NULL,     -- "1.Mose 13:6-8,12"
  `LocationShort` varchar(20) NOT NULL,-- "1.Mo 13:6-8,12"
  `Text` varchar(1024) NOT NULL,       -- der Verstext (längster Vers Esther 8,9: 508 Zeichen)
  `Timestamp` datetime NOT NULL        -- der Zeitstempel,wann der auf dem Gerät Vers ausgewählt wurde
  -- TODO: Referenz (Id) auf die Bibelstellenliste (merken, lernen, ... weitere?)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bücher der Bibel, ein Tabelleneintrag je Buch';

--
-- Indizes für die Tabelle `bibleverse`
--
ALTER TABLE `bibleverse`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT für Tabelle `bibleverse`
--
ALTER TABLE `bibleverse`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



