PRAGMA foreign_keys = ON;


CREATE TABLE person (
    id integer PRIMARY KEY,
    name varchar NOT NULL UNIQUE,
    phone_number varchar
);

CREATE TABLE employee (
    id integer 
);