<?php
session_start();

include '../db_connection.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

$email = $_SESSION['email'];
$sql_user_id = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($sql_user_id);
$stmt->bind_param("s", $email);
$stmt->execute();
$result_user_id = $stmt->get_result();

if ($result_user_id && $result_user_id->num_rows > 0) {
    $row = $result_user_id->fetch_assoc();
    $user_id = $row['id'];

    $sql = "SELECT * FROM bookings WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result_bookings = $stmt->get_result();
} else {
    echo "<tr><td colspan='10'>User not found</td></tr>";
}

$stmt->close();
$conn->close();
?>
