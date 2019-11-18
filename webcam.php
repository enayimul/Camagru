
<body>
</body>
<?php

$image  = $_POST['url'];

if (!file_exists("images/"))
{
    mkdir("images/");
}


    $output = "output".date('Y-m-dH-i-s').".png";
   imagepng(imagecreatefromstring(file_get_contents($image)), "images/".$output);
   ?>
   <img src = "<?php echo 'images/'.$output?>">
   <form method =  "post">
        <select name  = "sticker">
            <option value = "locationofstiker">linkedin</option>
            <option value = "locationofstiker">linkedin</option>
        </select>
        <input type = "submit" name = "apply" value = "Apply Sticker">
    </form>
   
   <?php

if (isset($_POST['apply']))
{
    $selected = $_POST['sticker'];

    $stamp = imagecreatefrompng($selected);
    $im = imagecreatefrompng( "images/".$output);
    $marge_right = 10;
    $marge_bottom = 10;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    imagecopy($im, $stamp, 0, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
    imagejpeg($im,"uploads/".$out);
    imagedestroy($im);
    $images = "output".date('Y-m-dH-i-s').".jpeg";
    // copy("uploads/".$out, "images/".$images);

}
//echo $image;

// include_once('config/database.php');
// include_once('config/setup.php'); 
// session_start();
// $imgfile = file_get_contents("php://input");
// $x = explode(',', $imgfile);
// $photo = base64_decode($x[1]);
// $img_name = uniqid().".png";
// if (!file_exists("uploads/"))
// {
//     mkdir("uploads/");
// }
// file_put_contents("uploads/".$img_name, $photo);
// $check = "INSERT INTO camagru.pictures (username, imagename) VALUES(?,?)";
// $sql = $db->prepare($check);
// $sql->execute(['use',$img_name]);
// echo "success";
    
?>