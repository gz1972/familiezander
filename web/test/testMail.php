<?php

date_default_timezone_set('Europe/Berlin');

include_once("lib/functions.php");

$body = "sendMailWithAttachments(\"gunther@familiezander.de\", \"php test sendMailWithAttachments()\", body, \"Gunther Zander\", \"gzander@gmx.li\", null);";
$result = sendMailWithAttachments("gunther@familiezander.de", "php test sendMailWithAttachments()", $body, "Gunther Zander", "gzander@gmx.li", null);
echo "sendMailWithAttachments() = $result<br/>";

$body = "mail(\"gunther@familiezander.de\", \"php test mail()\", body);";
$result = mail("gunther@familiezander.de", "php test mail()", $body);
echo "mail() = $result<br/>";

?>
