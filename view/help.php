<?php
include '../controller/help-control.php';
?>

<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="initial-scale=1, width=device-width">
  	
  	<link rel="stylesheet"  href="css/help.css" />
	  <link rel="stylesheet"  href="css/global.css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Viga:wght@400&display=swap" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" />
</head>
<body>
  	
  	<div class="help">
		<header class="navbar">
			<div class="frameroot">
				<img class="image-3-icon" loading="eager" alt="" src="./public/image-3@2x.png" />
				<div class="halalban">Halalban</div>
			</div>
			<div class="menu">
				<a class="home" href="home.php">HOME</a>
				<a class="facilities" href="facilities.php">FACILITIES</a>
				<a class="book" href="book.php">BOOK</a>
				<a class="profile" href="profile.php">PROFILE</a>
				<a class="help active" href="help.php">HELP</a>
			</div>
		</header>   

		<div class="help-inner">
		<img class="halalban-home-icon" alt="" src="./public/halalban-help.png" />

			<div class="donate-parent">
					<b class="donate">Donate</b>
					<div class="where-to-donate-parent">
						<div class="where-to-donate">
							<div class="invest-in-our-future-parent">
								<b class="invest-in-our">Invest in Our Future</b>
									
								<form action="help.php" method="post" id="donationForm">
									<div class="fm-container">
										<div class="fm-button">
											<input type="checkbox" id="facility-maintenance" name="donation_type[]" value="Facility Maintenance">
											<label for="facility-maintenance">Facility Maintenance</label>
										</div>

										<div class="fm-button">
											<input type="checkbox" id="community-engagement" name="donation_type[]" value="Community Engagement">
											<label for="community-engagement">Community Engagement</label>
										</div>

										<div class="fm-button">
											<input type="checkbox" id="environmental-conservation" name="donation_type[]" value="Environmental Conservation">
											<label for="environmental-conservation">Environmental Conservation</label>
										</div>

										<div class="fm-button">
											<input type="checkbox" id="education-and-research" name="donation_type[]" value="Education and Research">
											<label for="education-and-research">Education and Research</label>
										</div><br><br>
										<div class="giving-options-parent">
											<b class="invest-in-our">Giving Options</b>
											<div class="one-time-button-parent">
												<div class="one-time-button">
													<label class="radio-button"> 
													<input type="radio" id="donation_option_oneTime" name="givingOptions" value="One-Time Donation" class="radio-input">
													<span class="radio-label">One-Time Donation</span>
												</label>
												</div>
												
											
												<div class="monthly-button">
													<label class="radio-button">
														<input type="radio" id="donation_option_monthly" name="givingOptions" value="Monthly Donation" class="radio-input">
														<span class="radio-label">Monthly Donation</span>
													</label>
												</div>
											
											</div>
										</div>
									</div>
							</div>     
						</div>
						
							<div class="payment-details">
								<div class="frame-parent">
									
									
									
									<div class="giving-options-parent">
										<b class="invest-in-our">Amount</b>
										<div class="one-time-button-parent">
									<div class="button">
										<label class="radio-button">
										<label for="amount"></label><br>
										<input type="text" id="amount" name="amount" placeholder="Enter Amount">
									</div>
								</div>
							</div>
									<div class="giving-options-parent">
										<b class="invest-in-our">Mode of Payment</b>

										<div class="one-time-button-parent">
											<div class="gcash-button">
												<label class="radio-button">
													<input type="radio" id="donation_type_gcash" name="modeOfPayment" value="Gcash" class="radio-input">
													<span class="radio-label">Gcash</span>
												</label>
											</div>
											<div class="ccard-button">
												<label class="radio-button">
													<input type="radio" id="donation_type_ccard" name="modeOfPayment" value="CreditCard" class="radio-input">
													<span class="radio-label">Credit Card</span>
												</label>
											</div>
											<div class="ccard-button">
												<label class="radio-button">
													<input type="radio" id="donation_type_paypal" name="modeOfPayment" value="PayPal" class="radio-input">
													<span class="radio-label">PayPal</span>
												</label>
											</div>
											<div class="pay-button">
											<button type="submit" name="submit" class="pay-button-wrapper">Pay Now</button>
										</div>
										</div>
										
									</div>		
								</div>     
							</div>
						</div>

							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
            
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
		<b class="home4">HOME</b>
		<div class="facilities1">FACILITIES</div>
		<div class="book5">BOOK</div>
		<div class="profile6">PROFILE</div>
		<div class="help4">HELP</div>
	</div>
	<div class="halalban-usls-ecopark1">© Halalban USLS Ecopark - All Rights Reserved 2023</div>
</footer>

<script>
	document.addEventListener('DOMContentLoaded', function () {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var amountInput = document.getElementById('amount');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateCheckboxStyle(checkbox);
        });
    });

    function updateCheckboxStyle(checkbox) {
        var label = document.querySelector('label[for="' + checkbox.id + '"]');

        if (checkbox.checked) {
            label.classList.add('checked');
        } else {
            label.classList.remove('checked');
        }
    }

    const form = document.getElementById('donationForm');
    form.addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
            alert("Please fill out all required details.");
        }
    });

    function validateForm() {
        var isChecked = Array.from(checkboxes).some(function (checkbox) {
            return checkbox.checked;
        });

        return isChecked && amountInput.value.trim() !== '';
    }
});


</script>

</body>
</html>