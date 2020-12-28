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

SELECT employee.id 
FROM employee JOIN person USING(id)
WHERE person.username = 'pedro1';