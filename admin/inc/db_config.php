<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root1463058'; // Default is empty for root in XAMPP
$dbname = 'hbweb';

// Attempt to connect to the database
$con = mysqli_connect($hostname, $username, $password, $dbname);

if (!$con) {
    die("Cannot connect to Database: " . mysqli_connect_error());
}

function filter($data)
{
    foreach ($data as $key => $value) {

        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value  = strip_tags($value);
        $data[$key] = $value;
    }
    return $data;
}

function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // Dynamically pass parameters
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - select");
        }
    } else {
        die("Query cannot be prepared - select");
    }
}



function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Update");
        }
    } else {
        die("Query cannot be prepared - Update");
    }
}
