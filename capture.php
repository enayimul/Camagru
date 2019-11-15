<!DOCTYPE html>
<html>
  <head>
      <title>Camagru: Upload</title>
      <link rel="stylesheet" href="profile.css">
  </head>
  <body>
     <div class="photo">
         <video id="vid" width="400" height="290"></video>
     </div>
     <a href="#" id="snap" class="capturebtn">capture</a>
     <canvas id="canvas" width="400" height="300"></canvas>
     <form method="post">
         <button type="submit" id = "save" name ="save" class="button">submit-photo</button>
     </form>
     <script src="camera.js"></script>
  </body>
</html>