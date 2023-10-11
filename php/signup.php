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
            $_SESSION['fullName'] = $fullName;
            $_SESSION['email'] = $email;
            header("location: ../confirmation/verification-sent.html");
            exit;
        } else {
            echo "Statement execution failed: " . mysqli_stmt_error($statement);
        }
    }


    mysqli_close($conn);
}
