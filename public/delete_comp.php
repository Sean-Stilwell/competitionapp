<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");
    $partner_name = $_SESSION['name'];

    // List of competitions in the system.
    $resultComps = pg_query($dbconn, "SELECT comp_name, venue, startdate, starttime, duration, max_athletes FROM competitions WHERE partner_name = '$partner_name'");
    $dataComps = pg_fetch_all($resultComps);
    $count = pg_num_rows($resultComps);

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comp_name = $_POST["comp_name"];
    $attribute = $_POST["attribute"];
    $newvalue = $_POST["newval"];

    if ($attribute == "delete"){
        pg_query($dbconn, "DELETE FROM registrations WHERE comp_name = '$comp_name'");
        pg_query($dbconn, "DELETE FROM results WHERE comp_name = '$comp_name'");
        pg_query($dbconn, "DELETE FROM events WHERE comp_name = '$comp_name'");
        pg_query($dbconn, "DELETE FROM competitions WHERE comp_name = '$comp_name'");
    } else if ($attribute=="max_athletes"){
        $intvalue = intval($newvalue);
        pg_query($dbconn, "UPDATE competitions SET $attribute=$intvalue WHERE comp_name = '$comp_name'");
    } else {
        pg_query($dbconn, "UPDATE competitions SET $attribute='$newvalue' WHERE comp_name = '$comp_name'");
    }

    header("Refresh:0");
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
warning {
    color: red;
}
</style>

<body>
    <img src="/images/mefit_logo_png.png">

    <div class="table-container">
    <table>
      <tr>
        <th>Competition Name</th>
        <th>Venue</th>
        <th>Start Date</th>
        <th>Start Time</th>
        <th>Duration</th>
        <th>Maximum Athletes</th>
      </tr>
      <?php foreach ($dataComps as $row) {?>
        <tr>
          <td><?php echo $row["comp_name"] ?></td>
          <td><?php echo $row["venue"] ?></td>
          <td><?php echo $row["startdate"] ?></td>
          <td><?php echo $row["starttime"] ?></td>
          <td><?php echo $row["duration"] ?></td>
          <td><?php echo $row["max_athletes"] ?></td>
        </tr>
      <?php } ?>
    </table>
    </div>

    <p>To update or delete your competition, type its name, then select an attribute to change or select "Delete" from the drop down box.
    <form action = "" method = "post">
        <label>Competition to Update's Name: </label><input type = "text" name = "comp_name" class = "box"/><br /><br />
        <label for="attribute">Attribute to change: </label>
        <select name="attribute" id="attribute">
            <option value="comp_name">Name</option>
            <option value="venue">Venue</option>
            <option value="startdate">Start Date (YYYY-MM-DD)</option>
            <option value="starttime">Starting Time (HH:MM:SS)</option>
            <option value="duration">Duration (HH:MM:SS)</option>
            <option value="max_athletes">Maximum Athletes</option>
            <option value="delete">Delete Competition</option>
        </select><br /><br />
        <label>New Value (blank if deleting): </label><input type = "text" name = "newval" class = "box"/><br /><br />
        <input type = "submit" value = " Submit "/><br />
  </form>

  <p>Don't want to edit a competition? <a href="partner_page.php">Return to Partner's Portal</a></p>


</body>