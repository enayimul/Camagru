<!DOCTYPE >
<?php session_start();
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<html>
    <head>
        <link rel="stylesheet" href="style2.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Camagru :home</title>
    </head>

    <body>
        <?php
            if (!isset($_SESSION['success'])) header('location: index.php');
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
                    <li><a href="?link=5" name="link5">Logout</a></li>
                    <li><a href="?link=6" name="link6">Screenshot</a>
                </ul>
            </div>

            <div id="content_area">
            <div id="content_box">
                <?php
                    echo $_POST['img'];
                    $link = $_GET['link'];
                    if ($link == '1'){
                        echo "feed";
                    }
                    else if ($link == '2')
                    {
                        echo "display my posts";
                    }
                    else if ($link == '3')
                    {
                        echo "post image";
                        echo "<form action='' method='post' enctype='multipart/form-data'>";
                        echo "<input type='file' name='image'/>
                        <input type='submit' name='insert_post' value='Post'/>";
                        
                        // if(isset($_POST['insert_post']))
                        // {
                        // $product_title = $_POST['product_title'];
                        // $product_cat = $_POST['product_cat'];
                        // $product_brand = $_POST['product_brand'];
                        // $product_price = $_POST['product_price'];
                        // $product_desc = $_POST['product_desc'];
                        // //getting images
                        // $product_image = $_FILES['product_image']['name'];
                        // $product_image_tmp = $_FILES['product_image']['tmp_name'];
                        // move_uploaded_file($product_image_tmp, "product_images/$product_image");
                        // //query to insert
                        // $insert_product = "insert into products (product_cat, product_brand, product_title, product_price, product_desc, product_img) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image')";
                        // $insert_pro = mysqli_query($con, $insert_product);
                        // if($insert_pro)
                        // {
                        // echo "<script>alert('Product inserted')</script>";
                        // echo "<script>window.open('products.php','_self')</script>";
                        // }
                        // }
                    }
                    else if ($link == '4')
                    {
                        // echo "change username, password, email";
                        
                        echo "
                        <div>
                            <h3>Modify account</h3>
                                <form action='update_details.php' method='post'>
                                <div>
                                <?php include('update_details.php');?>
                                <input type='text' placeholder='New Username' name='new_username' value='' />
                                </div>
                                <div>
                                <input type='password' placeholder='New Password' name='new_password' value=''/>
                                </div>
                                <div>
                                <input type='email' placeholder='New Email' name='new_email' value='' />
                                </div>
                                <button type='submit' name='modify account'> Update </button>
                                </form>
                        </div>
            ";
                        
                        
                    }
                    else if ($link == '5')
                    {
                        session_destroy();
                        unset($_SESSION['username']);
                        unset($_SESSION['success']);
                        header('location: index.php');
                        //var_dump($_SESSION);
                    }
                    else if ($link == '6')
                    {
                        echo '<div style="display: flex"><div style="display: grid"><video id="video" autoplay></video><button id="snap" style="width: 80px">Capture</button></div><div style="display: grid"><canvas id="canvas" width=300 height=300></canvas><button id="save" style="width: 80px">Save</button></div></div><script src="camera.js"></script>';
                        $img = $_POST['img'];
                       
                        $new_name = uniqid().".png";
                        $dest = "resources/saved_images/".$new_name;
                        file_put_contents($dest, $img);
                    }
                    else
                    {  
                        //var_dump($_SESSION);
                        echo"default home";
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