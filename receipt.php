<?php
include("auth.php");
require("connection.php");
require_once('functions.php');
require_once("cart.php");


$user = $_SESSION['userid'];
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
          <ul>
            <li style="margin-top: 10px;"><a href="index.php">home</a></li>
            <li style="margin-top: 10px;"><a href="about.php">about</a></li>
            <li style="margin-top: 10px;"><a href="product.php">product</a></li>
            <li class="current" style="margin-top: 10px;"><a href="checkout.php">my cart</a></li>
            <li style="margin-top: 10px;"><a href="logout.php">logout</a></li>
            <li>
              <div class="search-box">
                <input class="search-txt" type="text" name="" placeholder="Search">
                <a class="search-btn" href="index.php">
                <i class="fas fa-search"></i>
                </a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </header>
<div class="container">



<center>
<div class="row">
      <h1 style="">Order History for <?php echo $_SESSION['name']; ?></h1>
      <button style="margin-bottom:30px;" type="button" value="admin" class="index">
        <a class="index" href="checkout.php">Back To Cart
      </a></button>
      <table style="text-align:center;font-family:sans-serif;;">
          <thead style="background-color:rgba(49,54,255,0.5);color:white;">
            <tr>
              <th>Image</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Order Amount</th>
              <th>Purchased Date</th>
            </tr>
          </thead>
          <tbody>

<?php
  $query = query("SELECT * FROM orders WHERE user_id = $user ORDER BY order_date DESC");
  confirm($query);
  while($row = fetch_array($query)){
    $subtotal = $row['order_amount'];
    $orderdate = $row['order_date'];
    $productid = $row['product_id'];
    $value = $row['product_quantity'];
    /*
    echo $subtotal."\n";
    echo $productid."\n";
    echo $value."\n";
    echo $orderdate."\n";
    */
    $quantity = $row['product_quantity'];
    $amount = $row['order_amount'];
    $date = $row['order_date'];
    $sql1 = query("SELECT * FROM products WHERE product_id = $productid");
    confirm($sql1);
    while($row = fetch_array($sql1)){
      $product_image = display_image($row['product_image']);
      $product = $row['product_title'];
    }
    $receipt = <<<DELIMETER
      <tr>
        <td>
          <a href="item.php?id={$row['product_id']}">
          <img width = '100' src='images/{$product_image}'></a>
        </td>
        <td>{$product}</td>
        <td>{$quantity}</td>
        <td>{$amount}</td>
        <td>{$date}</td>
      </tr>
DELIMETER;
      echo $receipt;
  }
?>
</tbody>
</table>
</div>
</div>
</center>
    <footer>
      <p>Copyright &copy; 2018. All Rights Reserved. Designed by <a href="https://www.linkedin.com/in/yong-bum-kim-75087b163/" target="_blank">Yong Bum Kim</a></p>
    </footer>
  </body>
</html>
