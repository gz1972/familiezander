<?php

date_default_timezone_set('Europe/Berlin');

include_once("lib/constants.php");
include_once("lib/dbio.php");
include_once("lib/functions.php");
include_once("lib/parameter.php");


$state = readClientGetParameter("state");
if ($state != "") {
	if ($state == "1") {
		$state = "ein";
	}
	if ($state == "0") {
		$state = "aus";
	}
	$timestamp = getStrTimestamp(getdate());
	importState($state, $timestamp);
}


?>
