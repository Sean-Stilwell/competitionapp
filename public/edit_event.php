<?php

    session_start();

    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");
    $partner_name = $_SESSION['name'];
    $comp = $_SESSION['currentcomp'];
    $events = $_SESSION['eventcount'];

    // Determine the maximum number of events allowed.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_count_query = pg_query($dbconn, "SELECT * FROM events WHERE comp_name = '$comp'");
    $count = pg_num_rows($event_count_query);
    $event_act_count = pg_query($dbconn, "SELECT max_athletes FROM competitions WHERE comp_name = '$comp'");

    $event_name = $_POST["eventname"];
    $scoring = $_POST["scoring"];
    
    pg_query("INSERT INTO events (event_name, comp_name, scoring_type) VALUES ('$event_name', '$comp', '$scoring')");

    // If the event count is still below the max, it's added.
    if ($count == $event_act_count){
        header("location: partner_page.php");
    } else if ($count < $event_act_count){
        echo("Ooooops!");
        header("location: partner_page.php");
    }
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
</style>

<body>
    <img src="/images/mefit_logo_png.png">
    <p>Creating events for the <?php echo ($comp) ?> competition. This competition is scheduled to have <?php echo ($events) ?> events.<p>
    <form action = "" method = "post">
        <label>Event Name:  </label><input type = "text" name = "eventname" class = "box"/><br /><br />
        <label for="scoring">How will this event be scored?</label>
        <select name="scoring" id="scoring">
            <option value="Time">Time (Fastest to Slowest)</option>
            <option value="Weight">Weight (Heaviest wins)</option>
            <option value="Reps">Repetitions (Most wins)</option>
        </select>
        <input type = "submit" value = " Submit "/><br />
    </form>

</body>