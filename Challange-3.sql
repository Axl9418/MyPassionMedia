create database mycompany;
use mycompany;

CREATE TABLE Employees (
  employeeID int(10)  auto_increment NOT NULL,
  firstName varchar(30) NOT NULL,
  lastName varchar(30) NOT NULL,
  age int(3) NOT NULL,
  PRIMARY KEY (employeeID)
);

CREATE TABLE Addresses (
  addressID int(2) auto_increment NOT NULL,
  employeeID int(11) NOT NULL,
  address varchar(30) NOT NULL,
  city varchar(30) NOT NULL,
  provinceID int(1) NOT NULL,
  postalCode varchar(10) NOT NULL,
  movedInDate date NOT NULL,
  PRIMARY KEY (addressID),
  FOREIGN KEY (employeeID) REFERENCES Employees (employeeID)
);


CREATE TABLE Provinces (
  provinceID int(1) auto_increment NOT NULL,
  province varchar(30) NOT NULL,
  PRIMARY KEY (provinceID)
);


INSERT INTO Employees (firstName, lastName, age) VALUES
('Rob', 'Jhonson', 33),
('John', 'Erickson', 27),
('Peter', 'Miler', 27),
('Christopher', 'Krebs', 40),
('Stephany', 'Anderson', 36);

INSERT INTO Addresses (employeeID, address, city, provinceID, postalCode, movedInDate) VALUES
(1, 'Hythe Avenue 221', 'Vancouver', 2, 'V5K 0B2', '2017-02-18'),
(1, 'Hythe Avenue 221', 'Vancouver', 2, 'V5K 0B2', '2017-10-10'),
(2, 'Wallstreet 76', 'Edmonton', 1, 'T5J 0N3', '2016-11-19'),
(3, 'Brown Blvd 35', 'Fredericton', 5, 'E3A 0l8', '2003-01-07'),
(4, 'Kaslo 87', 'Vancouver', 2, 'V5K 1A4', '2018-10-14'),
(5, 'Burrant 298', 'Vancouver', 2, 'V5K 1E2', '2009-01-14');

INSERT INTO Provinces (province) VALUES
('Alberta'),
('British Columbia'),
('Manitoba'),
('New Brunswick'),
('Newfoundland and Labrador'),
('Nova Scotia'),
('Ontario'),
('Quebec'),
('Saskatchewan');



/*  List with each employee's full name and their current address */

SELECT Employees.firstName
      ,Employees.lastName
      ,Addresses.address
      ,Addresses.city
      ,Provinces.province
      ,Addresses.postalCode
      ,Addresses.movedInDate
FROM Employees INNER JOIN Addresses ON Employees.employeeID = Addresses.employeeID 
			   INNER JOIN Provinces ON Addresses.provinceID = Provinces.provinceID 
               WHERE Addresses.addressID = ( SELECT addressID
										FROM Addresses 
										WHERE employeeID = Employees.employeeID
										ORDER BY movedInDate DESC
										LIMIT 1 )
ORDER BY Employees.employeeID, Addresses.movedInDate desc;
