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
//
//    function displayMessages($name)
//    {
//        $message = '';
//            switch ($type) {
//                case 'emptyfields';
//                {
//                    $message = '<p class="errormessage">Error: Not all fields are filled in.</p>';
//                    break;
//                }
//                case 'invalidemail';
//                {
//                    $message = '<p class="errormessage">Error: E-mail is invalid.</p>';
//                    break;
//                }
//                case 'wrongcredentials';
//                {
//                    $message = '<p class="errormessage">Error: The provided credentials are invalid.</p>';
//                    break;
//                }
//                case 'passwordnotequal';
//                {
//                    $message = '<p class="errormessage">Error: Passwords dont match.</p>';
//                    break;
//                }
//                case 'usernameunavaileble';
//                {
//                    $message = '<p class="errormessage">Error: Username is unavailable.</p>';
//                    break;
//                }
//                case 'emailunavaileble';
//                {
//                    $message = '<p class="errormessage">Error: E-mail is already in use.</p>';
//                    break;
//                }
//                case 'noemail';
//                {
//                    $message = '<p class="errormessage">Error: No account was found with the provided E-mail address.</p>';
//                    break;
//                }
//                case 'invaliddate';
//                {
//                    $message = '<p class="errormessage">Error: Incorrect date.</p>';
//                    break;
//                }
//                case 'wrongtoken';
//                {
//                    $message = '<p class="errormessage">Error: The password reset-link is invalid.</p>';
//                    break;
//                }
//            }
//        return $message;
//    }
//    function succesMessages($type)
//    {
//        $message = '';
//            switch ($type)
//            {
//                case 'registered';
//                {
//                    $message = '<p>Succes! You have succesfully registered an account.</p>';
//                    break;
//                }
//                case 'passwordchanged';
//                {
//                    $message = '<p>Succes! Your password has been changed succesfully. You can now login using your new password.</p>';
//                    break;
//                }
//                case 'emailsend';
//                {
//                    $message = '<p>Succes! We have send an email to the provided email address. Click the link in the email to reset your password.</p>';
//                    break;
//                }
//                case 'profilechange';
//                {
//                    $message = '<p>Succes! Your profile has been updated succesfully. A conformation mail has been send to your E-mail address.</p>';
//                    break;
//                }
//            }
//        return $message;
//        }
//
}