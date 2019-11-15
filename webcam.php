<?php
include_once('config/database.php');
include_once('config/setup.php'); 
session_start();
$imgfile = file_get_contents("php://input");
$x = explode(',', $imgfile);
$photo = base64_decode($x[1]);
$img_name = uniqid().".png";
if (!file_exists("uploads/"))
{
    mkdir("uploads/");
}
file_put_contents("uploads/".$img_name, $photo);
$check = "INSERT INTO camagru.pictures (username, imagename) VALUES(?,?)";
$sql = $db->prepare($check);
$sql->execute(['Marsh',$img_name]);
echo "success";
    
?>