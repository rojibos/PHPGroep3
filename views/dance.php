<?php
require_once 'header.php';
require '../logic/Content.php';
$content = new Content();
$data = $content->GetAllContent('dance');
?>
    <main>
        <!--    Hier roep ik variabele aan die in de logica laag uit de database worden gehaald, ik zet ze dan in de juiste elementen.-->
        <div class = "container">
            <section id="headerjazz">
                <h1 class="titel"><?php echo $data[0]->text; ?></h1>
            </section>
            <section class="inleiding">
                <h2><?php  ?></h2>
                <p><?php echo $data[1]->text; ?></p>
            </section>

            <article id="mainhall">
                <h2><?php echo $data[2]->text; ?></h2>
                <hr>
                <p><?php  echo $data[3]->text;  ?></p>
            </article>
            <article id="secondhall">
                <h2><?php  echo $data[4]->text; ?></h2>
                <hr>
                <p><?php  echo $data[5]->text; ?></p>
            </article>
            <article id="thirdhall">
                <h2><?php  echo $data[6]->text; ?></h2>
                <hr>
                <p><?php  echo $data[7]->text; ?></p>
            </article>
            <article id="grotemarkt">
                <h2><?php  echo $data[8]->text; ?></h2>
                <hr>
                <p><?php  echo $data[9]->text; ?></p>
            </article>
            <!--        Hier maak ik twee knoppen die naar de programpage en ticketpage gaan. Ik geef een variabele event mee in de url zodat op de ticketpagina direct naar het jazz event kan worden genavigeerd.-->
            <section class="navigationbuttons">
                <div id="forms">
                    <form action="../tickets/ticketpage.php?event=jazz">
                        <button type="submit" class ="gototicketpage" id="gototicketpagejazz">TICKETS</button>
                    </form>
                    <form action="program.php">
                        <button type="submit" class = "gotoprogrammpage" id="gotoprogrammpagejazz">PROGRAMM</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
<?php
require_once 'footer.php';