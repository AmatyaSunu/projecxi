<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Ramya Karri" />
    <link rel="stylesheet" href="../styles/project.styles.css" />
    <!-- For implementing google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <!-- For implementing the various icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <?php
    require_once "../inc/dbconn.inc.php";
    ?>

    <div class="sidenav">
        <div class="sidenav-logo">
            <img src="../images/project-logo.png" />
            <span class="project-label">Armour<br>Technology</span>
        </div>

        <div class="menu">
            <hr class="sidenav-line">

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
            <img class="img-logo" src="./images/logo.png" />
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
                <span class="user-name">Jessica Bells</span>
                <i class="fas fa-chevron-down dropdown-icon" id="dropdownIcon"></i>
                <div class="dropdown-content" id="dropdownContent">
                    <a href="#">Profile</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="project-header">
                <h1>Projects</h1>
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
                    $projectQuery = "SELECT * FROM projects";
                    $projectList = mysqli_query($conn, $projectQuery);

                    // Check if the query was successful
                    if ($projectList) {
                        if (mysqli_num_rows($projectList) >= 1) {
                            while ($rowProject = mysqli_fetch_assoc($projectList)) {
                    ?>
                                <tr id="kanban1">
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
</body>

</html>