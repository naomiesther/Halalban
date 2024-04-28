<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists');</script>";
    } else {
        $sql = "INSERT INTO users (firstName, lastName, email, password, role) VALUES ('$firstname', '$lastname', '$email', '$password', '$role')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            header("Location: ../index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>