PRAGMA foreign_keys = ON;

CREATE TABLE person (
	id integer PRIMARY KEY,
	name varchar NOT NULL UNIQUE,
	phone_number varchar
);

CREATE TABLE employee (
	id integer PRIMARY KEY REFERENCES person
);

CREATE TABLE client (
	id integer PRIMARY KEY REFERENCES person,
	adress varchar,
	tax_id integer NOT NULL UNIQUE
);

CREATE TABLE computer (
	id integer PRIMARY KEY,
	client_id integer NOT NULL REFERENCES client,
	model_id integer NOT NULL REFERENCES model
);

CREATE TABLE model (
	id integer PRIMARY KEY,
	model_year integer NOT NULL,
	brand varchar NOT NULL
);

CREATE TABLE part (
	id integer PRIMARY KEY,
	name varchar NOT NULL,
	serial_num integer NOT NULL UNIQUE,
	price REAL NOT NULL,
	category varchar NOT NULL,
	service_id integer NOT NULL REFERENCES service,
	CHECK(price > 0)
);	