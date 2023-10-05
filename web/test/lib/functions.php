<?php
require_once 'phpmailer/Exception.php'; // neu
require_once 'phpmailer/OAuth.php'; // neu
require_once 'phpmailer/SMTP.php'; // neu
require_once 'phpmailer/POP3.php'; // neu
require_once 'phpmailer/PHPMailer.php'; // neu

//
// sendet eine E-Mail mit Anhängen
//
// Parameter:
//  - to           die E-Mailadresse (string) z.B. "abc@xyz.de"
//  - subject      der Betreff (string)
//  - messageText  der Nachrichtentext (string)
//  - senderName   der Klarname des Senders z.B.: "Sinfonie Akademie"
//  - senderEmail  die Mail-Adresse des Senders z.B.: "akademie@sinfonie.de"
//  - filenames    Liste der Dateinamen der anzuhängenden Dateien (string) incl. Endung und Pfad z.B.: array("./doc/Datei1.txt", "./doc/Datei2.txt")
//  - isHtmlBody   wenn true wird der Body als HTML behandelt, sonst als Text
//
// see: http://stackoverflow.com/questions/10606558/how-to-attach-pdf-to-email-using-php-mail-function
function sendMailWithAttachments($to, $subject, $messageText, $senderName, $senderEmail, $filenames, $isHtmlBody=true) {
    
    $phpmailer        = new PHPMailer\PHPMailer\PHPMailer(); // defaults to using php "mail()"
    $body             = $messageText;
    
    $phpmailer->Host     = "mail.sinfonie.de";
    $phpmailer->addReplyTo($senderEmail, $senderName);
    $phpmailer->setFrom($senderEmail, $senderName);
    $phpmailer->addAddress($to);
    $phpmailer->Subject    = $subject;
    if($isHtmlBody) {
        $phpmailer->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
        $phpmailer->MsgHTML($body);
    } else {
        $phpmailer->Body = $body;
    }
    
    if(isset($filenames) && count($filenames) > 0) {
        foreach($filenames as $filename) {
            $phpmailer->AddAttachment($filename);      // attachment
        }
    }
    
    if(!$phpmailer->Send()) {
        return $phpmailer->ErrorInfo;
    } else {
        return "";
    }
}

?>
