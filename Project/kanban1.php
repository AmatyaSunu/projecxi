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
                <span class="user-name">Jessica Bells</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <p><Strong>Project</Strong> / Titan (TT)</p>
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
                    <button class="create-ticket-btn" id="create-ticket-btn1">Create Ticket</button>
                </div>
            </div>
        </div>
        <!-- Kanban board starts here -->
        <div class="row">
            <div class="kanban-board">
                <div class="kanban-block" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">TO DO <span id="todo-count">0</span></p>
                    <div class="ticket" id="ticket-1" draggable="true" ondragstart="drag(event)">
                        <div class="row">
                            <p class="ticket-title">Implement the project dashboard</p>
                        </div>
                        <div class="row">
                            <i class="far fa-flag flag-icon"></i>
                        </div>
                        <div class="row">
                            <div class="left-group">
                                <div class="rectangle-icon"></div>
                                <p>TT-01</p>
                                <i class="fas fa-angle-double-up"></i>
                            </div>
                            <div class="right-group">
                                <div class="avatar-board">
                                    <i class="far fa-comment-alt"></i>
                                    <img src="../images/kim.jpeg" alt="Avatar" class="user-avatar">
                                    <img src="../images/jessica.jpeg" alt="Avatar" class="user-avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ticket" id="ticket-2" draggable="true" ondragstart="drag(event)">
                        <div class="row">
                            <p class="ticket-title">Create board view landing page</p>
                        </div>
                        <div class="row">
                            <div class="left-group">
                                <div class="rectangle-icon"></div>
                                <p>TT-02</p>
                                <i class="fas fa-angle-down"></i>
                            </div>
                            <div class="right-group">
                                <div class="avatar-board">
                                    <i class="far fa-comment-alt"></i>
                                    <img src="../images/kim.jpeg" alt="Avatar" class="user-avatar">
                                    <img src="../images/jessica.jpeg" alt="Avatar" class="user-avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ticket" id="ticket-3" draggable="true" ondragstart="drag(event)">
                        <div class="row">
                            <p class="ticket-title">Create ticket form</p>
                        </div>
                        <div class="row">
                            <i class="far fa-flag flag-icon"></i>
                        </div>
                        <div class="row">
                            <div class="left-group">
                                <div class="rectangle-icon"></div>
                                <p>TT-03</p>
                                <i class="fas fa-equals"></i>
                            </div>
                            <div class="right-group">
                                <div class="avatar-board">
                                    <i class="far fa-comment-alt"></i>
                                    <img src="../images/jo.jpeg" alt="Avatar" class="user-avatar">
                                    <img src="../images/jessica.jpeg" alt="Avatar" class="user-avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kanban-block" id="inprogress" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">IN PROGRESS <span id="inprogress-count">0</span></p>
                </div>
                <div class="kanban-block" id="intesting" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">IN TESTING <span id="intesting-count">0</span></p>
                </div>
                <div class="kanban-block" id="review" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">REVIEW <span id="review-count">0</span></p>
                </div>
                <div class="kanban-block" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <p class="swimlane-heading">DONE <span id="done-count">0</span></p>
                </div>

            </div>
        </div>
</body>

</html>