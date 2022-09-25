<?php

function getInputFieldView($indent, $type, $name, $label, $class, $id, $value="", $placeholder="") {
    $view  = $indent . "<p>" . CRLF;
    $view .= $indent . TAB . "<label for=\"$id\">$label<br>" . CRLF;
    $view .= $indent . TAB . TAB . "<input type=\"$type\" name=\"$name\" id=\"$id\" class=\"$class\" placeholder=\"" . $placeholder . "\" value=\"" . $value . "\">" . CRLF;
    $view .= $indent . TAB . "</label>" . CRLF;
    $view .= $indent . "</p>" . CRLF;
    return $view;
}

function getLinkView($indent, $id, $url, $title, $content) {
    $view  = $indent . "<p id=\"$id\">" . CRLF;
    $view .= $indent . TAB . "<a href=\"$url\" title=\"$title\">$content</a>" . CRLF;
    $view .= $indent . "</p>" . CRLF;
    return $view;
}

function getUserRegisterView($indent, $useremail="", $errtext="") {
    $view = "";
    
    $view  = $indent . "<div id=\"register\">" . CRLF;
    $view .= $indent . TAB . "<p id=\"registerheadline\">Registrierung für neue Nutzer</p>" . CRLF;
    if($errtext != "") {
        $view .= $indent . TAB . "<p id=\"errtext\">$errtext</p>" . CRLF;
    }
    $view .= $indent . TAB . "<form name=\"registerform\" id=\"registerform\" class=\"registerform\" action=\"register_user.php\" method=\"post\">" . CRLF;
    $view .= getInputFieldView($indent.TAB.TAB, "text", "Email", "E-Mail", "inputregister mandatory", "user_login", $useremail);
    $view .= $indent . TAB . TAB . "<p class=\"submit\">" . CRLF;
    $view .= $indent . TAB . TAB . TAB . "<input type=\"submit\" name=\"submit\" id=\"submit\" class=\"button\" value=\"Prüfen\">" . CRLF;
    $view .= $indent . TAB . TAB . "</p>" . CRLF;
    $view .= $indent . TAB . "</form>" . CRLF;
    $view .= getLinkView($indent.TAB, "login", "login.php", "Login", "Zur&uuml;ck zum Login");
    $view .= $indent . "</div>" . CRLF;
    $view .= $indent . "<div class=\"clear\"></div>" . CRLF;
    
    return $view;
}

