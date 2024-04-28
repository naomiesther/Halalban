<?php
include '../model/admin-profile_model.php';
include '../controller/admin-profile_logout-delete.php';
include '../controller/admin-profile_pfp-bio.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="css/profile.css" />
    <link rel="stylesheet" href="css/global.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Viga:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" />
</head>
<body>
    <div class="profile3">
        <header class="navbar">
            <div class="frameroot">
                <img class="image-3-icon" loading="eager" alt="" src="./public/image-3@2x.png" />
                <div class="halalban">Halalban</div>
            </div>
            <div class="menu">
                <a class="home" href="admin_home.php">HOME</a>
                <a class="profile active" href="admin_profile.php">PROFILE</a>
                <a class="book" href="admin_reservation_tracker.php">BOOKINGS</a>
                <a class="help" href="admin_donation_tracker.php">DONATIONS</a>
            </div>
        </header>
      
        <section class="profile5">
            <img class="halalban-home-icon" alt="" src="./public/profile-bg.png" />
            <h1 class="my-profile">Admin Profile</h1>
            <div class="add-profile-photo-text">
                
            <div class="profile-left">
                <!-- upload pfp -->
                <div class="pfp-parent">
                    <div class="pfp-container">
                        <img class="pfp-icon" loading="eager" alt="" src="../controller/uploads/<?php echo $picture_id; ?>" />
                    </div>
                    <button id="uploadButton" class="upload-button" onclick="toggleUploadContainer()">Upload Profile Picture</button>

                    <div id="uploadContainer" class="upload-container" style="display: none;">
                        <div class="upload-content">
                            <span class="close" onclick="closeUploadContainer()">&times;</span>
                            <form id="uploadForm" method="post" enctype="multipart/form-data">
                                <input type="file" id="profile_photo" name="profile_photo" accept="image/*" onchange="updateFileName()">
                                <span id="file-name" class="file-name"></span>
                                <button type="submit" class="upload-button">Upload</button>
                            </form>
                        </div>
                    </div>
                    <div class="button-container">
                        <form method="post">
                            <button type="submit" class="logout-button" name="logout">Log-out</button>
                        </form>
                        <form method="post">
                            <button type="submit" class="delete-account-button" name="delete_account">Delete Account</button>
                        </form>
                    </div>
                    <br>
                </div>


                    <div class="pfpdeets-parent">
                        <div class="pfpdeets">
                            <div class="buttons-container">
                                <a href="../view/admin_reservation_tracker.php" class="profile-link">Reservations</a>
                                <a href="../view/admin_donation_tracker.php" class="profile-link">Donations</a>
                            </div>
                            
                            <h1 class="display-name"><?php echo $displayName; ?></h1>
                            <h3 class="display-email"><?php echo $displayEmail; ?></h3>
                        </div>
                        
                        <!-- bio -->
                        <div class="bio-frame">
                            <div class="vector-parent">
                                <img class="vector-icon2" loading="eager" alt="" src="./public/vector.svg" />
                                <button id="editBioButton" class="edit-bio-button" onclick="toggleBioContainer()">Edit Bio</button>
                            </div>
                            <h2 class="bio-text">
                                <?php echo $user_bio; ?>
                            </h2>
                        </div>
                        <div id="bioEditContainer" class="bio-edit-container" style="display: none;">
                            <div class="bio-edit-content">
                                <span class="close" onclick="closeBioContainer()">&times;</span>
                                <form id="bioForm" method="post">
                                    <textarea id="bio_desc" name="bio_desc" rows="4" cols="50"><?php echo $user_bio; ?></textarea>
                                    <button type="submit" class="save-bio-button" name="bio_submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer1">
            <div class="layer-0-1-parent">
                <img class="layer-0-11" loading="eager" alt="" src="./public/layer-0-1@2x.png" />
                <b class="halalban4">Halalban</b>
            </div>
            <div class="social-media-links">
                <img class="facebook-icon1" loading="eager" alt="" src="./public/facebook.svg" />
                <img class="instagram-icon1" loading="eager" alt="" src="./public/instagram.svg" />
                <img class="twitter-icon1" loading="eager" alt="" src="./public/twitter.svg" />
                <img class="youtube-icon1" loading="eager" alt="" src="./public/youtube.svg" />
            </div>
            <div class="menu3">
                <div class="home4">HOME</div>
                <div class="profile6">PROFILE</div>
                <div class="book5">BOOKINGS</div>
                <div class="help4">DONATIONS</div>
            </div>
            <div class="halalban-usls-ecopark1">© Halalban USLS Ecopark - All Rights Reserved 2023</div>
        </footer>
    </div>

    <script>
        function toggleUploadContainer() {
        var uploadContainer = document.getElementById('uploadContainer');
            if (uploadContainer.style.display === 'block') {
                uploadContainer.style.display = 'none';
            } else {
                uploadContainer.style.display = 'block';
            }
        }

        function openUploadContainer() {
            document.getElementById('uploadContainer').style.display = 'block';
        }

        function closeUploadContainer() {
            document.getElementById('uploadContainer').style.display = 'none';
        }

        function updateFileName() {
            const input = document.getElementById('profile_photo');
            const fileName = input.files[0].name;
            const fileNameDisplay = document.getElementById('file-name');
            fileNameDisplay.textContent = fileName;
        }

        function toggleBioContainer() {
                    var bioEditContainer = document.getElementById('bioEditContainer');
                    if (bioEditContainer.style.display === 'block') {
                        bioEditContainer.style.display = 'none';
                    } else {
                        bioEditContainer.style.display = 'block';
                    }
                }

        function closeBioContainer() {
            document.getElementById('bioEditContainer').style.display = 'none';
        }
    </script>


</body>
</html>
