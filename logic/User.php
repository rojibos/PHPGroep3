<?php


class User
{
    private $DAL;

    function __construct()
    {
        $this->DAL = new User_DAL();

    }
    function register($username, $email, $birthday, $hashedPassword, $currentdate)
    {
        $this->addUser($username, $email, $birthday, $hashedPassword, $currentdate);
        return;
    }
}