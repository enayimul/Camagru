<!DOCTYPE html>
<html>
  <head>
  <?php
  session_start();
   if (!isset($_SESSION['success'])){
      
        header('location: home.php?youareloggedout');
    }
    $_SESSION['pic'] = 0;
  ?>
      <title>Camagru: Upload</title>
      <link rel="stylesheet" href="style2.css">
  </head>
  <body>
  <div class="menubar">
                <ul id="menu">
                    <li><a href="home.php" name="link1">Home</a></li>
                    <li><a href="gallery.php" name="link2">Gallery</a></li>
                    <li><a href="home.php?link=3" name="link3">Upload</a></li>
      
                    <li><a href="logout.php" name="link5">Logout</a></li>
                    <li><a href="capture.php" name="link6">Screenshot</a>
                </ul>
            </div>
     <div class="photo">
         <video id="vid" width="400" height="290"></video>
     </div>
     <form method="post" action  = "webcam.php">
     <button type = "submit" id="snap" class="capturebtn">capture</button>
     <input type = "hidden" id = "url" name = "url">
    </form>
     <canvas id="canvas" width="400" height="300"></canvas>
     <form method="post" >
         <button type="submit" id = "save" name ="save" class="button">submit-photo</button>
     </form>

</div>
     <script src="camera.js"></script>
  </body>
</html>
