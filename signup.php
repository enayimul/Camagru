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
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sign up Page</title>
</head>
<body>
<h2>CAMAGRU</h2><hr>

<h3>Register here...</h3>

<?php if(isset($result)) echo $result; ?>
<form method="post" action="includes/signup_inc.php">
    <table>
        <tr><td>Email:</td> <td><input type="text" value=""name="email"></td></tr>
        <tr><td>Username:</td> <td><input type="text" value=""name="username"></td></tr>
        <tr><td>Password:</td> <td><input id="pass" type="password" value=""name="passwrd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></td></tr>
        <tr><td><td><input id="submitform" style="float: right" type="submit" value="Sign up"></td></tr>
    </table>
<p><a href="index.php">Back</a> </p>
</body>
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
</html>