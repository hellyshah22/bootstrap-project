
    <?php
   
    $host = 'localhost';  
    $username = 'root';   
    $password = '';       
    $dbname = 'airline';  
    
 
    $conn = new mysqli($host, $username, $password, $dbname);
    
   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
        $source = $_POST['source'];
        $destination = $_POST['destination'];
        $date = $_POST['date'];
        $airline = $_POST['airline'];
        $result = $conn->query("SELECT * FROM flights WHERE source='{$_POST['source']}' AND destination='{$_POST['destination']}' AND date='{$_POST['date']}'");
    


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    .form-container {
  background-color: rgba(255, 255, 255, 0.9); 
  
}
</style>

</head>

<body class="min-vh-100 d-flex align-items-center justify-content-center" style="background: url('assets/image/715996-learjet-aircraft-airplane-jet-luxury.jpg') no-repeat center center fixed; background-size: cover;">
    <div class="container bg-white p-5 rounded shadow-lg" style="max-width: 600px;">
        <h2 class="mb-4 text-center">Select a Flight</h2>

        <?php if ($result && $result->num_rows > 0): ?>
            <form action="book_flight.php" method="POST" class="form-container">
                <div class="form-group mb-3">
                    <label for="flight">Available Flights</label>
                    <select class="form-control" name="flight_id" id="flight" required>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>">
                                <?= $row['airline'] ?> - <?= $row['source'] ?> to <?= $row['destination'] ?> (<?= date('d M Y', strtotime($row['date'])) ?>)
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Book Now</button>
                </div>
            </form>
        <?php else: ?>
            <div class="alert alert-warning text-center">No flights found.</div>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
</body>

</html>
   