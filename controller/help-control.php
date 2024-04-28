<?php
error_reporting(E_ALL);
ini_set('display_errors',  1);
session_start();

include '../db_connection.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_SESSION['email'];
    $sql_user_id = "SELECT id FROM users WHERE email = ?";

    $stmt_user_id = $conn->prepare($sql_user_id);
    $stmt_user_id->bind_param("s", $email);
    $stmt_user_id->execute();
    $result = $stmt_user_id->get_result();

    if ($result->num_rows >  0) {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        $donation_type = isset($_POST['donation_type']) ? $_POST['donation_type'] : "";
        $giving_option = isset($_POST['givingOptions']) ? $_POST['givingOptions'] : "";
        $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
        $mode_of_payment = isset($_POST['modeOfPayment']) ? $_POST['modeOfPayment'] : "";
        $donation_type_str = implode(", ", $donation_type);

        $stmt_donations = $conn->prepare("INSERT INTO donations (user_id, donation_type, giving_option, amount, mode_of_payment) VALUES (?, ?, ?, ?, ?)");
        $stmt_donations->bind_param("issss", $user_id, $donation_type_str, $giving_option, $amount, $mode_of_payment);

       if ($stmt_donations->execute()) {
            echo "<script>
                      if (confirm('Do you want to confirm your payment?')) {
                          alert('Payment successful');
                          window.location.href = '../view/user-donations.php';
                      }
                  </script>";
            exit;
        } else {
            echo "Error: " . $stmt_donations->error;
        }

        $stmt_donations->close();
    } else {
        echo "User not found";
    }

    $stmt_user_id->close();
    $conn->close();
}
?>
