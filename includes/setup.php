<?php
include("database.php");

try {
    $db = new PDO("mysql:host=$servername", $db_username, $db_password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    // use exec() because no results are returned
    $db->exec($sql);
    echo "Database created successfully <br>";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }



try {
    $db = new PDO("mysql:host=$servername;dbname=camagru", $db_username, $db_password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        username VARCHAR(20) NOT NULL,
        email VARCHAR(30) NOT NULL,
        passwd VARCHAR(255) NOT NULL,
        -- join_date timestamp,
        link VARCHAR(255) NOT NULL,
        email_verify BOOLEAN
        )";
    $db->exec($sql);
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

//$db = new PDO("mysql:host=localhost;dbname=register", "root", "12233221Ee");
?>