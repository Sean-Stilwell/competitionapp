<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");

// List of athletes in the system.
$resultAthletes = pg_query($dbconn, "SELECT id, athlname, dob, gender, nationality, email FROM athletes");
$dataAthletes = pg_fetch_all($resultAthletes);
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

  <p> Complete list of participating athletes: </p>

  <div class="table-container">
    <table>
      <tr>
        <th>Athlete ID</th>
        <th>Athlete Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Nationality</th>
        <th>Email</th>
      </tr>
      <?php foreach ($dataAthletes as $row) {?>
        <tr>
          <td><?php echo $row["id"] ?></td>
          <td><?php echo $row["athlname"] ?></td>
          <td><?php echo $row["dob"] ?></td>
          <td><?php echo $row["gender"] ?></td>
          <td><?php echo $row["nationality"] ?></td>
          <td><?php echo $row["email"] ?></td>
        </tr>
      <?php } ?>
    </table>
  </div>
  <a href="partner_page.php">Return to Partner's Portal</a>
</body>