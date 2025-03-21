<?php
session_start();
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

$contact_q = "SELECT * FROM `contact_detailss` WHERE `sr_no`=?";
$values = [1];
$contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));

// Fetch settings data
$sql = "SELECT site_title, site_about FROM settings LIMIT 1";
$resulttt = $con->query($sql);

$site_title = "Default Title"; // Fallback title
$site_about = "Default About"; // Fallback about

if ($resulttt->num_rows > 0) {
  $row = $resulttt->fetch_assoc();
  $site_title = $row['site_title'];
  $site_about = $row['site_about'];
}
?>

<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><?php echo htmlspecialchars($site_title); ?></a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link me-2" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="rooms.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="facilities.php">Facilities</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="contact.php">Contact us</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
      </ul>


      <?php if (isset($_SESSION['user'])) { ?>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../uploads/<?= $_SESSION['user']['profile_picture'] ?>" alt="Profile" class="rounded-circle" width="30" height="30">
            <?= $_SESSION['user']['name'] ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="inc/ajax/logout.php">Logout</a></li>
          </ul>
        </div>
      <?php } else { ?>
        <div class="d-flex">
          <button class="btn btn-secondary px-4 py-2 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button class="btn btn-secondary px-4 py-2" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
        </div>
      <?php } ?>



    </div>
  </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="loginForm">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-circle fs-3 me-2"></i> User Login
          </h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control shadow-none" id="email" name="email" required>
          </div>
          <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" class="form-control shadow-none" id="password" name="password" required>
          </div>
          <div class="d-flex justify-content-center mb-2">
            <button type="submit" class="btn btn-secondary shadow-none w-100">LOGIN</button>
          </div>
          <p id="loginMessage" class="text-danger text-center"></p>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="registerForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="name" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Phone number</label>
                <input name="phonenum" type="number" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Picture</label>
                <input name="profile" type="file" class="form-control shadow-none">
              </div>
              <div class="col-md-12 p-0 mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Pincode</label>
                <input name="pincode" type="number" class="form-control shadow-none">
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Date of birth</label>
                <input name="dob" type="date" class="form-control shadow-none">
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label">Password</label>
                <input name="pass" type="password" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Confirm Password</label>
                <input name="cpass" type="password" class="form-control shadow-none" required>
              </div>
            </div>
          </div>
          <div class="text-center mb-1">
            <button type="submit" class="btn btn-secondary shadow-none">REGISTER</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>