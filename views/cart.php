<?php
$price=0;
$times=0;
 $totalPrice='1.00';
 $counter=0;
 $amountArray=array();
require 'header.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//header("refresh: 1;");
//session_unset();
?>

    <main>
        <table>

            <?php
            if (!empty($_SESSION['ticketsCart'])) {
            ?>
            <tr>
               <th>event</th><th>amount</th><th>price</th>
            </tr>
            <?php

            foreach ($_SESSION['ticketsCart'] as $row) {


               // echo $row->ticketAmount;
                ?>
                <tr>
                    <?php
                    $input =  $row->ticketAmount;

                    ?>

                    <th><?php echo $row->ticketName?></th>

                    <form method="post" action="cart.php">

                    <th>€<?php echo $row->ticketPrice?></th>
                    <th><input name = 0 min="1" max="50" value="<?php echo $input; ?>">
                        <input type="submit" value="change" onClick="location.reload();;"/>

                    </th>
                    </form>

                    <?php

                    $amountArray[$counter] = $input;
                    echo   $amountArray[$counter] ;
                    if($counter==0){

                        if(isset($_POST[0]) && !empty($_POST[0]))
                    {
                        //echo $_POST[0];
                        $name = $_POST[0];
//                        ``echo $counter;
//                        ``echo $name;
                        $row->ticketAmount = $name;
//
//                        header("Refresh:0");
                    }}

                   ++$counter;



                    ?>
                </tr>

                <?php

            }

            ?>
        </table>


        <?php
        }
        else{
            ?>
            <p>Shoppingcart is empty.</p>
            <?php
        }

        ?>
        <button onclick="myFunction()">Click me</button>
        <script>
            function myFunction() {



            }


                window.open("cart.php")
            }
        </script>

    </main>

<?php
require 'footer.php';


