<?php
require '../../logic/User.php';
require '../../DAL/User_DAL.php';
require '../../logic/Mail.php';
if (isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['usermail'];
    $password = $_POST['userpassword'];
    $passwordRepeat = $_POST['userpasswordretype'];
    $birthday = $_POST['userbirthday'];
    $currentDate = date('Y-m-d');

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($birthday))
    {
        header("Location: ../view/register.php?error=emptyfields");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../view/register.php?error=invalidemail");
        exit();
    }
    elseif ($birthday > $currentDate)
    {
        header("Location: ../view/register.php?error=invaliddate");
        exit();
    }
    elseif ($password != $passwordRepeat)
    {
        header("Location: ../view/register.php?error=passwordnotequal");
        exit();
    }
    else
    {
        $user = new User();
        $mail = new Mail();
        if (!$user->usernameCheck($username)){
            header("Location: ../view/register.php?error=usernameunavaileble");
            exit();
        }
        elseif ($user->emailCheck($email)){
            header("Location: ../view/register.php?error=emailunavaileble");
            exit();
        }
        else{
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user->register($username, $email, $birthday, $hashedPassword, $currentDate);
            $mail->conformationMail();
            header("Location: ../view/succes.php?succes=registered");
            exit();
        }
    }
}
else{
    header("Location: ../view/register.php");
    exit();
}