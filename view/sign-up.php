<?php
Include '../controller/sign-up_control.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="css/sign-up.css" />
  <link rel="stylesheet" type="text/css" href="css/global.css"/>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Viga:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" />

  <script>
    function validateForm() {
      const firstName = document.querySelector('.firstname-input').value;
      const lastName = document.querySelector('.lastname-input').value;
      const email = document.querySelector('.email-input').value;
      const password = document.querySelector('.password-input').value;
      const confirmPassword = document.querySelector('.confirm-password-input').value;

      if (!firstName || !lastName || !email || !password || !confirmPassword) {
        alert("Please fill out all required details.");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }

      return true;
    }
  </script>

</head>
<body>
  <div class="sign-up">
    <header class="navbar6">
      <div class="image-3-container">
        <img class="image-3-icon6" loading="eager" alt="" src="./public/image-3@2x.png" />
        <div class="halalban12">Halalban</div>
      </div>
    </header>
      
    <div class="signup">
      <img class="halalban-signup-icon" alt="" src="./public/halalbanlogin@2x.png" />
      <section class="welcome-to-halalban">Welcome to Halalban</section>
      <form method="post" action="sign-up.php" onsubmit="return validateForm()">
          <div class="signup-container">
              <div class="left-side">
                  <div class="firstname-frame">
                      <div class="first-name">First Name:</div>
                      <input class="firstname-input" name="firstName" placeholder="" type="text"/>
                  </div>
                  <div class="lastname-frame">
                      <div class="last-name">Last Name:</div>
                      <input class="lastname-input" name="lastName" placeholder="" type="text"/>
                  </div>
                  <div class="role-frame">
                      <div class="role">Role:</div>
                      <select class="role-input" name="role">
                          <option value="Admin">Admin</option>
                          <option value="User" selected>User</option>
                      </select>
                  </div>
              </div>
              <div class="right-side">
                  <div class="email-frame">
                      <div class="email">Email:</div>
                      <input class="email-input" name="email" placeholder="" type="email"/>
                  </div>
                  <div class="password-frame">
                      <div class="password">Password:</div>
                      <input class="password-input" name="password" placeholder="" type="password"/>
                  </div>
                  <div class="confirm-password-frame">
                      <div class="confirm-password">Confirm Password:</div>
                      <input class="confirm-password-input" name="confirmPassword" placeholder="" type="password"/>
                  </div>
              </div>
          </div>
          <div class="signup-buttons">
              <button class="go-button" id="go-button">
                  <div class="go-signup">Sign-up</div>
              </button>
              <a href="../index.php" class="login-button" id="login-button">
                  <div class="go-login">Already have an account? Log in</div>
              </a>
          </div>
      </form>
    </div>
  </div>

</body>
</html>
