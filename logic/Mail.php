<?php
define('MAIL_WEBSITE', 's632145@632145.infhaarlem.nl');

class Mail
{
    function conformationMail($userMail, $user, $subject, $coreMessage){
        $to = $userMail;
        $headers = "From: HaarlemFestivalCrew <".MAIL_WEBSITE.">\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
        $message = $coreMessage. "<br><br>Haarlem Festival Crew";
        mail($to, $subject, $message, $headers);
        return;
    }
    function contactMail($userMail, $user, $subject, $message)
    {
        $to = MAIL_WEBSITE;
        $headers = "From: " . $user . " <" . $userMail . ">\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $message, $headers);

        $conformationMassage = "Your message has been submitted. We will respond as soon as possible.";
        $conformationSubject = "Message send";
    }

}