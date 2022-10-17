<?php
date_default_timezone_set('Europe/Berlin');
session_start();

include_once("lib/constants.php");
include_once("lib/parameter.php");
include_once("lib/dbmysql.php");
include_once("lib/db.php");
include_once("lib/view.php");

$head = "";
$body = "";

$verse = readClientPostParameter("verse");
$userId = intval($_SESSION['UserId']);

$body = "Vers: \"" . $verse . "\"<br/>";
$verseparts1 = explode(" ", $verse);
$verseparts2 = explode(";", $verseparts1[1]);

$book = $verseparts1[0];
$chapter = $verseparts2[0];
$vers = $verseparts2[1];

$body .= "Book: \"" . $book . "\"<br/>";
$body .= "Chapter: \"" . $chapter . "\"<br/>";
$body .= "Vers: \"" . $vers . "\"<br/>";

// TODO: Vers in DB speichern, vorher nachsehen ob er schon existiert

?>

<html>
    <head>
   
<?php 
echo $head;
?>

    </head>
    <body>

<?php


echo $body;

?>
    </body>

</html>
