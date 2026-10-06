<?php
session_start();

$cities = ['Hyderabad', 'Warangal', 'Thorrur', 'Hanamkonda', 'Khammam', 'Manchiryal'];
$selectedSource = $_POST['src_name'] ?? '';
$selectedDestination = $_POST['to_name'] ?? '';
$selectedDate = $_POST['date_name'] ?? '';
$searchResults = [];
$searchPerformed = false;

if (isset($_POST['submit'])) {
    $searchPerformed = true;
    $_SESSION["frm"] = $selectedSource;
    $_SESSION["to"] = $selectedDestination;
    $_SESSION["dt"] = $selectedDate;

    $db = mysqli_connect('localhost', 'root', '', 'online_bus') or die("Could not connect to Database");
    $querry = "SELECT * FROM bus_details WHERE source='$selectedSource' AND destination='$selectedDestination'";
    $result = mysqli_query($db, $querry) or die("Could not execute querry");

    while ($row = mysqli_fetch_row($result)) {
        $searchResults[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="landing page.css">
</head>

<body>
    <div class="page-shell">
        <header class="hero">
            <div class="hero__content">
                <p class="eyebrow">Online Bus Booking</p>
                <h1>Find your next ride in minutes</h1>
                <p class="hero__text">Choose your route, pick your travel date, and continue with a smoother ticket reservation flow.</p>
            </div>
        </header>

        <main class="content">
            <section class="booking-card">
                <div class="section-heading">
                    <h2>Search Buses</h2>
                    <p>Pick your boarding city, destination, and date of journey.</p>
                </div>

                <form action="" method="post" class="booking-form">
                    <label class="field">
                        <span>From</span>
                        <select name="src_name" id="src_id" required>
                            <option value="" disabled <?php echo $selectedSource === '' ? 'selected' : ''; ?>>Select source</option>
                            <?php foreach ($cities as $city) { ?>
                                <option value="<?php echo htmlspecialchars($city); ?>" <?php echo $selectedSource === $city ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($city); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </label>

                    <label class="field">
                        <span>To</span>
                        <select name="to_name" id="to_id" required>
                            <option value="" disabled <?php echo $selectedDestination === '' ? 'selected' : ''; ?>>Select destination</option>
                            <?php foreach ($cities as $city) { ?>
                                <option value="<?php echo htmlspecialchars($city); ?>" <?php echo $selectedDestination === $city ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($city); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </label>

                    <label class="field field--full">
                        <span>Date of Journey</span>
                        <input type="date" name="date_name" id="date_id" value="<?php echo htmlspecialchars($selectedDate); ?>" required>
                    </label>

                    <input name="submit" type="submit" value="Get Details" class="submit">
                </form>
            </section>

            <section class="results-card">
                <div class="section-heading">
                    <h2>Available Buses</h2>
                    <p>
                        <?php if ($searchPerformed) { ?>
                            Showing routes for <?php echo htmlspecialchars($selectedSource); ?> to <?php echo htmlspecialchars($selectedDestination); ?>.
                        <?php } else { ?>
                            Search for a route to view available buses.
                        <?php } ?>
                    </p>
                </div>

                <form action="passenger info.php" method="post" class="results-form">
                    <?php if ($searchPerformed && count($searchResults) > 0) { ?>
                        <div class="table-wrap">
                            <table>
                                <tr>
                                    <th>Bus Name</th>
                                    <th>Fare</th>
                                    <th>Vacant Seats</th>
                                    <th>Select</th>
                                </tr>
                                <?php foreach ($searchResults as $row) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row[0]); ?></td>
                                        <td align="center">
                                            <input type="hidden" value="<?php echo htmlspecialchars($row[3]); ?>" name="fair_name">
                                            <?php echo htmlspecialchars($row[3]); ?>
                                        </td>
                                        <td align="center"><?php echo htmlspecialchars($row[4]); ?></td>
                                        <td align="center">
                                            <input type="radio" name="radio_name" value="<?php echo htmlspecialchars($row[0]); ?>" required>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <input type="submit" value="Continue Booking" class="lastbutton">
                    <?php elseif ($searchPerformed) { ?>
                        <div class="empty-state">
                            <p>No buses were found for this route. Try a different city combination.</p>
                        </div>
                    <?php else { ?>
                        <div class="empty-state">
                            <p>Your search results will appear here after you choose a route.</p>
                        </div>
                    <?php } ?>
                </form>
            </section>
        </main>
    </div>
</body>

</html>
