<?php
require_once 'F:\xampp\htdocs\PHPGroep3/DAL/Database.php';

class User_DAL extends Database
{
    function getUserPassword($username)
    {
        $sql = "SELECT name, password, email, rank FROM user WHERE name = :username ";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}