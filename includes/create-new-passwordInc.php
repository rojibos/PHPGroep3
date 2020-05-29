<?php
require_once '../logic/User.php';
require_once '../logic/Password.php';
require_once '../logic/Mail.php';
$users = new User();
$resetPassword = new Password();
if (isset($_POST['resetSubmit']))
{
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['password'];
    $passwordCheck = $_POST['password-repeat'];
    $currentDate = date("U");
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    if (empty($password) || empty($passwordCheck))
    {
        header("Location: ../views/create-new-password.php?message=emptyfields&selector=".$selector."&validator=".$validator);
    }
    elseif ($password != $passwordCheck)
    {
        header("Location: ../views/create-new-password.php?message=passwordnotequal&selector=".$selector."&validator=".$validator);
    }
    elseif (empty($reset = $resetPassword->validateToken($selector, $validator, $currentDate)))
    {
        header("Location: ../views/login.php?message=wrongtoken");
    }
    else{

        $users->changePassword($reset['resetMail'], $hashedPwd);
        $resetPassword->deleteToken($reset['resetMail']);
        header("Location: ../views/succes.php?message=passwordchanged");
    }
    exit();
}
//else{
//    header("Location: ../view/index.php");
//}