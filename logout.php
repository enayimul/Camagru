<?php
{
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['success']);
header('location: home.php?hello');
 //var_dump($_SESSION);
}
?>