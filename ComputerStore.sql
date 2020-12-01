PRAGMA foreign_keys = ON;


CREATE TABLE person (
    id integer PRIMARY KEY,
    name varchar NOT NULL UNIQUE,
    phone_number varchar
);

CREATE TABLE employee (
    id integer 
);


CREATE TABLE service {
    id integer PRIMARY KEY AUTOINCREMENT,
    adm_date NOT NULL,
    finish_date text,
    delivery_date text,
    service_by integer NOT NULL REFERENCES employee,
    computer_owner integer REFERENCES person,
    service_item integer REFERENCES computer,
    total_tests integer REFERENCES ____,
    total_parts integer REFERENCES ____,
};


CREATE TABLE part {
    id integer PRIMARY KEY 
    serial_number NOT NULL,
    name text NOT NULL,
    price real CHECK(price>0),
    category text,
};

Create Table test {
    name text PRIMARY KEY NOT NULL,
    price real CHECK(price>=0),
    time_needed text CHECK(time_needed>0),
    ontheservice integer REFERENCES service,
}

Create Table QuantityNeededForService{
    partid integer REFERENCES part
    serviceid integer REFERENCES service
    quantity integer NOT NULL,
}