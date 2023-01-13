<?php

function getUserRegisterView($indent, $frameId, $inputId, $useremail="", $errtext="") {

    $view  = $indent . "<div class=\"window\">" . CRLF;
    $view .= $indent . TAB . "<div class=\"centerbox\" id=\"user-reg\">" . CRLF;
    $view .= $indent . TAB . TAB . "<div class=\"title\">Benutzer-Registrierung</div>" . CRLF;
    if(!empty($errtext)) {
        $view .= $indent . TAB . TAB . "<div class=\"message\">$errtext</div>" . CRLF;
    }
    $view .= $indent . TAB . TAB . "<form class=\"vertical\" name=\"registerform\" action=\"register_user.php\" method=\"post\">" . CRLF;
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

function getUserRegisterEmailText($targetSite) {
    $view  = "";

    $baseUri = "https://www.familiezander.de/bibelverse/$targetSite?usertoken=" . $_SESSION['UserTokenText'] . "";
    $baseUriUrlEnc = "https%3A%2F%2Fwww.familiezander.de%2Fbibelverse%2F$targetSite%3Fusertoken%3D" . $_SESSION['UserTokenText'];
    
    $view .= "Hallo,<br/>" . CRLF;
    $view .= "schön, dass Du da bist!<br/>" . CRLF;
    $view .= "Du kannst jetzt unter Deinem persönlichen Link Deine Lieblings-Bibelstellen abspeichern.<br/>" . CRLF;
    $view .= "Am besten legst Du Dir den Link als Bookmark im Browser ab, so kannst Du immer und von überall darauf zugreifen.<br/>" . CRLF;
    $view .= "Der Link ist auch im QR-Code enthalten. Wenn Du diesen mit Deinem Smartphone einscannst, kannst Du auch Mobil auf Deine Bibelstelen zugreifen.<br/>" . CRLF;
    $view .= "Du kannst Dir die Seite auf deinem Handy auf dem Startbildschirm ablegen, dann bist Du mit einem Fingertipp sofort drin.<br/>" . CRLF;
    $view .= "Hebe Dir die Mail gut auf, falls Du den Link oder den QR-Code später noch mal benötigst.<br/>" . CRLF;
    $view .= "Ich wünsche Dir von Herzen Gottes Segen.<br/><br/>" . CRLF;
    $view .= "Deine E-Mail-Adresse:  " . $_SESSION['Email'] . "<br/>" . CRLF;
    $view .= "Dein persönlicher Link: " . $baseUri . "<br/>" . CRLF;
    $view .= "Dein persönlicher Link als QR-Code für das Smartphone:<br/>" . CRLF;
    $view .= "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . $baseUriUrlEnc . "&choe=UTF-8' title='Deine Seite' /><br/>" . CRLF;
    
    return $view;
}
