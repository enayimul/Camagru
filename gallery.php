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
            // if (!isset($_SESSION['success'])) header( "refresh:0; url=../index.php" );//header('location: index.php');
        ?>
        <div class="main_wrapper">
            
            <div class="header_wrapper">
                <h1 id="slogan">Camagru</h1>
            </div>

            <div class="menubar">
                <ul id="menu">
                    <li><a href="home.php" name="link1">Home</a></li>
                    <li><a href="gallery.php" name="link2">Gallery</a></li>
                    <li><a href="uploads.php" name="link3">Upload</a></li>
                    <li><a href="?link=4" name="link4">Account settings</a></li>
                    <li><a href="?link=5" name="link5">Logout</a></li>
                    <li><a href="capture.php" name="link6">Screenshot</a>
                </ul>
            </div>

            <div id="content_area">
            <div id="content_box">
            <?php
            include "config/database.php";
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
                    $sql = "SELECT * FROM pictures ORDER by up_date DESC  LIMIT $offset, 5";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $user = $stmt->fetchAll();
                    
                    foreach ($user as $key => $value) {
                        //do something with values from array
                        $imgpath = "uploads/".$value['imagename'];

                                echo '<img src="'.$imgpath.' " alt="Smiley face" height="300" width="300"><input type="textarea" name="comments">';
                    }
                    
    
                }
                catch (PDOException $e)
                {
                    echo "Error here->".$e->getMessage();
                }
            ?>
            </div>
<?php
echo "<a href='?offset=".($offset+5)."'>Next</a>";

if($offset < 0 || ($offset - 5) < 0){
    echo "<a href='?offset=0'>Prev</a>";

}else{
    echo "<a href='?offset=".($offset-5)."'>Prev</a>";
}
?>
            
            </div>
            <div id="footer">
                <p> &copyWTC</p>
            </div>
        </div>
    </body>
</html>