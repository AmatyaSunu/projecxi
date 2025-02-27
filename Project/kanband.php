<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project Dashboard</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Sunidhi Amatya" />
    <link rel="stylesheet" href="../styles/kanban-style.css">
    <link rel="stylesheet" href="../styles/icon-style.css">
    <script src="../scripts/kanban1-script.js" defer></script>
    <!-- For implementing google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans&family=Roboto&family=Inria:wght@400;700&display=swap" rel="stylesheet">
    <!-- For implementing the various icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php

    session_start();

    // Check if the session variables are set
    if (isset($_SESSION['projectId'])) {
        $pID = $_SESSION['projectId'];
        $key = $_SESSION['projectKey'];
        $name = $_SESSION['projectName'];
    }

    // Get the user's full name
    $fullName = isset($_SESSION['user_fullName']) ? $_SESSION['user_fullName'] : 'Jessica Bells';

    include('../inc/dbconn.inc.php');

    // Query the database to retrieve tickets
    $key = mysqli_real_escape_string($conn, $_SESSION['projectKey']);
    $query = "SELECT * FROM tickets WHERE projectKey = '$key'";

    $result = mysqli_query($conn, $query);

    $tickets = [];
    if ($result) {
        if (mysqli_num_rows($result) >= 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tickets[] = $row;
            }
        }
    }

    //display tickets by status
    function displayTickets($status, $tickets)
    {
        foreach ($tickets as $ticket) {
            if ($ticket['status'] == $status) {
                echo '<div class="ticket" id="ticket-' . $ticket['ticketId'] . '" draggable="true" ondragstart="drag(event)">';
                echo '<div class="row">';
                echo '<p class="ticket-title">' . htmlspecialchars($ticket['title']) . '</p>';
                echo '</div>';
                echo '<div class="row">';
                echo '<i class="far fa-flag flag-icon"></i>';
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="left-group">';
                echo '<div class="rectangle-icon"></div>';
                echo '<p>' . htmlspecialchars($ticket['projectKey']) . '-' . htmlspecialchars($ticket['ticketId']) . '</p>';
                if ($ticket['priority'] == 'High') {
                    echo '<i class="fas fa-angle-double-up"></i>';
                } elseif ($ticket['priority'] == 'Medium') {
                    echo '<i class="fas fa-equals"></i>';
                } elseif ($ticket['priority'] == 'Low') {
                    echo '<i class="fas fa-angle-down"></i>';
                }
                echo '</div>';
                echo '<div class="right-group">';
                echo '<div class="avatar-board">';
                echo '<img src="../images/kim.jpeg" alt="Avatar" class="user-avatar">';
                echo '<img src="../images/jessica.jpeg" alt="Avatar" class="user-avatar">';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
    ?>
    <div class="sidenav">
        <div class="sidenav-logo">
            <img src="../images/project-logo.png" />
            <span class="project-label">Armour<br>Technology</span>
        </div>

        <div class="menu">
            <div>
                <a class="menu-content">Dashboard</a>
            </div>
            <div>
                <a class="menu-content">Project</a>
            </div>
            <hr class="sidenav-line">
            <div>
                <a class="menu-content">Profile</a>
            </div>
            <div>
                <a class="menu-content">Setting</a>
            </div>
            <div>
                <a class="menu-content">About</a>
            </div>
            <hr class="sidenav-line">
            <div>
                <a class="menu-content">Contact us</a>
            </div>
            <div>
                <a class="menu-content">Help</a>
            </div>
        </div>
        <div class="logo" id="main-logo1">
            <img class="img-logo" src="../images/logo.png" />
        </div>
    </div>
    <div class="main">
        <div class="topnav">
            <div class="back-container" id="back1">
                <i class="fas fa-chevron-left"></i>
                <span class="back"> Back </span>
            </div>
            <div class="user-container">
                <img src="../images/jessica.jpeg" alt="Avatar" class="user-avatar">
                <span class="user-name"><?php echo $fullName; ?></span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <p><Strong>Project</Strong> / <span id="projectName">Titans</span> (<span id="projectKey">TTs</span>)</p>
            </div>
            <div class="row">
                <h2>Board</h2>
                <button class="filter-btn" id="filter">Filter <i class="fas fa-filter"></i></button>
            </div>
            <div class="row">
                <div class="board-header">
                    <div class="search-input-container">
                        <input type="text" class="search-input">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                    <div class="avatar-board">
                        <img src="../images/jessica.jpeg" alt="Avatar" class="user-avatar">
                        <img src="../images/kim.jpeg" alt="Avatar" class="user-avatar">

                    </div>
                </div>
                <div class="buttons-container">
                    <button class="create-ticket-btn" id="create-ticket-btn1">Create Ticket</button>
                </div>
            </div>
        </div>
        <!-- Kanban board starts here -->
        <div class="row">
            <div class="kanban-board">
                <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">TO DO <span id="todo-count">0</span></p>

                    <?php displayTickets('To do', $tickets); ?>
                </div>
                <div class="kanban-block" id="inprogress" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">IN PROGRESS <span id="inprogress-count">0</span></p>
                    <?php displayTickets('Progress', $tickets); ?>
                </div>
                <div class="kanban-block" id="intesting" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">IN TESTING <span id="intesting-count">0</span></p>
                    <?php displayTickets('In testing', $tickets); ?>
                </div>
                <div class="kanban-block" id="review" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">REVIEW <span id="review-count">0</span></p>
                    <?php displayTickets('Review', $tickets); ?>
                </div>
                <div class="kanban-block" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">DONE <span id="done-count">0</span></p>
                    <?php displayTickets('Done', $tickets); ?>
                </div>

            </div>
        </div>
</body>

</html>