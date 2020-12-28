--
-- File generated with SQLiteStudio v3.2.1 on seg dez 28 19:46:28 2020
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: client
DROP TABLE IF EXISTS client;
CREATE TABLE client (id integer PRIMARY KEY REFERENCES person, address varchar, tax_id integer NOT NULL UNIQUE);
INSERT INTO client (id, address, tax_id) VALUES (3, 'Fafe', 4334);
INSERT INTO client (id, address, tax_id) VALUES (4, 'Colombia', 9999);
INSERT INTO client (id, address, tax_id) VALUES (12, 'Washington', 99999);
INSERT INTO client (id, address, tax_id) VALUES (13, 'East', 99992);

-- Table: computer
DROP TABLE IF EXISTS computer;
CREATE TABLE computer (id integer PRIMARY KEY, client_id integer NOT NULL REFERENCES client (id), model_id integer NOT NULL REFERENCES model (id));
INSERT INTO computer (id, client_id, model_id) VALUES (1, 13, 1);
INSERT INTO computer (id, client_id, model_id) VALUES (2, 13, 2);
INSERT INTO computer (id, client_id, model_id) VALUES (3, 3, 3);
INSERT INTO computer (id, client_id, model_id) VALUES (4, 3, 4);
INSERT INTO computer (id, client_id, model_id) VALUES (5, 4, 5);
INSERT INTO computer (id, client_id, model_id) VALUES (6, 13, 6);
INSERT INTO computer (id, client_id, model_id) VALUES (7, 12, 7);
INSERT INTO computer (id, client_id, model_id) VALUES (8, 3, 8);
INSERT INTO computer (id, client_id, model_id) VALUES (9, 3, 9);
INSERT INTO computer (id, client_id, model_id) VALUES (10, 3, 10);

-- Table: employee
DROP TABLE IF EXISTS employee;
CREATE TABLE employee (
	id integer PRIMARY KEY REFERENCES person
);
INSERT INTO employee (id) VALUES (1);
INSERT INTO employee (id) VALUES (2);
INSERT INTO employee (id) VALUES (5);
INSERT INTO employee (id) VALUES (7);
INSERT INTO employee (id) VALUES (8);
INSERT INTO employee (id) VALUES (9);
INSERT INTO employee (id) VALUES (10);
INSERT INTO employee (id) VALUES (11);

-- Table: model
DROP TABLE IF EXISTS model;
CREATE TABLE model (id integer PRIMARY KEY, model_year integer NOT NULL, brand varchar NOT NULL, model_name TEXT);
INSERT INTO model (id, model_year, brand, model_name) VALUES (1, 2019, 'Asus', NULL);
INSERT INTO model (id, model_year, brand, model_name) VALUES (2, 2015, 'HP', NULL);
INSERT INTO model (id, model_year, brand, model_name) VALUES (3, 2020, 'MSI', NULL);
INSERT INTO model (id, model_year, brand, model_name) VALUES (4, 2015, 'LG', NULL);
INSERT INTO model (id, model_year, brand, model_name) VALUES (5, 2018, 'HP', NULL);
INSERT INTO model (id, model_year, brand, model_name) VALUES (6, 2017, 'Dell', NULL);
INSERT INTO model (id, model_year, brand, model_name) VALUES (7, 2020, 'MSI', NULL);
INSERT INTO model (id, model_year, brand, model_name) VALUES (8, 2019, 'Asus', 'Zenbook');
INSERT INTO model (id, model_year, brand, model_name) VALUES (9, 2018, 'LG', 'Gram');
INSERT INTO model (id, model_year, brand, model_name) VALUES (10, 2014, 'HP', 'Pavilion');

-- Table: part
DROP TABLE IF EXISTS part;
CREATE TABLE part (
	id integer PRIMARY KEY,
	name varchar NOT NULL,
	serial_num integer NOT NULL UNIQUE,
	price REAL NOT NULL,
	category varchar NOT NULL,
	service_id integer NOT NULL REFERENCES service,
	CHECK(price > 0)
);
INSERT INTO part (id, name, serial_num, price, category, service_id) VALUES (1, 'intel i5-10600k', 1234, 250.0, 'CPU', 1);
INSERT INTO part (id, name, serial_num, price, category, service_id) VALUES (2, 'Corsair Vengeance RGB Pro 16GB', 2910, 100.0, 'RAM', 2);
INSERT INTO part (id, name, serial_num, price, category, service_id) VALUES (3, 'intel i7-10600', 901, 350.0, 'CPU', 2);
INSERT INTO part (id, name, serial_num, price, category, service_id) VALUES (4, 'AMD RYZEN 5950X', 485920183, 600.0, 'CPU', 2);
INSERT INTO part (id, name, serial_num, price, category, service_id) VALUES (5, 'Gigabyte GeForce RTX 3090', 5121, 1800.0, 'GPU', 1);

