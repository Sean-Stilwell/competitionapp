<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");
    $comp = $_SESSION['active_comp'];

    // Find all the events for that competition
    $resultEvents = pg_query($dbconn, "SELECT * FROM events WHERE comp_name='$comp'");
    $dataEvents = pg_fetch_all($resultEvents);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $athl_id = $_POST["athlid"];
        $event_name = $_POST["event_name"];

        $resultEvents2 = pg_query($dbconn, "SELECT * FROM events WHERE comp_name='$comp' AND event_name = '$event_name'");
        $dataEvents2 = pg_fetch_row($resultEvents2);
        $scoring =  $dataEvents2[2];

        if ($scoring == 'Time') { 
            $time = $_POST["time"];
        } else if ($scoring == 'Weight') { 
            $weight = intval($_POST["weight"]);
        } else if ($scoring == 'Reps'){             
            $reps = intval($_POST["reps"]);
        }
        
        
        if ($scoring == 'Time') { 
            pg_query($dbconn, "UPDATE results SET time='$time' WHERE athlete_id = '$athl_id' AND comp_name = '$comp' AND event_name= '$event_name'");
        } else if ($scoring == 'Weight') { 
            pg_query($dbconn, "UPDATE results SET weight=$weight WHERE athlete_id = '$athl_id' AND comp_name = '$comp' AND event_name= '$event_name'");
        } else if ($scoring == 'Reps'){             
            pg_query($dbconn, "UPDATE results SET reps=$reps WHERE athlete_id = '$athl_id' AND comp_name = '$comp' AND event_name= '$event_name'");
        }
        //header("location: partner_page.php");
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
    <p>Viewing results for <?php echo ($comp) ?> </p>
    <?php foreach ($dataEvents as $table) { 
        echo $table["event_name"];
        $event_name = $table["event_name"];?>
        <table>
            <tr>
                <th>Athlete ID</th>
                <th>Athlete Name</th>
                <th> <?php if ($table["scoring_type"] == 'Time') { 
                    echo "Time"; 
                } else if ($table["scoring_type"] == 'Weight') { 
                    echo "Weight Lifted"; 
                } else { 
                    echo "Repetitions";
                }?></th>
                <th>Gender</th>
                <th>Nationality</th>
            </tr>
            <?php 
                if ($table["scoring_type"] == 'Time') { 
                    $results = pg_query($dbconn, "SELECT athlete_id, athlname, time, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY time ASC");
                } else if ($table["scoring_type"] == 'Weight') { 
                    $results = pg_query($dbconn, "SELECT athlete_id, athlname, weight, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY weight DESC");
                } else { 
                    $results = pg_query($dbconn, "SELECT athlete_id, athlname, reps, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY reps DESC");
                }
                $data = pg_fetch_all($results);?>
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row["athlete_id"] ?></td>
                        <td><?php echo $row["athlname"] ?></td>
                        <td><?php if ($table["scoring_type"] == 'Time') { 
                            echo $row["time"]; 
                        } else if ($table["scoring_type"] == 'Weight') { 
                            echo $row["weight"]; 
                        } else { 
                            echo $row["reps"]; 
                        }?>
                        </td>
                        <td><?php echo $row["gender"] ?></td>
                        <td><?php echo $row["nationality"] ?></td>
                    </tr>
                <?php } ?>
            <tr>
        </table>

        <form action = "" method = "post">
            <p>To update the results of an athlete, fill in the following form and click submit</p>
            <label>Event: </label><input type="text" name="event_name" class="box" value="<?php echo $event_name?>"/>
            <label>Athlete ID:  </label><input type = "text" name = "athlid" class = "box"/>
            <?php if ($table["scoring_type"] == 'Time') { ?> <label>Time (HH:MM:SS): </label></label><input type = "text" name = "time" class = "box"/><br /><br /> <?php }
                    else if  ($table["scoring_type"] == 'Weight'){ ?> <label>Weight (in kg): </label></label><input type = "text" name = "weight" class = "box"/><br /><br /> <?php }
                    else { ?> </label>Repetitions: </label><input type = "text" name = "reps" class = "box"/><br /><br /> <?php } ?>
            <input type = "submit" value = " Submit "/><br />
        </form>

    <?php } ?>

    <a href="partner_page.php">Return to Partner's Portal</a>
</body>