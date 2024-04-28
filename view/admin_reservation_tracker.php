<?php
Include '../model/admin_reservations_model.php';
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
                <a class="book active" href="admin_reservation_tracker.php">BOOKINGS</a>
                <a class="help" href="admin_donation_tracker.php">DONATIONS</a>
            </div>
        </header>

        <section class="profile5">
            <img class="halalban-home-icon" alt="" src="./public/profile-bg.png" />
            <h1 class="my-profile">Reservations</h1>

            <div class="profile-left">
                <div class="buttons-container">
                    <a href="../view/admin_profile.php" class="profile-link">Back to My Profile</a>
                </div>

                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterTable()">
                </div>

                <div class="table-container">
                    <table id="bookingTable">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Name</th>
                                <th>Facility</th>
                                <th>Check-in Date</th>
                                <th>Check-in Time</th>
                                <th>Checkout Date</th>
                                <th>Checkout Time</th>
                                <th>Event Name</th>
                                <th>Organization Name</th>
                                <th>Number of People</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $booking) : ?>
                                <?php
                                    $status = $booking['status'];
                                    $statusClass = '';
                                    if ($status == 'Approved') {
                                        $statusClass = 'approved';
                                    } elseif ($status == 'Declined') {
                                        $statusClass = 'declined';
                                    } else {
                                        $statusClass = 'pending';
                                    }
                                ?>
                                <tr class="<?php echo $statusClass; ?>">
                                    <td><?php echo $booking['booking_id']; ?></td>
                                    <td><?php echo $booking['firstName'] . ' ' . $booking['lastName']; ?></td>
                                    <td><?php echo $booking['facility']; ?></td>
                                    <td><?php echo $booking['checkin_date']; ?></td>
                                    <td><?php echo $booking['checkin_time']; ?></td>
                                    <td><?php echo $booking['checkout_date']; ?></td>
                                    <td><?php echo $booking['checkout_time']; ?></td>
                                    <td><?php echo $booking['event_name']; ?></td>
                                    <td><?php echo $booking['org_name']; ?></td>
                                    <td><?php echo $booking['num_of_ppl']; ?></td>
                                    <td><?php echo $booking['status']; ?></td>
                                    <td>
                                        <form method="post" action="admin_reservation_tracker.php">
                                            <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>" />
                                            <button type="submit" name="action" value="approve" class="approve-button" onclick="return confirmAction('approve')">Approve</button>
                                            <button type="submit" name="action" value="decline" class="decline-button" onclick="return confirmAction('decline')">Decline</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
            </div>
            <div class="halalban-usls-ecopark1">© Halalban USLS Ecopark - All Rights Reserved 2023</div>
        </footer>
    </div>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("bookingTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }

        function confirmAction(actionType) {
            var confirmationMessage = '';
            if (actionType === 'approve') {
                confirmationMessage = 'Are you sure you want to approve this reservation?';
            } else if (actionType === 'decline') {
                confirmationMessage = 'Are you sure you want to decline this reservation?';
            }
            
            if (confirm(confirmationMessage)) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</body>
</html>
