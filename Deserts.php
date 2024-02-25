<?php
include("conn.php");
session_start();
if (isset($_SESSION['authn'])) {
  $user = $_SESSION['user'];
} else {
  $user = "Login/Sign Up";
}

if (isset($_GET['add_to_cart']) && isset($_GET['product_id'])) {
  $productId = $_GET['product_id'];
  // You may need to adjust this query according to your database schema
  $insertQuery = "INSERT INTO cart (user, product_id, quantity) VALUES ('$user', '$productId', 1)";
  mysqli_query($conn, $insertQuery);
  // Redirect back to the same page after adding to cart
  header("Location: cartdemo.php");
  exit();
}

$sel = "SELECT * FROM food WHERE catid='5'";
$query = mysqli_query($conn, $sel);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Deserts</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="./folder images/logo2.png" />
  <link rel="stylesheet" href="./style.css">
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
    <?php
    while ($row = $query->fetch_assoc()) {
      print "<div class='card-container'>";
      print "<div class='card'>";
      print "<img src='" . $row['img'] . "'>";
      print "<div class='card-content'>";
      print "<h3>" . $row['name'] . "</h3>";
      print "<p>₹" . $row['price'] . "/-";
      print " <div class='btn-quantity-container'>";
      print "<div class='wrapper'>";
      print "<span class='minus' onclick='decrementQuantity(this)'>-</span>";
      print "<span class='num' id='quantity_" . $row['fid'] . "'>01</span>";
      print "<span class='plus' onclick='incrementQuantity(this)'>+</span></div>";
      print "<div><a href='?add_to_cart=true&product_id=" . $row['fid'] . "' class='btn' data-productid='" . $row['fid'] . "'>Add to cart</a></div>";
      print "</div></div></div></div>";
    }
    ?>

  </main>
  <footer>
    <div class="footer">
      <span class="smaller-font">&copy; CodeCrashers All rights reserved.<br /><span class="xsmall-font">Agnethon 2024</span></span>
    </div>
  </footer>
  <script>
    function incrementQuantity(element) {
      let quantityElement = element.previousElementSibling;
      let quantity = parseInt(quantityElement.innerText);
      quantityElement.innerText = quantity + 1;
    }

    function decrementQuantity(element) {
      let quantityElement = element.nextElementSibling;
      let quantity = parseInt(quantityElement.innerText);
      if (quantity > 1) {
        quantityElement.innerText = quantity - 1;
      }
    }

    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
      subMenu.classList.toggle("open-menu");
    }
  </script>
</body>

</html>