<?php

include "config/database.php";
session_start();
if (isset($_POST['submit'])){
     $file = $_FILES['file'];


//     echo "end";
//     var_dump($_FILES);
//     var_dump($_POST);



     $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf'); 

    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
 
          
                $check = "INSERT INTO camagru.pictures (username, imagename) VALUES(?,?)";


                $sql = $db->prepare($check);

                $sql->bindParam(1, $_SESSION['username']);
                $sql->bindParam(2, $fileNameNew);

                if($sql->execute()){
                    header('Location: home.php?link=3?upr=yes');
                }else{
                    header('Location: home.php?link=3?upr=no');
                }



                //echo "success";
              //  header('Location: home.php?link=3?uploadres=y');
            } else {
                echo "Your file is too big";
               // header('Location: uploads.php?error=filetoobig');
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "You cannot upload files of this type.";
    }
}