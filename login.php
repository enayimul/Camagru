<?php
// include_once 'resources/session.php';
// include_once 'resources/database.php';
// include_once 'resources/utilities.php';

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
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
<h2>CAMAGRU</h2><hr>

<h3>Login Form</h3>

<?php if(isset($result)) echo $result;?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
<form method="post" action="">
    <table>
        <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
        <tr><td><td><input style="float: right" type="submit" value="Signin"></td></tr>
    </table>

<p><a href="index.php">Back</a> </p>
</body>
</html>