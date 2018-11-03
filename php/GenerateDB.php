<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=CdP;charset=utf8', 'root', '');
        $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); // Error Handling

        $sql = "CREATE TABLE IF NOT EXISTS Project (
        Name VARCHAR(32) NOT NULL,
        PRIMARY KEY (Name)) ENGINE=InnoDB;" ;
        $bdd->exec($sql);

        $sql2 = "CREATE TABLE IF NOT EXISTS Issue (
        ProjectName VARCHAR(32) NOT NULL,
        Id INT(100) NOT NULL,
        Description VARCHAR(500) NOT NULL,
        Priority ENUM('High', 'Medium', 'Low'),
        Difficulty INT(150) NOT NULL,
        PRIMARY KEY (ProjectName, Id),
        FOREIGN KEY (ProjectName) REFERENCES Project(Name)) ENGINE=InnoDB;" ;
        $bdd->exec($sql2);
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
?>
