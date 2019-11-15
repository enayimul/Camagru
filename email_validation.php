<?php
include("config/setup.php");
$msg = "";
if(isset($_GET['link'])){
  $link = $_GET['link'];
  try{
    $exists = $db->prepare("SELECT * FROM users WHERE link='$link' LIMIT 1");
    $exists->execute();
    if ($exists->rowCount() == 1){
      $sql = $db->prepare("UPDATE users SET email_verify = 1 WHERE link = '$link'");
      $sql->execute();
      echo "here";
      if ($sql){
        echo "your email has been verified you may login";
        //header("location: login.php");
        echo "<a href='login.php'> sign in </a>";
      }
      else {
        echo"did not work";
      }
      }
    }
  catch(PDOException $ex){
      $msg = "error";
      echo $msg;
  }
}
?>