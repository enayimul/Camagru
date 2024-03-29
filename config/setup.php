<?php
include("database.php");

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
    $sql = "CREATE TABLE IF NOT EXISTS pictures (
        img_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        username VARCHAR(20) NOT NULL,
        imagename VARCHAR(100) NOT NULL,
        `up_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        )";
        $db->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS comments (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
            username VARCHAR(20) NOT NULL,
            img_id INT(6) NOT NULL,
            `up_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            posts VARCHAR(250) NOT NULL
            )";
            $db->exec($sql);
            $sql = "CREATE TABLE IF NOT EXISTS likes (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
                username VARCHAR(20) NOT NULL,
                img_id INT(6) NOT NULL,
                `up_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
                )";
                $db->exec($sql);
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

//$db = new PDO("mysql:host=localhost;dbname=register", "root", "12233221Ee");
?>