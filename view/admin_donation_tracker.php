<?php
include '../model/admin_donations_model.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="css/reservations.css" />
    <link rel="stylesheet" type="text/css" href="css/global.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Viga:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" />
</head>

<body>
    <div class="admin-booking-tracker">
        <header class="navbar">
            <div class="frameroot">
                <img class="image-3-icon" loading="eager" alt="" src="./public/image-3@2x.png" />
                <div class="halalban">Halalban</div>
            </div>
            <div class="menu">
                <a class="home" href="admin_home.php">HOME</a>
                <a class="profile" href="admin_profile.php">PROFILE</a>
                <a class="book" href="admin_reservation_tracker.php">BOOKINGS</a>
                <a class="help active" href="admin_donation_tracker.php">DONATIONS</a>
            </div>
        </header>

        <section class="profile5">
            <img class="halalban-home-icon" alt="" src="./public/profile-bg.png" />
            <h1 class="my-profile">Donations</h1>

            <div class="profile-left">
                <div class="buttons-container">
                    <a href="../view/admin_profile.php" class="profile-link">Back to My Profile</a>
                </div>

                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterTable()">
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
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No donations found</td></tr>";
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
                <div class="profile6">PROFILE</div>
                <div class="book5">BOOKINGS</div>
                <div class="help4">DONATIONS</div>
            </div>
            <div class="halalban-usls-ecopark1">© Halalban USLS Ecopark - All Rights Reserved 2023</div>
        </footer>
    </div>

    <script>
    function filterTable() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table-container table");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            let found = false;
            for (j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    </script>


</body>
</html>
