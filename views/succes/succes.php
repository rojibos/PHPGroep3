<?php
require_once '../header.php';
?>
    <main>
        <section>
            <h1>Succes</h1>
            <?php
                if (isset($_GET['succes']))
                {
                    $message = new Messages();
                echo $message->succesMessages($_GET['succes'], $_SESSION['language']);
                }
                else{
                    header('Location: index.php');
                }
                ?>
            <div class="aBtn"><a href="index.php">Return to homepage</a></div>
        </section>
    </main>
<?php
require_once '../footer.php';