<?php
session_start();
include("gallery.php");
//include("sendmail.php");
include_once ('config/database.php');
if(isset($_POST['comment_button']))
{
    $comment = $_POST['comment'];
}
$img_id   = $_GET['img_id'];
$who = $_SESSION['username'];
$query = $db->prepare("INSERT INTO comments (img_id, comment, user) VALUES ('$img_id', '$comment', '$who')");
$query->execute();
$query = $db->prepare("SELECT username FROM images WHERE img_id = $img_id");
$query->execute();
$result = $query->fetch();
$username = $result['username'];
$query = $db->prepare("SELECT email FROM users WHERE username = '$username'");
$query->execute();
$email = $query->fetch();
$posteremail = $email['email'];
$message = "<p>$who commented on your pic</p>
<br>
<br>
comment: $comment";
$query = $db->prepare("SELECT notify FROM users WHERE username = '$username'");
$query->execute();
$notificationpref = $query->fetch();
if($notificationpref['notify'] == 1)
{
    send_mail($posteremail, '0', $message);
}
echo "<div class='success_message'>success</div>";
?>