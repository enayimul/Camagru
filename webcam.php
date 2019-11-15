<?php
include_once('includes/database.php');
$conn = connectiondb();
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
$sql = $conn->prepare($check);
$sql->execute(['Marsh',$img_name]);
echo "success";
    
?>