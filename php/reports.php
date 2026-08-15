<?php
include 'connect.php'; // DB connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>System Reports - ElectroRide</title>
  <link rel="stylesheet" href="../reports.css">
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
        <li><a href="add_drivers.html">Manage Drivers</a></li>
        <li><a href="add_vehicle.html">Manage Vehicles</a></li>
        <li><a href="php/reports.php" class="active">View Reports</a></li>
      </ul>
    </nav>
  </header>
  <main class="reports-container">
  <h1>System Reports</h1>

  <!-- Tickets Report -->
  <section class="report-block">
    <h2>Tickets</h2>
    <table>
      <tr>
        <th>ID</th><th>Passenger</th><th>Pickup</th><th>Drop-off</th>
        <th>Route</th><th>Date</th><th>Time</th><th>Payment</th><th>Status</th>
      </tr>
      <?php
      $result = $conn->query("SELECT * FROM Tickets");
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['ticket_id']}</td>
                  <td>{$row['passenger_name']}</td>
                  <td>{$row['pickup']}</td>
                  <td>{$row['dropoff']}</td>
                  <td>{$row['route']}</td>
                  <td>{$row['date']}</td>
                  <td>{$row['time']}</td>
                  <td>{$row['payment']}</td>
                  <td>{$row['status']}</td>
                </tr>";
        }
      }
      ?>
    </table>
  </section>

  <!-- Passengers Report -->
  <section class="report-block">
    <h2>Passengers</h2>
    <table>
      <tr><th>ID</th><th>Name</th><th>Route</th><th>Date</th><th>Status</th></tr>
      <?php
      $result = $conn->query("SELECT ticket_id, passenger_name, route, date, status FROM Tickets");
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['ticket_id']}</td>
                  <td>{$row['passenger_name']}</td>
                  <td>{$row['route']}</td>
                  <td>{$row['date']}</td>
                  <td>{$row['status']}</td>
                </tr>";
        }
      }
      ?>
    </table>
  </section>

  <!-- Drivers Report -->
  <section class="report-block">
    <h2>Drivers</h2>
    <table>
      <tr><th>ID</th><th>Name</th><th>Licence</th><th>Contact</th><th>Vehicle</th></tr>
      <?php
      $result = $conn->query("SELECT * FROM Drivers");
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['driver_id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['licence_number']}</td>
                  <td>{$row['contact']}</td>
                  <td>{$row['assigned_vehicle']}</td>
                </tr>";
        }
      }
      ?>
    </table>
  </section>

  <!-- Routes Report -->
  <section class="report-block">
    <h2>Routes</h2>
    <table>
      <tr><th>ID</th><th>Name</th><th>Start</th><th>End</th><th>Fare</th><th>Status</th></tr>
      <?php
      $result = $conn->query("SELECT * FROM Routes");
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['route_id']}</td>
                  <td>{$row['route_name']}</td>
                  <td>{$row['start_point']}</td>
                  <td>{$row['end_point']}</td>
                  <td>{$row['fare']}</td>
                  <td>{$row['status']}</td>
                </tr>";
        }
      }
      ?>
    </table>
  </section>

  <!-- Vehicles Report -->
  <section class="report-block">
    <h2>Vehicles</h2>
    <table>
      <tr><th>ID</th><th>Plate</th><th>Type</th><th>Capacity</th><th>Status</th></tr>
      <?php
      $result = $conn->query("SELECT * FROM Vehicles");
      if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['vehicle_id']}</td>
                  <td>{$row['plate_number']}</td>
                  <td>{$row['type']}</td>
                  <td>{$row['capacity']}</td>
                  <td>{$row['status']}</td>
                </tr>";
        }
      }
      $conn->close();
      ?>
    </table>
  </section>
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
      </p>
  <div class="footer-bottom">
    <p>&#169; 2026 ElectroRide Uganda Ltd. All Rights reserved.</p>
  
  </div>

</footer>
</body>
</html>
