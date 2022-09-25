<?php
date_default_timezone_set('Europe/Berlin');
session_start();

include_once("lib/dbmysql.php");
include_once("lib/guid.php");

$head = "";

$head .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">" . CRLF;
$head .= "<title>Sola-MA-Anmeldung > Registrierung (1/3)</title>" . CRLF;
$head .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\" media=\"all\">" . CRLF;

$body  = "UserId: " . $_SESSION['UserId'] . "<br/>\r\n";
$body .= "E-Mail: " . $_SESSION['Email'] . "<br/>\r\n";
$body .= "Token:  " . $_SESSION['UserTokenText'] . "<br/>\r\n";
$body .= "Status: " . $_SESSION['UserStatus'] . "<br/>\r\n";


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
