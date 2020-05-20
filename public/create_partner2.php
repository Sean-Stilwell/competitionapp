<?php

session_start();

$dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // When the button gets clicked this code will run
  $name = $_POST["name"];
  $address = $_POST["address"];
  $email = $_SESSION["active_user"];
  pg_query($dbconn, "INSERT INTO partners(name, address, contact_email) VALUES ('$name', '$address', '$email')");
  $_SESSION['name'] = $name;
  $_SESSION['user'] = $email;
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
</style>

<body>
    <img src="/images/mefit_logo_png.png">
    <p>Great, now we'd like to know about your organization!</p>
    <p>Please fill in the form below and click Submit when finished.</p>
    <form action = "" method = "post">
      <label>Organization Name:  </label><input type = "text" name = "name" class = "box"/><br /><br />
      <label>Organization Address:  </label><input type = "text" name = "address" class = "box"/><br /><br />
      <input type = "submit" value = " Submit "/><br />
    </form>
</body>