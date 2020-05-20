<?php

session_start();

$dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");
$partner_name = $_SESSION['name'];

// List of competitions in the system for this partner.
$resultComps = pg_query($dbconn, "SELECT comp_name, venue, startdate FROM competitions WHERE partner_name = '$partner_name'");
$dataComps = pg_fetch_all($resultComps);
$count = pg_num_rows($resultComps);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comp_name = $_POST["comp_name"];
    $_SESSION['active_comp'] = $comp_name;
    header("location: view_comp.php");
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
error {
    color: red;
    visibility: hidden;
}
</style>

<body>
    <img src="/images/mefit_logo_png.png">
    <p>Welcome to the <?php echo ($partner_name) ?> MeFit page. </p>

    <?php if ($count > 0) {?>
    <p>Here is a list of the competitions you have planned: </p>
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
    <?php } else {?>
        <p>You don't have any competitions planned... Why not plan one <a href="create_comp.php">here</a>?</p>
    <?php } ?>

  <h3>Athlete Management</h3>

  <p>To view a list of athletes in the system: <a href="view_athletes.php">Click here</a></p>

  <p>To add a new athlete to the system: <a href="create_athlete.php">Click here</a></p>

  <p>To register an athlete for one of your competitions: <a href="register_athlete.php">Click here</a> </p>

  <h3>Competition Management</h3>

  <p>To create a new competition: <a href="create_comp.php">Click here</a></p>

  <form action = "" method = "post">
    <label>To view or edit the results of a competition enter the competition name and click Submit: </label><input type = "text" name = "comp_name" class = "box"/>
    <input type = "submit" value = " Submit "/><br />
  </form>

  <p>To edit or delete your competition: <a href="delete_comp.php">Click here</a></p>
</body>