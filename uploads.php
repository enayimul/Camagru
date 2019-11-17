
<html>
    </head>
    <body>
    <?php

if(isset($_GET['upr'])){

    if(strtolower($_GET['upr']) == 'yes'){
        echo "<script>alert('upload succesfull')</script>";

    }
}

?>
        <form action = "imgupload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">UPLOAD</button>     
    </body>
</html>