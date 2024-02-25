<?php
include('conn.php');
if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password_1 = $_POST['password'];
    $password = md5($password_1);
    $sql = "select * from customer where roll='$username' && password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($row) {
        if ($count == 1) {
            session_start();
            $_SESSION['authn'] = 'true';
            $_SESSION["user"] = $username;
            //echo '<script> alert("Login successful. ");</script>';
            echo '<script> window.location.href="index.php";</script>';
        } else {
            $_SESSION["authn"] = 'false';
            echo '<script> alert("Login failed. Incorrect username or password.");</script>';
            echo '<script> window.location.href="log.php";</script>';
        }
    } else {
        echo '<script> alert("User not found. Register first.");window.location.href="newuser-signin.php";</script>';
    }
}
