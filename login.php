<?php



// if($_POST['loginBtn']){}
// $form_errors = array();

// $required_fields = array('username', 'password');

// $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

// if(empty($form_errors)){

// }else{
//     if(count($form_errors) == 1){
//         $result = "<p style=color: red;>There was one error in the form </p>";
//     }else{
//         $result = "<p style=color: red;>There were ".count($form_errors). " errors in the form</p>";
//     }
// }
?>
<?php
// include ('includes/database.php');
// include ('includes/login_sess.php');
// include ('home.php');
ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
?>
<!-- <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
<h2>CAMAGRU</h2><hr>

<h3>Login Form</h3> -->

<?php //if(isset($result)) echo $result;?>
<?php //if(!empty($form_errors)) echo show_errors($form_errors); ?>
<!-- <form method="post" action="resources/session.php">
        Username: <input type="text" value="" name="username"><br />
        Password: <input type="password" value="" name="password"><br />
        <input style="float: right" type="submit" name="login" value="Signin" />
</form>

<p><a href="index.php">Back</a> </p>
</body>
</html> -->
<?php include('includes/database.php');?>
<?php include('resources/session.php'); ?>
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
                <p><a href="forgot_password.php">Forgot password?</a></p>
                </form>
            </div>
        </div>
    </body>
</html>