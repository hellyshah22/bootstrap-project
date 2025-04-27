


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <style>
    .navbar-brand img {
      height: 32px;
    }
    #divmain {
      background: url('assets/image/indeximage.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .form-container {
  background-color: rgba(255, 255, 255, 0.9); /* white with 80% opacity */
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
  min-width: 300px;
  max-width: 400px;
  width: 100%;
}

    .button-link {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
    }

    .button-link:hover {
        background-color: #0056b3;
    }
    


    .signature-title {
        font-family: 'Dancing Script', cursive;
        font-weight: 700;
        font-style: italic;
        font-size: 2rem;
    }


  </style>
</head>
<body>
<nav class="navbar navbar-light bg-light px-3">
    <div class="container-fluid d-flex justify-content-between align-items-center w-100">     
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://www.freeiconspng.com/uploads/airplane-icon-image-gallery-1.png" alt="Airplane Logo" style="height: 40px;">
        </a>     
        <div class="text-center flex-grow-1">
            <h4 class="mb-0 signature-title"> Krish Airlines</h4>
        </div>

        <div>
    <button class="btn btn-primary" onclick="location.href='user.php'">View Your Booking</button>
</div>

    </div>
</nav>
      <div class="d-flex justify-content-center align-items-center vh-100" id="divmain">
      <form id="flightForm" method="POST" action="booking.php" class="form-container">
    <div class="mb-3">
      <label for="source" class="form-label">Source</label>
      <select id="source" name="source" class="form-select">
        <option value="">Select a Source</option>
        <option value="DEL">Delhi</option>
        <option value="MUM">Mumbai</option>
        <option value="HYD">Hydrabad</option>
        
      </select>
      <div class="invalid-feedback">Please select a source.</div>
    </div>

    <div class="mb-3">
      <label for="destination" class="form-label">Destination</label>
      <select id="destination" name="destination" class="form-select">
        <option value="">Select a Destination</option>
        <option value="DEL">Delhi</option>
        <option value="MUM">Mumbai</option>
        <option value="HYD">Hydrabad</option>
      </select>
      <div class="invalid-feedback">Please select a destination.</div>
    </div>

    <div class="mb-3">
      <label for="date" class="form-label">Date</label>
      <input type="date" id="date" name="date" class="form-control">
      <div class="invalid-feedback">Please select a date.</div>
    </div>

    <div class="mb-3">
      <label for="airline" class="form-label">Airline</label>
      <input type="text" id="airline" name="airline" class="form-control" placeholder="Airline">
      <div class="invalid-feedback">Please enter an airline.</div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <script  src="assets/js/index.js"></script>
      
         
    
</body>
</html>