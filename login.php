<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="author" content="Ramya" />
  <meta name="description" content="Login" />
  <link rel="stylesheet" href="styles/login-style.css">
  <link rel="stylesheet" href="styles/icon-style.css">
  <script src="scripts/script.js" defer></script>
  <!-- For implementing google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <!-- For implementing the various icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <title>ProjecXi</title>
</head>

<body class="login-body">
  <div class="login-container">
    <div class="main-logo">
      <img class="login-main-logo" src="images/logo.png">
    </div>

    <div class="login-form">
      <h2 class="heading"> Login to your account</h2>
      <div>
        <input class="custom-input-login" type="email" id="user-id">
      </div>
      <div>
        <button class="continue" id="continue">Continue</button>
      </div>
      <div>
        <p>Or continue with:</p>
      </div>
      <div class="social">
        <button class="social-button">
          <img src="images/goog.png" class="social-icon-google" alt="Google Icon">
          Google</button>
      </div>
      <div class="social">
        <button class="social-button">
          <img src="images/app.png" class="social-icon-apple" alt="Google Icon">
          Apple</button>
      </div>
      <div class="social">
        <button class="social-button">
          <img src="images/micro.png" class="social-icon-microsoft" alt="Google Icon">
          Microsoft</button>
      </div>

      <div class="option">
        <a id="cant-login"> Can`t login? </a>
        <div class="dot"></div>
        <a id="create-account">Create an account</a>
      </div>

      <hr class="bar">

      <div>
        <div class="main-logo">
          <img class="sub-logo" src="images/sub-logo.png">
        </div>

        <div class="terms">
          <a id="privacy-policy" href="#">Privacy Policy</a>
          <a id="terms-of-use" href="#">Terms of Use</a>
        </div>
      </div>

    </div>
</body>

</html>