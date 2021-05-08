create database didico;
use didico;

CREATE TABLE Items (
  ItemId int(10) auto_increment NOT NULL,
  itemName varchar(255) NOT NULL,
  weight float NOT NULL,
  length float NOT NULL,
  width float NOT NULL,
  height float NOT NULL,
  PRIMARY KEY (ItemId)
);

INSERT INTO Items (itemName, weight, length, width, height) VALUES
('Fiddle', 1, 60, 20, 10),
('Dish', 0.1, 30, 30, 5),
('Spoon', 0.05, 15, 5, 2);



