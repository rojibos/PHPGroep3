<?php
require_once '../models/Ticket_Model.php';
session_start();
if (isset($_POST['add']) && $_POST['amount'] > 0)
{
    if (!isset($_SESSION['ticketsCart'])) {
        $_SESSION['ticketsCart'] = array();
        $ticket = new Ticket_Model($ticketId = $_GET['addticket'], $ticketName = $_GET['ticket'], $ticketAmount = $_POST['amount'], $ticketPrice = $_POST['price']);
        $_SESSION['ticketsCart'][] = $ticket;
        header("Location: ../views/tickets.php");
    }
    else{
        $ticket = new Ticket_Model($ticketId = $_GET['addticket'], $ticketName = $_GET['ticket'], $ticketAmount = $_POST['amount'], $ticketPrice = $_POST['price']);
        $_SESSION['ticketsCart'][] = $ticket;
        header("Location: ../views/tickets.php?ticketid=".$_GET['addticket']."&ticketname=".$_GET['ticket']);
        exit();
    }
}
else{
    header("Location: ../views/tickets.php?message=minusticketamount");
    exit();
}