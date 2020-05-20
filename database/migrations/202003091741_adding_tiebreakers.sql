-- Adding tiebreakers
ALTER TABLE results
ADD tiebreaker1success bool;

ALTER TABLE results
ADD tiebreaker2success bool;

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202003091741_adding_tiebreakers.sql', '2020-03-09 17:41:00');