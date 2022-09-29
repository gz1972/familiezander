<?php
date_default_timezone_set('Europe/Berlin');
session_start();

include_once("lib/constants.php");
include_once("lib/parameter.php");
include_once("lib/dbmysql.php");
include_once("lib/db.php");
include_once("lib/view.php");
/*
include_once("lib/mail.php");
*/

$frameId = "frame-email";
$inputId = "input-email";

$useremail = readClientPostParameter("Email");
$errtext = "";
$userId = -1;
$head = "";
$view = "";
if($useremail == "") {
	$view = getUserRegisterView(TAB.TAB, $frameId, $inputId, $useremail);
} else {
    $user = dbGetOrRegisterUser($useremail, $errtext, $userId);
    if ($user == null) {
        $view = getUserRegisterView(TAB.TAB, $frameId, $inputId, $useremail, $errtext);
    } else {
        $_SESSION['login'] = true;
        $_SESSION['TimeCreated'] = time();
        $_SESSION['TimeModified'] = time();
        $_SESSION['Email'] = $useremail;
        $_SESSION['UserId'] = $user["UserId"];
        $_SESSION['UserTokenText'] = $user["UserTokenText"];
        $_SESSION['UserStatus'] = $errtext;
        
        // zweite Registerseite mit Name, Anschrift, Telefon aufrufen
        $head .= "<meta http-equiv=\"refresh\" content=\"0; URL=user_info.php\">" . CRLF;
    }
}

$head .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">" . CRLF;
$head .= "<title>Benutzer-Registrierung</title>" . CRLF;
$head .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"../styles.css\" media=\"all\">" . CRLF;

?>

<html>
    <head>
   
<?php 
echo $head;
?>

        <script type="text/javascript" src="scripts.js"></script>
    </head>

<?php

$view .= TAB . "<body onload=\"init('$frameId', '$inputId')\">" . CRLF;

echo $view;

?>

    </body>
</html>
