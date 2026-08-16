<?php
include 'connect.php'; // database connection

// Collect form data
$name = $_POST['passenger_name'];
$pickup  = $_POST['pickup'];
$dropoff = $_POST['dropoff'];
$route   = $_POST['route'];
$date    = $_POST['date'];
$time    = $_POST['time'];
$payment = $_POST['payment'];
$status = $_POST['status'];


// Insert into Tickets table
$sql = "INSERT INTO tickets (passenger_name, pickup, dropoff, route, date, time, payment, status)
        VALUES ('$name', '$pickup', '$dropoff', '$route', '$date', '$time', '$payment', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Ride booked successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
