<?php
require_once '../../logic/User.php';
require_once '../../logic/Password.php';
require_once '../../logic/Mail.php';
$users = new User();
$resetPassword = new Password();
$email = new Mail();
if (isset($_POST['resetPw']))
{
    $userEmail = $_POST['email'];

    $selectorBytes = mt_rand(10000000,99999999);
    $selector = bin2hex($selectorBytes);
    $token = mt_rand(100000000000000000000000000000000,99999999999999999999999999999999);
    $urlPasswordReset = "www.hfa3.infhaarlem.nl/views/create-new-password/create-new-password.php?selector=" . $selector . "&validator=" .bin2hex($token);

    $expirationDate = date("U") + 1800;

    $resetPassword->deleteToken($userEmail);

    $hashedToken = password_hash($token, PASSWORD_DEFAULT);

    $resetPassword->addToken($userEmail, $selector, $hashedToken, $expirationDate);



    if (empty($userEmail))
    {
        header("Location: ../views/password-reset/password-reset.php?error=emptyfields");
        exit();
    }
    else{
        if($users->emailCheck($userEmail))
        {
            $email->sendResetMail($userEmail, $urlPasswordReset);
            header("Location: ../views/succes/succes.php?succes=emailsend");
        }
        else
        {
            header("Location: ../views/password-reset/password-reset.php?error=noemail");
        }

        exit();
    }
}
//else{
//    header("Location: ../views/login/login.php");
//    exit();
//}