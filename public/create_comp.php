<?php

    session_start();

    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");
    $partner_name = $_SESSION['name'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comp_name = $_POST["comp_name"];
        $venue_name = $_POST["venue"];
        $sdate = $_POST["start_date"];
        $stime = $_POST["start_time"];
        $duration = $_POST["duration"];
        $max_athletes = intval($_POST["athlete_count"]);
        $events = intval($_POST["event_count"]);

        $query = pg_query($dbconn, "SELECT contact_email FROM partners WHERE name = '$partner_name'");
        $row = pg_fetch_row($query);
        $contact_email = $row[0];

        pg_query("INSERT INTO competitions (comp_name, venue, startdate,starttime,duration,max_athletes,events,partner_name,contact_email) VALUES ('$comp_name', '$venue_name', '$sdate', '$stime', '$duration', $max_athletes, $events, '$partner_name', '$contact_email')");

        $_SESSION['currentcomp'] = $comp_name;
        $_SESSION['eventcount'] = $events;
        header("location: edit_event.php");
        //header("location: partner_page.php");
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
    <p>To create a new competition, fill in the following details:</p>
    <form action = "" method = "post">
        <label>Competition Name:  </label><input type = "text" name = "comp_name" class = "box"/><br /><br />
        <label>Venue Name:  </label><input type = "text" name = "venue" class = "box"/><br /><br />
        <label>Start Date (YYYY-MM-DD):  </label><input type = "text" name = "start_date" class = "box" /><br /><br />
        <label>Start Time (HH:MM:SS):  </label><input type = "text" name = "start_time" class = "box" /><br /><br />
        <label>Duration (HH:MM:SS):  </label><input type = "text" name = "duration" class = "box" /><br /><br />
        <label>How many athletes will participate:  </label><input type = "text" name = "athlete_count" class = "box" /><br /><br />
        <label>How many events are you planning:  </label><input type = "text" name = "event_count" class = "box" /><br /><br />
        <input type = "submit" value = " Submit "/><br />
    </form>

    <p>Don't want to create a competition? <a href="partner_page.php">Return to Partner's Portal</a></p>
</body>