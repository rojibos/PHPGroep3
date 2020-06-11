<?php

$link = mysqli_connect("localhost", "hfa3", "vlbEv6Vs", "hfa3_db");
$sql = "INSERT INTO `order` (`order_id`, `user_id`, `date_time`) VALUES ('175', '8', '2020-07-28 21:00:0')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
header( "refresh:3;url=http://620651.infhaarlem.nl/project/herkansing/views/succes.php?message=ordersucces" );
?>
