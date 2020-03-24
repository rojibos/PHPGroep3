<?php
require_once 'F:\xampp\htdocs\PHPGroep3/DAL/Password_DAL.php';

class Password
{
    private $DAL;

    function __construct()
    {
        $this->DAL = new Password_DAL();
    }

//    verwijderd een token als deze al bestaat.
    public function deleteToken($userEmail)
    {
        $this->DAL->deleteTokenRow($userEmail);
        return;
    }
//    Voegt een token toe aan de database voor de user.
    public function addToken($userEmail, $selector, $hashedToken, $expirationDate)
    {
        $this->DAL->insertToken($userEmail, $selector, $hashedToken, $expirationDate);
        return;
    }
//    check of de token geldig is
    public function validateToken($selector, $validator, $expirationDate)
    {
        $resetToken = $this->DAL->getToken($selector, $expirationDate);
        if (empty($resetToken))
        {
            return false;
        }
        else {
            $token = hex2bin($validator);
            $tokenCheck = password_verify($token, $resetToken['resetToken']);
            if ($tokenCheck == false)
            {
                return null;
            }
            else{
                return $resetToken;
            }
        }
    }
}