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
  <!-- Link to stylesheet -->
  <link rel="stylesheet" href="search_routes.css">
</head>
<body>
  <h3>AVAILABLE ROUTES</h3>
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
</body>
</html>
