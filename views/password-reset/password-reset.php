<?php
require_once "../header.php";
?>
    <main>
        <section id="Reset your password.">
            <h1>Request password reset.</h1>
            <form class="standardform" action="../includes/reset-password.inc.php" method="post">
                <input type="text" name="email" placeholder="E-mail"><br>
                <input type="submit" name="resetPw">
            </form>
            <?php
            if (isset($_GET['error'])) {
                $message = new Messages();
                echo $message->errorMessages($_GET['error'], $_SESSION['language']);
            }
            ?>
        </section>
    </main>
<?php
require "../footer.php";