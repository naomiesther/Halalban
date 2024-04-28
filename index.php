<?php
include 'controller/log-in_control.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="view/css/sign-up.css" />
  <link rel="stylesheet" type="text/css" href="view/css/global.css"/>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Viga:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" />

  <script>
    function displayMessage(message) {
      alert(message);
    }
    <?php if(!empty($error_message)) { ?>
      window.onload = function() {
        displayMessage("<?php echo $error_message; ?>");
      }
    <?php } ?>
  </script>

</head>
<body>
  <div class="sign-up">
    <header class="navbar6">
      <div class="image-3-container">
        <img class="image-3-icon6" loading="eager" alt="" src="view/public/image-3@2x.png" />
        <div class="halalban12">Halalban</div>
      </div>
    </header>
      
    <div class="signup">
      <img class="halalban-signup-icon" alt="" src="view/public/halalbanlogin@2x.png" />
      <section class="welcome-to-halalban">Welcome to Halalban</section>
      
      <form method="post" action="index.php">
          <div class="login-container">
          <div class="right-side">
            <div class="email-frame">
              <div class="email">Email:</div>
              <input class="email-input" name="email" placeholder="" type="text"/>
            </div>
            <div class="password-frame">
              <div class="password">Password:</div>
              <input class="password-input" name="password" placeholder="" type="password"/>
            </div>
          </div>
        </div>
        <div class="signup-buttons">
          <button class="go-button" id="go-button">
            <div class="go-signup">Log in</div>
          </button>
          <a href="view/sign-up.php" class="login-button" id="login-button">
            <div class="go-login">Don't have an account yet? Sign-up</div>
          </a>
        </div>
      </form>

    </div>
  </div>
</body>
</html>
