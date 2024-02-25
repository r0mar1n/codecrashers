<?php
include('conn.php');
include('login.php');
session_start();
if (isset($_SESSION['authn'])) {
  $user = $_SESSION['user'];
} else {
  $user = "Login/Sign Up";
}
$sel = "SELECT * FROM category WHERE 1";
$query = mysqli_query($conn, $sel);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="./folder images/logo2.png" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="c.css">
  <link rel="stylesheet" href="./menu_style.css">
</head>

<body>

  <div class="container-xxl position-relative p-0">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
      <div class="logo">
        <a href="index.php"><img class="logo-img" src="./folder images/logo.png" width="100" height="100"></a>
      </div>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="index.php" class="nav-item nav-link active">Home</a>
          <a <?php
              if (isset($_SESSION['authn'])) {
                print "href='cartdemo.php'";
              } else {
                //echo '<script>alert("You need to login/signup!""); </script>';
                print "href='log.php'";
              }
              ?> class="nav-item nav-link">My Cart</a>
          <a <?php
              if (isset($_SESSION['authn'])) {
                print "href='o.php'";
              } else {
                //echo '<script>alert("You need to login/signup!""); </script>';
                print "href='log.php'";
              }
              ?> class="nav-item nav-link">Order History</a>
          <img src="./folder images/profile.jpeg" alt="user_profile" class=" user-pic" onclick="toggleMenu()">

        </div>
      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="./folder images/profile.jpeg" alt="">
            <?php print "<h3>" . $user . "</h3>"; ?>
          </div>
          <hr>
          <a href="#" class="sub-menu-link">
            <img src="./folder images/user-avatar.png" alt="pic" <?php
                                                                  if (isset($_SESSION['authn'])) {
                                                                    print "href='profile.php'";
                                                                  } else {
                                                                    print "href='log.php'";
                                                                  }
                                                                  ?>>
            <p>Edit Profile</p>
            <span>></span>
          </a>
          <a href="logout.php" class="sub-menu-link">
            <img src="./folder images/logout.png" alt="pic">
            <p>Logout</p>
            <span>></span>
          </a>
        </div>
      </div>
    </nav>
  </div>
  <main>
    <div class="slider">
      <input type="radio" name="toggle" id="btn-1" checked>
      <input type="radio" name="toggle" id="btn-2">
      <input type="radio" name="toggle" id="btn-3">

      <div class="slider-controls">
        <label for="btn-1"></label>
        <label for="btn-2"></label>
        <label for="btn-3"></label>
      </div>

      <ul class="slides">
        <li class="slide">
          <div class="slide-content">
            <h2 class="slide-title">Welcome</h2>
            <p class="slide-text">Ordering is easy and convenient. Simply browse our menu, select your favorites, customize to your liking, and proceed to order. No more waiting in lines, your order will be ready for pickup in no time.</p>
            <a href="log.php" class="slide-link">Login to order</a>
          </div>
          <p class="slide-image">
            <img src="./folder images/image2.png" alt="stuff">
          </p>
        </li>
        <li class="slide">
          <div class="slide-content">
            <h2 class="slide-title">Today's Special</h2>
            <p class="slide-text">Indulge your taste buds with our tantalizing specials crafted just for you, available for a limited time only. Treat yourself to these unique flavors and elevate your lunch experience while they last. </p>
            <a href="specials.php" class="slide-link">Browse Special's</a>
          </div>
          <p class="slide-image">
            <img src="./folder images/mae-mu-GIUc-l74UT8-unsplash.jpg" alt="stuff">
          </p>
        </li>
        <li class="slide">
          <div class="slide-content">
            <h2 class="slide-title">Calling All Hostel Students!!</h2>
            <p class="slide-text">Missing your mom's food? Don't worry, we've got you covered! Take a nostalgic journey with our menu, carefully crafted with your comfort and satisfaction in mind. From homely classics to innovative twists on familiar favorites, every dish is prepared with love and care to remind you of home.</p>
            <a href="hostel.php" class="slide-link">Mess Menu</a>
          </div>
          <p class="slide-image">
            <img src="./folder images/images.jpg" alt="stuff">
          </p>
        </li>
      </ul>
    </div>
    <?php
    while ($row = $query->fetch_assoc()) {
      print "<div class='card-container'>";
      print "<div class='card'>";
      print "<img src='" . $row['img'] . "'>";
      print "<div class='card-content'>";
      print "<h3>" . $row['catname'] . "</h3>";
      print "<p>" . $row['descr'] . "</p>";
      print "<a href='" . $row['catname'] . ".php' class='btn'>View</a>";
      print "</div></div></div>";
    }
    ?>

    <div class="blank">

    </div>
  </main>
  <footer>
    <div class="footer">
      <span class="smaller-font">&copy; CodeCrashers All rights reserved.<br /><span class="xsmall-font">Agnethon 2024</span></span>
    </div>
  </footer>
  <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
      subMenu.classList.toggle("open-menu");
    }
  </script>
</body>

</html>