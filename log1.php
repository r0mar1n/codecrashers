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
  <style>
    body {
      background-image: url('bgimage.jpg');
      background-size: cover;
      background-position: center;
      font-family: 'Poppins', sans-serif;

    }

    .login-form {
      width: 340px;
      margin: 150px auto;
      padding: 30px;
      border: 1px solid #ccc;
      background: #fff;
    }

    .login-form h2 {
      margin: 0 0 15px;
      font-family: 'Poppins', sans-serif;

    }

    .form-control,
    .btn {
      min-height: 38px;
      border-radius: 2px;
    }

    .btn {
      font-size: 15px;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="login-form" action="login.php">
    <h2 class="text-center">Get started</h2>
    <form action="login.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Roll No." required="required" name="user">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" required="required" name="password">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Log in</button>
      </div>
      <div class="clearfix">
        <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
        <a href="forgot-password.php" class="float-right">Forgot Password?</a>
      </div>
    </form>
    <p class="text-center"><a href="newuser-signin.php">Don't have an account? Sign up</a></p>
  </div>
</body>

</html>