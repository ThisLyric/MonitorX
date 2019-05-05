<?php
require '../../connection.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account Management</title>
  </head>
  <link rel="stylesheet" href="../../css/style.css">
  <body>
    <h1 id="container">
      <div style="text-align:center;">
        Account Management
      </div>
    </h1>
    <div id="detail">
    <div id="login">
      <p></p>
      <form action="unblockuser.php" method="post">
        <input type="submit" name="menu" value="Unblock User" class="index">
      </form>
      <p></p>
      <form action="deluser.php" method="post">
        <input type="submit" name="menu" value="Delete User" class="index">
      </form>
      <p></p>
      <form action="../admenu.php" method="post">
        <input type="submit" name="menu" value="Go back to menu" class="index">
      </form>
      <p></p>
    </div>
    </div>
  </body>
</html>
