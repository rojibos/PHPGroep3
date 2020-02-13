<?php
require_once '../../includes/ticketpageInc.php';
require_once '../../logic/Ticket.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION['username'] = 'frank';
    //session_destroy();
}
?>
<html>
<head>
    <title>Haarlem Festival</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/default.css">
</head>
<body>
<header>
    <nav id="mainNav">
        <a href="http://instagram.com" class="socialLink"><img src="../../public/images/insta.png"></a>
        <a href="http://facebook.com" class="socialLink"><img src="../../public/images/facebook.png"></a>
        <a href="http://twitter.com" class="socialLink"><img src="../../public/images/twitter.png" alt=""></a>
        <a href="index/index.php" id="logo">HAARLEM FESTIVAL</a>

        <?php
        if (isset($_SESSION['username'])){
            ?>
                <div class="userMenu">
                    <button class="userMenuBtn"><img src="../../public/images/usermenu.png"></button>
                    <div class="userMenuContent">
                        <a href="dance/dance.php">Profile</a>
                        <a href="dance/dance.php">Logout</a>
                    </div>
                </div>
            <?php
        }
        else{
            echo '<a href="login/login.php" id="login">Sign in</a>';
        }
        ?>


        <a href="cart/cart.php"><img src="../../public/images/cart.png" id="cartBtn"></a>
        <ul>
            <li><a href="dance/dance.php">Contact</a></li>
            <li><a href="dance/dance.php">Tickets</a></li>
            <li><a href="dance/dance.php">Programme</a></li>
            <li><a href="dance/dance.php">Events</a></li>
            <li><a href="dance/dance.php">Home</a></li>
        </ul>

    </nav>
</header>