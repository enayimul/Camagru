<?php
include("database.php");
$msg = "";
if(isset($_POST['submit'])){
  $username = $_GET['username'];
  try{
      $sql = "UPDATE users SET verified = 1 WHERE username =  '$username'";
      $db->exec($sql);
      header("location: sign.php");
      echo "your email has been verified you may login";
  }
  catch(PDOException $ex){
      $msg = "error";
      echo $msg;
  }
}
?>