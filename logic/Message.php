<?php
require_once '../DAL/Message_DAL.php';

class Message
{
    private $message_DAL;
    function __construct()
    {
            $this->message_DAL = new Message_DAL();
    }

    function displayMessages($name)
    {
        $message = $this->message_DAL->getMessage($name);
        return $message['message'];
    }

}