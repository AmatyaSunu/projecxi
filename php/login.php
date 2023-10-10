<?php
include('../inc/dbconn.inc.php'); // Include your database connection code

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to retrieve user data by email
    $query = "SELECT id, email, password FROM users WHERE email = ? LIMIT 1";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashedPassword = $row['password'];
        $userId = $row['id'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashedPassword)) {
            // Passwords match; login successful
            // You can set session variables or redirect to the dashboard
            session_start();
            $_SESSION['user_id'] = $userId;
            header('Location: ../dashboard.html');
            exit();
        } else {
            // Passwords do not match
            echo "Wrong Credential: Please enter a valid email or password.";
        }
    } else {
        // User with provided email not found
        echo "User not found. Please register.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>