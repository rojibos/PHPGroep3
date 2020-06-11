<?php

$link = mysqli_connect("localhost", "hfa3", "vlbEv6Vs", "hfa3_db");
$sql = "INSERT INTO `order` (`order_id`, `user_id`, `date_time`) VALUES ('8', '2020-07-28 21:00:0')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
header( "Location: http://hfa3.infhaarlem.nl/PHPGroep3/views/succes.php?message=ordersucces" );
?>