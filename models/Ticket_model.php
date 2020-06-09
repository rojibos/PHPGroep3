<?php

class Ticket_Model
{
    private $ticketId;
    private $ticketName;
    private $ticketAmount;
    private $ticketPrice;

    function __construct($ticketId, $ticketName, $ticketAmount, $ticketPrice)
    {
        $this->ticketId = $ticketId;
        $this->ticketName = $ticketName;
        $this->ticketAmount = $ticketAmount;
        $this->ticketPrice = $ticketPrice;
    }

}
