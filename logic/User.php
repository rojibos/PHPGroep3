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
    public function login($username, $password)
    {
        $userDAL = new User_DAL();
        $user = $userDAL->getUserPassword($username);
        if ($user != null)
        {
            $pwCheck = password_verify($password, $user['password']);
            if ($pwCheck == true)
            {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $user['email'];
                $_SESSION['rank'] = $user['rank'];
                if ($_SESSION['rank'] = 'customer'){
                    header("location: ../views/dance/dance.php?login=succes");
                }
                else{
                    header("location: ../views/dance/dance.php?login=succes");
                }
                exit();
            }
            else{
                return;
            }
        }
        else
        {
            return;
        }
    }
}