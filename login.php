<?php
require('connection.php');
session_start();
$errormessage = "Username/password is incorrect.";
$error = 0;
if(isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $query = "SELECT * FROM `accounts` WHERE username='$username' and password='".md5($password)."'";
  $result = mysqli_query($conn, $query) or die(mysql_error());
  $row = mysqli_num_rows($result);
  if($row==1){
    $_SESSION['username'] = $username;
    header("Location:index.php");
    while($row=$result->fetch_assoc()){
      $_SESSION['name'] = $row["firstName"]." ".$row["lastName"];
      $_SESSION['userid'] = $row['id'];
    }
  }
  else {
    $error = 1;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple Workout</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/swiper.min.css">
    <link rel="stylesheet" href="./css/banner.css">
  </head>
  <script type="text/javascript">
    // When the user clicks on register, windows will pop up
    function popup(url) {
      popupWindow=window.open(
        url,'popUpWindow','height=600,width=600,scrollbar=yes,toolbar=yes,menubar=no,status=yes'
      )
    }
  </script>
  <body>
    <header>
      <div class="container">
        <div id="logo">
          <h2><span class="highlight"> Simple</span> WorkOut</h2>
        </div>
        <nav>
          <h2 style="color:rgba(200,0,0,0.7);font-family:monospace; font-size:15pt;">Please Login to access SimpleWorkout Page!</h2>
        </nav>
      </div>
    </header>

    <section class="content">
      <div id="login">
        <form action = "" method="post" class="">
            <p></p>
            <input type="text" name="username" class="textfield" placeholder="Username" autofocus>
            <p></p>
            <input type="password" placeholder="Password" name="password" class="textfield">
           <p></p>
          <input type="submit" name="slogin" value="Login" class="index">
          <p></p>
          <button type="button" value="Register!" class="index">
            <a class="index" href="JavaScript:popup('register.php');">Register
          </a></button>
          <p></p>
          <button type="button" value="admin" class="index">
            <a class="index" href="JavaScript:popup('admin/admin.php');">Administrator
          </a></button>
          <p></p>
          <?php if ($error == 1) {
            echo $errormessage;
          }?>
        </form>
      </div>
    </section>

    <footer>
      <p>Copyright &copy; 2018. All Rights Reserved. Designed by <a href="https://www.linkedin.com/in/yong-bum-kim-75087b163/" target="_blank">Yong Bum Kim</a></p>
    </footer>
  </body>
</html>
