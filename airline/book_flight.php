<?php

if (!isset($_POST['flight_id'])) {
    die("No flight selected.");
}


$flight_id = $_POST['flight_id'];

$conn = new mysqli("localhost", "root", "", "airline");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM flights WHERE id = ?");
$stmt->bind_param("i", $flight_id);
$stmt->execute();
$result = $stmt->get_result();

$flight = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Flight Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="min-vh-100 d-flex align-items-center justify-content-center" style="background: url('assets/image/oki.jpeg') no-repeat center center fixed; background-size: cover;">
    <div class="container bg-white p-5 rounded shadow-lg" style="max-width: 600px;">
        <?php if ($flight): ?>
            <h2 class="mb-4 text-center">Flight Details</h2>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Airline:</strong> <?= $flight['airline'] ?></li>
                <li class="list-group-item"><strong>Source:</strong> <?= $flight['source'] ?></li>
                <li class="list-group-item"><strong>Destination:</strong> <?= $flight['destination'] ?></li>
                <li class="list-group-item"><strong>Date:</strong> <?= date('d M Y', strtotime($flight['date'])) ?></li>
                <li class="list-group-item"><strong>Price:</strong> $<?= number_format($flight['price'], 2) ?></li> 
            </ul>

          
            <form   id="bookingForm"  action="confirm_booking.php" method="POST">
            <input type="hidden" name="id" value="<?= $flight['id'] ?>">
                <input type="hidden" name="airline" value="<?= $flight['airline'] ?>">
                <input type="hidden" name="source" value="<?= $flight['source'] ?>">
                <input type="hidden" name="destination" value="<?= $flight['destination'] ?>">
                <input type="hidden" name="date" value="<?= $flight['date'] ?>">
                <input type="hidden" name="price" value="<?= $flight['price'] ?>">


                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group mb-4">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" name="phone" id="phone" required>
                </div>

                
                <h4 class="mb-3 text-center">Select Your Seat</h4>
                <div class="form-group mb-4 text-center">
    <div class="btn-group btn-group-toggle flex-wrap" data-toggle="buttons">
        <?php for ($i = 1; $i <= 30; $i++): ?>
            <label class="btn btn-outline-primary m-1">
                <input type="radio" name="seatno" value="<?= $i ?>" required> <?= $i ?>
            </label>
        <?php endfor; ?>
    </div>
</div>
<div class="d-grid">
                    <button type="submit" class="btn btn-success btn-block">Confirm Booking</button>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">Flight not found.</div>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
        $(document).ready(function () {
            $("#bookingForm").on("submit", function (event) {
                
                var seatno = $("input[name='seatno']:checked").val();
               
                if (seatno) {
                
                    seatno = parseInt(seatno);

                   
                    if (isNaN(seatno)) {
                        alert("Invalid seat number. Please select a valid seat.");
                        event.preventDefault();
                    } else {
                        
                        $("<input>").attr({
                            type: "hidden",
                            name: "seatno",
                            value: seatno
                        }).appendTo("#bookingForm");
                    }
                } else {
                    alert("Please select a seat before proceeding.");
                    event.preventDefault(); 
                }
            });
        });
    </script>

</body>
</html>
