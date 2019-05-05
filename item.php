<?php
include("auth.php");
require_once("functions.php");
require_once("cart.php");
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
            <li class="current" style="margin-top: 10px;"><a href="product.php">product</a></li>
            <li style="margin-top: 10px;"><a href="checkout.php">my cart</a></li>
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

<?php

$query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) .  " "   );
confirm($query);
while ($row = fetch_array($query)):
?>

<div class="row">
  <div style="padding-top:30px;text-align:center;">
    <img  width="500" src="resources/<?php echo display_image($row['product_image']); ?>" alt="">
  </div>
  <hr>
  <div>
    <h4><a href="#"><?php echo $row['product_title']; ?></a></h4>
    <hr>
    <h4 class=""><?php echo "&#36;" . $row['product_price']; ?></h4>

    <div class="ratings">
      <p>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star-empty"></span>
          4.0 stars
      </p>
    </div>
    <hr>
    <div>
      <?php echo $row['short_desc']; ?>
    </div>
    <form action="">
      <div class="form-group">
        <a href="cart.php?add=<?php echo $row['product_id']; ?>">Buy Now</a>
      </div>
    </form>
  </div>
</div>
        <hr>
<div>

<div>
  <ul>
    <li><a href="#home">Description</a></li>
  </ul>
  <div>
    <div>
      <p><?php echo $row['product_description']; ?></p>
    </div>
  </div>
</div>
</div></div>
<?php endwhile; ?>

    <footer>
      <p>Copyright &copy; 2018. All Rights Reserved. Designed by <a href="https://www.linkedin.com/in/yong-bum-kim-75087b163/" target="_blank">Yong Bum Kim</a></p>
    </footer>
  </body>
</html>
