<?php
include 'connect.php';

// Fetch passengers from Tickets table
$sql = "SELECT ticket_id, passenger_name, route, date, time, status FROM Tickets ORDER BY ticket_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Passengers - ElectroRide</title>
  <link rel="stylesheet" href="../passengers.css"> <!-- adjust path if needed -->
</head>
<body>
  <!-- Header -->
  <header>
    <div class="logo">
      Electro<span class="logo-green">Ride</span>
    </div>
    <nav>
      <ul>
        <li><a href="admin.html">Admin</a></li>
        <li><a href="add_routes.html">Manage Routes</a></li>
        <li><a href="php/tickets.php">Manage Tickets</a></li>
        <li><a href="php/reports.php">View Reports</a></li>
        <li><a href="php/passengers.php" class="active">Passengers</a></li>
      </ul>
    </nav>
  </header>
  <main class="passengers-container">
  <h1>PASSENGER LIST</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Passenger</th>
      <th>Route</th>
      <th>Date</th>
      <th>Time</th>
      <th>Status</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['ticket_id']."</td>
                    <td>".$row['passenger_name']."</td>
                    <td>".$row['route']."</td>
                    <td>".$row['date']."</td>
                    <td>".$row['time']."</td>
                    <td>".$row['status']."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No passengers yet.</td></tr>";
    }
    ?>
  </table>
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
   
  <a href="admin.html" class="whatsapp-btn">Back</a>
    </div>
  <div class="footer-bottom">
    <p>&#169; 2026 ElectroRide Uganda Ltd. All Rights reserved.</p>
  </div>
</footer>
</body>
</html>

<?php $conn->close(); ?>
