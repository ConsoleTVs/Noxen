<ul style='width: auto !important;' id="dropdown1" class="dropdown-content">
    <li><a href="post_create.php">Create Post</a></li>
    <li><a href="post_edit.php">Edit Posts</a></li>
    <li><a href="post_settings.php">Post Settings</a></li>
  </ul>
    <nav id="front-page-nav">
      <div class="nav-wrapper white">
        <div class='container'>
          <a href="index.php" class="brand-logo" style='color: #3498db;'>
            <?php echo $web_name; ?>
          </a>
          <ul id="nav-mobile" class="right side-nav">
            <li>
              <a href="index.php">
                Home
              </a>
            </li>
            <li>
              <a href="users.php">
                Users
              </a>
            </li>
            <li>
              <a id='drop' class="dropdown-button" href="#!" data-activates="dropdown1">Posts</a>
            </li>
            <li>
              <a href="subscribers.php">
                Subscribers
              </a>
            </li>
            <li>
              <a href="settings.php">
                Settings
              </a>
            </li>
            <li>
              <a href="settings.php">
                Moderators
              </a>
            </li>
            <li>
              <a href="logout.php">
                Logout
              </a>
            </li>
          </ul>
          <a class="button-collapse" href="#" data-activates="nav-mobile">
            <i class="mdi-navigation-menu">
            </i>
          </a>
        </div>
              </div>
      </nav>