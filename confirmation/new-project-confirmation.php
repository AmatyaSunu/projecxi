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
                <input type="hidden" name="projectLead" value="<?php echo $_GET['projectLead']; ?>">
                <input type="hidden" name="description" value="<?php echo $_GET['description']; ?>">
                <input type="hidden" name="defaultAssignee" value="<?php echo $_GET['defaultAssignee']; ?>">
                <input type="hidden" name="startDate" value="<?php echo $_GET['startDate']; ?>">
                <input type="hidden" name="status" value="<?php echo $_GET['status']; ?>">
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
            //Display errors for debugging
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            //include database connection file
            include('../inc/dbconn.inc.php');


            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Get user input from the submitted form
                $projectKey = $_POST['projectKey'];
                $projectName = $_POST['projectName'];
                $url = $_POST['url'];
                $projectType = $_POST['projectType'];
                $projectLead = $_POST['projectLead'];
                $description = $_POST['description'];
                $defaultAssignee = $_POST['defaultAssignee'];
                $startDate = $_POST['startDate'];
                $status = $_POST['status'];


                session_start();

                //Save project information in the session for later use
                $_SESSION['projectName'] = $projectName;
                $_SESSION['projectKey'] = $projectKey;

                $query = "INSERT INTO projects (`key`, projectName, url, projectType, projectLead, description, defaultAssignee, startDate, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $statement = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($statement, $query)) {
                    mysqli_stmt_bind_param(
                        $statement,
                        "sssssssss",
                        $projectKey,
                        $projectName,
                        $url,
                        $projectType,
                        $projectLead,
                        $description,
                        $defaultAssignee,
                        $startDate,
                        $status
                    );

                    // SQL statement to insert data into the database
                    if (mysqli_stmt_execute($statement)) {
                        $_SESSION['projectId'] = mysqli_insert_id($conn);
                        $success = true;
                    } else {
                        // Check for duplicate key error
                        if (mysqli_errno($conn) == 1062) {
                            $errorMessage = "Duplicate entry error, please provide a unique key.";
                        } else {
                            throw new Exception(mysqli_error($conn));
                        }
                    }
                }
                mysqli_close($conn);
            }
            ?>
            <script>
                <?php if (!empty($errorMessage)) : ?>
                    alert("<?php echo addslashes($errorMessage); ?>");
                <?php elseif (isset($success) && $success) : ?>
                    window.location.href = '../project/kanband.php?projectKey=<?php echo urlencode($projectKey); ?>&projectName=<?php echo urlencode($projectName); ?>';
                <?php endif; ?>
            </script>
</body>

</html>