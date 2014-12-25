<?php include 'inc/settings.php' ?>
<?php include 'inc/core.php' ?>
<?php
    $statement = $conn->prepare("SELECT * FROM settings WHERE id=1");
    $statement->execute();
    $row = $statement->fetch();
    $hide_all_posts = $row['hide_all_posts'];
    $all_posts_message = $row['all_posts_message'];

    $token = $_SESSION['token'];
    

    if($hide_all_posts == 0){
        $hide_all_posts_0 = "<a class='waves-effect waves-light disabled btn'><i class='mdi-action-visibility left'></i>Show All Posts</a>";
        $hide_all_posts_1 = "<a href='change.php?f=hide_all_posts&s=1&token=$token' class='waves-effect waves-light red btn'><i class='mdi-action-visibility-off left'></i>Hide All Posts</a>";
        $hide_all_posts_status = "<span style='color: green;'>OFF</span>";
    } else {
        $hide_all_posts_0 = "<a href='change.php?f=hide_all_posts&s=0&token=$token' class='waves-effect waves-light btn'><i class='mdi-action-visibility left'></i>Show All Posts</a>";
        $hide_all_posts_1 = "<a class='waves-effect waves-light disabled btn'><i class='mdi-action-visibility-off left'></i>Hide All Posts</a>";
        $hide_all_posts_status = "<span style='color: orange;'>ON - No post is beeing shown</span>";
    }

    if(isset($_POST['editor1'])){
        $all_posts_message = $_POST['editor1'];
        $token = $_POST['token'];
        if($_POST['token'] != $_SESSION['token']){
            $_SESSION['msg'] = "toast('Token missmatch!', 3000);";
            header("Location: index.php");
            die();
        }
        $statement_editor = $conn->prepare("UPDATE settings SET all_posts_message=:all_posts_message WHERE id=1");
        $statement_editor->execute(array(':all_posts_message' => $all_posts_message));
        $_SESSION['msg'] = "toast('All posts message changed!', 3000);";
        header("Location: post_settings.php");
        die();
    }

?>
<!DOCTYPE html>
<html>
  <?php include 'inc/header.php' ?>
  
  <body>

      <?php include 'inc/menu.php' ?>
      
      <div class="section" id="index-banner">
        <div class="container">
          <div class="row">
            <div class="col s12 m9">
              <h1 class="header light center-on-small-only ">
                Post Settings
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Edit the general post settings in your website
              </h4>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          
          <div class='col s12 m12 l12'>
  <a href='https://github.com/ConsoleTVs/Noxen/' class="waves-effect waves-light btn">
              <i class="mdi-action-help left">
              </i>
              Help
            </a>
              <br>
              <h4 class='light'>Hide all the posts - Currently: <?php echo $hide_all_posts_status; ?></h4>
              <?php echo $hide_all_posts_1; ?>
              <?php echo $hide_all_posts_0; ?>
              <br>
              <h4 class='light'>Message in all posts</h4>
              <a class="waves-effect waves-light btn modal-trigger" href='#msg_posts'><i class="mdi-action-settings left"></i>Set Up</a>
              
              <div id="msg_posts" class="modal">
        <h2>Message in all posts</h2>
        <span>The following message will appear in all the posts, at the start of the text</span>
        <p>
            <form method="POST">
                <textarea required class="ckeditor" name="editor1" id="editor1"><?php echo $all_posts_message; ?></textarea><br>
                <input style='display: none;' type='text' name='token' id='token' value='<?php echo $_SESSION['token']; ?>'>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="mdi-content-send right"></i>
                </button>
            </form>
        </p>
        <a href="#" class="waves-effect btn-flat modal-close right">Close</a>
    </div>
            
    </div>
    
  </div>
  <?php include 'inc/footer.php' ?>
      </div>
      
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js">
      </script>
      <script type="text/javascript" src="js/materialize.js">
        
      </script>
      <script>
      <?php include 'inc/scripts.php' ?>
      </script>
  </body>
</html>
