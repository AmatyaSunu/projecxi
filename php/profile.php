<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="UTF-8" />
    <meta name="author" content="All" />
    <link rel="stylesheet" href="../styles/profile.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <?php
    //uncomment for debugging
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Start the session to access session variables
    session_start();

    echo "<script>console.log('" . $_SESSION['user_email'] . ");</script>";

    // Database connection
    include('../inc/dbconn.inc.php');
    // // Check if the user is logged in
    // if (!isset($_SESSION['user_email'])) {
    //     // Redirect the user to the login page if not logged in
    //     header("Location: ../signup/login-form.php");
    //     exit(); // Make sure to exit after redirection
    // }

    // Fetch the user's current profile information from the database
    $userEmail = $_SESSION['user_email']; // Fetch the email from sessions
    $selectQuery = "SELECT * FROM users WHERE email='$userEmail'";
    $result = mysqli_query($conn, $selectQuery);

    if (!$result) {
        die("Error executing the query: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($conn);

    // Populate user information
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $fullName = $row['fullName'];
    $email = $row['email'];
    $contactNumber = $row['contactNumber'];
    $companyName = $row['companyName'];

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the updated profile information from the form
        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $fullName = $_POST['full-name'];
        $email = $_SESSION['user_email']; // The email should not be changeable
        $contactNumber = $_POST['contact-number'];
        $project = $_POST['project'];

        // Update the user's profile information in the database
        $updateQuery = "UPDATE users SET firstName='$firstName', lastName='$lastName', contactNumber='$contactNumber', companyName='$project' WHERE email='$email'";

        // Execute the update query
        $result = mysqli_query($connection, $updateQuery);

        if (!$result) {
            die("Error updating profile: " . mysqli_error($connection));
        }

        echo "<p>Profile updated successfully!</p>";
    }
    ?>

    <div class="sidenav">
        <div class="sidenav-logo">
            <img src="../images/project-logo.png" />
            <span class="project-label">Armour<br />Technology</span>
        </div>

        <div class="menu">
            <div>
                <a class="menu-content">Dashboard</a>
            </div>
            <div>
                <a class="menu-content">Project</a>
            </div>
            <hr class="sidenav-line" />
            <div>
                <a class="menu-content">Profile</a>
            </div>
            <div>
                <a class="menu-content">Setting</a>
            </div>
            <div>
                <a class="menu-content">About</a>
            </div>
            <hr class="sidenav-line" />
            <div>
                <a class="menu-content">Contact us</a>
            </div>
            <div>
                <a class="menu-content">Help</a>
            </div>
        </div>
        <div class="logo">
            <img src="../images/logo.png" />
        </div>
    </div>
    <div class="main">
        <div class="topnav">
            <div class="back-container">
                <i class="fas fa-chevron-left"></i>
                <span> My Profile </span>
            </div>
            <div class="user-container">
                <img src="../images/jessica.jpeg" alt="Avatar" class="user-avatar" />
                <span class="user-name">
                    <?php
                    echo $fullName;
                    ?>
                </span>
            </div>
        </div>
        <div class="main-content">
            <div class="profile-pic">
                <img src="../images/jessica.jpeg" alt="Avatar" class="avatar-dispaly" />
                <input type="file" id="profilePictureInput" accept="image/*" style="display: none;">
                <label for="profilePictureInput" class="edit-profile-picture-button">
                    <img src="../images/edit-removebg-preview.png" alt="Edit Profile Picture">
                </label>

            </div>
            <div class="edit-content">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div>
                        <div>
                            <label>First Name</label>
                        </div>
                        <div>
                            <input class="custom-input" type="text" id="first-name" name="name" value="<?php echo $firstName; ?>" required>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Last Name</label>
                        </div>
                        <div>
                            <input class="custom-input" type="text" id="last-name" name="name" value="<?php echo $lastName; ?>" required>
                        </div>

                    </div>
                    <div>
                        <div>
                            <label>Email</label>
                        </div>
                        <div>
                            <input class="custom-input" type="email" id="signup-email" name="signup-email" value="<?php echo $email; ?>" required readonly>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Contact Number</label>
                        </div>
                        <div>
                            <input class="custom-input" type="tel" id="contact-number" value="<?php echo $contactNumber; ?>" required>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Company</label>
                        </div>
                        <div>
                            <input class="custom-input" type="text" id="company-name" name="company-name" value="<?php echo $companyName; ?>" required>
                        </div>
                    </div>
                    <div class="button">
                        <div class="save-button">
                            <button class="save-changes-button" id="save-changes">Save</button>
                        </div>
                        <div class="cancle-button">
                            <button class="cancle-changes-button" id="cancle-changes">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>