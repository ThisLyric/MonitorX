<?php
include("auth.php");
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
            <li class="current" style="margin-top: 10px;"><a href="index.php">home</a></li>
            <li style="margin-top: 10px;"><a href="about.php">about</a></li>
            <li style="margin-top: 10px;"><a href="product.php">product</a></li>
            <li style="margin-top: 10px;"><a href="checkout.php">My Cart</a></li>
            <li style="margin-top: 10px;"><a href="logout.php">logout</a></li>
            <li>
                <div class="search-box">
                  <input class="search-txt" type="text" name="search" placeholder="Search">
                  <a class="search-btn" href="index.php">
                  <i class="fas fa-search"></i>
                  </a>
                </div>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <div style="text-align:center;">
      <h3 style="font-family:monospace;">Welcome
        <strong style="color:red;">
          <?php echo $_SESSION['name']; ?>
          <?php echo $_SESSION['userid']; ?>
        </strong>
        Have fun at SimpleWorkout!
      </h3>
    </div>

    <section class="banner">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <h1>
              Protein is on sale!
              Up to 80%!
            </h1>
          </div>
          <div class="swiper-slide">
            <h1>
              Pre-workout is on sale!
              Up to 50%!
            </h1>
          </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>

    <!-- Swiper JS -->
    <script src="./js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 8000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>

    <section id="shortcut">
      <div class="container">
        <div class="box"  onclick="navigate('about.php')">
          <i class="fab fa-apple fa-5x"></i>
          <h3>Explore the developer!</h3>
          <p>Content 1</p>
        </div>
        <div class="box" onclick="navigate('products.php')">
          <i class="fab fa-apple fa-5x"></i>
          <h3>Explore our products!</h3>
          <p>Content 2</p>
        </div>
      </div>
    </section>

    <footer>
      <p>Copyright &copy; 2018. All Rights Reserved. Designed by <a href="https://www.linkedin.com/in/yong-bum-kim-75087b163/" target="_blank">Yong Bum Kim</a></p>
    </footer>
  </body>
</html>
