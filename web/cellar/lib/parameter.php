<?php

function checkParameterValue($paramValueRaw) {
	// LEGACY CODE, schadet nicht, aber auf Grund von prepared statements nicht mehr gegen SQL injections notwendig (sollte jedenfalls so sein)
	$paramValueClean = str_replace(array("--","'","=",">","<","%",";"), "", $paramValueRaw);
	return $paramValueClean;
}

function readClientGetParameter($paramname) {
	if(isset($paramname) && $paramname != "") {
		if(isset($_GET[$paramname]) && $_GET[$paramname] != "") {
			return checkParameterValue($_GET[$paramname]);
		}
	}
	return "";
}

?>
