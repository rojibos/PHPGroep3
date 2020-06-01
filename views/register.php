<?php
require_once 'header.php';
require_once '../includes/registerInc.php';
require_once '../logic/Message.php';
$message = new Message();
?>
<main>
    <section class="standardFormWrapper">
        <h2>Register</h2>
        <form action="../includes/registerInc.php" class="standardForm" method="post">
            Name: <input type="text" name="username" placeholder="Name"><br>
            E-mail: <input type="text" name="usermail" placeholder="Your E-mail address"><br>
            Date of birth: <input type="date" name="userbirthday"><br>
            Password: <input type="password" name="userpassword" placeholder="******"><br>
            Retype Password <input type="password" name="userpasswordretype" placeholder="******"><br>
            <input type="submit" name="register" value="Register">
            <?php
            if (isset($_GET['message'])) {
                echo '<p style="color:#FF0000";>'.$message->displayMessages($_GET['message']).'</p>';
            }
            ?>
        </form>
    </section>
</main>
<?php
require_once 'footer.php';