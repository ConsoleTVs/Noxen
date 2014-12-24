<ul style='width: auto !important;' id="dropdown1" class="dropdown-content">
    <li><a href="post_create.php">Create Post</a></li>
    <li><a href="post_edit.php">Edit Posts</a></li>
    <li><a href="post_settings.php">Post Settings</a></li>
    <li><a class='modal-trigger' href="#post_codes">Post Codes</a></li>
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
    <div id="post_codes" class="modal">
        <h2>Post Codes</h2>
        <b>All functions require <i>activate.php</i> located in noxen folder <code>&lt;?php require 'path/to/activate.php' ?&gt;</code></b><br><br>
        <span>To edit the output HTML please edit the file: <i>activate.php</i> located in noxen folder</span><br><br>
        <h4>Show all posts</h4>
        <p>To show all posts in a page, add the following code (please note that the post text will be max: 200 characters):
        <br><br> 
        <b>Show all posts</b>    
        <pre>&lt;php showPosts() ?&gt;</pre>
        
        <h4>Show a full post</h4>
        <p>To show a full post in a page, add the following code (please note that it will need the post id, automatatic redirect with id when press 'Read More' a post from 'Show all posts' funcion above):
        <br><br> 
        <b>Show a full post</b>    
        <pre>&lt;php showPost() ?&gt;</pre>
        
        </p>
        <a href="#" class="waves-effect btn-flat modal-close right">Close</a>
    </div>