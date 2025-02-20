<?php
include('inc/db.php'); // Include database connection

// Function to sanitize user input
function filteration($data) {
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
    }
    return $data;
}

// Function to insert data safely
function insert($query, $values, $types) {
    global $conn;
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        return 0;
    }
    $stmt->bind_param($types, ...$values);
    return $stmt->execute() ? 1 : 0;
}
?>
