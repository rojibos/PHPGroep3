<?php
require_once '../header.php';
require '../../logic/Ticket.php';
$program = new Ticket();
?>
    <main>
        <section class="navigationProgram">
            <ul>
                <li><a href="program.php?pagetype=dance">Dance</a></li>
                <li><a href="program.php?pagetype=jazz">Jazz</a></li>
                <li><a href="program.php?pagetype=food">Food</a></li>
            </ul>
        </section>
        <?php
        $type = 'dance';
        if (!empty($_GET['pagetype'])){
            $type = $_GET[ 'pagetype'];
        }
        $day1 = new DateTime('2020-07-26 00:00:00') ;
        $day2 = new DateTime('2020-07-27 00:00:00') ;
        $day3 = new DateTime('2020-07-28 00:00:00') ;
        $day4 = new DateTime('2020-07-29 00:00:00') ;
        $days = array('Thursday','Friday', 'Saturday', 'Sunday');
        $counter = 0;
        $programs = $program->loadTickets($type, $day1, $day2, $day3, $day4);
        ?>
        <section class="program">
            <?php
            foreach ($programs as $programDay) {
                if (!empty($programDay)) {
                    ?>
                    <table class="programTable">
                        <tr class="top">
                            <?php echo "<th>".$days[$counter]."</th>"?>
                        </tr>
                        <?php
                        foreach ($programDay as $row) {
                            if ($row['venue'] != 'All Access') {
                                echo '<tr><td><a href="../ticketpage/tickets.php?pagetype=' . $type . '"><p>' . $row['event'] . '<br>' . $row['date_time'] . '<br>' . $row['venue'] . '</p></a></td></tr>';
                            }
                        }
                        ?>
                    </table>
                <?php } $counter++; } ?>
        </section>
    </main>
<?php
require_once '../footer.php';

