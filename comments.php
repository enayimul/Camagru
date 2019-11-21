<?php
include_once('config/setup.php');
if (isset($_POST['comment']))
{
	session_start();
	$imgid = $_POST['comment'];
	$username = $_SESSION['username'];
	$post = $_POST['message'];
	$sql = $db->prepare("INSERT INTO camagru.comments(img_id,username,posts) VALUE(?,?,?)");
    $arr = array($imgid,$username,$post);
    // var_dump($arr);
    // die();
	if($sql->execute($arr) === TRUE)
	{
		$check = "SELECT email FROM users Where username=?";
		$query = $db->prepare($check);
		$query->execute([$username]);
		$e = $query->fetch(PDO::FETCH_ASSOC);
		if (!empty($e))
		{
			$sub = "comment";
			$msg = "$username commented on your picture $post";
			mail($e['email'],$sub,$msg,'MIME-Version: 1.0\r\nContent-type: text/html;charset=UTF-8'.'From: <bikad58028@mailnet.top>');		
		}
	}
}
header("Location: http://localhost:8080/camagru/gallery.php");
?>