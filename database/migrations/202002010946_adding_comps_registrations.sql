-- Modelling events and relation between athletes
CREATE TABLE competitions (
    comp_name               varchar(255), -- Name of the event
    venue                   varchar(255), -- Venue for the event
    startdate               DATE, -- beginning date
    starttime               time, -- time of day to start
    duration                time, -- time event will take
    PRIMARY KEY (comp_name);
)

CREATE TABLE registrations (
    id                      int(10), -- athlete ID
    comp_name               varchar(255), -- competition name
    PRIMARY KEY (id, comp_name),
    FOREIGN KEY (id) REFERENCES athletes(id),
    FOREIGN KEY (comp_name) REFERENCES competitions(comp_name)
);

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202002010946_adding_comps_registrations.sql', '2020-02-01 09:47:00');