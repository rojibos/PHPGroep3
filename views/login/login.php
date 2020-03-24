<?php
require_once '../header.php';
require_once '../../includes/loginInc.php';
?>
    <main>
        <section class="standardFormWrapper">
            <h2>Login</h2>
            <form action="../../includes/loginInc.php" class="standardForm" method="post">
                Name: <input type="text" name="username" placeholder="Name"><br>
                Password: <input type="password" name="userpassword" placeholder="******"><br>
                <input type="submit" name="login" value="Login">
            </form>
    </main>
<?php
require_once '../footer.php';