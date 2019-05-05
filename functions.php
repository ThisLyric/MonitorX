<?php
require('connection.php');
require_once('cart.php');
$upload_directory = "../images";

function set_message($msg){
  if(!empty($msg)){
      $_SESSION['message'] = $msg;
  }
  else{
      $msg = "";
  }
}

function display_message(){
    if(isset ($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location){
    header("Location: $location ");
}

function query($sql){
    global $conn;
    return mysqli_query($conn, $sql);
}

function confirm($result){
    global $conn;
    if(!$result){
        die ("QUERY FAILED " .  mysqli_error($conn));
    }
}

function escape_string($string){
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

function get_products() {
  $query = query(" SELECT * FROM products");
  confirm($query);
  while ($row = fetch_array($query)){
    $product_image = display_image($row['product_image']);
    $product = <<<DELIMETER
    <div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
    <a href="item.php?id={$row['product_id']}"><img src="resources/{$product_image}" alt=""></a>
    <div class="caption">
    <h4 class="pull-right">&#36;{$row['product_price']}</h4>
    <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
    </h4>
    <p>Buy this product Now!</p>
    <a class="btn btn-primary" target="_blank" href="resources/cart.php?add={$row['product_id']}">Add to cart</a>
    </div>
    </div>
    </div>
DELIMETER;
  echo $product;
  }
}

function get_categories(){
  $query = query("SELECT * FROM categories");
  confirm($query);
  while ($row = fetch_array($query)){
    $category_links = <<<DELIMETER
    <a href='category.php?id={$row['cat_id']}' id='login'>{$row['cat_title']}</a>
DELIMETER;
  echo $category_links;
  }
}

function get_products_in_cat_page() {
  $query = query(" SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id'])." ");
  confirm($query);
  while ($row = fetch_array($query)){
    $product_image = display_image($row['product_image']);
    $product = <<<DELIMETER
    <div style="margin-top:30px;">
    <a href="item.php?id={$row['product_id']}"><img width='200' src="images/{$product_image}" alt=""></a>
    <h3>{$row['product_title']}</h3>
    <p> Buy this product now! </p>
    <p>
    <a href="cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now! </a>
    </p>
    </div>
DELIMETER;
   echo $product;
 }
}

function get_products_in_shop_page() {
  $query = query(" SELECT * FROM products");
  confirm($query);
  while ($row = fetch_array($query)){
    $product_image = display_image($row['product_image']);
    $product = <<<DELIMETER
      <div style="margin-top:30px;">
        <a href="item.php?id={$row['product_id']}"><img width='200' src="images/{$product_image}" alt="helloworld"></a>
        <h3>{$row['product_title']}</h3>
        <p> Buy this product now! </p>
        <p>
          <a href="cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now! </a>
        </p>
      </div>
DELIMETER;

echo $product;
  }
}


function display_image($picture){
    global $upload_directory;
    return $upload_directory ."/" . $picture;
}
?>
