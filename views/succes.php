<?php
require_once 'header.php';
require_once 'F:\xampp\htdocs\PHPGroep3/logic/Message.php';
$message = new Message();
?>
    <main>
        <section>
            <h1>Succes</h1>
            <?php
                if (isset($_GET['succes']))
                {
                    echo $message->succesMessages($_GET['succes'], $_SESSION['language']);
                }
                else{
                    header('Location: index.php');
                }
                ?>
            <div class="aBtn"><a href="../index/index.php">Return to homepage</a></div>
        </section>
    </main>
<?php
require_once 'footer.php';