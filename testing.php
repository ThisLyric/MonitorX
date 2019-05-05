<?php
$msg = "";
//if upload button is pressed
if(isset($_POST['upload'])){
  //the path to store the uploaded images
  $target="images/".basename($_FILES['image']['name']);

  // connect to the database
  $db = mysqli_connect("localhost","root","","simpleworkout");

  //get all the submitted data from the form
  $image = $_FILES['image']['name'];
  $title = $_POST['title'];
  $text = $_POST['text'];

  $sql = "INSERT INTO products (image,title,text) VALUES ('$image','$title','$text')";
  //stores the submitted data into the database table: images
  mysqli_query($db,$sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
    $msg = "Image uploaded successfully";
  }
  else {
    $msg = "There was a problem uploading image";
  }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>SimpleWorkout</title>
  </head>
  <style>
    #content{
      width:50%;
      margin:20px auto;
      border:1px solid $cbcbcb;
    }
    form {
      width:50%;
      margin: 20px auto;
    }
    form div{
      margin-top:5px;
    }
    #img_div{
      width:80%;
      padding:5px;
      margin:15px auto;
      border:1px solid #cbcbcb;
    }
    #img_div:after{
      content:"";
      display:block;
      clear:both;
    }
    img{
      float:left;
      margin:5px;
      width:300px;
      height:140px;
    }
  </style>
  <body>
    <div id="content">
      <?php
        $db = mysqli_connect("localhost","root","","simpleworkout");
        $sql = "SELECT * FROM products";
        $result = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($result)) {
          echo "<div id='img_div'>";
            echo "<img src='images/".$row['image']."'>";
            echo "<p>".$row['title']."</p>";
          echo "</div>";
        }
      ?>
      <form method="post" action="testing.php" enctype = "multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
          <input type="file" name="image">
        </div>
        <div>
          <input type="text" name="title" placeholder="Product Name">
          <textarea name="text" cols="40" rows="4" placeholder="Product Description...">
          </textarea>
        </div>
        <div>
          <input type="submit" name="upload" value="Upload Image">
        </div>
      </form>
    </div>
  </body>
</html>
