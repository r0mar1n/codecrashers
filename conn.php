<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cater";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
