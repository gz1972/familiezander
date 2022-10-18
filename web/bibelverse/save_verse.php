<?php
date_default_timezone_set('Europe/Berlin');
session_start();

include_once("biblebooks.php");
include_once("lib/constants.php");
include_once("lib/parameter.php");
include_once("lib/dbmysql.php");
include_once("lib/db.php");
include_once("lib/view.php");

$head = "";
$body = "";

$bibeId = 0; // 1 = elberfelder 1905, 2 = NeÜ

$location = readClientPostParameter("verse");
$userId = intval($_SESSION['UserId']);

//$body = "Vers: \"" . $location . "\"<br/>";

$book = "";
$chapter = "";
$verse = "";

splitBibleLocation($location, $book, $chapter, $verse);

//$body .= "Book: \"" . $book . "\"<br/>";
//$body .= "Chapter: \"" . $chapter . "\"<br/>";
//$body .= "Vers: \"" . $verse . "\"<br/>";

$bibleBook = getBookFromName($book);

//$body .= "bnumber: " . $bibleBook["bnumber"] . ", bname: \"" . $bibleBook["bname"] . "\"<br/>";

// TODO: vorher nachsehen ob er schon existiert
dbInsertVerse($userId, $bibeId, $bibleBook, $chapter, $verse);

$head .= "<meta http-equiv=\"refresh\" content=\"0; URL=select_verse.php\">" . CRLF;
$head .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">" . CRLF;

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
