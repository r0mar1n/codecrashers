<?php
include('conn.php');
if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password_1 = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email =    $_POST['email'];
    $password = md5($password_1);
    $query = "INSERT INTO customer (roll,password,fname,lname,email) VALUES('$username', '$password','$fname','$lname','$email')";
    mysqli_query($conn, $query);
    $_SESSION['username'] = $username;
    $_SESSION['authn'] = 'true';
    echo '<script> alert("signup success");</script>';
    //header('location: index.php');
}
