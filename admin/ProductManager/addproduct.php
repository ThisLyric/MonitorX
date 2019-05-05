<?php
include("../../auth.php");
require('../../connection.php');
$msg = "";
$alert=3;
//if upload button is pressed
if(isset($_POST['upload'])){
  //the path to store the uploaded images
  $target="../../images/".basename($_FILES['image']['name']);

  //get all the submitted data from the form
  $image = $_FILES['image']['name'];
  $title = $_POST['title'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $shorttext = $_POST['shorttext'];
  $longtext = $_POST['longtext'];
  $category = $_POST['category'];

  $sql = "INSERT INTO products (product_title, product_category_id, product_price, product_quantity, product_description, short_desc, product_image)
          VALUES ('$title','$category','$price','$quantity','$shorttext','$longtext','$image')";
  //stores the submitted data into the database table: images
  mysqli_query($conn,$sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
    $msg = "Image uploaded successfully";
    $alert = 1;
  }
  else {
    $msg = "There was a problem uploading image";
    $alert = 0;
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
    #img_div{
      width:20%;
      height:inherit;
      padding:5px;
      margin:15px auto;
      /*border:1px solid #cbcbcb;*/
      display: inline-block;
    }
    #img_div:after{
      content:"";
      display:block;
      clear:both;
    }
    img{
      float:top;
      margin:5px;
      width:100%;
      height:inherit;
    }
  </style>
  <body>
    <section class="content">
      <div class="pcontainer">
          <form method="post" action="addproduct.php" enctype = "multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
              <input type="file" name="image">
            </div>
            <div>
              <select name="category" required>
                <option value="" disabled selected>--Select an option--</option>
                <option value="1">Nutrition</option>
                <option value="2">Accessories</option>
                <option value="3">Men's Clothing</option>
                <option value="4">Women's Clothing</option>
                <option value="5">Dietary Needs</option>
              </select>
              <input type="text" name="title" placeholder="Product Name">
              <p></p>
              <input type="text" name="price" placeholder="Price">

              <input type="text" name="quantity" placeholder="Quantity">
              <p></p>
              <div style="float:left;">
                <h2>Short Description</h2>
                <textarea name="shorttext" cols="42" rows="10" placeholder="Product Short Description...">
                </textarea>
              </div>
              <div style="float:right;">
                <h2>Long Description</h2>
                <textarea name="longtext" cols="42" rows="10" placeholder="Product Long Description...">
                </textarea>
              </div>
            </div>
            <div>
              <input type="submit" name="upload" value="Upload Product">
            </div>
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
