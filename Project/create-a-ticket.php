<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="author" content="Ramya" />
  <meta name="description" content="Ticket" />
  <link rel="stylesheet" href="../styles/styles-ticket.css" />
  <script src="../scripts/create-ticket-script.js" defer></script>
  <title>Create a Ticket</title>
</head>

<body class="Ticket-body">
<?php
  //uncomment for debugging
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

  // Database connection
  include('../inc/dbconn.inc.php');
  ?>
  <div class="Ticket-row">
    <div class="navbar">
      <div class="project-menu">
        <div class="project-menu-row1">
          <div class="project-logo">
            <img src="../images/project-logo.png" />
          </div>
          <div class="project-logo-label">
            <span class="label">Armour Technology</span>
            <p>Businness Project</p>
          </div>
        </div>
        <div class="project-menu-row2">
          <div class="project-menu-content">
            <a class="menu-content" href="privacy-policy.html">Dashboard</a>
            <a class="menu-content" href="privacy-policy.html">People</a>
            <a class="menu-content" href="privacy-policy.html">Project</a>
            <hr class="bar hr-bar" />
            <a class="menu-content" href="privacy-policy.html">My Profile</a>
            <a class="menu-content" href="privacy-policy.html">Settings</a>
            <a class="menu-content" href="privacy-policy.html">About</a>
            <hr class="bar hr-bar" />
            <a class="menu-content" href="privacy-policy.html">Contact Us</a>
            <a class="menu-content" href="privacy-policy.html">Help</a>
          </div>
        </div>
        <div class="project-menu-row3">
          <div class="main-logo" id="main-logo-ticket">
            <img class="img-main-logo" src="../images/logo.png" />
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="Ticket-form">
        <h1 class="create-heading">Create a ticket</h1>
        <h2 class="Details">Details</h2>
        <div class="row">
          <div class="column1">
            <div class="element">
              <label>Title</label>
              <input class="custom-input" type="text" id="title" name="title" placeholder="Required" required/>
            </div>
            <div class="element">
              <label>Description</label>
              <input class="custom-inputD" type="text" id="description" name="description" placeholder="Required" required/>
            </div>
            <div class="elementp">
              <label>Priority</label>
              <select id="Priority-p" name="priority">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
              </select>

            </div>
            <div class="element">
              <label>Assignee</label>
              <select id="assignee" name="assignee">
                <!-- Rendering of Usernames from the database for dropdown -->
                <?php
                // Query to get user list from database
                $sql = "SELECT fullName, userId FROM users ORDER BY fullName ASC";
                $result = mysqli_query($conn, $sql);

                $usernames = [];

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $usernames[] = $row['fullName'];
                  }
                }
                ?>
                <?php foreach ($usernames as $username) : ?>
                  <option value="<?php echo $username; ?>"><?php echo $username; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="element">
              <label>Estimated Date</label>
              <input class="custom-input" type="date" id="estimatedDate" name="estimatedDate" placeholder="Required" required/>
            </div>
            <div class="element">
              <label>Reporter</label>
              <select id="assignee" name="assignee">
                <!-- Rendering of Usernames from the database for dropdown -->
                <?php
                // Query to get user list from database
                $sql = "SELECT fullName, userId FROM users ORDER BY fullName ASC";
                $result = mysqli_query($conn, $sql);

                $usernames = [];

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $usernames[] = $row['fullName'];
                  }
                }
                ?>
                <?php foreach ($usernames as $username) : ?>
                  <option value="<?php echo $username; ?>"><?php echo $username; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="element">
              <label>Type</label>
              <select id="type" name="type" class="type">
                <option value="Type 1">Type 1</option>
                <option value="Type 2">Type 2</option>
                <option value="Type 3">Type 3</option>
              </select>
            </div>
            <div class="create">
              <div class="create-button">
                <button class="create-Ticket-button" id="create-Ticket-button">
                  Create Ticket
                </button>
              </div>
              <div class="cancel">
                <p><a href="../dashboard.php" class="c1" id="cancel-create-ticket">Cancel</a></p>
              </div>
            </div>
          </div>

          <div class="column2">
            <div class="column2-row1">
              <div>
                <label>Related Tickets</label>
                <input class="custom-input2" type="text" id="relatedTicket" name="relatedTicket" placeholder="TT" required/>
              </div>
              <div class="info">
                <button type="button" id="infoButton">i</button>
              </div>
            </div>
            <div class="column2-row2">
              <label>Attachments</label>
              <div class="Attachments">
                <div class="Attachments-logo">
                  <img src="../images/Attachments-logo.png" />
                </div>
                <div class="image-selection">
                  <input type="file" id="imageInput" style="display: none" />
                  <button onclick="document.getelementById('imageinput').click();">
                    Select a file
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>