<?php
date_default_timezone_set('Europe/Berlin');
session_start();

include_once("lib/constants.php");
include_once("lib/parameter.php");
include_once("lib/dbmysql.php");
include_once("lib/db.php");
include_once("lib/view.php");
include_once("lib/functions.php");
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
        if ($errtext == "vorhanden") {
            $view = getUserRegisterView(TAB.TAB, $frameId, $inputId, $useremail, "Diese E-Mail-Adresse wird bereits verwendet");
        } else {
            $_SESSION['login'] = true;
            $_SESSION['TimeCreated'] = time();
            $_SESSION['TimeModified'] = time();
            $_SESSION['Email'] = $useremail;
            $_SESSION['UserId'] = $user["UserId"];
            $_SESSION['UserTokenText'] = $user["UserTokenText"];
            $_SESSION['UserStatus'] = $errtext;

            $mailBodyConfirm = getUserRegisterEmailText("select_verse.php", $_SESSION['UserTokenText'], $_SESSION['Email']);
            //mail($_SESSION['Email'], "Persönlicher Zugang zum Bibelvers-Speicher", $mailBodyConfirm, EMAIL_ADDRESS_SENDER_HTML);
            // TODO: mail funktioniert nicht :-(
            
            $result = sendMailWithAttachments($_SESSION['Email'], "Persönlicher Zugang zum Bibelvers-Speicher", $mailBodyConfirm, EMAIL_ADDRESS_SENDER_NAME, EMAIL_ADDRESS_SENDER_EMAIL, null);
            // TODO: sendMailWithAttachments() funktioniert auch nicht :-(

            echo "sendMailWithAttachments(" . $_SESSION['Email'] . ", \"Persönlicher Zugang zum Bibelvers-Speicher\", mailBodyConfirm, EMAIL_ADDRESS_SENDER_NAME, EMAIL_ADDRESS_SENDER_EMAIL, null) = $result<br/>";
            
            $head .= "<meta http-equiv=\"refresh\" content=\"10; URL=select_verse.php\">" . CRLF;
        }
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

    </head>
    <body>

<?php

echo $view;

?>

    </body>
</html>
