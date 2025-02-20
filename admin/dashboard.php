
<?php
    require('inc/essentials.php');
    adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('inc/links1.php'); ?>
</head>
<body class="bg-light">

    <?php require('inc/header1.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Dashboard</h3>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text fs-3">150</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <h5 class="card-title">Active Orders</h5>
                                <p class="card-text fs-3">35</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-danger shadow">
                            <div class="card-body">
                                <h5 class="card-title">Pending Requests</h5>
                                <p class="card-text fs-3">10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>
</html>
