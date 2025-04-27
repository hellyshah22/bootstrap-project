<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted to confirm booking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize POST data
    $seatno      = $conn->real_escape_string($_POST['seatno']);
    $price       = (float)$_POST['price'];
    $source      = $conn->real_escape_string($_POST['source']);
    $destination = $conn->real_escape_string($_POST['destination']);
    $name        = $conn->real_escape_string($_POST['name']);
    $email       = $conn->real_escape_string($_POST['email']);
    $date        = $conn->real_escape_string($_POST['date']);
    $phone       = $conn->real_escape_string($_POST['phone']);
    $id          = $conn->real_escape_string($_POST['id']);
    $airline     = $conn->real_escape_string($_POST['airline']);

    $check_sql = "SELECT * FROM booked WHERE seatno = '$seatno' AND id = '$id' AND date = '$date'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-warning'>⚠️ Seat already booked for this flight and date!</div>";
    } else {
        
        if (isset($_POST['termsCheck']) && $_POST['termsCheck'] == 'on') {
            $insert_sql = "INSERT INTO booked (seatno, price, source, destination, name, email, date, phone, id, airline)
                           VALUES ('$seatno', $price, '$source', '$destination', '$name', '$email', '$date', '$phone', '$id', '$airline')";

            if ($conn->query($insert_sql) === TRUE) {
                $booking_success = true;
            } else {
                $booking_success = false;
            }
        } else {
            $booking_success = false;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Confirmation</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
            background-image: url('assets/image/bg1.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
</style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Booking Status</h4>
        </div>
        <div class="card-body">
            <?php if (isset($booking_success)): ?>
                <?php if ($booking_success): ?>
                    <div class="alert alert-success">
                        <h4>✅ Thank you for booking with us!</h4>
                        <p>Your booking has been successfully confirmed. We look forward to having you on board!</p>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger">
                        <h4>❌ Booking failed!</h4>
                        <p>There was an issue with your booking. Please try again later or contact customer support.</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

      
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-primary btn-lg">Go to Homepage</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
