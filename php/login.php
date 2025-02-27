<?php
//uncomment for debugging
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

include('../inc/dbconn.inc.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user input from login form
    $email = $_POST['signup-email'];
    $password = $_POST['password'];

    // fetch user information based on email
    $query = "SELECT email, password, fullname FROM users WHERE email = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Check if a user with the provided email exists
    if ($row = mysqli_fetch_assoc($result)) {
        $storedPassword = $row['password'];
        $fullname = $row['fullname'];

        // Verify the provided password against the stored (hashed) password
        if (password_verify($password, $storedPassword)) {
            // if Passwords match then login successful
            session_start();

            // Store user information in session variables
            $_SESSION['user_email'] = $email;
            $_SESSION['user_fullname'] = $fullname; // Store the user's full name in the session
            $_SESSION['user_userID'] = mysqli_insert_id($conn);

            // Redirect the user to dashboard
            header('Location: ../dashboard.php');
            exit();
        } else {
            echo "Wrong Credential: Please enter a valid email or password.";
        }
    } else {
        echo "User not found. Please register.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
