<?php
include 'connect.php'; // make sure this connects to your DB

// Collect form data
$name = $_POST['name'];
$licence = $_POST['licence_number'];
$contact = $_POST['contact'];
$vehicle = $_POST['assigned_vehicle'];

// Insert into Drivers table
$sql = "INSERT INTO Drivers (name, licence_number, contact, assigned_vehicle)
        VALUES ('$name', '$licence', '$contact', '$vehicle')";

if ($conn->query($sql) === TRUE) {
    // Redirect back to Manage Drivers page after success
    header("Location: ../add_drivers.html?success=1");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
