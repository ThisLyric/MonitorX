<?php
require '../../connection.php';
include('../../auth.php');
require_once("../../functions.php");

if (isset($_POST['delete'])) {
  $choice = $_POST['productid'];
  $sqll = "DELETE FROM products WHERE product_id = '$choice'";
  mysqli_query($conn,$sqll);
  redirect('removeproduct.php');
}
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
  <div style="float:left;">
     <button class="output" type="button" name="function" value="Options" style="color:black;" disabled>
     	<table border="1">
          <?php
            $sql = "SELECT * FROM products ORDER BY product_id ASC";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){?>
                <tr>
                  <td><?php echo $row['product_id']?></td>
                  <td><?php echo $row['product_title']?></td>
                </tr>
            <?php } ?>
        </table>
      </button>
    </div>
    <div style="float:right;padding-right:100px;">
      <form method="post" action="removeproduct.php">
        <h3>Enter the product id</h3>
        <input type="text" name="productid" placeholder="Product ID">
        <p></p>
        <input type="submit" name="delete" value="Upload Product">
      </form>
      <form action="productmenu.php" method="post">
        <input type="submit" name="menu" value="Go back to menu" class="long">
      </form>
    </div>

    <p></p>
 </html>
