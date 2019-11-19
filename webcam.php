
<body>
</body>
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
<?php

$image  = $_POST['url'];

if(!isset($_SESSION))
{
    session_start();
}

if ($_SESSION['pic'] == 0)
{
    if (!file_exists("images/"))
    {
        mkdir("images/");
    }
    $_SESSION['pic'] = 1;
    $output = "output".date('Y-m-dH-i-s').".jpeg";
    imagejpeg(imagecreatefromstring(file_get_contents($image)), "images/".$output);
    $_SESSION['image'] = $output;
}
    $output = $_SESSION['image'];
  //  echo $output;
   ?>

   <img src = "<?php echo 'images/'.$output?>">
   <form method =  "post">
        <select name  = "sticker">
            <option value = "./img/sticker01.png">spiderman</option>
            <option value = "./img/sticker02.jpg">batman</option>
            <option value = "./img/sticker03.jpg">pepe</option>
        </select>
        <input type = "submit" name = "apply" value = "Apply Sticker">
    </form>
    <form method =  "post">
                <input type = "submit" name = "database" value = "Submit">
    </form>   
   <?php

if (isset($_POST['apply']))
{
    $selected = $_POST['sticker'];

   // echo $output;
   // echo "<img src = $selected>";
   // die();
    $stamp = imagecreatefrompng($selected);
    $im = imagecreatefromjpeg( "images/".$_SESSION['image']);
   // echo $stamp;
   // die();
   // echo $im;
   // die();
    $marge_right = 2;
    $marge_bottom = 2;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    imagecopy($im, $stamp, 0, imagesy($im) - $sy - $marge_bottom, 20, 40, imagesx($stamp), imagesy($stamp));
    imagejpeg($im,"images/".$output);
    imagedestroy($im);
   // $images = "output".date('Y-m-dH-i-s').".jpeg";
}
//echo $image;

if (isset($_POST['database']))
{
    include_once('config/database.php');
    include_once('config/setup.php'); 
    // session_start();
    // $imgfile = file_get_contents("php://input");
    // $x = explode(',', $imgfile);
    // $photo = base64_decode($x[1]);
    // $img_name = uniqid().".png";
    if (!file_exists("uploads/"))
    {
        mkdir("uploads/");
    }
    copy("images/".$output, "uploads/".$output);
    $check = "INSERT INTO camagru.pictures (username, imagename) VALUES(?,?)";
    $sql = $db->prepare($check);
    $sql->execute(['use',$output]);
    echo '<script>alert("Image uploaded")</script>';
    echo '<script>window.location = "gallery.php"</script>';
}   
?>