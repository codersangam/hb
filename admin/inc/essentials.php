<?php

function adminLogin() {
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) { // Check for session and its value
        echo "<script>window.location.href='index.php';</script>"; // Fixed "herf" to "href"
    }
}

function redirect($url) {
    echo "<script>window.location.href='$url';</script>"; // Fixed "herf" to "href"
}

function alert($type, $msg) {
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
    <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
        <strong class="me-3">$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}
?>
