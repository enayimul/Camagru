<!DOCTYPE >
<?php session_start();
    // ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
?>
<html>
    <head>
        <link rel="stylesheet" href="style2.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Camagru :home</title>
    </head>

    <body>
        <?php
            //if (!isset($_SESSION['success'])) header('location: index.php');
        ?>
        <div class="main_wrapper">
            
            <div class="header_wrapper">
                <h1 id="slogan">Camagru</h1>
            </div>

            <div class="menubar">
                <ul id="menu">
                    <li><a href="?link=1" name="link1">Home</a></li>
                    <li><a href="?link=2" name="link2">Gallery</a></li>
                    <li><a href="?link=3" name="link3">Upload</a></li>
                    <li><a href="?link=4" name="link4">Account settings</a></li>
                    <?php
                            if (isset($_SESSION['logged_in'])){
                                echo '<li><a href="?link=5" name="link5">Logout</a></li>';
                            }else{
                                echo '<li><a href="login.php" name="link5">Login/Sign up</a></li>';
                            }
                          
                        ?>
                  


                    <li><a href="capture.php" name="link6">Screenshot</a>
                </ul>
            </div>

            <div id="content_area">
            <div id="content_box">
                <?php

                    include "config/database.php";

                    $link = 1;
                    if(isset($_GET['link'])){
                    $link = $_GET['link'];
                    }
                    if ($link == '1'){
                        // echo "feed";
                    }
                    else if ($link == '2')
                    {
                        $offset = 0;
                        if(isset($_GET['offset'])){
                            $offset = $_GET['offset'];
                        }
                        if($offset < 0){
                            $offset = 0;
                        }
                        ////////////////////load gallery/////////////////////////
                            try
                            {
                                $db = new PDO("mysql:host=$servername;dbname=camagru", $db_username, $db_password);
                            // set the PDO error mode to exception
                                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $sql = "SELECT * FROM pictures LIMIT $offset, 5";
                                $stmt = $db->prepare($sql);
                                $stmt->execute();
                                $user = $stmt->fetchAll();
                                
                                foreach ($user as $key => $value) {
                                    //do something with values from array
                                    $imgpath = "uploads/".$value['imagename'];
            
                                            echo '<img src="'.$imgpath.'" alt="Smiley face" height="200" width="200">';
                                }
                
                            }
                            catch (PDOException $e)
                            {
                                echo "Error here->".$e->getMessage();
                            }
                    }
                    else if ($link == '3')
                    {
                        include "uploads.php";
                    }
                   if ($link == '4')
                    {
                        if (!isset($_SESSION['success'])) header('location: index.php');
                        
                        
                    }
                    else if ($link == '5')
                    {
                        session_destroy();
                        unset($_SESSION['username']);
                        unset($_SESSION['success']);
                        header('location: home.php?logged');
                        //var_dump($_SESSION);
                    }
                    else if ($link == '6')
                    {
                        // echo '<div style="display: flex"><div style="display: grid"><video id="video" autoplay></video><button id="snap" style="width: 80px">Capture</button></div><div style="display: grid"><canvas id="canvas" width=300 height=300></canvas><button id="save" style="width: 80px">Save</button></div></div><script src="camera.js"></script>';
                        // $img = $_POST['img'];
                       
                        // $new_name = uniqid().".png";
                        // $dest = "resources/saved_images/".$new_name;
                        // file_put_contents($dest, $img);
                    }
                    else
                    {  
                        //var_dump($_SESSION);
                        // echo"default home";
                    }
                ?>
            </div>
            </div>

            
            <div id="footer">
                <p> &copyWTC</p>
            </div>
        </div>
    </body>
</html>