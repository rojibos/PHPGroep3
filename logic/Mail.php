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
    function OrderMail($userMail, $url){
        $to = $userMail;
        $headers = "From: HaarlemFestivalCrew <".MAIL_WEBSITE.">\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
        $subject = "Your ticket order.";
        $message = "Thank you for your purchase.<br>Your invoice/tickets link: <a>". $url. "</a><br><br>Haarlem Festival Crew";
        mail($to, $subject, $message, $headers);
        return;
    }
    function contactMail($userMail, $user, $userSubject, $userMessage)
    {
        $to = MAIL_WEBSITE;
        $headers = "From: " . $user . " <" . $userMail . ">\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
        $subject = "Contact Mail";
        $message = "Contact message from: ". $user . "\r\n";
        $message .= "E-mail: " . $userMail . "\r\n";
        $message .= "About: " . $userSubject . "\r\n";
        $message .= "Message: " . $userMessage;

        mail($to, $subject, $message, $headers);

        return;
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