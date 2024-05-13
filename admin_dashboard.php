<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="admin_dashboard.css">
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 
</head>
<body>
  <div class="dashboard">
    <div class="sidebar">
        <div class="logo">
            <img src="logoo.png" alt="Logo">
        </div>
        <div class="profile">
            <img src="profile.png" alt="Profile Picture">
        </div>
        <div class="card" id="Dashboard"><a href="dashboard.html"><i class="fas fa-home"></i> Dashboard</div>
          <div class="card" id="Buses"><a href="busesDisplay.php"><i class="fas fa-bus"></i> Buses</div>
          <div class="card" id="routes-card"><a href="routesDisplay.php"><i class="fas fa-map-signs"></i> Routes</div>
          <div class="card" id="customers-card"><a href="customers.html"><i class="fas fa-users"></i> Customers</div>
          <div class="card" id="booking-card"><a href="bookingDisplay.php"><i class="fas fa-ticket-alt"></i> Booking</div>
          <div class="card" id="seats-card"><a href="seatsDisplay.php"><i class="fas fa-table"></i> Seats</div>
        </div>
      </div>
    <div class="main-content" id="main-content">
      Select an option from the sidebar.
    </div>
  </div>
  <script src="admin_dashboard.js"></script>
</body>
</html>
