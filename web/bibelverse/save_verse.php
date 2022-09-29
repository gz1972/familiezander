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

$usertoken = readClientGetParameter("usertoken");
if(empty($usertoken)) {
    $usertoken = $_SESSION['UserTokenText'];
}

if(empty($usertoken)) {
	$head .= "<meta http-equiv=\"refresh\" content=\"0; URL=register_user.php\">" . CRLF;
} else {
    // TODO
}

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
