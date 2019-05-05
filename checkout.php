<?php
include("auth.php");
require_once('functions.php');
require_once("cart.php");
//require_once('product.php');

if(isset($_SESSION['product_1']))
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




<div class="row">
        <h4 class="text-center bg-danger"><?php display_message(); ?>
</h4>
      <h1>Checkout</h1>

<form action="">
    <table style="text-align:center;font-family:monospace;">
        <thead style="background-color:rgba(49,54,255,0.5);color:white;">
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
           <th>Modify</th>
          </tr>
        </thead>
        <tbody>
            <?php cart(); ?>
        </tbody>
    </table>
</form>

<div style="float:left;">
  <h2>Cart Totals</h2>
  <table style="text-align:center;font-family:monospace;border-left:2px solid;">
    <tr>
      <th>Items:</th>
      <td><span>
        <?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?>
      </span></td>
    </tr>
    <tr>
      <th>Shipping</th>
      <td>Free Shipping</td>
    </tr>
    <tr>
      <th>Order Total</th>
      <td><strong><span class="amount">&#36;
        <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>
      </span></strong> </td>
    </tr>
  </table>
</div>
<div style="float:right;">
  <h2>Ready for Checkout?</h2>
  <button type="button" value="admin" class="index">
    <a class="index" href="JavaScript:popup('report.php');">Print your Receipt
  </a></button>
  <br><br>
  <button type="button" value="admin" class="index">
    <a class="index" href="receipt.php">View Order History
  </a></button>

</div>
</div>
</div>
    <footer>
      <p>Copyright &copy; 2018. All Rights Reserved. Designed by <a href="https://www.linkedin.com/in/yong-bum-kim-75087b163/" target="_blank">Yong Bum Kim</a></p>
    </footer>
  </body>
</html>
