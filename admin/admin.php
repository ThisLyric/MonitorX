<?php
require('../connection.php');
session_start();
$errormessage = "Username/password is incorrect.";
$error = 0;
if(isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $query = "SELECT * FROM `admin` WHERE username='$username' and password='".md5($password)."'";
  $result = mysqli_query($conn, $query) or die(mysql_error());
  $row = mysqli_num_rows($result);
  if($row==1){
    $_SESSION['username'] = $username;
    header("Location:admenu.php");
    while($row=$result->fetch_assoc()){
      $_SESSION['name'] = $row["name"];
      $_SESSION['userid'] = $row['userid'];
    }
  }
  else {
    $error = 1;
  }
}
if(isset($_POST['register'])){
  header("Location: adminauth.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Main Page</title>
    <meta charset="utf-8">
  </head>
  <link rel="stylesheet" href="../css/style.css">
  <body>
  <h1 id="container" style="text-align:center;">Admin Portal</h1>
      <h3 style="text-align:center;font-family:monospace;">Please login to access administrator privileges</h3>
  <div style="text-align:center;">
    <form action="" method="post">
      <br><br>
      <input type="text" name="username" class="textfield" placeholder="Username" autofocus>
      <p></p>
      <input type="password" name="password" class="textfield" placeholder="Password">
      <p></p>
      <input type="submit" name="slogin" value="Login" class="index">
      <p></p>
      <!--<input type="submit" name="register" value="Register" class="index">-->
      <button type="button" value="Register!" class="index" onClick="location.href='adminauth.php'">
        <a>Register</a>
      </button>
  </div>
  <br>
      <p style="text-align:center;"><strong>If you need to register, please ask to one of our admin</strong></p>
      <p></p>
      <?php if ($error == 1) {
            echo $errormessage;
          }?>
      </p>
      <p></p>
    </form>
  </body>
</html>
