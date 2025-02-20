<?php
include('inc/db.php');  
include('inc/ajax/function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Sara - Contact</title>
    <?php include('inc/links.php'); ?>
</head>

<body>
<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">CONTACT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        Have questions or need assistance? We're here to help! Reach out to us, and let's make your stay unforgettable.
    </p>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-6">
            <div class="bg-white rounded shadow p-4">
                <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact_r['iframe']; ?>" loading="lazy"></iframe> 
                <h5>Address</h5>
                <a href="<?php echo $contact_r['gmap']; ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="bi bi-geo-alt"></i> <?php echo $contact_r['address']; ?>
                </a>

                <h5 class="mt-4">Contact us</h5>
                <a href="tel:<?php echo $contact_r['pn1']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i> <?php echo $contact_r['pn1']; ?>
                </a>
                <br>
              
                <?php
                if (!empty($contact_r['pn2'])) {
                    echo '<a href="tel:'.$contact_r['pn2'].'" class="d-inline-block text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> '.$contact_r['pn2'].'
                          </a>';
                }
                ?>

                <h5 class="mt-4">Follow us</h5>
                <?php
                if (!empty($contact_r['tw'])) {
                    echo '<a href="'.$contact_r['tw'].'" class="d-inline-block text-dark fs-5 me-2">
                            <i class="bi bi-twitter"></i>
                          </a>';
                }
                ?>
                <a href="<?php echo $contact_r['fb']; ?>" class="d-inline-block text-dark fs-5 me-2">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="<?php echo $contact_r['insta']; ?>" class="d-inline-block text-dark fs-5">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>   
        </div>

        <div class="col-lg-6 col-md-6 mb-5 px-6">
            <div class="bg-white rounded shadow p-4">
                <form method="POST">
                    <h5>Send a message</h5>
                    <div class="mt-3">
                        <label class="form-label">Name</label>
                        <input name="name" required type="text" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" required type="email" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input name="subject" required type="text" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" required class="form-control shadow-none" rows="3"></textarea>
                    </div>
                    <button type="submit" name="send" class="btn text-white custom-bg mt-3">SEND</button>
                </form> 
            </div>   
        </div>
    </div>
</div>

<?php
// Handle form submission
if (isset($_POST['send'])) {
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `user_querie` (`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";
    $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];

    $res = insert($q, $values, 'ssss');

    if ($res == 1) {
        echo '<script>alert("Mail sent successfully!");</script>';
    } else {
        echo '<script>alert("Server Down! Try again later.");</script>';
    }
}
?>

<?php require('inc/footer.php'); ?>
</body>
</html>
