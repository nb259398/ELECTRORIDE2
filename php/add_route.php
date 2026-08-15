<?php
include 'connect.php'; // DB connection

// Collect form data
$route_id    = $_POST['route_id'];
$route_name  = $_POST['route_name'];
$start_point = $_POST['start_point'];
$end_point   = $_POST['end_point'];
$fare        = $_POST['fare'];
$status      = $_POST['status'];

// Insert into Routes table
$sql = "INSERT INTO Routes (route_id, route_name, start_point, end_point, fare, status)
        VALUES ('$route_id', '$route_name', '$start_point', '$end_point', '$fare', '$status')";

if ($conn->query($sql) === TRUE) {
    // Redirect back to Manage Routes page after success
    header("Location: ../add_routes.html?success=1");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
