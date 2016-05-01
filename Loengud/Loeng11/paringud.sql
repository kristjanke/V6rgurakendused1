# tabeli loomine

CREATE TABLE cats (
	id integer PRIMARY KEY auto_increment,
	name varchar(100) NOT NULL,
	age integer DEFAULT 1,
	gender ENUM('M','F') DEFAULT 'M',
	color varchar(200),
	owner_id integer
);

# selekteerimine

SELECT * FROM owners;
SELECT * FROM owners WHERE age<25;
SELECT * FROM owners WHERE age>15 AND age<25;

# sisestamine

INSERT INTO cats VALUES (NULL, 'Tom',23,'M', 'grey',2);
INSERT INTO cats (name,gender,age,owner_id) VALUES ('Pricilla','F',1, 3);

INSERT INTO cats (name,gender,age,color,owner_id) VALUES
('Miisu','F',2,'oranž', 1),
('Kõuts','M',3,'valge', 3),
('Garfield','M',5,'oranž', 1),
('Kerli','F',1,'must', 1);

# uuendamine

UPDATE cats SET color='lilla', age=age+1 WHERE id=6;
UPDATE cats SET age=RAND()*10 WHERE id=9;

## veel pärimist

SELECT * FROM cats where gender='F' ORDER BY age DESC, id DESC;
SELECT * FROM cats limit 4, 5;
SELECT CONCAT(firstname,' ', lastname) as fullname FROM owners;

SELECT count(*), sum(age), max(age), min(age) FROM cats;

SELECT owner_id, count(*) as kasse FROM cats GROUP BY owner_id;

SELECT name, firstname FROM cats, owners;
SELECT name as cat, firstname as owner FROM cats, owners where owners.id=cats.owner_id;
SELECT name as cat, firstname as owner FROM cats as c, owners as o where o.id=c.owner_id;