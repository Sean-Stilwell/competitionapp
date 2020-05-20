-- Displays all data
SELECT id,athlName,dob,gender FROM athletes;
SELECT * FROM competitions;
SELECT * FROM registrations;
SELECT * FROM partners;
SELECT * FROM events;
SELECT * FROM contacts;

-- Selects all male athletes at the uOttawa Tournament competition
SELECT * FROM athletes
INNER JOIN registrations
WHERE athletes.id = registrations.id AND athletes.gender = 'M';

-- Selects all results at the uOttawa tournament for speed skating in order
SELECT athlete_id, event_name, athlName, time, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.id = results.athlete_id AND comp_name = "The uOttawa Tournament" AND event_name = "Speed Skating"
ORDER BY time ASC;

-- Selects all results at the uOttawa tournament for speed skating in order
SELECT athlete_id, event_name, athlName, time, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.id = results.athlete_id AND comp_name = "The uOttawa Tournament" AND event_name = "100m Sprint"
ORDER BY time ASC;

-- Selects all results at the uOttawa tournament for weightlifting in order
SELECT athlete_id, event_name, athlName, weight, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.id = results.athlete_id AND comp_name = "The uOttawa Tournament" AND event_name = "Weightlifting"
ORDER BY weight DESC;

-- Only showing the top females from the weightlifting
SELECT athlete_id, event_name, athlName, weight, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.gender = 'F' AND athletes.id = results.athlete_id AND comp_name = "The uOttawa Tournament" AND event_name = "Weightlifting"
ORDER BY weight DESC;

-- Only showing the top males from the weightlifting
SELECT athlete_id, event_name, athlName, weight, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.gender = 'M' AND athletes.id = results.athlete_id AND comp_name = "The uOttawa Tournament" AND event_name = "Weightlifting"
ORDER BY weight DESC;

-- Selects all results at the Bob Smith competiton for pushups in order
SELECT athlete_id, event_name, athlName, reps, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.id = results.athlete_id AND comp_name = "Bob Smith Competition" AND event_name = "Push-ups"
ORDER BY reps DESC;

-- Selects all results at the Bob Smith competiton for situps in order
SELECT athlete_id, event_name, athlName, reps, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.id = results.athlete_id AND comp_name = "Bob Smith Competition" AND event_name = "Sit-ups"
ORDER BY reps DESC;

-- Selects all results at the Gatineau games for cycling in order
SELECT athlete_id, event_name, athlName, time, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.id = results.athlete_id AND comp_name = "Jeux de Gatineau" AND event_name = "Cycling"
ORDER BY time ASC;

-- Selects all results at the Gatineau games for marathon in order
SELECT athlete_id, event_name, athlName, time, nationality FROM results
NATURAL JOIN athletes
WHERE athletes.id = results.athlete_id AND comp_name = "Jeux de Gatineau" AND event_name = "Marathon"
ORDER BY time ASC;
