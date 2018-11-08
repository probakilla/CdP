
CREATE DATABASE IF NOT EXISTS CdP;
USE CdP;

CREATE TABLE IF NOT EXISTS Project (
    Name VARCHAR(32) NOT NULL,
    PRIMARY KEY (Name)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Issue (
    ProjectName VARCHAR(32) NOT NULL,
    Id INT(100) NOT NULL,
    Description VARCHAR(500) NOT NULL,
    Priority ENUM('High', 'Medium', 'Low'),
    Difficulty INT(150) NOT NULL,
    PRIMARY KEY (ProjectName, Id),
    FOREIGN KEY (ProjectName) REFERENCES Project(Name)
) ENGINE=InnoDB;
