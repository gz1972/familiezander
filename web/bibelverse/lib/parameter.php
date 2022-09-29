<?php

function checkParameterValue($paramValueRaw) {
	$paramValueTmp = "";
	if(!get_magic_quotes_gpc()) {
		$paramValueTmp = addslashes($paramValueRaw);
	} else {
		$paramValueTmp = $paramValueRaw;
	}
	$paramValueClean = str_replace(array("--","=",">","<","%"), "", $paramValueTmp);
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

function readClientPostParameter($paramname, $disableCheck=false) {
	if(isset($paramname) && $paramname != "") {
		if(isset($_POST[$paramname]) && $_POST[$paramname] != "") {
			if($disableCheck) {
				return $_POST[$paramname];
			}
			return checkParameterValue($_POST[$paramname]);
		}
	}
	return "";
}

?>
