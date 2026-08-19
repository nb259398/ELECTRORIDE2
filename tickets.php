<?php
include 'php/connect.php'; // connect to database

// Fetch all tickets
$sql = "SELECT * FROM Tickets ORDER BY ticket_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tickets</title>
  <link rel="icon" href="Favicon.jpg" type="image/jpg" sizes="16x16 32x32">
  <link rel="stylesheet" href="tickets.css">

  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background: #f2f2f2;
    }
  </style>
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
        <li><a href="passengers.php">Manage Passengers</a></li>
        <li><a href="reports.php">View Reports</a></li>
        <li><a href="tickets.php" class="active">Manage Tickets</a></li>
      </ul>
    </nav>
  </header>
   <main class="tickets-container" >
  <h1>Booked Tickets</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Passenger</th>
      <th>Pickup</th>
      <th>Drop-off</th>
      <th>Route</th>
      <th>Date</th>
      <th>Time</th>
      <th>Payment</th>
      <th>Status</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['ticket_id']."</td>
                    <td>".$row['passenger_name']."</td>
                    <td>".$row['pickup']."</td>
                    <td>".$row['dropoff']."</td>
                    <td>".$row['route']."</td>
                    <td>".$row['date']."</td>
                    <td>".$row['time']."</td>
                    <td>".$row['payment']."</td>
                    <td>".$row['status']."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No tickets booked yet.</td></tr>";
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
