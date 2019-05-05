<?php
include("../../auth.php");
require '../../connection.php';
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <link rel="stylesheet" href="../../css/style.css">
 <script>
 </script>
 <body>
   <h1 id="container" style="text-align:center;">
       Welcome <br><p class="ani"><?php echo $_SESSION['name'];?></p></p>Product Management Portal!
   </h1>
   <br><br>
   <div style="text-align:center;">
     <button type="button" onclick="location.href='addproduct.php'" class="index">Add Product
     </a></button>
     <p></p>
     <button type="button" onclick="location.href='removeproduct.php'" class="index">Remove Product
     </a></button>
     <p></p>
     <button type="button" onclick="location.href='addstock.php'" class="index">ManageStock
     </a></button>
     <p></p>
     <button type="button" onclick="location.href='../admenu.php'" class="index">Go Back
     </a></button>
     <p></p>
   </div>
 </body>
</html>
