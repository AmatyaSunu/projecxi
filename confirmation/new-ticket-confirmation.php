<!DOCTYPE html>
<html lang="en">

<head>
    <title>New ticket Confirmation</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Tasmia Bhuiyan" />
    <link rel="stylesheet" href="../styles/confirmation-style.css">
    <script src="../scripts/create-ticket-confirm-script.js" defer></script>
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
            <form id="createticket" action="" method="POST">
                <!-- Hidden input fields to store the data -->
                <input type="hidden" name="title" value="<?php echo $_GET['title']; ?>">
                <input type="hidden" name="description" value="<?php echo $_GET['description']; ?>">
                <input type="hidden" name="priority" value="<?php echo $_GET['priority']; ?>">
                <input type="hidden" name="assignee" value="<?php echo $_GET['assignee']; ?>">
                <input type="hidden" name="estimatedDate" value="<?php echo $_GET['estimatedDate']; ?>">
                <input type="hidden" name="reporter" value="<?php echo $_GET['reporter']; ?>">
                <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>">
                <input type="hidden" name="relatedTickets" value="<?php echo $_GET['relatedTicket']; ?>">

                <h1 class="new-project-confirmation-heading">Are you sure you want to create a new ticket?</h1>
                <div>
                    <div>
                        <p>Please ensure all details are correct as this action cannot be undone.</p>
                    </div>
                    <div class="new-ticket-confirmation-button">
                        <div class="continue-button">
                            <button class="yes-button" id="create-ticket" type="submit">Yes, I want to.</button>
                        </div>
                        <div class="continue-button">
                            <button type="button" class="cancel-button" id="cancel-ticket">Cancel</button>
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
                $title = $_POST['title'];
                $description = $_POST['description'];
                $priority = $_POST['priority'];
                $assignee = $_POST['assignee'];
                $estimatedDate = $_POST['estimatedDate'];
                $reporter = $_POST['reporter'];
                $type = $_POST['type'];
                $relatedTickets = $_POST['relatedTickets'];

                // SQL query to insert ticket data into the 'tickets' table
                $query = "INSERT INTO tickets (title, description, priority, estimatedDate, reporter, type, relatedTickets) VALUES (?, ?, ?, ?, ?, ?, ?)";

                // Prepare the statement
                $statement = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($statement, $query)) {
                    // Bind parameters
                    mysqli_stmt_bind_param(
                        $statement,
                        "sssssss",
                        $title,
                        $description,
                        $priority,
                        // $assignee,
                        $estimatedDate,
                        $reporter,
                        $type,
                        $relatedTickets
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
                <?php
                session_start();
                if (isset($_SESSION['projectKey'])) {
                    $key = $_SESSION['projectKey'];
                    $name = $_SESSION['projectName'];
                }
                ?>
                <?php if (!empty($errorMessage)) : ?>
                    alert("<?php echo $errorMessage; ?>");
                <?php elseif (isset($success) && $success) : ?>
                    window.location.href = '../project/kanban.php?projectKey=<?php echo urlencode($key); ?>&projectName=<?php echo urlencode($name); ?>';
                <?php endif; ?>
            </script>
        </div>
    </div>
</body>

</html>