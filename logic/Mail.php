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
    function sendResetMail($email, $url)
    {
        $to = $email;
        $subject = "Reset your password";
        $massage = "<p>We have received a password reset request. The link to reset your password in below.</p></br><p>Here is your password reset link: ";
        $massage .= "<a href=".$url.">$url</a></p>";
        $headers = "From: HaarlemFestivalCrew <".MAIL_WEBSITE.">\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";

        mail($to, $subject, $massage, $headers);

        return;
    }
}