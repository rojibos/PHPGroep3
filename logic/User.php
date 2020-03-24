<?php
require_once 'F:\xampp\htdocs\PHPGroep3/DAL/User_DAL.php';

class User
{
    private $DAL;

    function __construct()
    {
        $this->DAL = new User_DAL();
    }

    function register($username, $email, $birthday, $hashedPassword, $currentdate)
    {
        $rank = 'customer';
        $this->DAL->addUser($email, $username, $hashedPassword, $birthday, $currentdate, $rank);
        return;
    }
    public function usernameCheck($username)
    {
        if (empty($this->DAL->getUser($username)))
        {
            return true;
        }
        else {
            return false;
        }
    }
    public function emailCheck($email)
    {
        if (empty($this->DAL->getUserByEmail($email)))
        {
            return false;
        }
        else {
            return true;
        }
    }
}