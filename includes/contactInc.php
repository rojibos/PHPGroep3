<?php
require '../logic/mail.php';

$mail = new Mail();
if (isset($_POST['sendMessage']))
{
    if (!isset($_SESSION['username'])){
        $userMail = $_SESSION['userMail'];
        $user = $_SESSION['username'];
    }
    else{
        $userMail = $_POST['email'];
        $user = $_POST['fullname'];
    }

    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (empty($userMail) || empty($user) || empty($subject) || empty($message)){
        header("Location: ../views/contact/contact.php?error=fieldsempty");
        exit();
    }
    elseif (!filter_var($userMail, FILTER_VALIDATE_EMAIL)){
        header("Location: ../views/contact/contact.php?error=invalidmail");
        exit();
    }
    else{
        $mail->contactMessage($userMail, $user, $subject, $message);
        exit();
    }

}