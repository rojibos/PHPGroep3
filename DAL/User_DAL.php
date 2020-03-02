<?php
require 'Database.php';

class User_DAL extends Database
{
    protected function addUser($username, $email, $birthday, $password, $currentDate)
    {
        $sql = "INSERT INTO user (name, email, password, date_of_birth, date_of_registration) VALUES (:name, :email, :password, :dateofbirth, :registrationdate)";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['user' => $username, 'email'=> $email, 'password' =>$password, 'dateofbirth' => $birthday, 'registrationdate' => $currentDate]);
        return;
    }
}