<?php
session_start();

include '../db_connection.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $displayName = $row['firstName'] . ' ' . $row['lastName'];
    $displayEmail = $row['email'];
} else {
    echo "Error: User not found";
    exit;
}
?>
