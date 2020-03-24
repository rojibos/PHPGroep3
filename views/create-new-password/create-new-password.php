<?php
require_once "../header.php";
?>
    <main>
        <section class="standardFormWrapper">
            <h2>Create new password.</h2>
            <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if (empty($selector) || empty($validator))
            {
                echo "could not validate your request.";
            }
            else{
                if (ctype_xdigit($selector) == true && ctype_xdigit($validator) == true)
                {
                    ?>
                    <form class="standardform" action="../includes/create-new-password.inc.php" method="post">
                        <input type="hidden" name="selector" value="<?php echo $selector;?>">
                        <input type="hidden" name="validator" value="<?php echo $validator;?>">
                        <input type="password" name="password" placeholder="New password"><br>
                        <input type="password" name="password-repeat" placeholder="Repeat new password"><br>
                        <input type="submit" name="resetSubmit" value="Reset your password.">

                    </form>
                    <?php

                }
            }
            if (isset($_GET['error'])) {
                $message = new Messages();
                echo $message->errorMessages($_GET['error'], $_SESSION['language']);
            }
            ?>
            </form>
        </section>
    </main>
<?php
require "../footer.php";