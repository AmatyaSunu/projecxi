<?php
// Configure error reporting for debugging purposes
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

session_start();

include('../inc/dbconn.inc.php');
// Check if projectKey, projectName, and redirectUrl are set in the URL
if (isset($_GET['projectKey']) && isset($_GET['redirectUrl']) && isset($_GET['projectName'])) {
    $_SESSION['projectKey'] = $_GET['projectKey'];
    $_SESSION['projectName'] = $_GET['projectName'];

    // SQL query to find the project ID based on projectKey
    $sql = "SELECT projectId FROM projects WHERE `key` = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $_GET['projectKey']);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $projectId);

    if (mysqli_stmt_fetch($stmt)) {
        // Store the projectId in the session
        $_SESSION['projectId'] = $projectId;
        header('Location: ' . $_GET['redirectUrl']);
        exit;
    } else {
        echo "Error: No project found with the provided key.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error: Project Key or redirect URL not provided.";
}
