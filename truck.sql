drop database truck;
create database truck;
USE truck;
CREATE TABLE Users(
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`firstname` varchar(40),
`lastname`varchar(40),
`username`varchar(40),
`password`char(15),

PRIMARY KEY(`id`)

)ENGINE=INNODB DEFAULT CHARSET=utf8;
CREATE TABLE Menu(
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`mname` varchar(100),
Primary KEY(`id`,`mname`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE Foodtruck(
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(100),
`owner` varchar(100),
`description` varchar(100),
`open` char(20),
`location` varchar(100),
`homepage` varchar(100),
Primary KEY(`id`)
) 
ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE Food(
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`fname` varchar(100),
`fdescription` varchar(100),	
`price` char(10),
Primary KEY(`id`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO Food(fname,fdescription,price)
    VALUES('ss','ff','gg');

SELECT * FROM Foodtruck;
SELECT * FROM Menu;
<SELECT * FROM Food;

