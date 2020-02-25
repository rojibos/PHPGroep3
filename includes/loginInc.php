<?php
$username = 'frank';

session_start();
$_SESSION['username'] = $username;
header("Location: ../views/dance/dance.php");
