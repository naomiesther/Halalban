<?php
session_start();

include '../db_connection.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && isset($_POST['booking_id'])) {
    $action = $_POST['action'];
    $booking_id = $_POST['booking_id'];

    $status = ($action === 'approve') ? 'Approved' : 'Declined';
    $sql = "UPDATE bookings SET status = ? WHERE booking_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $booking_id);

    if ($stmt->execute()) {
        header("Location: ../view/admin_reservation_tracker.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

$sql = "SELECT bookings.*, users.firstName, users.lastName FROM bookings JOIN users ON bookings.user_id = users.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $bookings = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $bookings = [];
}

$conn->close();
?>
