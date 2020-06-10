<?php
require 'header.php';
?>

<main>

    <div id="indextop">
        <!--        In deze div staat het bovenste scherm van de index pagina.-->
        <!--        Het bevat knoppen naar de ticketpagina en een knop om automatisch naar de onderste pagna van de indexpagina te scrollen.-->
        <!--        Tussen de script tags staat hoe ik dat gedaan heb.-->
        <div id="column">
            <section id="logohaarlem"></section>
            <h1 class="titel" id="indextitle">HAARLEM FESTIVAL</h1>
            <h2 class="ondertitel" id="indexUnderTitle">25TH - 30TH JULY</h2>
            <section>
                <button class="gototicketpage" onclick="GoToPage('tickets')">TICKETS</button><button class="gotoprogrammpage" onclick="GoToPage('programm')">PROGRAMM</button>
            </section>
            <img src="../public/images/moreinfo2.png" id="moreinfo" onclick="ScrollWin()">
            <script>
                function ScrollWin(){
                    window.scrollBy(0, 740);
                }
            </script>
        </div>
    </div>
    <div id="indexbottom">
        <!--        In deze div staat het onderste scherm van de index pagina.-->
        <!--        Hier zijn vier images clickable gemaakt die je naar de verschillende eventpages verwijzen.-->
        <!--        Ook vanuit dit scherm kun je naar de ticketpagina.-->
        <section id="indexintro">
            <h2>Haarlem Festival</h2>
            <hr class="indexintrosplit">
            <p>The Haarlem festival has for years been a main event of the city. People young and old can enjoy the different sides of the city with the help of different event. If you like music and dancing then there is a dance events for teenagers and Jazz events for the older people or mix it up. You want to see the different monuments of the city then join the historic walks that take you through the city. Incase you want to take a break or want to eat something, then there are different restaurants and cafe's that offer the possebility to book a spot. Also for the little ones are some small kids events that they can enjoy.</p>
        </section>
        <section id="indexnav">
            <button class="gototicketpage" onclick="GoToPage('tickets')">TICKETS</button><button class="gotoprogrammpage" onclick="GoToPage('programm')">PROGRAMM</button>
        </section>
        <section id="indexselectionmenu">
            <h3 class="h3">Events haarlem Festival</h3>
            <hr class="indexintrosplit">

            <div id="clickables">
                <div id="jazztext"><img src="../public/images/jazztickets.png" class="eventchose" id="jazzclick" onclick='GoToPage("jazz")'><h4>JAZZ</h4></div>
                <div id="dancetext"><img src="../public/images/dancetickets.png" class="eventchose" id="danceclick" onclick='GoToPage("dance")'><h4>DANCE</h4></div>
                <div id="foodstext"><img src="../public/images/foodtickets.png" class="eventchose" id="foodclick" onclick='GoToPage("food")'><h4>FOOD</h4></div>
            </div>
            <script>
                function GoToPage(event){
                    if(event == 'jazz'){
                        window.location = "../views/jazz.php";
                    }else if(event == 'dance'){
                        window.location = "../views/dance.php";
                    }else if(event == 'food'){
                        window.location = "../views/food.php";
                    }else if(event == 'tickets'){
                        window.location = "../views/tickets.php";
                    }else if(event == 'programm'){
                        window.location = "../views/program.php";
                    }
                }
            </script>
        </section>
    </div>

</main>

<?php
require 'footer.php';
?>

