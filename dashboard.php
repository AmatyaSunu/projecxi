<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Sunidhi Amatya" />
    <link rel="stylesheet" href="styles/dashboard-style.css">
    <script src="./scripts/script.js" defer></script>
    <script src="./scripts/dashboard-script.js" defer></script>
    <!-- For implementing google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- For implementing the various icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    //uncomment for debugging
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    require_once "inc/dbconn.inc.php";
    ?>
    <div class="sidenav">
        <div class="company-logo">
            <img src="images/project-logo.png" />
            <span class="project-label"> Armour<br />Technology</span>
        </div>

        <div class="menu">
            <hr class="sidenav-line">
            <div>
                <a class="menu-content" id="dashboard">Dashboard</a>
            </div>
            <div>
                <a class="menu-content" id="projects">Project</a>
            </div>
            <hr class="sidenav-line">
            <div>
                <a class="menu-content" id="profile">Profile</a>
            </div>
            <div>
                <a class="menu-content" id="setting">Setting</a>
            </div>
            <hr class="sidenav-line">
            <div>
                <a class="menu-content" id="contact-us">Contact us</a>
            </div>
            <div>
                <a class="menu-content" id="faq">FAQ</a>
            </div>
            <hr class="sidenav-line">
            <div>
                <a class="menu-content" id="logout">Log out</a>
            </div>
            <div class="sidenav-logo" id="main-logo">
                <img src="images/logo.png" />
            </div>
        </div>
    </div>
    <div class="main">
        <div class="topnav">
            <div class="search-input-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search">
            </div>
            <div class="user-container">
                <img src="./images/jessica.jpeg" alt="Avatar" class="user-avatar">

                <span class="user-name">
                    <?php
                    session_start();

                    // Fetch and display the user's name dynamically
                    if (isset($_SESSION['user_fullname'])) {
                        echo "<script>console.log(" . $_SESSION['user_fullname'] . ");</script>";
                    } else {
                        echo "User";
                    }
                    ?>
                </span>

            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="grid-1">
                    <h1>Welcome</h1>
                    <p>Welcome to Projecxi Dashboard – Your Project's Command Center!</p>
                    <br>
                    <p>Organize, Monitor, Achieve.</p>
                </div>
                <div class="grid-1">
                    <h1>Notice</h1>
                    <?php
                    // Query the database to retrieve notices
                    $query = "SELECT * FROM notices LIMIT 4";
                    $result = mysqli_query($conn, $query);

                    // Check if the query was successful
                    if ($result) {
                        if (mysqli_num_rows($result) >= 1) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $formattedDate = date("l j F", strtotime($row["date"]));
                                echo "<p id='notice-list'>" . $formattedDate . " : " . $row["description"] . "</p>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="grid-2">
                <div class="project-header">
                    <h1>Projects</h1>
                    <div class="buttons-container">
                        <button class="create-project-btn" id="create-project">Create Project</button>
                        <button class="filter-btn">Filter <i class="fas fa-filter"></i></button>
                    </div>
                </div>
                <table class="project-table">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Project Name</th>
                            <th>Project Lead</th>
                            <th>Start Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query the database to retrieve projects
                        $projectQuery = "SELECT * FROM projects LIMIT 10";

                        $projectList = mysqli_query($conn, $projectQuery);

                        // Check if the query was successful
                        if ($projectList) {
                            if (mysqli_num_rows($projectList) >= 1) {
                                while ($rowProject = mysqli_fetch_assoc($projectList)) {
                                    echo "<tr class='project-row' id='project-" . $rowProject["key"] . "'>";
                        ?>
                                    <td><?php echo $rowProject["key"]; ?></td>
                                    <td><?php echo $rowProject["projectName"]; ?></td>
                                    <td><?php echo $rowProject["projectLead"]; ?></td>
                                    <td><?php echo $rowProject["startDate"]; ?></td>
                                    <td><button class="progress-button"><?php echo $rowProject["status"]; ?></td>
                                    </tr>
                        <?php
                                }
                            } else {
                                echo "<tr><td colspan='5'>No projects found.</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <button class="prev-btn"><i class="fas fa-arrow-left"></i> Previous</button>
                    <div class="page-numbers">
                        <span class="page-number active">1</span>
                        <span class="page-number">2</span>
                    </div>
                    <button class="next-btn">Next <i class="fas fa-arrow-right"></i></button>
                </div>

            </div>
        </div>

    </div>

</body>

</html>