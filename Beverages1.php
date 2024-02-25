<?PHP
include("conn.php");
session_start();
if (isset($_SESSION['authn'])) {
  $user = $_SESSION['user'];
} else {
  $user = "Login/Sign Up";
}
$sel = "SELECT * FROM food WHERE catid='4'";
$query = mysqli_query($conn, $sel);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Beverages</title>
  <link rel="icon" type="image/x-icon" href="logo2.png">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./menu_style.css">
</head>

<body>

  <div class="container-xxl position-relative p-0">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
      <div class="logo">
        <img class="logo-img" src="./folder images/logo.png" width="100" height="100">
      </div>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="index.php" class="nav-item nav-link active">Home</a>
          <a href="menu.php" class="nav-item nav-link">Menu</a>
          <a href="#" class="nav-item nav-link">My Cart</a>
          <a <?php
              if (isset($_SESSION['authn'])) {
                print "href='order.php'";
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
          <a <?php
              if (isset($_SESSION['authn'])) {
                print "href='profile.php'";
              } else {
                print "href='log.php'";
              }
              ?> class="sub-menu-link">
            <img src="./folder images/user-avatar.png" alt="pic">
            <p>Edit Profile</p>
            <span>></span>
          </a>
          <a href="#" class="sub-menu-link">
            <img src="./folder images/customer-support.png" alt="pic">
            <p>Help & support</p>
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
      print "<img src='./" . $row['img'] . "'>";
      print "<div class='card-content'>";
      print "<h3>" . $row['name'] . "</h3>";
      print "<p>₹" . $row['price'] . "/-</p><div class='quantity-section'><label for='quantity'>Quantity:</label><input type='number' id='quantity' name='quantity' value='1' min='1' max='99'></div>";
      print "<a href='#' class='btn'>Add to cart</a>";
      print "</div></div></div>";
    }
    ?>
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