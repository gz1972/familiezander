<?php

date_default_timezone_set('Europe/Berlin');

include_once("lib/parameter.php");
//include_once("lib/constants.php");
//include_once("lib/functions.php");
//include_once("lib/view.php");


$bible = readClientGetParameter("bible");


if ($bible != "") {
	
	$filename = $bible . ".json";
	$local_file = "../bibeltexte/" . $fileName;
	
	if (file_exists($local_file) && is_file($local_file)) {
		$basename = basename($local_file);
		$filesize = filesize($local_file);
		header('Content-Description: File Transfer');
		header('Content-Type: application/json');
		header('Content-Disposition: attachment; filename="' . $basename . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . $filesize);
		header("Access-Control-Allow-Origin: *");
		readfile($local_file);
		exit;
	}
}

?>
