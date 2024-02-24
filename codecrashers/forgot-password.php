<?php
include('conn.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url('bgimage.jpg');
      background-size: cover;
      background-position: center;
      font-family: 'Times New Roman', Times, serif;
    }

    .forgot-password-form {
      width: 340px;
      margin: 150px auto;
      padding: 30px;
      border: 1px solid #ccc;
      background: #fff;
      ;
    }

    .forgot-password-form h2 {
      margin: 0 0 15px;
      font-family: "Times New Roman", Times, serif;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    input[type="password"] {
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

<body><?php

      ?>
  <div class="forgot-password-form">
    <h2 class="text-center">Reset Password</h2>
    <form>
      <div class="form-group">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
      </div>
    </form>
  </div>
</body>
<?php

?>

</html>