<?php
require '../logic/Mail.php';
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
        header("Location: ../views/contact.php?message=fieldsempty");
    }
    elseif (!filter_var($userMail, FILTER_VALIDATE_EMAIL)){
        header("Location: ../views/contact.php?message=invalidmail");
    }
    elseif(!empty($userMail)){
        $mail = new Mail();
        $mail->contactMail($userMail, $user, $subject, $message);
    }
}
