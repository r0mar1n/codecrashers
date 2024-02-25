<?php
/*include('conn.php');
session_start();
if (isset($_POST['logout'])) {
    session_start();
    unset($_SESSION["nome"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
    header("Location: home.php");
    echo '<script> alert("Logged out.");</script>';
} else {
    header('location: index.php');
}*/
session_start();
if (isset($_SESSION['authn'])) {
    //echo '<script> alert("Successfully Logged out.")</script>';
    unset($_SESSION['authn']);
    //echo '<script> alert("Successfully logged out."); window.location.href="index.php";</script>';
    header('location:index.php');
}
