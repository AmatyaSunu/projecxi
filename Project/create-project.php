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
                  <option value="Employee 1">Employee 1</option>
                  <option value="Employee 2">Employee 2</option>
                  <option value="Employee 3">Employee 3</option>
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