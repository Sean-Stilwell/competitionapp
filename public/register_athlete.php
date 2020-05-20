<?php

    session_start();

    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $athl_id = $_POST["athlid"];
        $comp_name = $_POST["compname"];
        pg_query("INSERT INTO registrations (id, comp_name) VALUES ('$athl_id', '$comp_name')");
        
        $resultEvents = pg_query($dbconn, "SELECT * FROM events WHERE comp_name='$comp_name'");
        $dataEvents = pg_fetch_all($resultEvents);
        foreach ($dataEvents as $table){
            $event = $table["event_name"];\
                pg_query($dbconn, "INSERT INTO results(athlete_id, comp_name, event_name, time, reps, weight, tiebreaker1success, tiebreaker2success) VALUES ('$athl_id', '$comp_name', '$event', null, null, null, false, false)");
        }
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
    <p>To register an athlete, please fill in the following details:</p>
    <p>If you are unsure of an athlete's ID, check <a href="view_athletes.php">here</a></p>
    <form action = "" method = "post">
        <label>Competition Name:  </label><input type = "text" name = "compname" class = "box"/><br /><br />
        <label>Athlete ID:  </label><input type = "text" name = "athlid" class = "box"/><br /><br />
        <input type = "submit" value = " Submit "/><br />
    </form>
    <p>Don't want to register an athlete? <a href="partner_page.php">Return to Partner's Portal</a></p>
</body>