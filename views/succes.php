<?php
require_once 'header.php';
require_once '../logic/Message.php';
$message = new Message();
?>
    <main>
        <section class="succespage">
            <h1>Succes</h1>
            <?php
                if (isset($_GET['message']))
                {
                    echo "<p>".$message->displayMessages($_GET['message'])."<p>";
                }
                else{
                    header('Location: index.php');
                }
                ?>
            <div class="aBtn"><a href="index.php">Return to homepage</a></div>
        </section>
    </main>
<?php
require_once 'footer.php';