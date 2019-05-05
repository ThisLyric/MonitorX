<?php
require '../../connection.php';
include('../../auth.php');
if (isset($_POST['search'])) {
  $id = $_POST['type'];
}
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
  <body>
    <h1 id="container">
      <div id="right">
        Display Users
      </div>
    </h1>
    <div id="detail">
    <div id="login1">
      <p></p>
   	<form action="adviewcontents.php" method="post">
   	<select name="type" required>
        <option value="" disabled selected>--Select an option--</option>
        <option value="all">*</option>
        <option value="id">ID</option>
        <option value="name">Name</option>
        <option value="username">UserName</option>
        <option value="email">Email</option>
      </select>
    <p></p>
      <input type="submit" name="search" value="Search" class="search">
      </form>
      <p></p>
      <form action="../admenu.php" method="post">
      	<input type="submit" name="menu" value="Go back" class="search">
      </form>
      <p></p>
        </div>
        </div>
    </body>
</html>
