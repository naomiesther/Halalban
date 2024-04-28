<?php
session_start();

include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    $sql = "DELETE FROM bookings WHERE booking_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        header("Location: ../view/user-reservations.php"); 
        exit;
    } else {
        echo "Error deleting booking";
    }

    if ($row['status'] != 'Approved') {
        echo "<a href='../view/book.php?booking_id=".$row['booking_id']."&edit=true' class='edit-link'>Edit</a>";
    } else {
        echo "Booking Approved"; 
    }

    $stmt->close();
}

$conn->close();
?>
