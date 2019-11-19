<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="style2.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Camagru :home</title>
    </head>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>

<div class="menubar">
                <ul id="menu">
                    <!-- <li><a href="home.php?link=1" name="link1">Home</a></li> -->
                    <li><a href="home.php?link=2" name="link2">Gallery</a></li>
             
                    <!-- <li><a href="home.php??link=4" name="link4">Account settings</a></li> -->
                    <?php
                            if (isset($_SESSION['logged_in'])){
                                echo '<li><a href="home.php?link=5" name="link5">Logout</a></li>';
                            }else{
                                echo '<li><a href="login.php" name="link5">Login</a></li>';
                                echo '<li><a href="signup.php" name="link5">Sign up</a></li>';
                            }
                          
                        ?>
                  


                    <!-- <li><a href="capture.php" name="link6">Screenshot</a> -->
                </ul>
            </div>
<h2>CAMAGRU</h2><hr>

<P>You are currently not signed in <a href="login.php">Login?</a> Not yet a member? <a href="signup.php">Sign up</a> </P>

<!-- <p> You are logged in as {username} <a href="logout.php">Logout</a> </p> -->
</body>
</html> 