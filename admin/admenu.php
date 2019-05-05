<?php
include("adauth.php");
require '../connection.php';

$sql = "SELECT * FROM accounts";
mysqli_query($conn,$sql);
if (isset($_POST['unblock'])) {
  header("Location: adunblock.php");
}
if (isset($_POST['manage'])) {
  header("Location: AccountManagement/admanage.php");
}
if (isset($_POST['productmanager'])) {
  header("Location: ProductManager/productmenu.php");
}
if (isset($_POST['view'])) {
  header("Location: DisplayUsers/adview.php");
}
if (isset($_POST['register'])) {
  header("Location: registerAdmin.php");
}
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <link rel="stylesheet" href="../css/style.css">
 <script>
 </script>
 <body>
   <h1 id="container" style="text-align:center;">
       Welcome <br><p class="ani"><?php echo $_SESSION['name'];?></p></p>Admin Portal!
   </h1>
   <br><br>
   <div style="text-align:center;">
     <form action = "" method="post">
       <td><input type="submit" name="manage" value="Account Manager" class="index"></td>
       <p></p>
       <td><input type="submit" name="view" value="Display Users" class="index"></td>
       <p></p>
       <td><input type="submit" name="productmanager" value="Product Manager" class="index"></td>
       <p></p>
       <td><input type="submit" name="register" value="Register" class="index"></td>
       <p></p>
       <td><input type="submit" name="logout" value="Logout"  class="index"<?php if (isset($_POST['logout'])) { session_destroy();?> onclick="javascript:self.close()"; <?php } ?>>
     </form>
     <p></p>
   </div>
 </body>
</html>
