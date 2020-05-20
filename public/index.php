<?php

session_start();

$dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");

// List of partners in the system.
$resultPartners = pg_query($dbconn, "SELECT contact_email FROM partners");
$dataPartners = pg_fetch_all($resultPartners);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // When the button gets clicked this code will run
  $email = $_POST["email"];
  $query = pg_query($dbconn, "SELECT name FROM partners WHERE contact_email = '$email'");
  $row = pg_fetch_row($query);
  $count = pg_num_rows($query);

  // If count = 1, then an account was found.
  if ($count == 1){
    $_SESSION['user'] = $email;
    $_SESSION['name'] = $row[0];
    header("location: partner_page.php");
  } else {
    $error = "Invalid login.";
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
    <p>Welcome to MeFit's new application for the 2020 Fitness Competitions</p>
    <p><a href="competition_search.php"><img src="/images/viewcomps_png.png" height=80px></a>      <a href="search_athlete_results.php"><img src="/images/view_athletes_png.png" height=80px></a></p>
    <p>To access the Partner's Portal, please log in using your partner's contact's login</p>
    <form action = "" method = "post">
      <label>Email:  </label><input type = "text" name = "email" class = "box"/><br /><br />
      <label>Password:  </label><input type = "password" name = "password" class = "box" /><br/><br />
      <input type = "submit" value = " Submit "/><br />
    </form>
    <p>Don't have a partner profile? <a href="create_partner.php">Click here</a> to create an account for your organization!</p>
</body>