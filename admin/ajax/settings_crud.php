<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

// Set header for JSON response
header('Content-Type: application/json');

// Handle 'get_general' action
if (isset($_POST['action']) && $_POST['action'] === 'get_general') {
    $q = "SELECT * FROM `settings` WHERE `sr_no` = ?";
    $values = [1];

    $res = select($q, $values, "i");

    if ($res) {
        $data = mysqli_fetch_assoc($res);
        echo json_encode($data); // Return the data as JSON
    } else {
        echo json_encode(['error' => 'No data found']);
    }
    exit; // Ensure the script ends after this action
}

// Handle 'upd_general' action
if (isset($_POST['action']) && $_POST['action'] === 'upd_general') {
    $frm_data = filter($_POST);

    $q = "UPDATE `settings` SET `site_title` = ?, `site_about` = ? WHERE `sr_no` = ?";
    $values = [$frm_data['site_title'], $frm_data['site_about'], 1];

    $res = update($q, $values, 'ssi');

    echo json_encode(['success' => $res > 0 ? true : false]);
    exit; // Ensure the script ends after this action
}

// Handle 'get_contacts' action
if (isset($_POST['action']) && $_POST['action'] === 'get_contacts') {
    $q = "SELECT * FROM `contact_detailss` WHERE `sr_no` = ?";
    $values = [1];

    $res = select($q, $values, "i");
    if ($res) {
        $data = mysqli_fetch_assoc($res);
        echo json_encode($data); // Ensure the iframe value is just the URL
    } else {
        echo json_encode(['error' => 'No data found']);
    }
    exit;  // Make sure no additional data is sent
}

// Handle 'upd_contacts' action (if needed)
if (isset($_POST['action']) && $_POST['action'] === 'upd_contacts') {
    $frm_data = filter($_POST);

    $q = "UPDATE `contact_detailss` SET `address` = ?, `gmap` = ?, `pn1` = ?, `pn2` = ?, `fb` = ?, `insta` = ?, `tw` = ?, `iframe` = ? WHERE `sr_no` = ?";
    $values = [
        $frm_data['address'], $frm_data['gmap'], $frm_data['pn1'], $frm_data['pn2'],
        $frm_data['fb'], $frm_data['insta'], $frm_data['tw'], $frm_data['iframe'], 1
    ];

    $res = update($q, $values, 'ssssssssi');

    echo json_encode(['success' => $res > 0 ? true : false]);
    exit; // Ensure the script ends after this action
}

// Default response for invalid actions
echo json_encode(['error' => 'Invalid action']);
exit;
?>
