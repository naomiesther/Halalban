<?php
session_start();

include '../controller/book-control.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="css/book.css" />
    <link rel="stylesheet" type="text/css" href="css/global.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Viga:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" />
</head>

  <body>
    <div class="book1">
      <header class="navbar">
        <div class="frameroot">
          <img class="image-3-icon" loading="eager" alt="" src="./public/image-3@2x.png" />
          <div class="halalban">Halalban</div>
        </div>
        <div class="menu">
          <a class="home" href="home.php">HOME</a>
          <a class="facilities" href="facilities.php">FACILITIES</a>
          <a class="book active" href="book.php">BOOK</a>
          <a class="profile" href="profile.php">PROFILE</a>
          <a class="help" href="help.php">HELP</a>
        </div>
      </header>

        <section class="booking">
        <img class="halalban-home-icon" alt="" src="./public/halalban-book.png" />
        <h1 class="book-a-reservation">
            <?php echo $editMode ? 'Update a Reservation' : 'Book a Reservation'; ?>
        </h1>

            <form class="booking-form" method="post" action="<?php echo $editMode ? 'book.php?edit=true&booking_id=' . $booking_id : 'book.php'; ?>">
            
                <div class="container-items">
                <div class="reserve-top">
                    <div class="input-container">
                        <label for="facility">Facility</label>
                        <select id="facility" name="facility">
                            <option value="USLS Ecopark" <?php if ($facility == 'USLS Ecopark') echo 'selected'; ?>>USLS Ecopark</option>
                            <option value="Br. Rolando R. Dizon Ecopark Center" <?php if ($facility == 'Br. Rolando R. Dizon Ecopark Center') echo 'selected'; ?>>Br. Rolando R. Dizon Ecopark Center</option>
                            <option value="Swimming Pools" <?php if ($facility == 'Swimming Pools') echo 'selected'; ?>>Swimming Pools</option>
                            <option value="Multi Purpose Hall" <?php if ($facility == 'Multi Purpose Hall') echo 'selected'; ?>>Multi-Purpose Hall</option>
                            <option value="Fr. Gratian's Garden (Orchid Farm)" <?php if ($facility == "Fr. Gratian's Garden (Orchid Farm)") echo 'selected'; ?>>Fr. Gratian's Garden (Orchid Farm)</option>
                            <option value="Kiddie Park" <?php if ($facility == 'Kiddie Park') echo 'selected'; ?>>Kiddie Park</option>
                            <option value="Wildlife Rescue Center" <?php if ($facility == 'Wildlife Rescue Center') echo 'selected'; ?>>Wildlife Rescue Center</option>
                            <option value="Butterfly Park" <?php if ($facility == 'Butterfly Park') echo 'selected'; ?>>Butterfly Park</option>
                            <option value="Aviary" <?php if ($facility == 'Aviary') echo 'selected'; ?>>Aviary</option>
                            <option value="Jose & Claudio Alunan Vanugirard Gardens" <?php if ($facility == 'Jose & Claudio Alunan Vanugirard Gardens') echo 'selected'; ?>>Jose & Claudio Alunan Vanugirard Gardens</option>
                            <option value="Fishing Lagoon with Waterfall" <?php if ($facility == 'Fishing Lagoon with Waterfall') echo 'selected'; ?>>Fishing Lagoon with Waterfall</option>
                            <option value="Cafe Verde" <?php if ($facility == 'Cafe Verde') echo 'selected'; ?>>Cafe Verde</option>
                            <option value="Clay Chapel" <?php if ($facility == 'Clay Chapel') echo 'selected'; ?>>Clay Chapel</option>
                        </select>
                    </div>
                    <div class="input-container date-time">
                        <div class="date-time-row">
                            <div class="input-container">
                                <label for="check-in-date">Check-in Date</label>
                                <input type="date" id="check-in-date" name="check-in-date" value="<?php echo $checkin_date; ?>" min="<?php echo date('Y-m-d'); ?>" />
                            </div>
                            <div class="input-container">
                                <label for="check-out-date">Check-out Date</label>
                                <input type="date" id="check-out-date" name="check-out-date" value="<?php echo $checkout_date; ?>" min="<?php echo date('Y-m-d'); ?>" />
                            </div>
                        </div>
                        <div class="date-time-row">
                            <div class="input-container">
                                <label for="check-in-time">Check-in Time</label>
                                <select id="check-in-time" name="check-in-time">
                                    <option value="07:00 AM" <?php if ($checkin_time == '07:00 AM') echo 'selected'; ?>>7:00 AM</option>
                                    <option value="08:00 AM" <?php if ($checkin_time == '08:00 AM') echo 'selected'; ?>>8:00 AM</option>
                                    <option value="09:00 AM" <?php if ($checkin_time == '09:00 AM') echo 'selected'; ?>>9:00 AM</option>
                                    <option value="10:00 AM" <?php if ($checkin_time == '10:00 AM') echo 'selected'; ?>>10:00 AM</option>
                                    <option value="11:00 AM" <?php if ($checkin_time == '11:00 AM') echo 'selected'; ?>>11:00 AM</option>
                                    <option value="12:00 PM" <?php if ($checkin_time == '12:00 PM') echo 'selected'; ?>>12:00 PM</option>
                                    <option value="01:00 PM" <?php if ($checkin_time == '01:00 PM') echo 'selected'; ?>>1:00 PM</option>
                                    <option value="02:00 PM" <?php if ($checkin_time == '02:00 PM') echo 'selected'; ?>>2:00 PM</option>
                                    <option value="03:00 PM" <?php if ($checkin_time == '03:00 PM') echo 'selected'; ?>>3:00 PM</option>
                                    <option value="04:00 PM" <?php if ($checkin_time == '04:00 PM') echo 'selected'; ?>>4:00 PM</option>
                                    <option value="05:00 PM" <?php if ($checkin_time == '05:00 PM') echo 'selected'; ?>>5:00 PM</option>
                                    <option value="06:00 PM" <?php if ($checkin_time == '06:00 PM') echo 'selected'; ?>>6:00 PM</option>
                                    <option value="07:00 PM" <?php if ($checkin_time == '07:00 PM') echo 'selected'; ?>>7:00 PM</option>
                                    <option value="08:00 PM" <?php if ($checkin_time == '08:00 PM') echo 'selected'; ?>>8:00 PM</option>
                                </select>
                            </div>
                            <div class="input-container">
                                <label for="check-out-time">Check-out Time</label>
                                <select id="check-out-time" name="check-out-time">
                                    <option value="08:00 AM" <?php if ($checkout_time == '08:00 AM') echo 'selected'; ?>>8:00 AM</option>
                                    <option value="09:00 AM" <?php if ($checkout_time == '09:00 AM') echo 'selected'; ?>>9:00 AM</option>
                                    <option value="10:00 AM" <?php if ($checkout_time == '10:00 AM') echo 'selected'; ?>>10:00 AM</option>
                                    <option value="11:00 AM" <?php if ($checkout_time == '11:00 AM') echo 'selected'; ?>>11:00 AM</option>
                                    <option value="12:00 PM" <?php if ($checkout_time == '12:00 PM') echo 'selected'; ?>>12:00 PM</option>
                                    <option value="01:00 PM" <?php if ($checkout_time == '01:00 PM') echo 'selected'; ?>>1:00 PM</option>
                                    <option value="02:00 PM" <?php if ($checkout_time == '02:00 PM') echo 'selected'; ?>>2:00 PM</option>
                                    <option value="03:00 PM" <?php if ($checkout_time == '03:00 PM') echo 'selected'; ?>>3:00 PM</option>
                                    <option value="04:00 PM" <?php if ($checkout_time == '04:00 PM') echo 'selected'; ?>>4:00 PM</option>
                                    <option value="05:00 PM" <?php if ($checkout_time == '05:00 PM') echo 'selected'; ?>>5:00 PM</option>
                                    <option value="06:00 PM" <?php if ($checkout_time == '06:00 PM') echo 'selected'; ?>>6:00 PM</option>
                                    <option value="07:00 PM" <?php if ($checkout_time == '07:00 PM') echo 'selected'; ?>>7:00 PM</option>
                                    <option value="08:00 PM" <?php if ($checkout_time == '08:00 PM') echo 'selected'; ?>>8:00 PM</option>
                                    <option value="09:00 PM" <?php if ($checkout_time == '09:00 PM') echo 'selected'; ?>>9:00 PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="reserve-bottom">
                        <div class="input-container">
                            <label for="event-name">Event Name</label>
                            <input type="text" id="event-name" name="event-name" value="<?php echo $event_name; ?>" />
                        </div>
                    
                        <div class="input-container">
                            <label for="organization-group">Organization/Group</label>
                            <input type="text" id="organization-group" name="organization-group" value="<?php echo $org_name; ?>" />
                        </div>

                        <div class="input-container">
                            <label for="number-of-people">Number of People</label>
                            <input type="number" id="number-of-people" name="number-of-people" value="<?php echo $num_of_ppl; ?>" />
                        </div>
                    </div>
                </div>
            
                <div class="submit-button">
                    <button type="submit"><?php echo $editMode ? 'Update Reservation' : 'Submit Reservation'; ?></button>                
                </div>
            </form>
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
                <b class="book5">BOOK</b>
                <div class="profile6">PROFILE</div>
                <div class="help4">HELP</div>
            </div>
            <div class="halalban-usls-ecopark1">© Halalban USLS Ecopark - All Rights Reserved 2023</div>
        </footer>

    <script>    
        window.onload = function() {
            const form = document.querySelector('.booking-form');
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        const facility = document.getElementById('facility').value;
                        const checkInDate = document.getElementById('check-in-date').value;
                        const checkOutDate = document.getElementById('check-out-date').value;
                        const checkInTime = document.getElementById('check-in-time').value;
                        const checkOutTime = document.getElementById('check-out-time').value;
                        const eventName = document.getElementById('event-name').value;
                        const orgName = document.getElementById('organization-group').value;
                        const numOfPeople = document.getElementById('number-of-people').value;

                        if (!facility || !checkInDate || !checkOutDate || !checkInTime || !checkOutTime || !eventName || !orgName || !numOfPeople) {
                            alert("Please fill out all required details.");
                        } else {
                            form.submit();  
                        }
                    });
                };
    </script>

  </body>
</html>
