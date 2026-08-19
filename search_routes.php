<?php
include 'php/connect.php';

$from = $_POST['from'];
$to   = $_POST['to'];
$date = $_POST['date'];
$passengers = (int)$_POST['passengers'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AVAILABLE ROUTES</title>
  <link rel="icon" href="Favicon.jpg" type="image/jpg" sizes="16x16 32x32">
  <!-- Link to stylesheet -->
  <link rel="stylesheet" href="search_routes.css">
</head>
<body>
       <!-- Header -->
  <header>
    <div class="logo">
      Electro<span class="logo-green">Ride</span>
    </div>
    <nav>
      <ul>
        <li><a href="book_your_ride.html">Book Your Ride Now</a></li>
        <li><a href="home.html">Home</a></li>
         <li><a href="search_routes.php" class="active">AVAILABLE ROUTES</a></li>
      </ul>
    </nav>
  </header>
   
  <main class="add_route-container">
 <h1>AVAILABLE ROUTE</h1>
  <img src="bu2.png" alt="bus photo" width ="1000" height="350">
  
  <?php
  // Query using start_point and end_point
  $sql = "SELECT * FROM routes 
          WHERE start_point='$from' 
          AND end_point='$to' 
          AND status='Active'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $fare = $row['fare'];
          $total = $fare * $passengers;

          echo "<div class='route-card'>";
          echo "<strong>" . $row['route_name'] . "</strong>";
          echo "<p>From: " . $row['start_point'] . " → To: " . $row['end_point'] . "</p>";
          echo "<p class='fare'>Fare per passenger: UGX " . number_format($fare) . "</p>";
          echo "<p>Total for $passengers passenger(s): UGX " . number_format($total) . "</p>";
          echo "</div>";
      }
  } else {
      echo "❌ No routes found for your search.";
  }

  $conn->close();
  ?> 

  </main>
   <!-- FOOTER -->
<footer class="footer">
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="logo logo-white">
        Electro<span class="logo-green">Ride</span>
      </div>
      <p class="footer-tagline">
        Uganda's zero-emission public bus network.
        Powered by 100% renewable solar energy.
      </p><br>

    <div class="footer-col">
   
  <a href="home.html" class="whatsapp-btn">Back</a>
    </div>
  <div class="footer-bottom">
    <p>&#169; 2026 ElectroRide Uganda Ltd. All Rights reserved.</p>
  </div>
</footer> 
</body>
</html>
