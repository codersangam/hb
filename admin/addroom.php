<?php
include('inc/db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $rooms = $_POST['rooms'];
    $bathrooms = $_POST['bathrooms'];
    $balconies = $_POST['balconies'];
    $features = "$rooms Rooms,$bathrooms Bathrooms,$balconies Balconies";

    $facilities = isset($_POST['facilities']) ? implode(',', $_POST['facilities']) : '';
    $guests_adults = $_POST['guests_adults'];
    $guests_children = $_POST['guests_children'];

    $image = $_FILES['image']['name'];
    $target = "../uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO rooms1 (name, price, features, facilities, guests_adults, guests_children, image) 
            VALUES ('$name', '$price', '$features', '$facilities', '$guests_adults', '$guests_children', '$image')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Room Added successfully!'); window.location.href='rooms.php';</script>";
    } else {
        echo "Error: " . $con->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Room</title>

    <?php require('inc/links1.php'); ?>
    <style>
        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 600;
            margin-top: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .custom-file-input {
            padding: 8px;
            cursor: pointer;
        }

        .btn-primary {
            width: 100%;
            font-weight: bold;
            padding: 10px;
            border-radius: 6px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #004080);
        }

        .form-check {
            margin-bottom: 8px;
        }

        .form-check-label {
            margin-left: 6px;
        }
    </style>
</head>

<body class="bg-light">

    <?php require('inc/header1.php'); ?>

    <div class="container mt-4">
        <h3 class="fw-bold text-center mb-4">Add New Room</h3>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4">
                    <h5 class="text-center fw-bold mb-3">Room Details</h5>

                    <form method="POST" enctype="multipart/form-data">
                        <label>Room Name:</label>
                        <input type="text" name="name" class="form-control" required>

                        <label>Price (in USD):</label>
                        <input type="number" name="price" class="form-control" required>

                        <label>Number of Rooms:</label>
                        <select name="rooms" class="form-control">
                            <option value="1">1 Room</option>
                            <option value="2">2 Rooms</option>
                            <option value="3">3 Rooms</option>
                        </select>

                        <label>Bathrooms:</label>
                        <select name="bathrooms" class="form-control">
                            <option value="1">1 Bathroom</option>
                            <option value="2">2 Bathrooms</option>
                        </select>

                        <label>Balconies:</label>
                        <select name="balconies" class="form-control">
                            <option value="0">No Balcony</option>
                            <option value="1">1 Balcony</option>
                            <option value="2">2 Balconies</option>
                        </select>

                        <label>Facilities:</label>
                        <div class="form-check">
                            <input type="checkbox" name="facilities[]" value="Wifi" class="form-check-input">
                            <label class="form-check-label">Wifi</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="facilities[]" value="Television" class="form-check-input">
                            <label class="form-check-label">Television</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="facilities[]" value="AC" class="form-check-input">
                            <label class="form-check-label">AC</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="facilities[]" value="Room heater" class="form-check-input">
                            <label class="form-check-label">Room Heater</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="facilities[]" value="Mini bar" class="form-check-input">
                            <label class="form-check-label">Mini Bar</label>
                        </div>

                        <label>Max Adults:</label>
                        <input type="number" name="guests_adults" class="form-control" required>

                        <label>Max Children:</label>
                        <input type="number" name="guests_children" class="form-control" required>

                        <label>Upload Room Image:</label>
                        <input type="file" name="image" class="form-control custom-file-input" required>

                        <button type="submit" class="btn btn-primary mt-3">Add Room</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>

</body>

</html>