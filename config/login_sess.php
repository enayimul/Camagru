<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
print_r($_POST);
if(isset($_POST['login'])) {
    echo "We're here";
    $username1 =  $_POST['username'];
    $password1 =  $_POST['password'];
if (empty($username1)){array_push($errors[], "Username required");}
if (empty($password1)){array_push($errors[], "Password required");}
if(count($errors) == 0){
    $password1 = md5($password1);
    $lq = $db->prepare("SELECT * FROM users WHERE username = '$username1' and passwd='$password1' LIMIT 1");
    $lq->execute();
    $rows = $lq->rowCount();
    if ($rows)
    {
        $row = $lq->fetchAll();
        $verified = $row[0]['verified'];
        if ($verified == 1)
        {
            echo "WELCOME";
            $_SESSION['username'] = $username1;
            $_SESSION['success'] = "logged in successfuly";
            header('location: home.php');
        }
        else {
            echo "<script>window.alert('Please verify your account')</script>";
            header( "refresh:0; url=index.php" );
        }
    } else {
        echo "<script>window.alert('Error: wrong username/password')</script>";
        header( "refresh:0; url=index.php" );
    }
}
} else {
    echo "Button not set";
}
?>