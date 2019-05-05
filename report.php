<?php
include("auth.php");
require("connection.php");
require_once('functions.php');
require_once("cart.php");
?>
<link rel="stylesheet" href="./css/style.css">
<script>
  function exit(){
    window.close();
  }
</script>
<table>
<?php
$order = 0;
$msg = "Order Received!";
$user = $_SESSION['userid'];
if(isset($_POST['checkout'])){
  $total = 0;
  $item_quantity = 0;
  foreach($_SESSION as $name => $value){
    if($value > 0 ){
      if(substr($name, 0,  8) == "product_" ){
        $length = strlen($name) - 8;
        $id = substr($name, 8, $length);
        $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id) . " ");
        confirm($query);
        while($row = fetch_array($query)){
          $subtotal = $row['product_price']*$value;
          $item_quantity += $value;
          $product_image = display_image($row['product_image']);
          $orderdate = date("Y-m-d H:i:s");
          $productid = $row['product_id'];
          $sql = "INSERT INTO orders (order_amount,order_date,user_id,product_id,product_quantity) VALUES ('$subtotal','$orderdate','$user','$productid', '$value')";
          mysqli_query($conn,$sql);
          /*
            echo $subtotal."\n";
            echo $orderdate."\n";
            echo $user."\n";
            echo $productid."\n";
            echo $value."\n";
            ?><p></p><?php
            */

            $sql1 = query("SELECT * FROM products WHERE product_id = $productid");
            confirm($sql1);
            while($row=fetch_array($sql1)){
              $productquantity =
              $stocknow = $row['product_quantity']-$value;
              $update = "UPDATE products SET product_quantity = $stocknow WHERE product_id = $productid";
              mysqli_query($conn,$update);
            }
          }
        }
      }
    }
    $order=1;
}
?>
</table>
<html>
  <body>
    <?php if($order==0){?>
    <center>
      <h1 style="margin-top:100px;">Ready for Check out?</h1>
      <br><br>
      <form method="post" action="report.php">
        <input type="submit" name="checkout" value="CheckoutCart!" class="index">
        <p></p><br>
        <button type="button" value="admin" class="index">
          <a class="index" href="JavaScript:exit();">Cancel
        </a></button>
      </form>
      <?php }?>
    <?php
    if($order == 1){
      echo "<center><h1 style='margin-top:200px;'>$msg</h1>";
      ?>
      <button type="button" value="admin" class="index">
        <a class="index" href="JavaScript:exit();">Cancel
      </a></button>
      <?php
    }
    ?>
    </center>
</html>
