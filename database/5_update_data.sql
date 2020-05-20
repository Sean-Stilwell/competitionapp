-- In this example, we change Josh Baker's name to Josh Lee
UPDATE athletes
SET athlName="Josh Lee"
WHERE athlName="Josh Baker";

-- We then update Ava Hughe's birthday.
UPDATE athletes
SET DOB="2002-03-06"
WHERE id=1000000007;

-- We reschedule an event's time
UPDATE competitions
SET starttime="12:45:00"
WHERE com_name="Bob Smith Competition";

-- Updates are also demonstrated in the application!