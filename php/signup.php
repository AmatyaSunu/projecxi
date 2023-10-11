<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../inc/dbconn.inc.php');

// Check if the request method is GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Get user input
    $companyName = $_GET['companyName'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $fullName = $_GET['fullName'];
    $email = $_GET['email'];
    $contactNumber = $_GET['contactNumber'];
    $password = $_GET['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into the 'users' table
    $query = "INSERT INTO users (companyName, firstName, lastName, fullName, email, contactNumber, password) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $query)) {
        // Bind parameters
        mysqli_stmt_bind_param($statement, "sssssss", $companyName, $firstName, $lastName, $fullName, $email, $contactNumber, $hashedPassword);

        if (mysqli_stmt_execute($statement)) {

            session_start();

            // Store user data in session variables
            $_SESSION['user_companyName'] = $companyName;
            $_SESSION['user_firstName'] = $firstName;
            $_SESSION['user_lastName'] = $lastName;
            $_SESSION['user_fullName'] = $fullName;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_contactNumber'] = $contactNumber;
            $_SESSION['user_userID'] = mysqli_insert_id($conn); // Get the auto-generated user ID



            //echo "Success!";
            header("location: ../confirmation/verification-sent.html");
            exit; // Important to stop further processing
        } else {
            echo "Statement execution failed: " . mysqli_stmt_error($statement);
        }
    }


    mysqli_close($conn);
}
