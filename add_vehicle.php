<?php
include 'connect.php'; // DB connection

// Collect form data
$plate_number = $_POST['plate_number'];
$type         = $_POST['type'];
$capacity     = $_POST['capacity'];
$status       = $_POST['status'];

// Insert into Vehicles table
$sql = "INSERT INTO Vehicles (plate_number, type, capacity, status)
        VALUES ('$plate_number', '$type', '$capacity', '$status')";

if ($conn->query($sql) === TRUE) {
    // Redirect back to Manage Vehicles page after success
    header("Location: ../add_vehicle.html?success=1");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
