<?php
require_once 'Database.php';

class Order_DAL extends Database
{
    function insertOrder($userId, $currentDate)
    {
        $sql = "INSERT INTO `order`(`user_id`, `date_time`) VALUES (:userId, :currentDate )";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['userId' => $userId, 'currentDate'=>$currentDate]);
        return;
    }
    function getOrderDesc($userId)
    {
        $sql = "SELECT `order_id` FROM `order` WHERE user_id = :userId ORDER BY `date_time` DESC";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        return;
    }
    function insertTicketOrder($orderId, $ticketId, $amount, $price)
    {
        $sql = "INSERT INTO `ticket_order`(`order_id`, `ticket_id`, `amount`, `price`) VALUES (:orderId, :ticketId, :amount, :price)";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['orderId' => $orderId, 'ticketId'=>$ticketId, 'amount'=>$amount, 'price'=>$price]);
        return;
    }

}