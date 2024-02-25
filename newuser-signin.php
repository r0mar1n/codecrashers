<?
include("conn.php");
session_start();
$_SESSION['authn'] = 'false';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create an account</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="signin_style.css">
  <link rel="stylesheet" href="login_style.css">
  <style>

  </style>
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
  <div class="signup-form">
    <h2 class="text-center">Create Account</h2>
    <form action="sign.php" method="post">
      <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="fname" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lname" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="rollNumber">Roll Number:</label>
        <input type="text" id="rollNumber" name="user" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
      </div>
    </form>
  </div>
  <footer>
    <div class="footer">
      <span class="smaller-font">&copy; CodeCrashers All rights reserved.<br /><span class="xsmall-font">Agnethon 2024</span></span>
    </div>
  </footer>
</body>

</html>