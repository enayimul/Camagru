<?php
include("database.php");
$servername = "localhost";
$username = "root";
$password = "12233221Ee";

try {
    $conn = new PDO("mysql:host=$servername;dbname=camagru", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    $sql = "CREATE TABLE camagru.users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(20) NOT NULL,
        email VARCHAR(30) NOT NULL,
        passwd VARCHAR(255) NOT NULL,
        join_date timestamp,
        email_verify BOOLEAN
        )";
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    echo "Bye Felecia";
//$db = new PDO("mysql:host=localhost;dbname=register", "root", "12233221Ee");
?>