<?php
    require 'header.php';
?>
<main>
    <!--    Hier roep ik variabele aan die in de logica laag uit de database worden gehaald, ik zet ze dan in de juiste elementen.-->
    <div class = "container">
        <section id="headerjazz">
            <h1 class="titel"><?php ?></h1>
            <h2 class="ondertitel"><?php ?></h2>
        </section>
        <section class="inleiding">
            <h2><?php ?></h2>
            <p><?php  ?></p>
        </section>

        <article id="mainhall">
            <h2><?php  ?></h2>
            <hr>
            <p><?php  ?></p>
        </article>
        <article id="secondhall">
            <h2><?php  ?></h2>
            <hr>
            <p><?php  ?></p>
        </article>
        <article id="thirdhall">
            <h2><?php  ?></h2>
            <hr>
            <p><?php  ?></p>
        </article>
        <article id="grotemarkt">
            <h2><?php  ?></h2>
            <hr>
            <p><?php  ?></p>
        </article>
        <!--        Hier maak ik twee knoppen die naar de programpage en ticketpage gaan. Ik geef een variabele event mee in de url zodat op de ticketpagina direct naar het jazz event kan worden genavigeerd.-->
        <section class="navigationbuttons">
            <div id="forms">
                <form action="ticketpage.php?event=jazz">
                    <button type="submit" class ="gototicketpage" id="gototicketpagejazz">TICKETS</button>
                </form>
                <form action="index.php">
                    <button type="submit" class = "gotoprogrammpage" id="gotoprogrammpagejazz">PROGRAMM</button>
                </form>
            </div>
        </section>
    </div>
</main>
<?php
    require 'footer.php';
?>
