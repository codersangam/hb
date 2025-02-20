<?php
session_start();


// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // If the user is not logged in, check if they are registered (you can use your own logic here)
//     // For example, assuming you have a session variable `is_registered` that tracks registration status
//     if (!isset($_SESSION['is_registered']) || $_SESSION['is_registered'] != true) {
//         // If the user is not registered, redirect to the homepage
//         header("Location: ../index.php");
//         exit();
//     }
// }
// 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg,rgb(108, 90, 107),rgb(128, 159, 168));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        .booking-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 420px;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .booking-container h2 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .booking-container p {
            color: #555;
        }

        .payment-image {
            width: 180px;
            margin: 15px 0;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            transition: 0.3s;
        }

        .btn-back:hover {
            background-color: #495057;
        }
        
    </style>
</head>
<body>

    <div class="booking-container h-font">
        <h2 class="fw-bold h-font" ><i class="bi bi-credit-card"></i> Booking Confirmation</h2>
        <p class="text-muted">Our payment system is under development. Thank you for your patience!</p>
        <img src="https://cdn-icons-png.flaticon.com/512/3523/3523063.png" alt="Payment Pending" class="payment-image">
        <div>
            <a href="../index.php" class="btn btn-back">Go Back</a>
        </div>
    </div>

</body>
</html>
