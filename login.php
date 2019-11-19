<?php include('config/database.php');?>
<!DOCTYPE html>
<html>

    <head>
        <title>Camagru: Sign in</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    
        <div class="login-box">
            <h2>Login</h2>

            <div>
                <form action="resources/session.php" method="post">
            
                    <div class="textbox">
                        <input type="text" placeholder="Username" name="username" value="" required/>
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Password" name="password_1" value="" required/>
                    </div>

                    <button type="submit" name="login" class="btn"> Sign In </button>
                <p>Not registered?  <a href="signup.php">Sign Up</a></p>
                <p>Want To View Our Gallery?  <a href="gallery.php">Browse..</a></p>
                </form>
            </div>
        </div>
    </body>
    <div id="footer">
                <p> &copyWTC</p>
</html>