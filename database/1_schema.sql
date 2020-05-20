-- SQL statement to create the athlete list
CREATE TABLE athletes (
    id              varchar(10),        --10 digit id code
    athlName        varchar(255),   --255 letter name
    dob             DATE,           --10 digit date of birth eg "2000-06-05"
    gender          varchar(1),         --1 letter gender eg "M" or "F"
    PRIMARY KEY (id)
);

-- Introducing migrations to my database
CREATE TABLE migrations (
    mig_id                  varchar(255),
    migrated_at             time,
    PRIMARY KEY (mig_id)
);

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202001271811_deliv1.sql', '2020-01-27 18:11:00');
INSERT INTO migrations (mig_id,migrated_at)
VALUES ('202001301127_adding_migrations.sql', '2020-01-30 11:27:00');

-- Modelling competitions and relation between athletes
CREATE TABLE competitions (
    comp_name               varchar(255), -- Name of the event
    venue                   varchar(255), -- Venue for the event
    startdate               DATE, -- beginning date
    starttime               time, -- time of day to start
    duration                time, -- time event will take
    PRIMARY KEY (comp_name)
);

CREATE TABLE registrations (
    id                      varchar(10), -- athlete ID
    comp_name               varchar(255), -- competition name
    PRIMARY KEY (id, comp_name),
    FOREIGN KEY (id) REFERENCES athletes(id),
    FOREIGN KEY (comp_name) REFERENCES competitions(comp_name)
);

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202002010946_adding_comps_registrations.sql', '2020-02-01 09:47:00');

-- Adding the email and nationality fields to athletes
ALTER TABLE athletes
ADD nationality varchar(255);

ALTER TABLE athletes
ADD email varchar(255);

-- Adding the contact person entity
CREATE TABLE contacts (
    email           varchar(255),
    name            varchar(255),
    phone           varchar(255),
    PRIMARY KEY (email)
);

-- Adding the partners entity
CREATE TABLE partners (
    name            varchar(255),
    address         varchar(255),
    contact_email   varchar(255),
    PRIMARY KEY (name),
    FOREIGN KEY (contact_email) REFERENCES contacts(email)
);

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202003071528_adding_contacts_and_partners.sql', '2020-03-07 15:28:00');

-- Updating the competitions table
ALTER TABLE competitions
ADD max_athletes int;

ALTER TABLE competitions
ADD events int;

ALTER TABLE competitions
ADD partner_name varchar(255);

ALTER TABLE competitions
ADD contact_email varchar(255);

-- Adding the events table
CREATE TABLE events (
    event_name          varchar(255),
    comp_name           varchar(255),
    scoring_type        varchar(255),
    PRIMARY KEY (event_name),
    FOREIGN KEY (comp_name) REFERENCES competitions(comp_name)
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
);

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202003071528_adding_results_events_update_comps.sql', '2020-03-07 15:36:00');

ALTER TABLE results
ADD tiebreaker1success boolean;

ALTER TABLE results
ADD tiebreaker2success boolean;

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202003091741_adding_tiebreakers.sql', '2020-03-09 17:41:00');

ALTER TABLE contacts
ADD password varchar(255);

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202003151839_adding_passwords.sql', '2020-03-15 18:39:00');