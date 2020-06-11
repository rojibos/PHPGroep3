<?php
require 'header.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//session_unset();
//session_start();
#cart.php - A simple shopping cart with add to cart, and remove links
//---------------------------
//initialize sessions

//Define the products and cost
$products = array();
$amounts = array();
$price = array();
$bedrag= 0;


if (!empty($_SESSION['ticketsCart'])) {
    foreach( $_SESSION["ticketsCart"] as $cart)
    {
        $products[] = $cart->ticketName;
        $price[]=$cart->ticketPrice;
        $amounts[]=$cart->ticketAmount;

//        print_r($products);
//        print_r($price);
//        print_r($amounts);
    }
    for ($i=0; $i< count($products); $i++) {
        $bedrag = $bedrag + ($price[$i] * $amounts[$i]);
    }
//print_r($bedrag);
    echo '<br/>';
//    print_r($_SESSION['ticketsCart']);
//Load up session
    if ( !isset($_SESSION["total"]) ) {
        $_SESSION["total"] = 0;
        for ($i=0; $i< count($products); $i++) {
            $_SESSION["qty"][$i] = $amounts[$i];
            $_SESSION["amounts"][$i] = 0;
        }
    }

//---------------------------
//Reset
    if ( isset($_GET['reset']) )
    {
        if ($_GET["reset"] == 'true')
        {
            unset($_SESSION["qty"]); //The quantity for each product
            unset($_SESSION["amounts"]); //The amount from each product
            unset($_SESSION["total"]); //The total cost
            unset($_SESSION["cart"]); //Which item has been chosen
        }
    }

//---------------------------
//Add
    if ( isset($_GET["add"]) )
    {
        $i = $_GET["add"];
        $qty = $_SESSION["qty"][$i] + 1;
        $_SESSION["amounts"][$i] = $price[$i] * $qty;
        $_SESSION["cart"][$i] = $i;
        $_SESSION["qty"][$i] = $qty;
        $amounts[$i]= $amounts[$i] +1;
    }
//minus
    if ( isset($_GET["take"]) )
    {
        $i = $_GET["take"];
        if( $_SESSION["amounts"][$i]!=0 &&  $_SESSION["qty"][$i] !=0 )
        {
            $qty = $_SESSION["qty"][$i] - 1;
            $_SESSION["amounts"][$i] = $price[$i] * $qty;
            $_SESSION["cart"][$i] = $i;
            $_SESSION["qty"][$i] = $qty;

        }else{

            $_SESSION["amounts"][$i] = 0;
            $_SESSION["qty"][$i] =0;

        }
        if ($_SESSION["qty"][$i]== 0) {
            $_SESSION["amounts"][$i] = 0;
            unset($_SESSION["cart"][$i]);
        }

    }
//---------------------------
    //add to global session
    if ( isset($_GET["overwrite"]) )
    {
        $i=0;
        foreach( $_SESSION["ticketsCart"] as $cart)
        {

                $cart->ticketAmount =   $_SESSION["qty"][$i];
//                echo $cart->ticketAmount+'<br/>';
//            echo   $_SESSION["qty"][$i]+'<br/>';
                 $i = $i+1;
        }
        echo 'Order has been updated';
//        print_r($_SESSION['ticketsCart']);
    }
    //-------------------------
//Delete
    if ( isset($_GET["delete"]) )
    {
        $i = $_GET["delete"];
//        $qty = $_SESSION["qty"][$i];
//        $qty--;
        $_SESSION["qty"][$i] = 0;
        //remove item if quantity is zero
        if ($_SESSION["qty"][$i]== 0) {
            $_SESSION["amounts"][$i] = 0;
            unset($_SESSION["cart"][$i]);
        }
//        else
//        {
//            $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
//        }
    }
    ?>
    <h2>current cart</h2>
    <table>
        <tr>
            <th>Product</th>
            <th width="10px">&nbsp;</th>
            <th>Amount</th>
            <th width="10px">&nbsp;</th>
            <th>Price</th>
            <th width="10px">&nbsp;</th>
            <th>Action</th>
        </tr>
        <?php
        for ($i=0; $i< count($products); $i++) {
            ?>
            <tr>
                <td><?php echo($products[$i]); ?></td>
                <td width="10px">&nbsp;</td>
                <td><?php echo($amounts[$i]); ?></td>
                <td width="10px">&nbsp;</td>
                <td><?php echo($price[$i]); ?></td>
                <td width="10px">&nbsp;</td>
                <td><a href="?add=<?php echo($i); ?>">+</a> <a href="?take=<?php echo($i); ?>">- </a></td>
                <td><a href="?delete=<?php echo($i); ?>">delete ticket</a></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td colspan="5"><a href="?reset=true">Reset Cart</a></td>
        </tr>
    </table>
    <?php
    if ( isset($_SESSION["cart"]) ) {
        ?>
        <br/><br/><br/>
        <h2>changed Cart</h2>
        <table>
            <tr>
                <th>Product</th>
                <th width="10px">&nbsp;</th>
                <th>Qty</th>
                <th width="10px">&nbsp;</th>
                <th>Amount</th>
                <th width="10px">&nbsp;</th>
                <th>total price per ticket</th>
                <th width="10px">&nbsp;</th>
                <th>Action</th>
            </tr>
            <?php
            $total = 0;

            foreach ( $_SESSION["cart"] as $i ) {
                ?>
                <tr>
                    <td><?php echo($products[$i]); ?></td>
                    <td width="10px">&nbsp;</td>
                    <td><?php echo($_SESSION["qty"][$i]); ?></td>
                    <td width="10px">&nbsp;</td>
                    <td><?php echo($price[$i]); ?></td>
                    <td width="10px">&nbsp;</td>
                    <td><?php  echo( $_SESSION["amounts"][$i] ); ?></td>
                    <td width="10px">&nbsp;</td>

                </tr>

                <?php
                $total = $total + $_SESSION["amounts"][$i];
            }
            $_SESSION["total"] = $total;
            ?>

        </table>
        <tr>
            <br>
            <td colspan="7">Total : €<?php echo($total); ?></td>
            <br>
        </tr>
        <br>
        <style>
            .box{
                border: 1px solid #aaa; /*getting border*/
                width: 300px;
                height: 100px;
                border-radius: 4px; /*rounded border*/
                color: #000; /*text color*/
            }
        </style>
        <?php
        $var = 'In case allergies, please let us know here:';
        echo '<textarea class="box">'.$var.'</textarea>';
        ?>
        <br>
        <td><a href="?overwrite=<?php echo($i); ?>">Update order</a></td>
        <br>

        <br>
        <td><li><a href="http://620651.infhaarlem.nl/project/herkansing/public/payment-inf2b/betalen.php">GO TO PAYMENTS</a></li></td>
        <?php
    }
}else{
    ?>
    <p>Shoppingcart is empty.</p>
    <?php
}

?>