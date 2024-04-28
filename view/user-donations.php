<?php
include '../model/user-donations-model.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="css/donations.css" />
    <link rel="stylesheet" type="text/css" href="css/global.css"/>


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
                <a class="home" href="home.php">HOME</a>
                <a class="facilities" href="facilities.php">FACILITIES</a>
                <a class="book" href="book.php">BOOK</a>
                <a class="profile active" href="profile.php">PROFILE</a>
                <a class="help" href="help.php">HELP</a>
            </div>
        </header>
      
        <section class="profile5">
            <img class="halalban-home-icon" alt="" src="./public/profile-bg.png" />
            <h1 class="my-profile">My Donations</h1>

            <div class="profile-left">
                <div class="buttons-container">
                    <a href="../view/profile.php" class="profile-link">Back to My Profile</a>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                        <tr>
                            <th>Donation ID</th>
                            <th>Donation Type</th>
                            <th>Giving Option</th>
                            <th>Amount</th>
                            <th>Mode of Payment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if (isset($result_donations) && $result_donations->num_rows > 0) {
                                while($row = $result_donations->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row['donation_id']."</td>";
                                    echo "<td>".$row['donation_type']."</td>";
                                    echo "<td>".$row['giving_option']."</td>";
                                    echo "<td>".$row['amount']."</td>";
                                    echo "<td>".$row['mode_of_payment']."</td>";
                                   
                                }
                            } else {
                                echo "<tr><td colspan='10'>No donations found</td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
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
                <div class="facilities1">FACILITIES</div>
                <div class="book5">BOOK</div>
                <div class="profile6">PROFILE</div>
                <div class="help4">HELP</div>
            </div>
            <div class="halalban-usls-ecopark1">© Halalban USLS Ecopark - All Rights Reserved 2023</div>
        </footer>
</body>
</html>
