<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project Dashboard</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Sunidhi Amatya" />
    <link rel="stylesheet" href="../styles/kanban-style.css">
    <script src="../scripts/script.js" defer></script>
    <script src="../scripts/kanban-script.js" defer></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inria+Sans&family=Roboto&family=Inria:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <div class="sidenav">
        <div class="sidenav-logo">
            <img src="../images/project-logo.png" />
            <span class="project-label">Armour<br>Technology</span>
        </div>

        <div class="menu">
            <div>
                <a class="menu-content" id="dashboard">Dashboard</a>
            </div>
            <div>
                <a class="menu-content" id="people">People</a>
            </div>
            <div>
                <a class="menu-content" id="projects">Project</a>
            </div>
            <hr class="sidenav-line">
            <div>
                <a class="menu-content" id="profile">Profile</a>
            </div>
            <div>
                <a class="menu-content" id="Settings">Setting</a>
            </div>
            <hr class="sidenav-line">
            <div>
                <a class="menu-content" id="contact-us">Contact us</a>
            </div>
            <div>
                <a class="menu-content" id="faq">FAQ</a>
            </div>
            <div>
                <a class="menu-content" id="logout">Log out</a>
            </div>
        </div>
        <div class="logo" id="main-logo-kanban">
            <img class="img-logo" src="../images/logo.png" />
        </div>
       
    </div>
    <div class="main">
        <div class="topnav">
            <div class="back-container" id="back">
                <i class="fas fa-chevron-left"></i>
                <span class="back"> Back </span>
            </div>
            <div class="user-container">
                <img src="../images/jessica.jpeg" alt="Avatar" class="user-avatar">
                <span class="user-name">Jessica Bells</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <p><Strong>Project</Strong> / <span id="projectName">Titans</span>  (<span id="projectKey">TTs</span>)</p>
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
                        <img src="../images/jo.jpeg" alt="Avatar" class="user-avatar">
                        <div class="circle">+9</div>
                    </div>
                </div>
                <div class="buttons-container">
                    <button class="create-ticket-btn" id="create-ticket-btn">Create Ticket</button>
                </div>
            </div>
        </div>
        <!-- Kanban board starts here -->
        <div class="row">
            <div class="kanban-board">
                <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">TO DO <span>0</span></p>
                </div>
                <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">IN PROGRESS <span>0</span></p>
                </div>
                <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">IN TESTING <span>0</span></p>
                </div>
                <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">REVIEW <span>0</span></p>
                </div>
                <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">DONE <span>0</span></p>
                </div>
                
            </div>
        </div>
</body>
</html>