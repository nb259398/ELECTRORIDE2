<?php
include 'connect.php'; // database connection

// Collect form data
$name    = $_POST['name'];
$pickup  = $_POST['pickup'];
$dropoff = $_POST['dropoff'];
$route   = $_POST['route'];
$date    = $_POST['date'];
$time    = $_POST['time'];
$payment = $_POST['payment'];

// Insert into Tickets table
$sql = "INSERT INTO Tickets (passenger_name, pickup, dropoff, route, date, time, payment, status)
        VALUES ('$name', '$pickup', '$dropoff', '$route', '$date', '$time', '$payment', 'Pending')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Ride booked successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
