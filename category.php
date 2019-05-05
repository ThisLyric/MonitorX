<?php
include("auth.php");
require('connection.php');
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
    <section class="content">
      <?php
        get_categories();
      ?>
    </section>

    <section class="content">
      <?php
      $output = '';
      if (isset($_POST['search'])){
        $searchh = $_POST['search'];
        $searchh = preg_replace("#[^0-9a-z]#i","",$searchh);
        $query = query("SELECT * FROM products WHERE product_title LIKE '%$searchh%'") or die("could not find!");
        confirm($query);
        while($row = fetch_array($query)){
          $pid = $row['product_id'];
          $product_image = display_image($row['product_image']);
          $ptitle = $row['product_title'];
          //$output .= '<div>'.'<a href ="item.php?id='.$pid.'">'.$ptitle.'</div>';
          $output .='<tr>'.'<td><a href ="item.php?id='.$pid.'"><img width="50" src="resources/'.$product_image.'"></td><td><a href ="item.php?id='.$pid.'">'.$ptitle.'</td></tr>';
        }
      }
      ?>
      <form action="product.php" method="post" style="margin-top:30px;">
        <input type="text" class="textfield" name="search" placeholder="Search Products">
        <input type="submit" value="Submit" class="index">
      </form>
      <center>
      <table>
      <?php print("$output");?>

    </table>
  </center>
    </section>
    
    <section class="content">
      <div class="pcontainer">
        <?php get_products_in_cat_page(); ?>
      </div>
    </section>

    <footer>
      <p>Copyright &copy; 2018. All Rights Reserved. Designed by <a href="https://www.linkedin.com/in/yong-bum-kim-75087b163/" target="_blank">Yong Bum Kim</a></p>
    </footer>
  </body>
</html>
