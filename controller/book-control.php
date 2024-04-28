<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db_connection.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

$facility = '';
$checkin_date = '';
$checkin_time = '';
$checkout_date = '';
$checkout_time = '';
$event_name = '';   
$org_name = '';
$num_of_ppl = '';

if (isset($_GET['edit']) && isset($_GET['booking_id'])) {
    $editMode = true;
    $booking_id = $_GET['booking_id'];

    $sql = "SELECT * FROM bookings WHERE booking_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $facility = $row['facility'];
        $checkin_date = $row['checkin_date'];
        $checkin_time = $row['checkin_time'];
        $checkout_date = $row['checkout_date'];
        $checkout_time = $row['checkout_time'];
        $event_name = $row['event_name'];
        $org_name = $row['org_name'];
        $num_of_ppl = $row['num_of_ppl'];
    } else {
        header("Location: ../user-reserations/user-reservations.php");
        exit;
    }
} else {
    $editMode = false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if in edit mode
    if (isset($_GET['edit']) && isset($_GET['booking_id'])) {
        // form submission for updating existing booking
        $facility = $_POST['facility'];
        $checkin_date = $_POST['check-in-date'];
        $checkin_time = date('H:i:s', strtotime($_POST['check-in-time'])); 
        $checkout_date = $_POST['check-out-date'];
        $checkout_time = date('H:i:s', strtotime($_POST['check-out-time'])); 
        $event_name = $_POST['event-name'];
        $org_name = $_POST['organization-group'];
        $num_of_ppl = $_POST['number-of-people'];

        // update existing booking record
        $sql = "UPDATE bookings SET facility = ?, checkin_date = ?, checkin_time = ?, checkout_date = ?, checkout_time = ?, event_name = ?, org_name = ?, num_of_ppl = ? WHERE booking_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $facility, $checkin_date, $checkin_time, $checkout_date, $checkout_time, $event_name, $org_name, $num_of_ppl, $booking_id);

        if ($stmt->execute()) {
            echo "<script>
                      alert('Reservation has been set, now waiting for approval.');
                      window.location.href = '../view/user-reservations.php';
                  </script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
            exit; 
        }
        
    } else {
        // adding new booking
        $email = $_SESSION['email'];
        $sql_user_id = "SELECT id FROM users WHERE email = '$email'";
        $result = $conn->query($sql_user_id);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row['id'];

            $facility = $_POST['facility'];
            $checkin_date = $_POST['check-in-date'];
            $checkin_time = date('H:i:s', strtotime($_POST['check-in-time'])); 
            $checkout_date = $_POST['check-out-date'];
            $checkout_time = date('H:i:s', strtotime($_POST['check-out-time'])); 
            $event_name = $_POST['event-name'];
            $org_name = $_POST['organization-group'];
            $num_of_ppl = $_POST['number-of-people'];

            // if the selected time slot is available
            $sql_check_overlap = "SELECT * FROM bookings WHERE facility = ? AND checkin_date = ? AND ((checkin_time >= ? AND checkin_time < ?) OR (checkout_time > ? AND checkout_time <= ?))";
            $stmt_check_overlap = $conn->prepare($sql_check_overlap);
            $stmt_check_overlap->bind_param("ssssss", $facility, $checkin_date, $checkin_time, $checkout_time, $checkin_time, $checkout_time);
            $stmt_check_overlap->execute();
            $result_check_overlap = $stmt_check_overlap->get_result();

            if ($result_check_overlap->num_rows > 0) {
                echo "<script>alert('Sorry, you have already booked a reservation within that schedule. Please select a different timeframe.');</script>";
            } else {
                $sql = "INSERT INTO bookings (user_id, facility, checkin_date, checkin_time, checkout_date, checkout_time, event_name, org_name, num_of_ppl) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isssssssi", $user_id, $facility, $checkin_date, $checkin_time, $checkout_date, $checkout_time, $event_name, $org_name, $num_of_ppl);

            if ($stmt->execute()) {
                echo "<script>
                          alert('Reservation has been set, now waiting for approval.');
                          window.location.href = '../view/user-reservations.php';
                      </script>";
                exit;
            } else {
                echo "Error: " . $stmt->error;
                exit;
            }
            
        }
    }

    $conn->close();
}
}
?>