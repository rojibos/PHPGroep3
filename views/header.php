<?php
//require '../public/paths/path.php';
require '../logic/Message.php';
session_start();
?>
<html>
<head>
    <title>Haarlem Festival</title>
    <link rel="stylesheet" type="text/css" href="../public/css/default.css">
</head>
<body>
<header>
    <nav id="mainNav">
        <a href="http://instagram.com" class="socialLink"><img src="../public/images/insta.png"></a>
        <a href="http://facebook.com" class="socialLink"><img src="../public/images/facebook.png"></a>
        <a href="http://twitter.com" class="socialLink"><img src="../public/images/twitter.png" alt=""></a>
        <a href="../views/index.php" id="logo">HAARLEM FESTIVAL</a>

        <?php
        if (isset($_SESSION['username'])){
            ?>
                <div class="userMenu">
                    <button class="userMenuBtn"><img src="../public/images/usermenu.png"></button>
                    <div class="userMenuContent">
                        <a href="dance/dance.php">Profile</a>
                        <a href="../includes/logoutInc.php">Logout</a>
                    </div>
                </div>
            <?php
        }
        else{
            echo '<a href="login.php" id="login">Sign in</a>';
        }
        ?>


        <a href="cart.php"><img src="../public/images/cart.png" id="cartBtn"></a>
        <ul>
            <?php
            echo '<li><a href="../views/contact.php">Contact</a></li>';
            echo '<li><a href="../views/tickets.php">Tickets</a></li>';
            echo '<li><a href="../views/program.php">Programme</a></li>';
            ?>
            <div class="eventMenu">
                <button class="eventMenuBtn">Events</button>
                <div class="eventMenuContent">

                    <a href="../views/dance.php">Dance</a>
                    <a href="../views/jazz.php">Jazz</a>
                    <a href="../views/food.php">Food</a>

                </div>
            </div>
            <li><a href="../views/index.php">Home</a></li>
        </ul>

    </nav>
</header>