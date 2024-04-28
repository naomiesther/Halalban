<?php
session_start();

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;

            echo "User Role: " . $row['role'];

            if ($row['role'] === 'Admin') {
                header("Location: view/admin_home.php");
                
            } else {
                header("Location: view/home.php");
                exit;
            }
        } else {
            $error_message = "Incorrect password";
        }
    } else {
        $error_message = "User not found";
    }
}
?>