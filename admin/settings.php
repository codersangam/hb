<?php
include('inc/essentials.php');
include('inc/db_config.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require('inc/links1.php'); ?>
</head>

<body class="bg-light">

    <?php require('inc/header1.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4 class="mb-4 fw-bold">SETTINGS</h4>

                <!-- General Settings -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title fw-bold m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-settings-modal">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>

                <!-- Shutdown Section -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <input onchange="upd_shutdown(this.checked ? 1 : 0)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                            </div>
                        </div>
                        <p class="card-text">
                            No customers will be allowed to book hotel rooms when shutdown mode is turned on.
                        </p>
                    </div>
                </div>

                <!-- Modal for General Settings -->
                <div class="modal fade" id="general-settings-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="generalSettingsLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Settings</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">About us</label>
                                        <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="reset_modal_inputs()" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" onclick="upd_general()" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Settings Section -->
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold">Contact Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contacts-settings-modal">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text" id="address"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text" id="gmap"></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn1"></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn2"></span>
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook"></i>
                                        <span id="fb"></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-instagram"></i>
                                        <span id="insta"></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-twitter"></i>
                                        <span id="tw"></span>
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Map Location</h6>
                                    <iframe id="iframe" class="border p-2 w-100" style="height: 300px;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Contact Settings -->
                <div class="modal fade" id="contacts-settings-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="contactsSettingsLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Contact Settings</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Left Side: Address, Google Map, Phone Numbers -->
                                        <div class="col-md-6">
                                            <!-- Address -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Address</label>
                                                <input type="text" name="address" id="address_inp" class="form-control shadow-none">
                                            </div>
                                            <!-- Google Map -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Google Map Link</label>
                                                <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none">
                                            </div>
                                            <!-- Phone Numbers -->
                                            <div class="mb-4">
                                                <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                    <input type="number" name="pn1" id="pn1_inp" class="form-control shadow-null" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                    <input type="number" name="pn2" id="pn2_inp" class="form-control shadow-null">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Side: Social Links -->
                                        <div class="col-md-6">
                                            <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                            <div class="row">
                                                <!-- Facebook -->
                                                <div class="col-12 mb-3">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" name="fb" id="fb_inp" class="form-control shadow-null" required>
                                                    </div>
                                                </div>
                                                <!-- Instagram -->
                                                <div class="col-12 mb-3">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" name="insta" id="insta_inp" class="form-control shadow-null">
                                                    </div>
                                                </div>
                                                <!-- Twitter -->
                                                <div class="col-12 mb-3">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bi bi-twitter"></i></span>
                                                        <input type="text" name="tw" id="tw_inp" class="form-control shadow-null">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">iframe</label>
                                                    <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer Buttons -->
                                <div class="modal-footer">
                                    <button type="button" onclick="reset_modal_inputs()" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                    <button type="button" onclick="upd_contacts()" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require('inc/scripts.php'); ?>
    <script src="scripts\settings.js"></script>
    <script src="js/ajax.js"></script>
</body>

</html