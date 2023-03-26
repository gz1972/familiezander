<?php

function getStrTimestamp($ts) {
    $date = $ts['year']."-".numToString($ts['mon'])."-".numToString($ts['mday']);
    $time = numToString($ts['hours']).":".numToString($ts['minutes']).":".numToString($ts['seconds']);
	return $date." ".$time;
}

function numToString($num) {
    if (gettype($num) == "string") {
        return (strlen($num) == 1 ? "0" . $num : $num);
    } else if (gettype($num) == "integer") {
        return ($num < 10 ? "0" . $num : "" . $num);
    } else {
        return "";
    }
}

?>
