<?php
session_start();
include("gallery.php");
include_once ('config/database.php');
$img_id   = $_GET['img_id'];
$query = $db->prepare("SELECT username FROM `images` WHERE img_id = $img_id");
$query->execute();
$result = $query->fetch();
$username = $result['username'];
$who = $_SESSION['username'];
if($who == $username)
{
    $query = $db->prepare("DELETE FROM `images` WHERE img_id = $img_id");
    $query->execute();
    echo "<div class='success_message'>Deleted Successfully</div>";
    header("Location: http://localhost:8080/Camagru/gallery.php");
}
else
{
    echo "<div class='error_message'>you do not have permission to delete this pic</div>";
}
?>