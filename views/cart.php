<?php
require 'header.php';
require '../models/Ticket_model.php';
?>
<section>
    <?php
    print_r($_SESSION['ticketsCart'])
    ?>

</section>
<?php
require 'footer.php';