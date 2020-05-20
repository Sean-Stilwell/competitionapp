<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=leaderboard user=postgres password=password");
    $comp = $_SESSION['active_comp'];

    // Find all the events for that competition
    $resultEvents = pg_query($dbconn, "SELECT * FROM events WHERE comp_name='$comp'");
    $dataEvents = pg_fetch_all($resultEvents);

    $sorting = "default hi";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sorting =  $_POST["sorting"];
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
    <form action = "" method = "post">
        <label for="sorting">Sort by: </label>
        <select name="sorting" id="sorting">
            <option value="nameAZ">Name (A-Z)</option)>
            <option value="nameZA">Name (Z-A)</option)>
            <option value="id">ID</option)>
            <option value="genderF">Gender (Female First)</option>
            <option value="genderM">Gender (Male First)</option>
            <option value="nation">Nationality</option>
        </select>
        <input type = "submit" value = " Submit "/><br />
    </form>

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
                if ($sorting == "nameAZ"){
                    if ($table["scoring_type"] == 'Time') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, time, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlname ASC");
                    } else if ($table["scoring_type"] == 'Weight') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, weight, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlname ASC");
                    } else { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, reps, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlname ASC");
                    }
                }
                else if ($sorting == "nameZA"){
                    if ($table["scoring_type"] == 'Time') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, time, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlname DESC");
                    } else if ($table["scoring_type"] == 'Weight') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, weight, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlname DESC");
                    } else { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, reps, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlname DESC");
                    }
                }
                else if ($sorting == "id"){
                    if ($table["scoring_type"] == 'Time') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, time, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlete_id ASC");
                    } else if ($table["scoring_type"] == 'Weight') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, weight, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlete_id DESC");
                    } else { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, reps, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY athlete_id DESC");
                    }
                }
                else if ($sorting == "genderF"){
                    if ($table["scoring_type"] == 'Time') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, time, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY gender, time ASC");
                    } else if ($table["scoring_type"] == 'Weight') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, weight, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY gender, weight DESC");
                    } else { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, reps, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY gender, reps DESC");
                    }
                }
                else if ($sorting == "genderM"){
                    if ($table["scoring_type"] == 'Time') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, time, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY gender DESC, time ASC");
                    } else if ($table["scoring_type"] == 'Weight') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, weight, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY gender DESC, weight DESC");
                    } else { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, reps, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY gender DESC, reps DESC");
                    }
                }
                else if ($sorting == "nation"){
                    if ($table["scoring_type"] == 'Time') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, time, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY nationality, time ASC");
                    } else if ($table["scoring_type"] == 'Weight') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, weight, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY nationality, weight DESC");
                    } else { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, reps, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY nationality, reps DESC");
                    }
                }
                else {
                    if ($table["scoring_type"] == 'Time') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, time, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY time ASC");
                    } else if ($table["scoring_type"] == 'Weight') { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, weight, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY weight DESC");
                    } else { 
                        $results = pg_query($dbconn, "SELECT athlete_id, athlname, reps, gender, nationality  FROM results NATURAL JOIN athletes WHERE results.athlete_id = athletes.id AND comp_name = '$comp' AND event_name = '$event_name' ORDER BY reps DESC");
                    }
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
    <?php } ?>

    <a href="index.php">Return to Index</a>
</body>