<?php

date_default_timezone_set('Europe/Berlin');

include_once("lib/constants.php");
include_once("lib/dbio.php");
include_once("lib/functions.php");

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta http-equiv="expires" content="0"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

<?php

if (!checkDbOk()) {
	echo TAB . TAB . TAB . "<h2>Verbindung zur Datenbank zur Zeit nicht möglich</h2>" . CRLF;
} else {
	$lastStates = getLastStates(10);

	if ($lastStates == null) {
		echo TAB . TAB . TAB . "<h2>Keine Statusmeldungen gefunden</h2>" . CRLF;
	} else {
		foreach($lastStates as $stateIdx => $stateData) {
			echo TAB . TAB . TAB . "<div>" . $stateData["Timestamp"] . " - " . $stateData["Status"] . "</div>" . CRLF;
		}
    }
}

?>

    </body>
</html>
