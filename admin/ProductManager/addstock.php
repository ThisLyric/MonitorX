<?php
include("../../auth.php");
require('../../connection.php');
require_once("../../functions.php");
$msg = "";
$alert=3;
//if upload button is pressed
if(isset($_POST['upload'])){
  $identifier = $_POST['identifier'];
  $sql = "SELECT * FROM products";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)){
    if($identifier == $row['product_id']){
      $stocknow = $row['product_quantity']+$_POST['stocknow'];
    }
  }

  $sql = "UPDATE products SET product_quantity = $stocknow WHERE product_id = $identifier";
  //stores the submitted data into the database table: images
  mysqli_query($conn,$sql);
  redirect('addstock.php');
  if(mysqli_connect_errno()){
      $msg = "Failed to connect to MySQL: " . mysqli_connect_error();
      $alert=1;
  }
  else {
    $msg = "Updated";
    $alert=1;
  }
}

if(isset($_POST['back'])){
  header("Location: ../admenu.php");
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
  <style>
    form {
      margin: 20px auto;
    }
    form div{
      margin-top:50px;
    }
  </style>
  <body>
    <section class="content">
      <div style='float:left;'>
        <?php
          $sql = "SELECT * FROM products ORDER BY product_id ASC";
          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($result)){?>
            <table border='1'>
              <tr>
                <td width='30px'><?php echo $row['product_id']?></td>
                <td width='100px'><?php echo $row['product_title']?></td>
                <td width='30px'><?php echo $row['product_quantity']?></td>
              </tr>
            </table>
        <?php }?>
      </div>
      <div style='float:right;padding-right:100px;'>
          <form method="post" action="addstock.php">
            <input type="text" name="identifier" placeholder="Product ID" autofocus>
            <p></p>
            <input type="text" name="stocknow" placeholder="Additional Stock">
            <p></p>
            <input type="submit" name="upload" value="Update">
            <p></p>
            <button type="button" onclick="location.href='productmenu.php'" class="index">Go Back
            </a></button>
            <?php if($alert==1){
              echo "<p>$msg</p>";
            }?>
          </form>
      </div>
    </section>
  </body>
</html>
