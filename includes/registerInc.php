<?php
require '../../logic/User.php';
require '../../logic/Mail.php';
$user = new User();
$mail = new Mail();
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
        header("Location: ../views/register/register.php?error=emptyfields");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../views/register/register.php?error=invalidemail");
        exit();
    }
    elseif ($birthday > $currentDate)
    {
        header("Location: ../views/register/register.php?error=invaliddate");
        exit();
    }
    elseif ($password != $passwordRepeat)
    {
        header("Location: ../views/register/register.php?error=passwordnotequal");
        exit();
    }
    else
    {
        $user = new User();
        $mail = new Mail();
        if (!$user->usernameCheck($username)){
            header("Location: ../views/register/register.php?error=usernameunavaileble");
            exit();
        }
        elseif ($user->emailCheck($email)){
            header("Location: ../views/register/register.php?error=emailunavaileble");
            exit();
        }
        else{
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user->register($username, $email, $birthday, $hashedPassword, $currentDate);
            $conformationMessage = "You have succesfully registered an account for the Haarlem Festival website.<br>If you have any questions or remarks you can send a message trought the contactform. http://hfa3.infhaarlem.nl/views/contact/contact.php";
            $conformationSubject = "Registration HaarlemFestival website";
            $mail->conformationMail($email, $username, $conformationSubject, $conformationMessage);
            header("Location: ../views/succes/succes.php?succes=registered");
            exit();
        }
    }
}
