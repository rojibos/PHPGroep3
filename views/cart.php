<?php
static $totalPrice;
$price=0;
$times=0;
require 'header.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
print_r($totalPrice);
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

                ?>
                <tr>
                    <?php
                    ?>

                    <th><?php echo $row->ticketName?></th>
                    <th><?php echo $row->ticketAmount?></th>
                    <th>€<?php echo $row->ticketPrice?></th>
                    <input type="number" name="quantity" min="1" max="50" value="<?php echo $row->ticketAmount["quantity"]; ?>">
                    <?php if($row->ticketName='B2B Nicky Romero') {

                        $row->ticketAmount = '40';

                    }?>
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
                <?php
                foreach ($_SESSION['ticketsCart'] as $pPrice) {
                $price = $pPrice->ticketPrice;
                $times= $pPrice->ticketAmount;
                $totalPrice = $price * $times;
                    print_r($totalPrice);
            }

                    ?>
                window.open("cart.php")
            }
        </script>

    </main>

<?php
require 'footer.php';


