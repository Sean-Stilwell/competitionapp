<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");

// List of athletes in the system.
$resultUOttawa = pg_query($dbconn, "SELECT athlete_id, athlname, time, nationality FROM results NATURAL JOIN athletes WHERE athletes.id = results.athlete_id AND comp_name = 'The uOttawa Tournament' AND event_name = 'Speed Skating' ORDER BY time ASC");
$dataUOttawa = pg_fetch_all($resultUOttawa);

// List of competitions in the system.
$resultComps = pg_query($dbconn, "SELECT comp_name, venue, startdate FROM competitions");
$dataComps = pg_fetch_all($resultComps);

// List of migrations 
$resultMigrations = pg_query($dbconn, "SELECT mig_id, migrated_at FROM migrations");
$dataMigrations = pg_fetch_all($resultMigrations);
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
}
th {
  background-color: #004c82;
  color: white;
}
</style>

<body>
  <img src="/images/mefit_logo_png.png">
  <p>Sean Stilwell | 300053246 | CSI2532</p>

  <p>Welcome to the MeFit Fitness Competition application!</p>

  <p><a href="main_screen_login.php">TEST</a></p>

  <H2>Results for the uOttawa Speed Skating event! </H2>

  <div class="table-container">
    <table>
      <tr>
        <th>Athlete ID</th>
        <th>Athlete Name</th>
        <th>Time</th>
        <th>Nationality</th>
      </tr>
      <?php foreach ($dataUOttawa as $row) {?>
        <tr>
          <td><?php echo $row["athlete_id"] ?></td>
          <td><?php echo $row["athlname"] ?></td>
          <td><?php echo $row["time"] ?></td>
          <td><?php echo $row["nationality"] ?></td>
        </tr>
      <?php } ?>
    </table>
  </div>

  <div class="table-container">
    <table>
      <tr>
        <th>Competition Name</th>
        <th>Venue</th>
        <th>Start Date</th>
      </tr>
      <?php foreach ($dataComps as $row) {?>
        <tr>
          <td><?php echo $row["comp_name"] ?></td>
          <td><?php echo $row["venue"] ?></td>
          <td><?php echo $row["startdate"] ?></td>
        </tr>
      <?php } ?>
    </table>
  </div>

  <div class="table-container">
    <table>
      <tr>
        <th>Migration ID</th>
        <th>Migration Time</th>
      </tr>
      <?php foreach ($dataMigrations as $row) {?>
        <tr>
          <td><?php echo $row["mig_id"] ?></td>
          <td><?php echo $row["migrated_at"] ?></td>
        </tr>
      <?php } ?>
    </table>
  </div>
</body>