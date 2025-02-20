<?php
include('../inc/db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM rooms1 WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$features = explode(',', $row['features']);
$facilities = explode(',', $row['facilities']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room - Admin Panel</title>
    <?php require('inc/links1.php'); ?>
    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .preview-img {
            max-width: 100%;
            height: auto;
            display: <?= !empty($row['image']) ? 'block' : 'none' ?>;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>

<body class="bg-light">

    <?php
    include('inc/db_config.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM rooms1 WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $features = explode(',', $row['features']);
    $facilities = explode(',', $row['facilities']);
    ?>

    <?php require('inc/header1.php'); ?>

    <div class="container mt-4">
        <div class="form-container">
            <h4 class="text-center fw-bold">Edit Room</h4>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Room Name:</label>
                    <input type="text" name="name" class="form-control" value="<?= $row['name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price:</label>
                    <input type="number" name="price" class="form-control" value="<?= $row['price']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rooms:</label>
                    <select name="rooms" class="form-select">
                        <option value="1" <?= strpos($row['features'], '1 Room') !== false ? 'selected' : '' ?>>1 Room</option>
                        <option value="2" <?= strpos($row['features'], '2 Rooms') !== false ? 'selected' : '' ?>>2 Rooms</option>
                        <option value="3" <?= strpos($row['features'], '3 Rooms') !== false ? 'selected' : '' ?>>3 Rooms</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bathrooms:</label>
                    <select name="bathrooms" class="form-select">
                        <option value="1" <?= strpos($row['features'], '1 Bathroom') !== false ? 'selected' : '' ?>>1 Bathroom</option>
                        <option value="2" <?= strpos($row['features'], '2 Bathrooms') !== false ? 'selected' : '' ?>>2 Bathrooms</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Balconies:</label>
                    <select name="balconies" class="form-select">
                        <option value="0" <?= strpos($row['features'], '0 Balconies') !== false ? 'selected' : '' ?>>No Balcony</option>
                        <option value="1" <?= strpos($row['features'], '1 Balcony') !== false ? 'selected' : '' ?>>1 Balcony</option>
                        <option value="2" <?= strpos($row['features'], '2 Balconies') !== false ? 'selected' : '' ?>>2 Balconies</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Facilities:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Wifi" <?= in_array('Wifi', $facilities) ? 'checked' : '' ?>>
                        <label class="form-check-label">Wifi</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="facilities[]" value="Television" <?= in_array('Television', $facilities) ? 'checked' : '' ?>>
                        <label class="form-check-label">Television</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="facilities[]" value="AC" <?= in_array('AC', $facilities) ? 'checked' : '' ?>>
                        <label class="form-check-label">AC</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Adults:</label>
                    <input type="number" name="guests_adults" class="form-control" value="<?= $row['guests_adults']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Children:</label>
                    <input type="number" name="guests_children" class="form-control" value="<?= $row['guests_children']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Room Image:</label><br>
                    <img id="previewImage" class="preview-img" src="../uploads/<?= $row['image']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload New Image:</label>
                    <input type="file" name="image" class="form-control" id="imageInput">
                </div>

                <button type="submit" class="btn btn-success w-100">Update Room</button>
            </form>
        </div>
    </div>

    <?php
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

        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $target = "uploads/" . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $sql = "UPDATE rooms1 SET name='$name', price='$price', features='$features', facilities='$facilities', guests_adults='$guests_adults', guests_children='$guests_children', image='$image' WHERE id=$id";
        } else {
            $sql = "UPDATE rooms1 SET name='$name', price='$price', features='$features', facilities='$facilities', guests_adults='$guests_adults', guests_children='$guests_children' WHERE id=$id";
        }

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Room updated successfully!'); window.location.href='rooms.php';</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
    ?>

    <script>
        document.getElementById("imageInput").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById("previewImage");
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>



<?php
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

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE rooms1 SET name='$name', price='$price', features='$features', facilities='$facilities', guests_adults='$guests_adults', guests_children='$guests_children', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE rooms1 SET name='$name', price='$price', features='$features', facilities='$facilities', guests_adults='$guests_adults', guests_children='$guests_children' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Room updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>