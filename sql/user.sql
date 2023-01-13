
--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `UserId` int(10) UNSIGNED NOT NULL,
  `Email` varchar(52) NOT NULL,
  `UserToken` binary(16) NOT NULL,
  `UserTokenText` varchar(36) generated always as   --  https://dev.mysql.com/blog-archive/storing-uuid-values-in-mysql-tables/
	 (insert(
		insert(
		  insert(
			insert(hex(UserToken),9,0,'-'),
			14,0,'-'),
		  19,0,'-'),
		24,0,'-')
	 ) virtual,
  `Registered` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LoginErrCount` int(10) NOT NULL,
  `LockedUntil` datetime DEFAULT NULL,
  `LastPwChange` datetime DEFAULT NULL,
  `BibleId` int(10) UNSIGNED NULL        -- referenziert Spalte `Id` in Tabelle `bible`
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='In dieser Tabelle werden die Benutzer gespeichert';

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

