<?php
require 'F:\xampp\htdocs\PHPGroep3/DAL/Database.php';

class User_DAL extends Database
{
    function getUser($username)
    {
        $sql = "SELECT name, email, date_of_birth FROM user WHERE name = :username";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function getUserByEmail($email)
    {
        $sql = "SELECT name, password FROM user WHERE email = :email";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function addUser($email, $username, $password, $birthday, $currentDate, $rank)
    {
        $sql = "INSERT INTO user (email, name, password, date_of_birth, date_of_registration, rank) VALUES (:email, :name, :password, :dateofbirth, :registrationdate, :rank)";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['email'=> $email, 'name' => $username, 'password' =>$password, 'dateofbirth' => $birthday, 'registrationdate' => $currentDate, 'rank' => $rank]);
        return;
    }

}