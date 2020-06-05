<?php
require 'header.php';
require '../logic/Content.php';
$content = new Content();
$data = $content->GetAllContent('food');
?>
    <main>
        <div class = "container">
            <section id="headerFood">
                <h1 class="titel"><?php echo $data[0]->text; ?></h1>
            </section>
            <section class="inleiding">
                <h2><?php  ?></h2>
                <p><?php echo $data[1]->text; ?></p>
            </section>
            <div id="myBtnContainer">
                <h1 id="choises">Cuisine:</h1>
                <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                <button class="btn" onclick="filterSelection('Dutch')"> Dutch</button>
                <button class="btn" onclick="filterSelection('fish and seafood')"> fish and seafood</button>
                <button class="btn" onclick="filterSelection('European')"> European</button>
                <button class="btn" onclick="filterSelection('French')"> French</button>
                <button class="btn" onclick="filterSelection('Internationaal')"> Internationaal</button>
                <button class="btn" onclick="filterSelection('Modern')"> Modern</button>
                <button class="btn" onclick="filterSelection('Steakhouse')"> Steakhouse</button>
                <button class="btn" onclick="filterSelection('Argentinian')"> Argentinian</button>
                <button class="btn" onclick="filterSelection('Aziatisch')"> Aziatisch</button>
            </div>
            <article  class="filterDiv Dutch, fish and seafood, European " id="mrmrs">
                <h2><?php echo $data[3]->text; ?></h2>
                <hr>
                <p><?php  echo $data[2]->text;  ?></p>
            </article>
            <article class="filterDiv Steakhouse, Argentinian, European"  id="ratatouille">
                <h2><?php  echo $data[5]->text; ?></h2>
                <hr>
                <p><?php  echo $data[6]->text; ?></p>
            </article>
            <article class="filterDiv Dutch, fish and seafood, European" id="ML">
                <h2><?php  echo $data[7]->text; ?></h2>
                <hr>
                <p><?php  echo $data[6]->text; ?></p>
            </article>
            <article class="filterDiv Dutch, French, European"   id="fris">
                <h2><?php  echo $data[9]->text; ?></h2>
                <hr>
                <p><?php  echo $data[8]->text; ?></p>
            </article>
            <article class="filterDiv Europees, Internationaal,Aziatisch" id="specktakel">
                <h2><?php  echo $data[11]->text; ?></h2>
                <hr>
                <p><?php  echo $data[10]->text; ?></p>
            </article>
            <article class="filterDiv Steakhouse, Argentinian, European" id="goldenbull">
                <h2><?php  echo $data[13]->text; ?></h2>
                <hr>
                <p><?php  echo $data[12]->text; ?></p>
            </article>
            <article class="filterDiv Dutch, fish and seafood, European" id="urban">
                <h2><?php  echo $data[15]->text; ?></h2>
                <hr>
                <p><?php  echo $data[14]->text; ?></p>
            </article>
            <article class="filterDiv Dutch, European, Modern" id="brinkman">
                <h2><?php  echo $data[17]->text; ?></h2>
                <hr>
                <p><?php  echo $data[16]->text; ?></p>
            </article>
            <!--        Hier maak ik twee knoppen die naar de programpage en ticketpage gaan. Ik geef een variabele event mee in de url zodat op de ticketpagina direct naar het jazz event kan worden genavigeerd.-->
            <section class="navigationbuttons">
                <div id="forms">
                    <form action="tickets.php?event=jazz">
                        <button type="submit" class ="gototicketpage" id="gototicketpagejazz">TICKETS</button>
                    </form>
                    <form action="program.php">
                        <button type="submit" class = "gotoprogrammpage" id="gotoprogrammpagejazz">PROGRAMM</button>
                    </form>
                </div>
            </section>
        </div>
        <script>
            filterSelection("all")
            function filterSelection(c) {
                var x, i;
                x = document.getElementsByClassName("filterDiv");
                if (c == "all") c = "";
                for (i = 0; i < x.length; i++) {
                    w3RemoveClass(x[i], "show");
                    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
                }
            }

            function w3AddClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
                }
            }

            function w3RemoveClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    while (arr1.indexOf(arr2[i]) > -1) {
                        arr1.splice(arr1.indexOf(arr2[i]), 1);
                    }
                }
                element.className = arr1.join(" ");
            }

            // Add active class to the current button (highlight it)
            var btnContainer = document.getElementById("myBtnContainer");
            var btns = btnContainer.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function(){
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        </script>
    </main>
<?php
require 'footer.php';
?>