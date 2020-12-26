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
	address varchar,
	tax_id integer NOT NULL UNIQUE
);

CREATE TABLE service (
	id integer PRIMARY KEY,
	adm_date  text NOT NULL,
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

select name, address, tax_id
from client JOIN person USING(id);

SELECT name, phone_number 
FROM employee JOIN person USING(id) 
WHERE name LIKE 'Pedro%';

SELECT person.name 
FROM employee JOIN person USING(id)
WHERE username='pedro1' AND password='pass';

SELECT id 
FROM client JOIN person USING(id)
WHERE name='Kanye West';

INSERT INTO model (model_year, brand)
VALUES(2019,Asus);

INSERT INTO computer(client_id, model_id) 
VALUES(13, 1);

SELECT person.name, computer.id, brand, model_year
FROM computer 
JOIN client ON client.id = computer.client_id 
JOIN model ON model.id = computer.model_id
JOIN person ON person.id = client.id
ORDER BY person.name;


INSERT INTO service(
adm_date, delivery_date, finish_date,
service_by, service_item, total)
VALUES (datetime('now'), datetime('now', '+1 day'),
datetime('now','+2 day'),1,1,10);