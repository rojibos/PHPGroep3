<?php
require 'F:\xampp\htdocs\PHPGroep3\logic\User.php';
$users = new User();
if (isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['userpassword'];

    if (empty($username) || empty($password))
    {
        header("Location: ../views/login.php?error=emptyfields");
        exit();
    }
    else{
        $users->login($username, $password);
        header("Location: ../views/login.php?error=wrongcredentials");
        exit();
    }
}
elseif(isset($_POST['register']))
{
    header("Location: ../views/register.php");
}
