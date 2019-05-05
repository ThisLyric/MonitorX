<?php
require '../../connection.php';
include('../../auth.php');
$choice = $_POST['type'];
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <button class="output" type="button" name="function" value="Options" style="color:black;" disabled>
 	<table border="1">
      <?php
      $rescount = 0;
      switch ($choice) {
        case 'all':
          $sql = "SELECT * FROM accounts ORDER BY id ASC";
          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_array($result)){?>
            <tr class="all">
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['firstName']?></td>
              <td><?php echo $row['lastName']?></td>
              <td><?php echo $row['email']?></td>
              <td><?php echo $row['username']?></td>
              <td><?php echo $row['password']?></td>
              <td><?php echo $row['signUpDate']?></td>
            </tr>
      <?php }
          break;
      ?>
      <?php
          case 'id':
            $sql = "SELECT * FROM accounts ORDER BY id ASC";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){ ?>
            <tr class="id">
              <td><?php echo $row['id']?></td>
            </tr>
      <?php } break;?>
      <?php
            case 'name':
              $sql = "SELECT * FROM accounts ORDER BY firstName ASC";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)){ ?>
            <tr class="title">
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['firstName']?></td>
              <td><?php echo $row['lastName']?></td>
            </tr>
      <?php } break;?>
      <?php
            case 'username':
              $sql = "SELECT * FROM accounts ORDER BY username ASC";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)){ ?>
            <tr class="category">
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['username']?></td>
            </tr>
      <?php } break;?>
      <?php
            case 'email':
              $sql = "SELECT * FROM accounts ORDER BY email ASC";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)){ ?>
            <tr class="id">
              <td><?php echo $row['id']?></td>
              <td><?php echo $row['email']?></td>
            </tr>
      <?php } break;?>
      <?php } //Switch ?>
    </table>
  </button>
    <p></p>
    <?php echo "Your search yielded " . $rescount . " results!" ?>
    <p></p>
    <form action="adview.php" method="post">
      <input type="submit" name="back" value="Go back to filter" class="long">
    </form>
    <p></p>
    <form action="../admenu.php" method="post">
      <input type="submit" name="menu" value="Go back to menu" class="long">
    </form>
 </html>
