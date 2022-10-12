<?php
date_default_timezone_set('Europe/Berlin');
session_start();

include_once("lib/dbmysql.php");
include_once("lib/guid.php");

$head = "";

$head .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">" . CRLF;
$head .= "<title>User Infos</title>" . CRLF;
$head .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"index.css\" media=\"all\">" . CRLF;

$baseUri = "https://www.familiezander.de/bibelverse/select_verse.php?usertoken=" . $_SESSION['UserTokenText'] . "";
$baseUriUrlEnc = "https%3A%2F%2Fwww.familiezander.de%2Fbibelverse%2Fselect_verse.php%3Fusertoken%3D" . $_SESSION['UserTokenText'];


$body  = "UserId:  " . $_SESSION['UserId'] . "<br/>\r\n";
$body .= "E-Mail:  " . $_SESSION['Email'] . "<br/>\r\n";
$body .= "Token:   " . $_SESSION['UserTokenText'] . "<br/>\r\n";
$body .= "Status:  " . $_SESSION['UserStatus'] . "<br/>\r\n";
$body .= "BaseUri: " . $baseUri . "<br/>\r\n";
$body .= "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . $baseUriUrlEnc . "&choe=UTF-8' title='Deine Seite' /><br/>\r\n"


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
