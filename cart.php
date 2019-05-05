<?php
include_once("auth.php");
require_once('connection.php');
require_once('functions.php');
require_once('cart.php');


if(isset($_GET['add'])){
  $query = query("SELECT * FROM products WHERE product_id=".escape_string($_GET['add']));
  confirm($query);
  while($row = fetch_array($query))  {
    if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]) {
      $_SESSION['product_'.$_GET['add']]+=1;
      redirect("checkout.php");
    }
    else{
      set_message("We only have " . $row['product_quantity'] . " " . $row['product_title']. "s in stock");
      redirect("checkout.php");
    }
  }
}

if(isset($_GET['remove'])){
    $_SESSION['product_' . $_GET['remove']]--;
    if( $_SESSION['product_' . $_GET['remove']] < 1){
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("checkout.php");
    } else{
        redirect("checkout.php");
    }
}

if(isset($_GET['delete'])){
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("checkout.php");
}


function cart(){
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
          $product = <<<DELIMETER
          <tr>
            <td>
              <a href="item.php?id={$row['product_id']}">
              <img width = '100' src='images/{$product_image}'><br>
              {$row['product_title']}</a>
              <br><br>
            </td>
            <td>&#36;{$row['product_price']}</td>
            <td>{$value}</td>
            <td>&#36;{$subtotal}</td>
            <td style="padding-left:10px;padding-right:10px;">
              <a href="cart.php?add={$row['product_id']}"><i class="fas fa-plus fa-2x"></i></a>
          <br>
          <a href="cart.php?remove={$row['product_id']}"><i class="fas fa-minus fa-2x"></i></a>
          <br>
          <a href="cart.php?delete={$row['product_id']}"><i class="fas fa-trash-alt fa-2x"></i></a>
          <br>
          </td>
          </tr>
DELIMETER;
          echo $product;
        }
        $_SESSION['item_total'] = $total += $subtotal;
        $_SESSION['item_quantity'] = $item_quantity;
      }
    }
  }
}
?>
