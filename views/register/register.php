<?php
require_once '../header.php';
?>
<main>
    <section class="standardFormWrapper">
        <h2>Contact form</h2>
        <form action="../../includes/registerInc.php" class="standardForm" method="post">
            Name: <input type="text" name="username" placeholder="Name">
            E-mail: <input type="text" name="usermail" placeholder="Your E-mail address">
            Date of birth: <input type="date" name="userbirthday">
            Password: <input type="password" name="userpassword">
            Retype Password <input type="password" name="userpasswordretype">
            <input type="submit" name="register" value="Register">
        </form>
</main>
<?php
require_once '../footer.php';