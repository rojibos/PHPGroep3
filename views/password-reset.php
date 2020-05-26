<?php
require_once "header.php";
?>
    <main>
        <section class="standardFormWrapper">
            <h2>Request password reset.</h2>
            <form action="../includes/reset-passwordInc.php" class="standardForm" method="post">
                <input type="text" name="email" placeholder="E-mail"><br>
                <input type="submit" name="resetPw" value="Send">
            </form>
            <?php
            if (isset($_GET['message'])) {
                $message = new Message();
                echo $message->displayMessages($_GET['message']);
            }
            ?>
        </section>
    </main>
<?php
require "footer.php";