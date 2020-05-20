<?php

    session_start();

    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Random ID generator
        $id = rand(1000000080, 2147483647);
        $query = pg_query($dbconn, "SELECT name FROM athletes WHERE id = $id");
        $count = pg_num_rows($query);
        while (count > 0){
            $id = rand(1000000080, 2147483647);
            $query = pg_query($dbconn, "SELECT name FROM athletes WHERE id = $id");
            $count = pg_num_rows($query);
        }

        $athlname = $_POST["athlname"];
        $dob = $_POST["athldob"];
        $gender = "M"; // To read the gender inserted
        $nation = $_POST["nation"];
        $email = $_POST["athlemail"];

        pg_query("INSERT INTO athletes (id, athlname, dob, gender, nationality, email) VALUES ('$id', '$athlname', '$dob', '$gender', '$nation', '$email')");

        header("location: partner_page.php");
    }
?>

<style>
    body {
    padding: 30px;
    font-family: "Arial", sans-serif;
    margin:auto;
    text-align: center;
    background-color: #e0e0e0;
    }
    error {
        color: red;
        visibility: hidden;
    }
    input[type="radio"] {
        display: inline;
        margin-bottom: 0px; 
    }
    
</style>

<body>
    <img src="/images/mefit_logo_png.png">
    <p>To insert an athlete, fill in the following details:</p>
    <form action = "" method = "post">
        <label>Full Name:  </label><input type = "text" name = "athlname" class = "box"/><br /><br />
        <label>Date of Birth (YYYY-MM-DD):  </label><input type = "text" name = "athldob" class = "box" />
        <p> Gender: <br>
        <input type="radio" id="male" name="gender" value="male"> <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female"> <label for="female">Female</label><br> </p>
        <label>Nationality:  </label><input type = "text" name = "nation" class = "box" /><br/><br />
        <label>Email:  </label><input type = "text" name = "athlemail" class = "box" /><br/><br />
        <input type = "submit" value = " Submit "/><br />
        <p>Don't want to add an athlete? <a href="partner_page.php">Return to Partner's Portal</a></p>
    </form>
</body>