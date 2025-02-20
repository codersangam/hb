<?php
include('inc/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Sara - About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php include('inc/links.php'); ?>
    <style>
        .box:hover {
            border-top-color: var(--teal) !important;
        }

        .box {
            height: 300px;
            /* Adjusted for uniform size */
            width: 250px;
            /* Made consistent */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .box img {
            width: 60px;
            /* Adjusted image size */
            height: auto;
        }

        .small-img img {
            height: 200px;
            /* Increased size */
            width: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4 text-center">
        <h2 class="fw-bold h-font">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="mt-3">
            Welcome to <b>Hotel Sara</b>, where comfort meets elegance!
            Nestled in the heart of the city, we offer world-class hospitality, luxurious stays, and an experience to remember.
            Whether you're here for business or leisure, we ensure a <b>memorable and relaxing stay</b>.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-2">
                <h3 class="mb-3 fw-bold text-dark">Experience Luxury Like Never Before</h3>
                <p>
                    At <b>Hotel Sara</b>, we believe in delivering more than just a stay.
                    From cozy rooms to gourmet dining and exceptional service,
                    we are committed to making every moment special for our guests.
                </p>
            </div>

            <!-- 4 Larger Images -->
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-1">
                <div class="row g-2">
                    <div class="col-6 small-img">
                        <img src="inc/img/about/h3.jpg" class="w-100 rounded shadow">
                    </div>
                    <div class="col-6 small-img">
                        <img src="inc/img/about/h5.jpg" class="w-100 rounded shadow">
                    </div>
                    <div class="col-6 small-img">
                        <img src="inc/img/about/hr1.jpg" class="w-100 rounded shadow">
                    </div>
                    <div class="col-6 small-img">
                        <img src="inc/img/about/h4.jpg" class="w-100 rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hotel Statistics -->
    <div class="container mt-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 box">
                    <img src="inc/img/about/hotel.svg">
                    <h4 class="mt-3">100+ Luxurious Rooms</h4>
                    <p class="text-muted">A variety of premium rooms to suit your comfort.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 box">
                    <img src="inc/img/about/customers.svg">
                    <h4 class="mt-3">200+ Happy Guests</h4>
                    <p class="text-muted">We take pride in making every stay unforgettable.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 box">
                    <img src="inc/img/about/rating.svg">
                    <h4 class="mt-3">150+ 5-Star Reviews</h4>
                    <p class="text-muted">Our guests love us, and we love serving them!</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 box">
                    <img src="inc/img/about/staff.svg">
                    <h4 class="mt-3">100+ Dedicated Staff</h4>
                    <p class="text-muted">Always ready to provide top-notch service.</p>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>

</html>