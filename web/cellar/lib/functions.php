<?php

function getStrTimestamp($ts) {
	$day  = (($ts['mday']    < 10 and $ts['mday']    != '0') ? "0" . $ts['mday']    : $ts['mday']);
	$mon  = (($ts['mon']     < 10 and $ts['mon']     != '0') ? "0" . $ts['mon']     : $ts['mon']);
	$hour = (($ts['hours']   < 10 and $ts['hours']   != '0') ? "0" . $ts['hours']   : $ts['hours']);
	$min  = (($ts['minutes'] < 10 and $ts['minutes'] != '0') ? "0" . $ts['minutes'] : $ts['minutes']);
	$sec  = (($ts['seconds'] < 10 and $ts['seconds'] != '0') ? "0" . $ts['seconds'] : $ts['seconds']);
	$ts_string = $ts['year']."-".$mon."-".$day." ".$hour.":".$min.":".$sec;
	
	return $ts_string;
}

function getHumanDate($ts) {
	$day  = (($ts['mday']    < 10 and $ts['mday']    != '0') ? "0" . $ts['mday']    : $ts['mday']);
	$mon  = (($ts['mon']     < 10 and $ts['mon']     != '0') ? "0" . $ts['mon']     : $ts['mon']);
	$ts_string = $day.".".$mon.".".$ts['year'];
	
	return $ts_string;
}

?>
