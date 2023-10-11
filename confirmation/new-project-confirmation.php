<!DOCTYPE html>
<html lang="en">

<head>
    <title>Confirm Project Creation</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Tasmia Bhuiyan" />
    <link rel="stylesheet" href="../styles/confirmation-style.css">
    <script src="../scripts/create-project-confirm-script.js" defer></script>
</head>

<body class="new-confirmation">
    <div class="confirmation-container">
        <!-- <span class="close-button" onclick="closePage()">&times;</span> -->
        <div class="close-button">
            <button>x</button>
        </div>

        <div class="confirmation-logo">
            <img class="logo" src="../images/question-mark.png">
        </div>
        <div>
            <form id="createproject" action="" method="POST">
                <!-- Hidden input fields to store the data -->
                <input type="hidden" name="projectKey" value="<?php echo $_GET['projectKey']; ?>">
                <input type="hidden" name="projectName" value="<?php echo $_GET['projectName']; ?>">
                <input type="hidden" name="url" value="<?php echo $_GET['url']; ?>">
                <input type="hidden" name="projectType" value="<?php echo $_GET['projectType']; ?>">
                <input type="hidden" name="description" value="<?php echo $_GET['description']; ?>">
                <input type="hidden" name="defaultAssignee" value="<?php echo $_GET['defaultAssignee']; ?>">
                <input type="hidden" name="startDate" value="<?php echo $_GET['startDate']; ?>">
                <h1 class="new-project-confirmation-heading">Are you sure you want to create a new project?</h1>
                <div>
                    <div>
                        <p>Please ensure all details are correct as this action
                            cannot be undone.</p>
                    </div>
                    <div>
                        <div class="continue-button">
                            <button class="yes-button" id="project-btn-new" type="submit">Yes, I want to.</button>
                        </div>
                        <div class="continue-button">
                        <button type="button" class="cancel-button" id="cancel-new">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>

            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            include('../inc/dbconn.inc.php');

            // Check if the request method is POST
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Get user input from $_POST
                $projectKey = $_POST['projectKey'];
                $projectName = $_POST['projectName'];
                $url = $_POST['url'];
                $projectType = $_POST['projectType'];
                $description = $_POST['description'];
                $defaultAssignee = $_POST['defaultAssignee'];
                $startDate = $_POST['startDate'];

                echo "<script>console.log(" . $projectKey . ");</script>";

                // SQL query to insert user data into the 'users' table
                $query = "INSERT INTO projects (`key`, projectName, url, projectType, description, defaultAssignee, startDate) VALUES (?, ?, ?, ?, ?, ?, ?)";

                // Prepare the statement
                $statement = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($statement, $query)) {
                    // Bind parameters
                    mysqli_stmt_bind_param(
                        $statement,
                        "sssssss",
                        $projectKey,
                        $projectName,
                        $url,
                        $projectType,
                        $description,
                        $defaultAssignee,
                        $startDate
                    );

                    if (mysqli_stmt_execute($statement)) {
                        $success = true; // Set a flag to indicate successful insertion
                    } else {
                        $errorMessage = "Statement execution failed: " . mysqli_stmt_error($statement);
                    }
                }
                mysqli_close($conn);
            }
            ?>
            <script>
                <?php if (!empty($errorMessage)) : ?>
                    alert("<?php echo $errorMessage; ?>");
                <?php elseif (isset($success) && $success) : ?>
                    window.location.href = '../project/kanban.php?projectKey=<?php echo urlencode($projectKey); ?>&projectName=<?php echo urlencode($projectName); ?>';
                <?php endif; ?>
            </script>
</body>

</html>