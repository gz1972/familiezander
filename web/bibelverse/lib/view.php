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

