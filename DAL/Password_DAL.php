<?php
require 'Database.php';

class Password_DAL extends Database
{
    function deleteTokenRow($userMail)
    {
        $sql = "DELETE FROM passwordreset WHERE resetMail = :userMail";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['userMail'=>$userMail]);
        return;
    }
    function insertToken($userEmail, $selector, $hashedToken, $expirationDate)
    {
        $sql = "INSERT INTO passwordreset (resetMail, resetSelector, resetToken, resetExpires)VALUES (:userEmail , :selector , :token , :expirationDate)";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['userEmail' => $userEmail, 'selector' => $selector, 'token' => $hashedToken, 'expirationDate' => $expirationDate]);
        return;
    }
    function getToken($selector, $expirationDate)
    {
        $sql = "SELECT resetMail, resetSelector, resetToken FROM passwordreset WHERE resetSelector= :selector AND resetExpires >= :expirationDate ";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['selector' => $selector, 'expirationDate' => $expirationDate]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}