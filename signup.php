<!-- <?php
// include_once 'resources/database.php';

// if(isset($_POST['email'])){
//     $email = $_POST['email'];
//     $username = $_POST['username'];
//     $password = $_POST['password'];
    

//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// try{
//     $sqlinsert = "INSERT INTO users (username, email, password, join_date)
//                   VALUES (:username, :email, :password, now())";

//     $statement = $db->prepare($sqlinsert);
//     $statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));
 
//     if($statement->rowCount() == 1){
//         $result = "<p style='padding: 20px; color: green;'> Registration Successful</p>";
//     }
//   }catch (PDOException $ex){
//       $result = "<p style='padding: 20px; color: red;'> An error occured: ".$ex->getMessage()." </p>";
//  }

// }
?> -->
<!-- <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sign up Page</title>
</head>
<body>
<h2>CAMAGRU</h2><hr>

<h3>Register here...</h3>

<?php //if(isset($result)) echo $result; ?>
<form method="post" action="includes/signup_inc.php">
    <table>
        <tr><td>Email:</td> <td><input type="text" value=""name="email"></td></tr>
        <tr><td>Username:</td> <td><input type="text" value=""name="username"></td></tr>
        <tr><td>Password:</td> <td><input id="pass" type="password" value=""name="passwrd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></td></tr>
        <tr><td><td><input id="submitform" style="float: right" name="register" type="submit" value="Sign up"></td></tr>
    </table>
<p><a href="index.php">Back</a> </p>
</body> -->
<!-- <script>
window.onload = function() {
    var mysubmitbtn = document.getElementById("submitform");
    
    console.log(mysubmitbtn);


    mysubmitbtn.addEventListener("click", function(event){
               alert("OK");
               //
               var pass1 = document.getElementById("pass1");
               console.log(pass1.value);
               //if/////////meets criteria
               //this.click();
               //else//////
               //display error
               //
               document.getElementById("errorMsg").innerHTML = "passwords dont match";


               event.preventDefault();
               /////

        });




};
</script> -->
<!-- </html> -->
<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html>

    <head>
        <title>Camagru: Register</title>
        <link rel="stylesheet" href="style.css">
        <script>
            function chkpwd(register){
                var str = document.getElementById('pass').value;
                console.log('str: ', str);
                if (str.length < 8)
                {
                    window.alert("too short");
                    return false;
                }
                if (str.search(/[a-z]/) == -1)
                {
                    window.alert("need atleast one lowercase");
                    return false;
                }
                if (str.search(/[A-Z]/) == -1)
                {
                    window.alert("need atleast one uppercase");
                    return false;
                }
                if (str.search(/[0-9]/) == -1)
                {
                    window.alert("need atleast one number");
                    return false;
                }
                return true;
            }
        </script>
    </head>

    <body>
        <div class="login-box">
            <h2>Sign Up...</h2>

            <div>
            <!-- need processing to happen only if password is correct -->
                <form action="resources/session.php" method="post" onsubmit="//return chkpwd()">
            
                    <div class="textbox">
                        <input type="text" placeholder="Username" name="username" value="" required/>
                    </div>

                    <div class="textbox">
                        <input type="email" placeholder="Email" name="email" value="" required/>
                    </div>

                    <div class="textbox">
                        <input id="pass" type="password" placeholder="Password" name="password_1" value="" />
                        <p id="passerror"></p>
                    </div>

                    <div class="textbox">
                        <input type="password" placeholder="Confirm Password" name="password_2" value="" required/>
                    </div>
                    <button type="submit" name="register" class="btn"> Sign Up </button>
                <p>Already have an account?  <a href="index.php">Sign In</a></p>
                </form>
            </div>
        </div>
    </body>
</html>