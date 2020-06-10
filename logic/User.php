<?php
require_once '../DAL/User_DAL.php';

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
        if (empty($this->DAL->getUser($username))) {
            return true;
        } else {
            return false;
        }
    }

    public function emailCheck($email)
    {
        if (empty($this->DAL->getUserByEmail($email))) {
            return false;
        } else {
            return true;
        }
    }

    public function login($username, $password)
    {

        $user = $this->DAL->getUserPassword($username);
        if ($user != null) {
            $pwCheck = password_verify($password, $user['password']);

            if ($pwCheck == true) {
                session_start();
                if ($user['rank'] != 'customer') {

                    $_SESSION['user'] = (object)["id" => $user['user_id'], "name" => $user['name'], "rank" => $user['rank']];
                    $_SESSION['loggedIn'] = true;
                    if (isset($_COOKIE['rUrl'])) {
                        $url = $_COOKIE['rUrl'];
                        unset($_COOKIE['rUrl']);
                        setcookie('rUrl', null, -1, '/');
                        header("Location: " . $url);
                        exit();
                    }
//                    print_r($_SESSION['user']);
//                    exit();
                    header("Location: ../../dashboard");
                    exit();
                } else {
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['rank'] = $user['rank'];
                    header("location: ../views/index.php");
                    exit();
                }
            }
        } else {
            return;
        }
    }

    public
    function changePassword($email, $password)
    {
        $this->DAL->updatePassword($email, $password);
    }
}