<?php
require("../db.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, email, profile_picture, password FROM users1 WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $email, $profile_picture, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user'] = [
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'profile_picture' => $profile_picture ?: 'default.png'
            ];

            echo json_encode(['success' => true, 'message' => 'Login successful.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid password.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }

    $stmt->close();
}
