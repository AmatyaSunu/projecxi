<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create a account</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Tasmia" />
    <link rel="stylesheet" href="../styles/style.css">

</head>

<body class="signup-body">
    <div class="container">
        <div class="main-logo">
            <img class="logo" src="../images/logo.png">
        </div>
        <div class="signup-row">
            <div class="signup-column">
                <div class="signup-img">
                    <img src="../images/signup.png">
                </div>
            </div>
            <div class="signup-column">
                <div class="signup-form">
                    <h1 class="signup-heading">Create your account</h1>
                    <form id="signupForm" action="" method="GET">
                        <div>
                            <div>
                                <label>Company Name</label>
                            </div>
                            <div>
                                <input class="custom-input" type="text" id="company-name" name="company-name" placeholder="Required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <div>
                                    <label>First Name</label>
                                </div>
                                <div>
                                    <input class="custom-input-half" type="text" id="first-name" name="first-name" placeholder="Required">
                                </div>
                            </div>
                            <div class="column last-name">
                                <div>
                                    <label>Last Name</label>
                                </div>
                                <div>
                                    <input class="custom-input-half" type="text" id="last-name" name="last-name" placeholder="Required">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <label>Email</label>
                            </div>
                            <div>
                                <input class="custom-input" type="email" id="signup-email" name="signup-email" placeholder="Required">
                            </div>
                        </div>
                        <div>
                            <div>
                                <label>Contact Number</label>
                            </div>
                            <div>
                                <input class="custom-input" type="text" id="contact-number" name="contact-number" inputmode="numeric">
                            </div>
                        </div>
                        <div>
                            <div>
                                <label>Password</label>
                            </div>
                            <div>
                                <input class="custom-input" type="password" id="password" name="password" placeholder="Required">
                            </div>
                        </div>
                        <p class="policy">By clicking Create Account, you agree to the <a class="policy-link" id="terms-of-use" href="#">Terms of Use</a> and <a class="policy-link" id="privacy-policy" href="#">Privacy Policy.</a></p>
                        <div class="create-button">
                            <button class="create-account-button" id="create-account" type="submit">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/signup-script.js" defer></script>
    <script src="../scripts/script.js" defer></script>
</body>

</html>