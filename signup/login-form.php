<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Tasmia Bhuiyan" />
    <script src="../scripts/login-script.js" defer></script>
    <link rel="stylesheet" href="../styles/confirmation-style.css">
</head>

<body class="login-body">
    <div class="container">
        <div class="main-logo">
            <img class="logo" src="../images/logo.png">
        </div>
        <div>
            <h1 class="login-heading">Login to your account</h1>
            <div>
                <div class="login-form">
                    <form id="loginForm" action="../php/login.php" method="post">
                        <div>
                            <label>Email</label>
                        </div>
                        <div>
                            <input class="custom-input" type="email" id="signup-email" name="signup-email" placeholder="Required">
                        </div>
                        <div>
                            <label>Password</label>
                        </div>
                        <div>
                            <input class="custom-input" type="password" id="password" name="password" placeholder="Required">
                        </div>
                    </form>
                </div>

                <div class="login-form-button-align">
                    <div class="login-form-button">
                        <button class="login-continue-button" id="login">Login</button>
                    </div>
                    <div class="login-form-button">
                        <button class="login-cancel-button" id="cancel">Cancel</button>
                    </div>
                </div>
            </div>
</body>

</html>