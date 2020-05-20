-- SQL statement to create the athlete list
CREATE TABLE athletes (
    id              varchar(10),        --10 digit id code
    athlName        varchar(255),   --255 letter name
    dob             DATE,    --10 digit date of birth eg "2000-06-05"
    gender          varchar(1),         --1 letter gender eg "M" or "F"
    PRIMARY KEY (id)
);