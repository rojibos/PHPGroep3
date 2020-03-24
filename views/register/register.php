<?php
require_once '../header.php';
require_once '../../includes/registerInc.php';
?>
<main>
    <section class="standardFormWrapper">
        <h2>Register</h2>
        <form action="../../includes/registerInc.php" class="standardForm" method="post">
            Name: <input type="text" name="username" placeholder="Name"><br>
            E-mail: <input type="text" name="usermail" placeholder="Your E-mail address"><br>
            Date of birth: <input type="date" name="userbirthday"><br>
            Password: <input type="password" name="userpassword" placeholder="******"><br>
            Retype Password <input type="password" name="userpasswordretype" placeholder="******"><br>
            <input type="submit" name="register" value="Register">
        </form>
</main>
<?php
require_once '../footer.php';