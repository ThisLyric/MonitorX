<?php
require '../connection.php';

if(isset($_POST['enter'])){
  if($_POST['regcode'] == 'helloworld'){
    header("Location: registerAdmin.php");
  }
  else {
    echo "NOPE";
  }

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
  <h1 class="main">Admin Portal</h1>
  <div id="login">
    <form action = "" method="post" class="content">
      <input type="password" name="regcode" class="textfield" placeholder="Registration Code" autofocus>
      <input type="submit" name="enter" value="Enter" class="index">
      </div>
      <p><strong>If you need to register, please ask to one of our admin</strong></p>
      <p></p>
      </p>
      <p></p>
    </form>
  </body>
</html>
