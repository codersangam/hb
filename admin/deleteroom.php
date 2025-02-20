<?php
include('inc/db_config.php');

$id = $_GET['id'];

$sql = "DELETE FROM rooms1 WHERE id = $id";

if ($con->query($sql) === TRUE) {
    echo "Room deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}
