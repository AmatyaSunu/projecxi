<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Database connection
include('../inc/dbconn.inc.php');
// Check if projectKey and redirectUrl are set
if (isset($_GET['projectKey']) && isset($_GET['redirectUrl']) && isset($_GET['projectName'])) {   
    $_SESSION['projectKey'] = $_GET['projectKey'];
    $_SESSION['projectName'] = $_GET['projectName'];
    
    // Prepare the SQL query
    $sql = "SELECT projectId FROM projects WHERE `key` = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind the projectKey parameter
    mysqli_stmt_bind_param($stmt, "s", $_GET['projectKey']);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Bind the result to a variable
    mysqli_stmt_bind_result($stmt, $projectId);

    // Fetch the result
    if (mysqli_stmt_fetch($stmt)) {
        $_SESSION['projectId'] = $projectId;
        header('Location: ' . $_GET['redirectUrl']);
        exit;
    } else {
        echo "Error: No project found with the provided key.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);

} else {
    echo "Error: Project Key or redirect URL not provided.";
}
?>
