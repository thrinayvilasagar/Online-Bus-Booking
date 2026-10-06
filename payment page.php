<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <!-- <link rel="stylesheet" href="harry2.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #0f2747;
            --slate: #29476d;
            --accent: #ff8a00;
            --accent-soft: #ffbf69;
            --card: rgba(255, 255, 255, 0.92);
            --text: #17324f;
            --muted: #66778b;
            --line: rgba(23, 50, 79, 0.14);
            --shadow: 0 28px 60px rgba(10, 24, 45, 0.22);
        }

        body {
            min-height: 100vh;
            font-family: "Trebuchet MS", "Segoe UI", sans-serif;
            color: var(--text);
            background:
                linear-gradient(135deg, rgba(15, 39, 71, 0.88), rgba(41, 71, 109, 0.72)),
                url("https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=1600&q=80") center/cover no-repeat;
            padding: 42px 18px 60px;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(255, 191, 105, 0.18), transparent 28%),
                radial-gradient(circle at bottom right, rgba(255, 138, 0, 0.14), transparent 32%);
            pointer-events: none;
        }

        .page-shell {
            width: min(100%, 1150px);
            margin: 0 auto;
        }

        .hero {
            margin-bottom: 24px;
            padding: 30px 28px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(12px);
            box-shadow: var(--shadow);
            color: #fff;
        }

        .hero-tag {
            display: inline-block;
            margin-bottom: 14px;
            color: var(--accent-soft);
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        h2 {
            font-size: clamp(2rem, 4vw, 3.4rem);
            margin-bottom: 10px;
        }

        .hero p {
            max-width: 620px;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.86);
        }

        .contuner {
            width: min(100%, 760px);
            margin: 0 auto;
            padding: 34px 32px;
            border-radius: 30px;
            background: var(--card);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: var(--shadow);
        }

        .section-title {
            font-size: 1.35rem;
            margin-bottom: 18px;
            color: var(--navy);
        }

        .mainhead {
            color: inherit;
            width: auto;
            margin: 0;
        }

        .form-grid {
            display: grid;
            gap: 18px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .field label,
        .field-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text);
        }

        input,
        textarea,
        select {
            width: 100%;
            min-height: 50px;
            border: 1px solid var(--line);
            border-radius: 15px;
            padding: 12px 14px;
            font-size: 0.98rem;
            color: var(--text);
            background: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: rgba(255, 138, 0, 0.62);
            box-shadow: 0 0 0 4px rgba(255, 138, 0, 0.12);
            transform: translateY(-1px);
        }

        textarea#address {
            min-height: 90px;
            resize: vertical;
        }

        fieldset {
            padding: 16px 18px;
            border: 1px solid var(--line);
            border-radius: 18px;
            min-height: auto;
        }

        legend {
            padding: 0 8px;
            font-weight: 700;
            color: var(--navy);
        }

        .gender-options {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .gender-options label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: var(--text);
        }

        .gender-options input {
            width: auto;
            min-height: auto;
            accent-color: var(--accent);
        }

        .divider {
            margin: 10px 0 2px;
            border: none;
            border-top: 1px solid rgba(23, 50, 79, 0.1);
        }

        .action-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-top: 6px;
        }

        .action-row input {
            border: none;
            min-height: 52px;
            font-weight: 800;
            cursor: pointer;
        }

        .action-row input[type="submit"] {
            color: #fff;
            background: linear-gradient(135deg, var(--accent), var(--accent-soft));
            box-shadow: 0 16px 28px rgba(255, 138, 0, 0.24);
        }

        .action-row input[type="reset"] {
            color: var(--navy);
            background: #eef3f8;
        }

        .action-row input:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            body {
                padding: 24px 12px 40px;
            }

            .hero,
            .contuner {
                padding: 24px 18px;
                border-radius: 24px;
            }

            .action-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <?php
    session_start();
    $_SESSION['no'] = $_POST["num_name"];
    $a = 1;
    while ($a <= $_POST["num_name"]) {
        $_SESSION['pname' . $a] = $_POST['col2_' . $a];
        $_SESSION['pconno' . $a] = $_POST['col3_' . $a];
        $_SESSION['page' . $a] = $_POST['col4_' . $a];
        // print($_POST['col2_' . $a]);
        // print("&emsp;");
        // print($_POST['col3_' . $a]);
        // print("&emsp;");
        // print($_POST['col4_' . $a]);
        $a++;
        // print("<br>");
    }


    $z = $_POST['num_name'];
    $_SESSION["hdcunt"] = $_POST['num_name'];
    $x = $_SESSION['bsnm'];

    $db = mysqli_connect('localhost', 'root', '', 'online_bus') or die("Could not connect to Database");

    $querry = "UPDATE bus_details SET seats_available = seats_available - $z WHERE bus_name = '$x'";
    $result = mysqli_query($db, $querry) or die("Could not execute querry" . mysqli_error($db));


    ?>

    <script>
        function validate() {
            var a, b, c;
            a = document.getElementById("pin_id").value;
            b = document.getElementById("cardNumber_id").value;
            c = document.getElementById("exDate_id").value;
            d = document.getElementById("cvvPass_id").value;
            if (isNaN(a)) {
                alert("Please enter a valid number");
                return false;
            }
            if (isNaN(b)) {
                alert("Please enter a valid number");
                return false;
            }
            if (isNaN(d)) {
                alert("Please enter a valid number");
                return false;
            }

            var currentDate = new Date();
            var day = ("0" + currentDate.getDate()).slice(-2);
            var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            var year = currentDate.getFullYear();
            var z = parseInt(year.toString() + month.toString() + day.toString());

            var ne = parseInt(c.replace(/-/g, ''));
            if (ne < z) {
                alert("Please enter a valid card date");
                return false;
            }


        }
    </script>

    <div class="page-shell">
        <section class="hero">
            <span class="hero-tag">Secure checkout</span>
            <h2 class="mainhead">Payment Form</h2>
            <p>Complete your booking by entering passenger contact details and card information below.</p>
        </section>

        <div class="contuner">
            <h3 class="section-title">Contact Information</h3>
            <form action="ticket page.php" autocomplete="off" method="post" onsubmit="return validate()">
                <div class="form-grid">
                    <div class="field">
                        <label for="name_id">Name</label>
                        <input type="text" name="myName" id="name_id" required placeholder="Enter your full name">
                    </div>

                    <div class="field">
                        <fieldset>
                            <legend>Gender</legend>
                            <div class="gender-options">
                                <label for="gender_male">
                                    <input type="radio" name="myGndr" id="gender_male" value="Male" required>
                                    Male
                                </label>
                                <label for="gender_female">
                                    <input type="radio" name="myGndr" id="gender_female" value="Female" required>
                                    Female
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <div class="field">
                        <label for="address">Address</label>
                        <textarea name="myText" cols="200" rows="3" id="address" placeholder="Enter your address"></textarea>
                    </div>

                    <div class="field">
                        <label for="email_id">Email</label>
                        <input type="text" name="email_name" id="email_id" required placeholder="Enter your email">
                    </div>

                    <div class="field">
                        <label for="pin_id">Pincode</label>
                        <input type="number" name="pin_name" id="pin_id" required placeholder="Enter 6-digit pincode" minlength="6" maxlength="6">
                    </div>

                    <hr class="divider">

                    <h3 class="section-title">Payment Info</h3>

                    <div class="field">
                        <label for="card_type_id">Card type</label>
                        <select name="myCard" id="card_type_id">
                            <option value="">--Enter type of card--</option>
                            <option value="masterCard">Master Card</option>
                            <option value="debitCard">Debit Card</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="cardNumber_id">Card Number</label>
                        <input type="number" name="cardNumber_name" id="cardNumber_id" required placeholder="1111222233334444" minlength="16" maxlength="16">
                    </div>

                    <div class="field">
                        <label for="exDate_id">Expiry Date</label>
                        <input type="date" name="exDate_nam" id="exDate_id" required>
                    </div>

                    <div class="field">
                        <label for="cvvPass_id">CVV</label>
                        <input type="password" name="cvvPass_name" id="cvvPass_id" minlength="3" maxlength="3" required placeholder="123">
                    </div>

                    <div class="action-row">
                        <input type="submit" value="Pay Now">
                        <input type="reset" value="Reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
