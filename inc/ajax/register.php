<?php
require("../db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phonenum']);
    $address = trim($_POST['address']);
    $pincode = trim($_POST['pincode']);
    $dob = $_POST['dob'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    // Validate password match
    if ($password !== $cpassword) {
        echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Profile picture upload
    $profile_picture = null;
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['profile']['name'];
        $upload_dir = __DIR__ . "/../../uploads/"; // Adjust path if needed
        $target = $upload_dir . basename($image);

        if (move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
            $profile_picture = basename($image);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload profile picture.']);
            exit;
        }
    }



    // Insert user into database
    $sql = "INSERT INTO users1 (name, email, phone_number, profile_picture, address, pincode, dob, password) 
            VALUES ('$name', '$email', '$phone', '$profile_picture', '$address', '$pincode', '$dob', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Registration successful.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to register. Email might already exist.']);
    }
}
