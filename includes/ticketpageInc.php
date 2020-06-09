<?php
require '../models/Ticket_model.php';
session_start();

if (isset($_POST['add']) && $_POST['amount'] > 0)
{
    if (!isset($_SESSION['ticketsCart'])) {
        $_SESSION['ticketsCart'] = array();
       // $item = array("ticketId" => $_GET['addticket'], "amount" => $_POST['amount'], "price"=>$_POST['price']);
        $ticket = new Ticket_model($ticketId = $_GET['addTicket'], $ticketName = $_GET['ticket'], $ticketAmount = $_POST['amount'], $ticketPrice = $_POST['price']);
        $_SESSION['ticketsCart'][] = $ticket;
        header("Location: ../views/tickets.php");
    }
    else{
        $ticket = new Ticket_model($ticketId = $_GET['addTicket'], $ticketName = $_GET['ticket'], $ticketAmount = $_POST['amount'], $ticketPrice = $_POST['price']);
       // $item = array("ticketId" => $_GET['addTicket'], "amount" => $_POST['amount'], "price"=>$_POST['price']);
        $_SESSION['ticketsCart'][] = $ticket;
        header("Location: ../views/tickets.php?ticketid=".$_GET['addTicket']."&ticketname=".$_GET['ticket']);
    }
}
else{
    return;
}