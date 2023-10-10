<?php
include('../inc/dbconn.inc.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user input
    $companyName = $_POST['company-name'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['signup-email'];
    $contactNumber = $_POST['contact-number'];
    $password = $_POST['password'];

     // Concatenate first name and last name to create full name
     $fullName = $firstName . ' ' . $lastName;

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data into the 'users' table
    $query = "INSERT INTO users (companyName, firstName, lastName, fullName, email, contactNumber, password) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssssss", $companyName, $firstName, $lastName, $fullName, $email, $contactNumber, $hashedPassword);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("Location: ../confirmation/verification-sent.html");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error: " . mysqli_error($conn);
        // Handle the error
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection (if not done elsewhere)
    mysqli_close($conn);
}
?>