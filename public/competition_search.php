<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");
    $comp = $_SESSION['active_comp'];

    // List of competitions in the system.
    $resultComps = pg_query($dbconn, "SELECT comp_name, venue, startdate, partner_name FROM competitions ORDER BY startdate ASC");
    $dataComps = pg_fetch_all($resultComps);
    $count = pg_num_rows($resultComps);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comp_name = $_POST["comp_name"];
        $_SESSION['active_comp'] = $comp_name;
        header("location: view_comp_public.php");
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
h1 {
    color: #00619e;
    margin: 0;
    padding: 0;
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
    <p><h1>Competition List </h1></p><?php if ($count > 0) {?>
    <div class="table-container">
    <table>
      <tr>
        <th>Competition Name</th>
        <th>Venue</th>
        <th>Start Date</th>
        <th>Organizing Partner</th>
      </tr>
      <?php foreach ($dataComps as $row) {?>
        <tr>
          <td><?php echo $row["comp_name"] ?></td>
          <td><?php echo $row["venue"] ?></td>
          <td><?php echo $row["startdate"] ?></td>
          <td><?php echo $row["partner_name"] ?></td>
        </tr>
      <?php } ?>
    </table>
    </div>
    <?php } else {?>
        <p>That's odd.... No competitions are planned!</p>
    <?php } ?>

    <form action = "" method = "post">
    <label>To view the results of a competition, enter the competition name and click Submit: </label><input type = "text" name = "comp_name" class = "box"/><br /><br />
    <input type = "submit" value = " Submit "/><br />
  </form>

    <a href="index.php">Return to Index</a>
</body>