-- Table: person
DROP TABLE IF EXISTS person;
CREATE TABLE person (id integer PRIMARY KEY, name varchar NOT NULL UNIQUE, phone_number varchar, username VARCHAR UNIQUE NOT NULL, password VARCHAR NOT NULL);
INSERT INTO person (id, name, phone_number, username, password) VALUES (1, 'Pedro Martins', '911', 'pedro1', 'pass');
INSERT INTO person (id, name, phone_number, username, password) VALUES (2, 'Miguel', '112', 'miguel1', 'pass');
INSERT INTO person (id, name, phone_number, username, password) VALUES (3, 'Laurindo', '966 706 760', 'laurindo1', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');
INSERT INTO person (id, name, phone_number, username, password) VALUES (4, 'Inácio Escobar', '911 100 200', 'inacio1', 'pass');
INSERT INTO person (id, name, phone_number, username, password) VALUES (5, 'Pedro Soares', '911 111 111', 'pedro2', 'pass');
INSERT INTO person (id, name, phone_number, username, password) VALUES (6, 'Pedro Martinez', '911771948', 'pedro3', '12345678');
INSERT INTO person (id, name, phone_number, username, password) VALUES (7, 'Robert California', '911411891', 'roberto', '12345678');
INSERT INTO person (id, name, phone_number, username, password) VALUES (8, 'Linus Sebastian', '921031740', 'linus', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
INSERT INTO person (id, name, phone_number, username, password) VALUES (9, 'Hallo', '912611221', 'thenoobshow', '7c222fb2927d828af22f592134e8932480637c0d');
INSERT INTO person (id, name, phone_number, username, password) VALUES (10, 'Blyat Man', '123124412', 'blyat', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');
INSERT INTO person (id, name, phone_number, username, password) VALUES (11, 'Paulo Gomes', '910291931', 'paulo', 'fd077434a7c3095bfe440741787d02f6a7bab07e');
INSERT INTO person (id, name, phone_number, username, password) VALUES (12, 'Denzel Washington', NULL, 'denzel', '6ee133d6374ff8e319bb570ac4d382be4eb48403');
INSERT INTO person (id, name, phone_number, username, password) VALUES (13, 'Kanye West', '039129313', 'ye', 'f94739373a5e2c903a507c075effad238d7b7494');

-- Table: QuantityNeededForService
DROP TABLE IF EXISTS QuantityNeededForService;
CREATE TABLE QuantityNeededForService (
	partid integer REFERENCES part,
	quantity integer NOT NULL,
	serviceid integer REFERENCES service
);
INSERT INTO QuantityNeededForService (partid, quantity, serviceid) VALUES (1, 1, 1);
INSERT INTO QuantityNeededForService (partid, quantity, serviceid) VALUES (2, 2, 2);
INSERT INTO QuantityNeededForService (partid, quantity, serviceid) VALUES (3, 1, 2);
INSERT INTO QuantityNeededForService (partid, quantity, serviceid) VALUES (4, 1, 2);
INSERT INTO QuantityNeededForService (partid, quantity, serviceid) VALUES (5, 1, 1);

-- Table: service
DROP TABLE IF EXISTS service;
CREATE TABLE service (id integer PRIMARY KEY, adm_date TEXT NOT NULL, delivery_date TEXT, finish_date TEXT, service_by integer NOT NULL REFERENCES employee (id), service_item integer REFERENCES computer (id), total REAL NOT NULL, CHECK (total > 0));
INSERT INTO service (id, adm_date, delivery_date, finish_date, service_by, service_item, total) VALUES (1, '2020-12-25', '2020-12-03', '2020-12-02', 1, 1, 100.0);
INSERT INTO service (id, adm_date, delivery_date, finish_date, service_by, service_item, total) VALUES (2, '2020-12-01', '2021-01-27', '2020-12-31', 2, 2, 145.0);
INSERT INTO service (id, adm_date, delivery_date, finish_date, service_by, service_item, total) VALUES (3, '2020-12-01', '2020-12-08', '2020-12-02', 2, 3, 1.0);
INSERT INTO service (id, adm_date, delivery_date, finish_date, service_by, service_item, total) VALUES (4, '2020-12-01', '2020-11-25', '2020-11-20', 1, 3, 35.0);
INSERT INTO service (id, adm_date, delivery_date, finish_date, service_by, service_item, total) VALUES (5, '2020-12-17', '2023-12-30', '2023-10-12', 5, 4, 1500.0);
INSERT INTO service (id, adm_date, delivery_date, finish_date, service_by, service_item, total) VALUES (6, '2020-12-27', '2020-12-09', '2020-12-31', 1, 2, 20.0);
INSERT INTO service (id, adm_date, delivery_date, finish_date, service_by, service_item, total) VALUES (7, '2020-11-03', '', '', 2, 10, 15.0);

-- Table: test
DROP TABLE IF EXISTS test;
CREATE TABLE test (id INTEGER PRIMARY KEY, name text NOT NULL, time_needed INTEGER CHECK (time_needed > 0), ontheservice integer REFERENCES service, price real, CHECK (price >= 0));
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (1, 'ram', '01:40', 4, 12.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (2, 'cpu', '00:30', 4, 5.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (3, 'ram', '00:20', 5, 4.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (4, 'cpu', '01:00', 5, 10.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (5, 'gpu', '00:40', 5, 9.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (6, 'ram', '02:32', 6, 20.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (7, 'ram', '02:15', 7, 15.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (8, 'ram', '02:35', 1, 9.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (9, 'ram', '00:40', 2, 5.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (10, 'ram', '07:47', 2, 5.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (11, 'cpu', '00:34', 2, 5.0);
INSERT INTO test (id, name, time_needed, ontheservice, price) VALUES (12, 'gpu', '00:40', 2, 10.0);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
