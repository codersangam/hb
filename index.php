<?php
include('inc/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Hotel Sara -Home</title>

  <!-- Google Fonts and Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    .h-font {
      font-family: 'Merienda', cursive;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      appearance: textfield;
    }

    .custom-bg {
      background-color: rgb(39, 161, 153);
      border: 1px solid rgb(39, 161, 153);
    }

    .custom-bg:hover {
      background-color: #18554c;
      background-color: #18554c;
    }

    .availability-form {
      margin-top: -50px;
      z-index: 2;
      position: relative;
    }

    @media screen and (max-width: 575px) {
      .availability-form {
        margin-top: 25px;
        padding: 0 35px;
      }
    }
  </style>
</head>

<body class="bg-light">


  <?php include('inc/header.php'); ?>

  <!-- - carousel -->
  <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="inc\img\carousel\IMG_40905.png" class="w-100 d-block">
        </div>
        <div class="swiper-slide">
          <img src="inc\img\carousel\IMG_99736.png" class="w-100 d-block">
        </div>
        <!-- <div class="swiper-slide">
                <img src="inc\img\carousel\img3.jpg" class="w-100 d-block" >
            </div>
            <div class="swiper-slide">
                <img src="inc\img\carousel\img4.jpg"class="w-100 d-block" >
            </div>
            <div class="swiper-slide">
                <img src="inc\img\carousel\img5.webp" class="w-100 d-block" >
            </div> -->
      </div>
    </div>
  </div>

  <!-- check availability form -->
  <div class="container availability-form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5 class="mb-4">Check Booking Availability</h5>
        <form>
          <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Check-in</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Check-out</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500;">Adult</label>
              <select class="form-select shadow-none">
                <option selected>Select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-lg-2 mb-3">
              <label class="form-label" style="font-weight: 500;">Children</label>
              <select class="form-select shadow-none">
                <option selected>Select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-lg-1 mb-lg-3 mt-2">
              <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Our Rooms -->
  <h2 class="mt-5 pt-4 text-center fw-bold h-font">OUR ROOMS</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
          <img src="inc\img\rooms\two.jpg" class="card-img-top">

          <div class="card-body">
            <h5 class="fw-bold h-font">Simple Rooms</h5>
            <h6 class="mb-4">₹1500 per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                2 Rooms
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                1 Bathroom
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                1 Balcony
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                2 Sofa
              </span>
            </div>

            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Wifi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Television
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                AC
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Room heater
              </span>
            </div>

            <div class="guests mb-4">
              <h6 class="mb-1">Guests</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                5 Adults
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                4 Children
              </span>
            </div>


            <div class="d-flex justify-content-evenly mb-2">
              <a href="inc\booking.php" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
          <img src="inc\img\rooms\nine.jpg" class="card-img-top">

          <div class="card-body">
            <h5 class="fw-bold h-font">Simple Rooms</h5>
            <h6 class="mb-4">₹2000 per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                2 Rooms
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                1 Bathroom
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                1 Balcony
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                2 Sofa
              </span>
            </div>

            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Wifi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Television
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                AC
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Room heater
              </span>
            </div>

            <div class="guests mb-4">
              <h6 class="mb-1">Guests</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                5 Adults
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                4 Children
              </span>
            </div>

            <div class="d-flex justify-content-evenly mb-2">
              <a href="inc\booking.php" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
          <img src="inc\img\rooms\three.jpg" class="card-img-top">

          <div class="card-body">
            <h5 class="fw-bold h-font">Simple Rooms</h5>
            <h6 class="mb-4">₹2500 per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                2 Rooms
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                1 Bathroom
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                1 Balcony
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                2 Sofa
              </span>
            </div>

            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Wifi
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Television
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                AC
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                Room heater
              </span>
            </div>

            <div class="guests mb-4">
              <h6 class="mb-1">Guests</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                5 Adults
              </span>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                4 Children
              </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="inc\booking.php" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 text-center mt-5">
        <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
      </div>
    </div>
  </div>

  <!-- Our Facilities -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
        <img src="inc\img\features\IMG_43553.svg" alt="wifi" width="80px">
        <h5 class="mt-3">Unlimited Wifi</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
        <img src="inc\img\features\massage.svg" alt="wifi" width="80px">
        <h5 class="mt-3">Massage Center</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
        <img src="inc\img\features\ac.svg" alt="wifi" width="80px">
        <h5 class="mt-3">AC</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
        <img src="inc\img\features\heater.svg" alt="wifi" width="80px">
        <h5 class="mt-3">Room Heater</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow my-3 py-4">
        <img src="inc\img\features\tv.svg" alt="wifi" width="80px">
        <h5 class="mt-3">Smart Television</h5>
      </div>
      <div class="col-lg-12 text-center mt-5">
        <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-2 fw-bold shadow-none">More Facilities >>></a>
      </div>
    </div>
  </div>

  <!-- Reach us -->
  <?php
  include('inc\db_config.php');

  // Fetch contact details
  $contact_q = "SELECT * FROM `contact_detailss` WHERE `sr_no`=?";
  $values = [1];
  $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));

  // Fallback if no data is returned
  if (!$contact_r) {
    $contact_r = [
      'iframe' => '',
      'pn1' => '',
      'pn2' => ''
    ];
  }

  // Sanitize phone numbers
  $pn1 = preg_replace('/[^0-9+]/', '', $contact_r['pn1'] ?? '');
  $pn2 = preg_replace('/[^0-9+]/', '', $contact_r['pn2'] ?? '');
  ?>
  <h2 class="mt-5 pt-4 text-center fw-bold h-font">REACH US</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe class="w-100 rounded" height="320px" src="<?php echo htmlspecialchars($contact_r['iframe']) ?>" loading="lazy"></iframe>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-4">
          <h5>Contact us</h5>
          <a href="tel:<?php echo $pn1 ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> <?php echo htmlspecialchars($contact_r['pn1']) ?>
          </a>
          <br>
          <?php if (!empty($pn2)) : ?>
            <a href="tel:<?php echo $pn2 ?>" class="d-inline-block text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i> <?php echo htmlspecialchars($contact_r['pn2']) ?>
            </a>
          <?php endif; ?>
        </div>

        <!-- Follow Us Section -->
        <div class="bg-white p-4 rounded mb-4">
          <h5>Follow us</h5>
          <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-twitter"></i> Twitter
            </span>
          </a>
          <br>
          <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-facebook"></i> Facebook
            </span>
          </a>
          <br>
          <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-instagram"></i> Instagram
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>



  <?php include('inc/footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loo: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,

      }
    });

    var swiper = new Swiper(".Swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 3,
        },
      }
    });
  </script>
</body>

</html>