<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="author" content="Ramya" />
  <meta name="description" content="Project" />
  <link rel="stylesheet" href="../styles/styles-project.css" />
  <title>Create a Project</title>
  <script src="../scripts/create-project-script.js" defer></script>
</head>

<body class="project-body">
  <?php
  //uncomment for debugging
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // Database connection
  include('../inc/dbconn.inc.php');
  ?>
  <div class="project-row">
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
            <a class="menu-content" id="dashboard">Dashboard</a>
            <a class="menu-content" id="people">People</a>
            <a class="menu-content" id="projects">Project</a>
            <hr class="bar hr-bar" />
            <a class="menu-content" id="profile">Profile</a>
            <a class="menu-content" id="Settings">Settings</a>
            <hr class="bar hr-bar" />
            <a class="menu-content" id="contact-us">Contact Us</a>
            <a class="menu-content" id="faq">FAQ</a>
            <a class="menu-content" id="terms-of-use">Terms of Use</a>

          </div>
        </div>
        <div class="project-menu-row3">
          <div class="main-logo" id="main-logo-project">
            <img class="img-main-logo" src="../images/logo.png" />
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="project-form">
        <h1 class="create-heading">Create a project</h1>
        <h2 class="Details">Details</h2>
        <div class="row">
          <div class="column1">
            <div class="element">
              <label>Title</label>
              <input class="custom-input" type="text" id="project-name" name="project-name" placeholder="Required" />
            </div>
            <div class="element">
              <label>Url</label>
              <input class="custom-input" type="url" id="url" name="url" />
            </div>
            <div class="element">
              <label>Project Type</label>
              <select id="project-type" name="project-type">
                <option value="#">Kanban</option>
                <option value="#">Scrum</option>
              </select>
            </div>
            <div class="element">
              <label>Description</label>
              <input class="custom-inputD" type="text" id="description" name="description" placeholder="Required" />
            </div>
            <div class="element">
              <label>Project Lead</label>
              <input class="custom-input" type="text" id="project-lead" name="project-lead" placeholder="Required" />
            </div>
            <div class="element">
              <label>Default Assignee</label>
              <select id="default-assignee" name="default-assignee">
                <!-- Rendering of Usernames from the database for dropdown -->
                <?php
                echo "<script>console.log('result');</script>";

                $sql = "SELECT fullName, userId FROM users ORDER BY fullName ASC";
                $result = mysqli_query($conn, $sql);

                $usernames = [];

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<script>console.log(" . $row . ");</script>";
                    $usernames[] = $row['fullName'];
                  }
                }
                ?>
                <?php foreach ($usernames as $username) : ?>
                  <option value="<?php echo $username; ?>"><?php echo $username; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="create">
              <div class="create-button">
                <button class="create-project-button" id="create-project-btn">
                  Create Project
                </button>
              </div>
              <div class="cancel">
                <a href="../dashboard.php" class="c1" id="cancel-new-project">Cancel</a>
              </div>
            </div>
          </div>

          <div class="column2">
            <div class="column2-row1">
              <div>
                <label>key</label>
                <input class="custom-input2" type="text" id="project-key" name="project-key" placeholder="Required" />
              </div>
              <div class="info">
                <button type="button" id="infoButton">i</button>
              </div>
            </div>
            <div class="avatar">
              <label>Avatar</label>
              <div class="in-line">
                <div class="avatar-logo">
                  <img src="../images/avatar-logo.png" />
                </div>
                <div class="image-selection">
                  <input type="file" id="imageInput" style="display: none" />
                  <button onclick="document.getelementById('imageinput').click();">
                    Select an image
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