<?php
require_once 'header.php';
require '../logic/Content.php';
$content = new Content();
$data = $content->GetAllContent('dance');
?>
    <main>
        <!--    Hier roep ik variabele aan die in de logica laag uit de database worden gehaald, ik zet ze dan in de juiste elementen.-->
        <div class = "container">
            <section id="headerdance">
                <h1 class="titel"><?php echo $data[0]->text; ?></h1>
                <h2 class="underTitel"><?php echo $data[1]->text; ?></h2>
            </section>
            <section class="inleiding">
                <h1><?php  ?></h1>
                <p><?php echo $data[2]->text; ?></p>
            </section>
            <article id="Lineup">
                <h1><?php echo $data[3]->text; ?></h1>
                <hr>
                <p><?php  echo $data[4]->text;  ?></p>
            </article>
            <article id="venues">
                <h1><?php  echo $data[5]->text; ?></h1>
                <hr>
                <p><?php  echo $data[6]->text; ?></p>
            </article>
            <!--        Hier maak ik twee knoppen die naar de programpage en ticketpage gaan. Ik geef een variabele event mee in de url zodat op de ticketpagina direct naar het jazz event kan worden genavigeerd.-->
            <section class="navigationbuttons">
                <div id="forms">
                    <form action="tickets.php?event=dance">
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