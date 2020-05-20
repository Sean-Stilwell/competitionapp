ALTER TABLE contacts
ADD password varchar(255);

INSERT INTO migrations(mig_id,migrated_at)
VALUES ('202003151839_adding_passwords.sql', '2020-03-15 18:39:00');