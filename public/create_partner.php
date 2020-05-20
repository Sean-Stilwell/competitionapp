<?php

session_start();

$dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // When the button gets clicked this code will run
  $email = $_POST["email"];
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $password = $_POST["password"];
  pg_query($dbconn, "INSERT INTO contacts(email,name,phone,password) VALUES ('$email', '$name', '$phone', '$password')");
  $_SESSION["active_user"] = $email;
  header("location: create_partner2.php");
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
    <p>Welcome to your new competition hosting application!</p>
    <p>To create a page for your competitions, you first need to give us some information about your contact person.</p>
    <p>Please fill in the form below and click Submit when finished.</p>
    <form action = "" method = "post">
      <label>Contact Email:  </label><input type = "text" name = "email" class = "box"/><br /><br />
      <label>Contact Name:  </label><input type = "text" name = "name" class = "box"/><br /><br />
      <label>Contact Phone:  </label><input type = "text" name = "phone" class = "box"/><br /><br />
      <label>Password:  </label><input type = "password" name = "password" class = "box" /><br/><br />
      <input type = "submit" value = " Submit "/><br />
    </form>
    <p>Already have a profile? <a href="index.php">Click here</a> to log in!</p>
</body>