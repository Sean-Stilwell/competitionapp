-- In this example, we realize the duplicate Anna Parker exists and remove
-- the second entry from the database
DELETE FROM athletes WHERE id=1000000005;

-- In this example, Matthew Thomas is removed from the database.
DELETE FROM athletes WHERE athlName="Matthew Thomas";

-- We can delete a competiton by deleting it from all relevant areas
DELETE FROM results WHERE comp_name="The uOttawa Tournament";
DELETE FROM events WHERE comp_name="The uOttawa Tournament";
DELETE FROM registrations WHERE comp_name="The uOttawa Tournament";
DELETE FROM competitions WHERE comp_name="The uOttawa Tournament";