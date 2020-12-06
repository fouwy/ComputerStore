.mode columns
.headers on

PRAGMA foreign_keys = ON;

drop table if exists person;
drop table if exists employee;
drop table if exists service;
drop table if exists client;
drop table if exists computer;
drop table if exists model;
drop table if exists part;
drop table if exists QuantityNeededForService;
drop table if exists test;

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

CREATE TABLE service (
	id integer PRIMARY KEY,
	adm_date NOT NULL,
	delivery_date text,
	finish_date text,
	service_by integer NOT NULL REFERENCES employee,
	service_item integer REFERENCES computer,
	total REAL NOT NULL,
	computer_owner integer REFERENCES person,
	CHECK(total > 0)
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

Create Table QuantityNeededForService (
	partid integer REFERENCES part,
	quantity integer NOT NULL,
	serviceid integer REFERENCES service
);

Create Table test (
	name text PRIMARY KEY NOT NULL,
	time_needed text CHECK(time_needed>0),
	ontheservice integer REFERENCES service,
	price real,
	CHECK(price>=0)
);


--Queries
select name, phone_number
from employee JOIN person USING(id);

select name, adress, tax_id
from client JOIN person USING(id);

SELECT name, phone_number 
FROM employee JOIN person USING(id) 
WHERE name LIKE 'Pedro%';