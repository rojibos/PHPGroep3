<?php
require_once '../header.php';
?>
<main>
    <section class="standardForm">
        <form action="../../includes/contactInc.com">
            <?php
                if (!isset($_SESSION['username'])){
                    echo '<input type="text" name="fullname" placeholder="Full name"><br>';
                    echo '<input type="text" name="email" placeholder="email"><br>';
                 }
             ?>
            <input type="text" name="subject" placeholder="Subject">
            <input type="text" name="massage" placeholder="Write your message here."><br>
            <input class="submitBtn" type="submit" name="sendMessage" value="Send message">
        </form>
    </section>
</main>
<?php
require_once '../footer.php';