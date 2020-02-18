<?php
require_once '../header.php';
?>
<main>
    <section class="standardFormWrapper">
        <h2>Contact form</h2>
        <form action="../../includes/contactInc.php" class="standardForm" method="post">
            <div class="formMessage">
                Message:<br><input type="text" name="message" placeholder="Write your message here.">
            </div>
            <?php
                if (!isset($_SESSION['username'])){
                    echo 'Full name:<br><input type="text" name="fullname" placeholder="Full name"><br>';
                    echo 'E-mail address:<br><input type="text" name="email" placeholder="email"><br>';
                 }
             ?>
            Subject:<br><input type="text" name="subject" placeholder="Subject"><br>

            <input class="submitBtn" type="submit" name="sendMessage" value="Send message">
        </form>
    </section>
</main>
<?php
require_once '../footer.php';