<?php
// Include your database connection file
include("database.php");

// Retrieve payment information from Razorpay handler
$payment_id = $_POST['payment_id'];
$order_id = $_POST['order_id'];
$signature = $_POST['signature'];
$status = $_POST['status']; // This will be 'success' for successful payments

// Update payment status in the database
$sql = "UPDATE car_package SET payment_status = '$status' WHERE booking_no = '$order_id'";
if (mysqli_query($db, $sql)) {
    // Return success response to the Razorpay handler
    echo "Payment status updated successfully";
} else {
    // Return error response to the Razorpay handler
    echo "Error updating payment status: " . mysqli_error($db);
}
?>