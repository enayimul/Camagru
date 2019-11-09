<?php
require 'database.php';
require 'setup.php';

if (isset($_POST['email'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['passwrd'];

//    $passwordrpt = $_POST['passwrdrpt'];
//    print_r($_POST);

    // if ($password !== $password2){
    //     $_SESSION['errors'] = "Passwords do not match";
    //     header('Location: ../signup.php');
    //     //exit();
    //     return;
    // }
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sqlinsert = "INSERT INTO users (username, email, passwd)
                    VALUES (?,?,?)";

        $statement = $db->prepare($sqlinsert);
        $statement->execute([$username, $email, $password]);
        header("Location: ../login.php");
        }
        catch (PDOException $ex){
        $result = "<p style='padding: 20px; color: red;'> An error occured: ".$ex->getMessage()." </p>";
    }

}
?>