<?php
$servername = "localhost";
$db_username = "root";
$db_password = "12233221Ee";

try {
    $db = new PDO("mysql:host=$servername", $db_username, $db_password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    // use exec() because no results are returned
    $db->exec($sql);
    $db->exec("use camagru");
   // echo "Database created successfully <br>";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }



?>