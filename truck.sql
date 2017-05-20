drop database truck;
create database truck;
USE truck;

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

CREATE TABLE Meny(
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`Mname` varchar(100),
Foreign Key (Mname) REFERENCES Foodtruck(name),
Primary KEY(id,Mname)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE Food(
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`fname` varchar(100),
`price` char(10),
Primary KEY(id)
)
SELECT * FROM Foodtruck;


