<?php
include('inc/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hotel Sara - Facilities</title>
    <?php include('inc/links.php'); ?>
    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }

        .facility-img {
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        Discover a world of comfort and luxury with our exceptional facilities.
        Designed to make your stay truly unforgettable, every detail is crafted for your relaxation and enjoyment.
    </p>
</div>


<div class="container">
    <div class="row">
        <!-- Facility 1: Café -->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex align-items-center mb-2">
                    <img src="inc/img/features/cafe.jpg" class="facility-img" alt="Café">
                    <h5 class="m-0 ms-3">Café</h5>
                </div>
                <p>
                    Enjoy freshly brewed coffee, artisanal teas, and a selection of pastries.
                    A perfect spot for a quick breakfast or an evening chat.
                    Experience a cozy ambiance with comfortable seating.
                    Our baristas ensure top-quality service and flavors.
                </p>
            </div>
        </div>


        <!-- Facility 2: Parking -->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex align-items-center mb-2">
                    <img src="inc\img\features\parking2.jpg" class="facility-img" alt="Parking">
                    <h5 class="m-0 ms-3">Parking</h5>
                </div>
                <p>
                    Safe and secure parking for all hotel guests.
                    24/7 surveillance ensures your vehicle’s protection.
                    Both covered and open parking spaces are available.
                    Conveniently located near the main hotel entrance.
                </p>
            </div>
        </div>

        <!-- Facility 3: Gym -->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex align-items-center mb-2">
                    <img src="inc/img/features/gym.jpg" class="facility-img" alt="Gym">
                    <h5 class="m-0 ms-3">Gym</h5>
                </div>
                <p>
                    Stay fit with state-of-the-art gym equipment.
                    Cardio machines, free weights, and personal training available.
                    Open 24/7 for your convenience and fitness goals.
                    Designed to keep you active during your stay.
                </p>
            </div>
        </div>

        <!-- Facility 4: Bar -->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex align-items-center mb-2">
                    <img src="inc/img/features/bar.jpg" class="facility-img" alt="Bar">
                    <h5 class="m-0 ms-3">Bar</h5>
                </div>
                <p>
                    Unwind with expertly crafted cocktails and fine wines.
                    Enjoy a relaxing atmosphere with live music on weekends.
                    A wide range of beverages, from classic to contemporary.
                    Perfect for social gatherings or a quiet night out.
                </p>
            </div>
        </div>

        <!-- Facility 5: Spa -->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex align-items-center mb-2">
                    <img src="inc/img/features/spa1.jpg" class="facility-img" alt="Spa">
                    <h5 class="m-0 ms-3">Spa</h5>
                </div>
                <p>
                    Rejuvenate with our relaxing massages and facials.
                    Indulge in luxury treatments designed for deep relaxation.
                    Our expert therapists offer personalized wellness services.
                    Experience ultimate tranquility with aromatherapy sessions.
                </p>
            </div>
        </div>

        <!-- Facility 6: Buffet Dining -->
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex align-items-center mb-2">
                    <img src="inc\img\features\buufet.jpg" class="facility-img" alt="Buffet Dining">
                    <h5 class="m-0 ms-3">Buffet Dining</h5>
                </div>
                <p>
                    Savor a wide range of international and local cuisines.
                    Fresh ingredients and live cooking stations daily.
                    Breakfast, lunch, and dinner buffets with diverse options.
                    Indulge in a delicious and satisfying dining experience.
                </p>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>
</body>

</html>