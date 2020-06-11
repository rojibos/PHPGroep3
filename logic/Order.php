<?php
require_once '../DAL/Order_DAL.php';
require_once 'User.php';
class Order
{
    private $DAL;

    function __construct()
    {
        $this->DAL = new Order_DAL();
    }

    function createOrder()
    {
        $user = new User();
        $date = new DateTime();
        $currentDate = $date->format('y-m-d H:i:s');
        $user = $user->getCompleteUser($_SESSION['username']);
        $this->DAL->insertOrder($user['user_id'], $currentDate);
        $orders = $this->DAL->getOrderDesc($user['user_id']);
        foreach ($_SESSION['ticketsCart'] as $row)
        {
            $this->DAL->insertTicketOrder($orders[0], $row->ticketId, $row->ticketAmount, $row->ticketAmount*$row->ticketAmount);
        }
        $mail = new Mail();
        $mail->OrderMail($_SESSION['email'], 'http://www.hfa3.infhaarlem.nl/invoice/generatePdf/'.$orders[0]);
        return;
    }
}