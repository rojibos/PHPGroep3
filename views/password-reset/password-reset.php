<?php
require_once "../header.php";
?>
    <main>
        <section class="standardFormWrapper">
            <h2>Request password reset.</h2>
            <form action="../../includes/reset-passwordInc.php" class="standardForm" method="post">
                <input type="text" name="email" placeholder="E-mail"><br>
                <input type="submit" name="resetPw" value="Send">
            </form>
            <?php
            if (isset($_GET['error'])) {
                $message = new Message();
                echo $message->errorMessages($_GET['error']);
            }
            ?>
        </section>
    </main>
<?php
require "../footer.php";