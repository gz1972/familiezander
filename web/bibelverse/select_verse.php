<?php
date_default_timezone_set('Europe/Berlin');
session_start();

include_once("lib/constants.php");
include_once("lib/parameter.php");
include_once("lib/dbmysql.php");
include_once("lib/db.php");
include_once("lib/view.php");

$head = "";
$body  = TAB . "<body>" . CRLF;
$body .= TAB . "</body>" . CRLF;

$usertoken = readClientGetParameter("usertoken");
if(empty($usertoken)) {
    $usertoken = $_SESSION['UserTokenText'];
}

if(empty($usertoken)) {
	$head .= "<meta http-equiv=\"refresh\" content=\"0; URL=register_user.php\">" . CRLF;
} else {
    $user = dbGetUserByUserTokenText($usertoken);
    if ($user == NULL) {
        $head .= "<meta http-equiv=\"refresh\" content=\"0; URL=register_user.php\">" . CRLF;
    } else {
        $_SESSION['login'] = true;
        $_SESSION['TimeCreated'] = time();
        $_SESSION['TimeModified'] = time();
        $_SESSION['Email'] = $user["Email"];
        $_SESSION['UserId'] = $user["UserId"];
        $_SESSION['UserTokenText'] = $user["UserTokenText"];
        //$_SESSION['UserStatus'] = $errtext;

        $userVerse = dbGetVerse($_SESSION['UserId']);

        $head .= TAB . TAB . "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>" . CRLF;
        $head .= TAB . TAB . "<meta name=\"viewport\" content=\"user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0\"/>" . CRLF;
        $head .= TAB . TAB . "<meta name=\"apple-mobile-web-app-capable\" content=\"yes\" />" . CRLF;
        $head .= TAB . TAB . "<link rel=\"stylesheet\" type=\"text/css\" href=\"../styles.css\" />" . CRLF;
        $head .= TAB . TAB . "<script type=\"text/javascript\" src=\"controls/view.js\"></script>" . CRLF;
        $head .= TAB . TAB . "<script type=\"text/javascript\" src=\"controls/tools.wrapper.js\"></script>" . CRLF;
        $head .= TAB . TAB . "<script type=\"text/javascript\" src=\"controls/verseselect.controller.js\"></script>" . CRLF;
        $head .= TAB . TAB . "<script type=\"text/javascript\" src=\"controls/verseselect.model.js\"></script>" . CRLF;
        $head .= TAB . TAB . "<script type=\"text/javascript\" src=\"controls/verseselect.view.js\"></script>" . CRLF;
        $head .= TAB . TAB . "<script type=\"text/javascript\" src=\"biblebooks.js\"></script>" . CRLF;
        $head .= TAB . TAB . "<script type=\"text/javascript\" src=\"scripts.js\"></script>" . CRLF;

        if ($userVerse !== false && count($userVerse) > 0) {
            $head .= TAB . TAB . "<script type=\"text/javascript\">" . CRLF;

            $head .= TAB . TAB . "var userVerse = [" . CRLF;
            for ($idx = 0; $idx < count($userVerse); $idx++) {
                $head .= TAB . TAB . TAB . "'" . $userVerse[$idx]["Location"] . "'," . CRLF;
            }
            $head .= TAB . TAB . "];" . CRLF;

            $head .= TAB . TAB . "</script>" . CRLF;
        }

        $body  = TAB . "<body onload=\"init()\">" . CRLF;
        $body .= TAB . "</body>" . CRLF;
    }
}

?>

<html>
    <head>
   
<?php 
echo $head;
?>

    </head>

<?php


echo $body;

?>

</html>
