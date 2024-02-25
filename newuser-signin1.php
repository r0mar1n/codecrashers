<?
include("conn.php");
session_start();
$_SESSION['authn'] = 'false';
?>

<!DOCTYPE html>
<html lang="en">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<head>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="logo2.png">
    <title>Menu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="menu_style.css">
  </head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create an account</title>
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

    .signup-form {
      width: 340px;
      margin: 50px auto;
      padding: 30px;
      border: 1px solid #ccc;
      background: #fff;
    }

    .signup-form h2 {
      margin: 0 0 15px;
      font-family: "Poppins", sans-serif;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"] {
      min-height: 38px;
      border-radius: 2px;
    }

    button[type="submit"] {
      min-height: 38px;
      border-radius: 2px;
      font-size: 15px;
      font-weight: bold;
      background-color: #007bff;
      border-color: #007bff;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="signup-form">
    <h2 class="text-center">Create Account</h2>
    <form action="sign.php" method="post">
      <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" id="fname" name="fname" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lname" name="lname" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="rollNumber">Roll Number:</label>
        <input type="text" id="user" name="user" class="form-control" required>
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
        <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Up</button>
      </div>
    </form>
  </div>
</body>

</html>