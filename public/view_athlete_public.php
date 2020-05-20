<?php 
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");
    $athleteid = $_SESSION['active_athl'];
    
    // Find all the events for that competition
    $resultEvents = pg_query($dbconn, "SELECT comp_name, event_name, time, reps, weight FROM results WHERE athlete_id='$athleteid' ORDER BY comp_name, event_name");
    $dataEvents = pg_fetch_all($resultEvents);
?>

<style>
body {
  padding: 30px;
  font-family: "Arial", sans-serif;
  margin:auto;
  text-align: center;
  background-color: #e0e0e0;
}
.table-container {
  margin: 20px;
}
table {
  text-align: left;
  width: 100%;
  background-color: #bad0e8;
  margin-bottom:2px;
}
th {
  background-color: #004c82;
  color: white;
}
error {
    color: red;
    visibility: hidden;
}
</style>

<body>
    <img src="/images/mefit_logo_png.png">
    <p>Results in all competitions </p>
    
    <table>
        <tr>
            <th>Competition Name</th>
            <th>Event Name</th>
            <th>Time</th>
            <th>Repetitions</th>
            <th>Weight Lifted</th>
        </tr>
        <?php foreach ($dataEvents as $row) {?>
        <tr>
          <td><?php echo $row["comp_name"] ?></td>
          <td><?php echo $row["event_name"] ?></td>
          <td><?php if ($row["time"] != null) {echo $row["time"];} else {echo "N/A";} ?></td>
          <td><?php if ($row["reps"] != null) {echo $row["reps"];} else {echo "N/A";} ?></td>
          <td><?php if ($row["weight"] != null) {echo $row["weight"];} else {echo "N/A";} ?></td>
        </tr>
      <?php } ?>

    </table>
    <a href="index.php">Return to Index</a>

</body>