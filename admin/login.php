<?php
session_start();
require('inc/db_config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Sanitize inputs
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check the user's credentials
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];

            // Redirect to dashboard or homepage
            header("Location: index.php");
            exit;
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid email or password!";
        }
    } else {
        // User not found
        $_SESSION['error'] = "No account found with this email!";
    }
    $stmt->close();
    $conn->close();
    header("Location: index.php");
    exit;
}
