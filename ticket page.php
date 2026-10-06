<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Page</title>
    <link href="ticket page.css" rel="stylesheet">
</head>

<body>
    <script>
        function prnt() {
            window.print();

        }
    </script>
    <main class="ticket-shell">
        <section class="ticket-hero">
            <p class="ticket-tag">Booking Confirmed</p>
            <h1 class="mainhead">Ticket</h1>
            <p class="ticket-subtitle">Your journey details and passenger list are ready below.</p>
        </section>

        <div class="container_ticket">
            <?php
            session_start();

            ?>

            <div class="ticket-section">
                <h2 class="section-title">Passenger List</h2>
                <div class="table-wrap">
                    <table>
                        <tr>
                            <td>Sl no.</td>
                            <td>Passenger name</td>
                            <td>Contact Number</td>
                            <td>Age</td>
                        </tr>
                        <?php
                        $a = 1;
                        while ($a <= $_SESSION['hdcunt']) {
                            print("<tr>");
                            print("<td>" . $a . "</td>");
                            print("<td>" . $_SESSION['pname' . $a] . "</td>");
                            print("<td>" . $_SESSION['pconno' . $a] . "</td>");
                            print("<td>" . $_SESSION['page' . $a] . "</td>");

                            $a++;
                            print("</tr>");
                        }
                        ?>
                    </table>
                </div>
            </div>

            <div class="ticket-section">
                <h2 class="section-title">Journey Details</h2>
                <div class="details-grid">
                    <div class="detail-card">
                        <span>Date of Journey</span>
                        <input type="text" value="<?php print($_SESSION['dt']) ?>" readonly>
                    </div>

                    <div class="detail-card">
                        <span>Head Count</span>
                        <input type="text" value="<?php print($_SESSION['hdcunt']) ?>" readonly>
                    </div>

                    <div class="detail-card detail-card-wide">
                        <span>Bus Name</span>
                        <input type="text" value="<?php print($_SESSION['bsnm']) ?>" readonly>
                    </div>

                    <div class="detail-card">
                        <span>From</span>
                        <input type="text" value="<?php print($_SESSION['frm']) ?>" readonly>
                    </div>

                    <div class="detail-card">
                        <span>To</span>
                        <input type="text" value="<?php print($_SESSION['to']) ?>" readonly>
                    </div>

                    <div class="detail-card detail-card-wide fare-card">
                        <span>Total Fare</span>
                        <input type="number" value="<?php print(($_SESSION['fph']) * ($_SESSION['hdcunt'])) ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="action-bar">
                <input type="button" value="Print Ticket" onclick="prnt()">
            </div>
        </div>
    </main>
</body>

</html>
