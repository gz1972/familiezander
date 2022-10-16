<?php
date_default_timezone_set('Europe/Berlin');
session_start();

include_once("lib/constants.php");
include_once("lib/parameter.php");
include_once("lib/dbmysql.php");
include_once("lib/db.php");

$index = readClientGetParameter("index");
$bId = readClientGetParameter("bid");
$bname = readClientGetParameter("bname");
$userId = intval($_SESSION['UserId']);

$verseliste = dbGetVerse($userId, $bId);
if ($verseliste == false || empty($verseliste)) {
    echo "[]";
} else {
    $verselocationliste = "[";
    for ($index = 0; $index < count($verseliste); $index++) {
        $verselocationliste .= "\"" . $verseliste[$index]["Location"] . "\"";
    }
    $verselocationliste .= "]";

    echo $verselocationliste;
}

?>
