<?php
session_start();
$_SESSION['authn'] = 'false';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="login_style.css">
</head>

<body>
  <div class="container-xxl position-relative p-0">

    <nav class="navbar navbar-expand-lg  px-4 px-lg-5 py-3 py-lg-0">
      <div class="logo">
        <img class="logo-img" src="./logo.png" width="100" height="100">
      </div>

      <div class="collapse navbar-collapse" id="navbarCollapse">

      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="profile.jpeg" alt="">
            <h3>user details</h3>
          </div>
          <hr>
          <a href="#" class="sub-menu-link">
            <img src="./user-avatar.png" alt="pic">
            <p>Edit Profile</p>
            <span>></span>
          </a>
          <a href="" class="sub-menu-link">
            <img src="./settings.png" alt="pic">
            <p>Settings</p>
            <span>></span>
          </a>
          <a href="#" class="sub-menu-link">
            <img src="./customer-support.png" alt="pic">
            <p>Help & support</p>
            <span>></span>
          </a>
          <a href="#" class="sub-menu-link">
            <img src="./logout.png" alt="pic">
            <p>Logout</p>
            <span>></span>
          </a>
        </div>
      </div>
    </nav>
  </div>
  <div class="login-form">
    <h2 class="text-center">Get started</h2>
    <form action="login.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" required="required" name="user">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" required="required" name="password">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Log in</button>
      </div>
      <div class=clearfix>
        <label class=" float-left form-check-label"><input type="checkbox"> Remember me</label>
        <a href="forgot-password.php" class="float-right">Forgot Password?</a> <!-- Link to the Forgot Password page -->
      </div>
    </form>
    <p class="text-center"><a href="newuser-signin.php">Don't have an account? Sign up</a></p>
  </div>
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