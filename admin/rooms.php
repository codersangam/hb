<?php
include('inc/essentials.php');
include('inc/db_config.php');
adminLogin();

$sql = "SELECT * FROM rooms1";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rooms</title>
    <?php require('inc/links1.php'); ?>
</head>

<body class="bg-light">

    <?php require('inc/header1.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="mb-4 fw-bold">ROOMS</h4>

                <!-- General Settings -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title fw-bold m-0">All Rooms</h5>
                            <a href="addroom.php" class="btn btn-sm btn-primary">Add New Room</a>
                        </div>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $features = explode(',', $row['features']);
                            $facilities = explode(',', $row['facilities']);
                        ?>

                            <div class="card mb-4 border-0 shadow">
                                <div class="row g-0 p-3 align-items-center">
                                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-4">
                                        <img src="../uploads/<?php echo $row['image']; ?>" class="img-fluid rounded" alt="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                        <h5 class="fw-bold h-font"><?php echo $row['name']; ?></h5>
                                        <div class="features mb-2">
                                            <h6 class="mb-1 fw-bold">Features</h6>
                                            <?php foreach ($features as $feature) { ?>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"><?php echo $feature; ?></span>
                                            <?php } ?>
                                        </div>
                                        <div class="facilities mb-2">
                                            <h6 class="mb-1 fw-bold">Facilities</h6>
                                            <?php foreach ($facilities as $facility) { ?>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"><?php echo $facility; ?></span>
                                            <?php } ?>
                                        </div>
                                        <div class="guests">
                                            <h6 class="mb-1 fw-bold">Guests</h6>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"><?php echo $row['guests_adults']; ?> Adults</span>
                                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base"><?php echo $row['guests_children']; ?> Children</span>

                                        </div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <h6 class="mb-4">₹<?php echo $row['price']; ?> Per Night</h6>
                                        <a href="editroom.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="deleteroom.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require('inc/scripts.php'); ?>
    <script src="scripts\settings.js"></script>

</body>

</html