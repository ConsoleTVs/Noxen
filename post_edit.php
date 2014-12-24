<?php include 'inc/settings.php' ?>
<?php include 'inc/core.php' ?>
<?php
if(isset($_GET['id'])){
    $post_id = $_GET['id'];
    $statement_post = $conn->prepare("SELECT * FROM posts WHERE id=:post_id");
    $statement_post->execute(array(':post_id' => $post_id));
    $row = $statement_post->fetch();
    $current_header = $row['header'];
    $current_text = $row['text'];
} else {
    $_SESSION['msg'] = "toast('Please select a post!', 3000);";
    header("Location: post_list.php");
    die();
}

if(isset($_POST['editor1'])){
    
    $new_header = $_POST['header'];
    $new_text = $_POST['editor1'];
    
    $statement_post_change = $conn->prepare("UPDATE posts SET header=:new_header WHERE id=:post_id");
    $statement_post_change->bindParam(':new_header', $new_header);
    $statement_post_change->bindParam(':post_id', $post_id);
    $statement_post_change->execute();
    
    $statement_post_change2 = $conn->prepare("UPDATE posts SET text=:new_text WHERE id=:post_id");
    $statement_post_change2->bindParam(':new_text', $new_text);
    $statement_post_change2->bindParam(':post_id', $post_id);
    $statement_post_change2->execute();
    
    $_SESSION['msg'] = "toast('Post Updated!', 3000);";
    header("Location: post_list.php");
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
                Edit Posts
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Edit your current posts in the website
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
            </a><br>
              <form method='POST'>
              <div class="input-field col s12">
          <input value='<?php echo $current_header; ?>' id="header" name='header' id='header' type="text" required>
          <label for="header">Post Title</label>
        </div><br><br><br><br>
              <center>
              <textarea required class="ckeditor" name="editor1" id="editor1"><?php echo $current_text; ?></textarea>
              </center>
              <br>
               
              
             <button class="btn waves-effect waves-light right" type="submit" name="action">Create Post
    <i class="mdi-content-send right"></i>
  </button>
              </form>
              
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
