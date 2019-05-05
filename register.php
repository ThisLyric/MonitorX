<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/swiper.min.css">
    <link rel="stylesheet" href="./css/banner.css">
    </head>
    <body>
<?php
require('connection.php');
if (isset($_REQUEST['username'])){
  $firstName = stripslashes($_REQUEST['firstName']);
	$firstName = mysqli_real_escape_string($conn,$firstName);
  $lastName = stripslashes($_REQUEST['lastName']);
	$lastName = mysqli_real_escape_string($conn,$lastName);
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn,$username);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	$signUpDate = date("Y-m-d H:i:s");
    $query = "INSERT into `accounts` (username, firstName, lastName, email, password, signUpDate)
                VALUES ('$username', '$firstName', '$lastName', '$email', '".md5($password)."', '$signUpDate')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<div class='content' style='margin-top:40%;'>
            <h3>You are registered successfully.</h3>
            <br/><input type='button' class='index' onclick='parent.window.close();' value='Exit' /></div>";
        }
    }else{
?>
<div class="content">
<h1>Registration</h1>
<form name="registration" action="" method="post">
    <input type="text" name="username" placeholder="Username" class="textfield" required autofocus />
    <p></p>
    <input type="text" name="firstName" placeholder="First Name" class="textfield" required />
    <p></p>
    <input type="text" name="lastName" placeholder="Last Name" class="textfield" required />
    <p></p>
    <input type="email" name="email" placeholder="Email" class="textfield" required />
    <p></p>
    <input type="password" name="password" placeholder="Password" class="textfield" required />
    <p></p>
    <input type="submit" name="submit" value="Register" class="index" />
</form>
</div>
<?php } ?>
</body>
</html>
