<?php

function getUserRegisterView($indent, $frameId, $inputId, $useremail="", $errtext="") {

    $view  = $indent . "<div class=\"window\">" . CRLF;
    $view .= $indent . TAB . "<div class=\"centerbox\" id=\"user-reg\">" . CRLF;
    $view .= $indent . TAB . TAB . "<div class=\"title\">Benutzer-Registrierung</div>" . CRLF;
    if(!empty($errtext)) {
        $view .= $indent . TAB . TAB . "<div class=\"message\">$errtext</div>" . CRLF;
    }
    $view .= $indent . TAB . TAB . "<form name=\"registerform\" action=\"register_user.php\" method=\"post\">" . CRLF;
    $view .= getInputFieldView($indent.TAB.TAB.TAB, "text", "Email", "Deine E-Mail-Adresse", $frameId, $inputId, $useremail);
    //$view .= $indent . TAB . TAB . TAB . "<button class=\"button\" id=\"login\" type=\"button\">Registrieren</button>" . CRLF;
    $view .= $indent . TAB . TAB . TAB . "<input class=\"button\" type=\"submit\" name=\"submit\" value=\"Registrieren\"></input>" . CRLF;
    $view .= $indent . TAB . TAB . "</form>" . CRLF;
    $view .= $indent . TAB . "</div>" . CRLF;
    $view .= $indent . "</div>" . CRLF;
    return $view;
}

function getInputFieldView($indent, $type, $name, $label, $frameId, $inputId, $value="") {
    $view  = $indent . "<div class=\"input-frame\" id=\"$frameId\">" . CRLF;
    $view .= $indent . TAB . "<div class=\"input-label\">$label</div>" . CRLF;
    $view .= $indent . TAB . "<input type=\"$type\" name=\"$name\" id=\"$inputId\" value=\"$value\"></input>" . CRLF;
    $view .= $indent . "</div>" . CRLF;
    return $view;
}

function getMailBodyConfirm($participantData) {
	/*
	$url = "https://sola-oberkraemer.de/teilnehmer/showprintform.php?SolaParticipantId=";
	$url .= $participantData["SolaParticipantId"] . "&EditId=" . $participantData["EditId"];
	*/
	$url = "https://sola-oberkraemer.de/teilnehmer/doc/SolaTeilnehmerAnmeldung_" . $participantData["SolaParticipantId"] . "_" . $participantData["EditId"] . ".pdf";
	
	//$mailBody = getMailBodySalutation($participantData);
	$mailBody  = "Herzlichen Gl&uuml;ckwunsch!<br/><br/>" . CRLF;
	$mailBody .= "Sie haben erfolgreich einen Teilnehmer-Platz für das SOLA 2022 reserviert!<br/>" . CRLF;
	$mailBody .= "Wir freuen uns schon jetzt auf die Ferien-Woche mit Ihrem Kind! Nun k&ouml;nnen Sie sich bis M&auml;rz 2022 entspannt zur&uuml;cklehnen.<br/>" . CRLF;
	$mailBody .= "Wir werden Sie dann in einer Erinnerungs-E-Mail um die verbindliche Anmeldung Ihres Kindes bitten.<br/>" . CRLF;
	$mailBody .= "Keine Sorge! Bis Ende M&auml;rz bleibt der Teilnehmerplatz für Ihr Kind auf jeden Fall reserviert!<br/>" . CRLF;
	$mailBody .= "Wenn Sie das Anmeldeformular noch einmal ausdrucken m&ouml;chten,<br/>" .CRLF;
	$mailBody .= "dann klicken Sie bitte auf den folgenden Link.<br/><br/>" . CRLF . CRLF;
	$mailBody .= "<a href=\"$url\">$url</a><br/><br/>" . CRLF . CRLF;
	//$mailBody .= "Bitte denken Sie daran, dass die Anmeldung erst dann rechtsg&uuml;ltig ist,<br/>" . CRLF;
	//$mailBody .= "wenn das unterschriebene Anmeldeformular eingegangen ist.<br/><br/>" . CRLF . CRLF;
	$mailBody .= "Liebe Gr&uuml;&szlig;e und bis bald,<br/>" . CRLF;
	$mailBody .= "Dein Sola-Team<br/>" . CRLF;
	
	/*
	$mailBody = getMailBodySalutation($participantData);
	$mailBody .= "schön, dass Du am Sommerlager teilnehmen möchtest.<br/>" . CRLF;
	$mailBody .= "Wenn Du das Anmeldeformular noch einmal ausdrucken möchtest,<br/>" .CRLF;
	$mailBody .= "dann klicke bitte auf den folgenden Link.<br/><br/>" . CRLF . CRLF;
	$mailBody .= "<a href=\"$url\">$url</a><br/><br/>" . CRLF . CRLF;
	$mailBody .= "Bitte denke daran, dass die Anmeldung erst dann rechtsg&uuml;ltig ist,<br/>" . CRLF;
	$mailBody .= "wenn das unterschriebene Anmeldeformular eingegangen ist.<br/><br/>" . CRLF . CRLF;
	$mailBody .= "Liebe Grüße und bis bald,<br/>" . CRLF;
	$mailBody .= "Dein Sola-Team<br/>" . CRLF;
	*/
	
	return $mailBody;
}
