<?php
// upload pfp
if(isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
    // Include database connection file here
    include '../db_connection.php';

    $file_name = $_FILES['profile_photo']['name'];
    $file_tmp = $_FILES['profile_photo']['tmp_name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

    if(in_array(strtolower($file_ext), $allowed_ext)) {
        $upload_path = dirname(__FILE__) . "/uploads/"; 
        $new_file_name = $row['id'] . '_' . time() . '.' . $file_ext;
        $destination = $upload_path . $new_file_name;
        
        if(move_uploaded_file($file_tmp, $destination)) {
            $user_id = $row['id'];
            $sql_update = "INSERT INTO user_files (user_id, filename) VALUES ('$user_id', '$new_file_name') ON DUPLICATE KEY UPDATE filename = VALUES(filename)";
            $conn->query($sql_update);

            $_SESSION['profile_photo'] = $new_file_name;
        } else {
            echo "Failed to upload the file.";
        }
    } else {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}

$picture = $conn->prepare("SELECT filename FROM user_files WHERE user_id = ? ORDER BY file_id DESC LIMIT 1");
$picture->bind_param("i", $row['id']);
$picture->execute();
$picture_result = $picture->get_result();

if($picture_result->num_rows > 0){
    $picture_row = $picture_result->fetch_assoc();
    $picture_id = $picture_row['filename'];
} else {
    $picture_id = "default_profile_photo.jpg"; 
}

// Update bio
if(isset($_POST['bio_submit'])) {
    $user_id = $row['id'];
    $bio_desc = nl2br($_POST['bio_desc']);
    $sql_update_bio = "INSERT INTO user_bio (user_id, bio_desc) VALUES (?, ?) ON DUPLICATE KEY UPDATE bio_desc = VALUES(bio_desc)";
    $stmt = $conn->prepare($sql_update_bio);
    $stmt->bind_param("is", $user_id, $bio_desc);
    $stmt->execute();
}

$bio_query = $conn->prepare("SELECT bio_desc FROM user_bio WHERE user_id = ? ORDER BY bio_id DESC LIMIT 1");
$bio_query->bind_param("i", $row['id']);
$bio_query->execute();
$bio_result = $bio_query->get_result();
$bio_row = $bio_result->fetch_assoc();
$user_bio = isset($bio_row['bio_desc']) ? $bio_row['bio_desc'] : '';
?>
