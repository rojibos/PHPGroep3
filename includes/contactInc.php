<?php
require '../logic/Mail.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['sendMessage']))
{
    if (isset($_SESSION['username'])){
        $userMail = $_SESSION['email'];
        $user = $_SESSION['username'];
    }
    else{
        $userMail = $_POST['email'];
        $user = $_POST['fullname'];
    }

    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (empty($userMail) || empty($user) || empty($subject) || empty($message)){
        header("Location: ../views/contact.php?message=emptyfields");
        exit();
    }
    elseif (!filter_var($userMail, FILTER_VALIDATE_EMAIL)){
        header("Location: ../views/contact.php?message=invalidmail");
        exit();
    }
    else{
        $mail = new Mail();
        $mail->contactMail($userMail, $user, $subject, $message);
        header("Location: ../views/succes.php?message=contactsend");
    }
}

