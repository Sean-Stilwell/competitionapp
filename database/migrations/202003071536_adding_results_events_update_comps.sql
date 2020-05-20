-- Updating the competitions table
ALTER TABLE competitions
ADD max_athletes int;

ALTER TABLE competitions
ADD events int;

ALTER TABLE competitions
ADD partner_name varchar(255);

ALTER TABLE competitions
ADD CONSTRAINT fk_partner_name FOREIGN KEY (partner_name) REFERENCES partners(name);

ALTER TABLE competitions
ADD contact_email varchar(255);

ALTER TABLE competitions
ADD CONSTRAINT fk_contact_email FOREIGN KEY (contact_email) REFERENCES contact_person(email);

-- Adding the events table
CREATE TABLE events (
    event_name          varchar(255),
    comp_name           varchar(255),
    scoring_type        varchar(255)
    PRIMARY KEY (event_name, comp_name),
    FOREIGN KEY (comp_name) REFERENCES competitions(name)
);

-- Adding the results table
CREATE TABLE results (
    athlete_id          varchar(10),
    comp_name           varchar(255),
    event_name          varchar(255),
    time                Time,
    reps                int,
    weight              int,
    
    PRIMARY KEY (athlete_id, comp_name, event_name)
    FOREIGN KEY (athlete_id) REFERENCES registrations(athlete_id),
    FOREIGN KEY (comp_name) REFERENCES events(comp_name),
    FOREIGN KEY (event_name) REFERENCES events(event_name)
);

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202003071528_adding_results_events_update_comps.sql', '2020-03-07 15:36:00')