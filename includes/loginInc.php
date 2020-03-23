<?php
session_start();

$user = $_POST['username'];
$pass = $_POST['userpassword'];


header("Location: ../views/index/index.php");
