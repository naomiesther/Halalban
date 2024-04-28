<?php
session_start();

include '../db_connection.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

$sql = "SELECT * FROM donations";
$result_donations = $conn->query($sql);

$conn->close();
?>
