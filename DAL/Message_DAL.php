<?php
require_once 'Database.php';

class Message_DAL extends Database
{
    function getMessage($name)
    {
        $sql = "SELECT name, message FROM message WHERE name = :name";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['name' => $name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}