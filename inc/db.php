<?php
$host = "localhost";
$user = "root";
$password = "root1463058";
$database = "hbweb";

// Establish database connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
