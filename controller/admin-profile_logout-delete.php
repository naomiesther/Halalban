<?php
// Log-out 
if (isset($_POST['logout'])) {
    session_destroy();
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

// Delete account
if(isset($_POST['delete_account'])) {
    $user_id = $row['id'];

    $sql_delete_files = "DELETE FROM user_files WHERE user_id = $user_id";
    if ($conn->query($sql_delete_files) !== TRUE) {
        echo "Error deleting user's files: " . $conn->error;
        exit;
    }

    $sql_delete_bio = "DELETE FROM user_bio WHERE user_id = $user_id";
    if ($conn->query($sql_delete_bio) !== TRUE) {
        echo "Error deleting user's bio: " . $conn->error;
        exit;
    }

    $sql_delete_user = "DELETE FROM users WHERE id = $user_id";
    if ($conn->query($sql_delete_user) === TRUE) {
        session_destroy();
        header("Location: ../index.php"); 
        exit;
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
?>
