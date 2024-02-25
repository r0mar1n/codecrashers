<?PHP
include("conn.php");
session_start();
if (isset($_SESSION['authn'])) {
  $user = $_SESSION['user'];
} else {
  $user = "Login/Sign Up";
}
$sel = "SELECT * FROM orders WHERE user ='$user'";
$query = mysqli_query($conn, $sel);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Order History</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./menu_style.css">
  <link rel="stylesheet" href="o.css">
  <link rel="icon" type="image/png" href="./folder images/logo2.png" />
</head>

<body>
  <div class="heading">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
      <div class="logo">
        <a href="index.php"><img class="logo-img" src="./folder images/logo.png" width="100" height="100"></a>
      </div>
      <div class="nav-contain">
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
                  print "href='order.php'";
                } else {
                  //echo '<script>alert("You need to login/signup!""); </script>';
                  print "href='log.php'";
                }
                ?> class="nav-item nav-link">Order History</a>
            <img src="./folder images/profile.jpeg" alt="user_profile" class=" user-pic" onclick="toggleMenu()">
          </div>
        </div>
      </div>

      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="./folder images/profile.jpeg" alt="">
            <?php print "<h3>" . $user . "</h3>"; ?>
          </div>
          <hr>
          <a class="sub-menu-link">
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
      print "<div class='card-header'>";
      print "<h3>" . $row['status'] . "</h3>";
      print "</div>";
      print "<div class='card-content'>";
      print "<h5>Order #" . $row['oid'] . "</h5>";
      print "<p>" . $row['items'] . " item(S)</p>";
      print "<p>Cost: ₹" . $row['cost'] . "/-</p>";
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