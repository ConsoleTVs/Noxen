<?php include 'inc/settings.php' ?>
<?php include 'inc/core.php' ?>
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
                Posts List
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Full posts list displayed below
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
              <?php
    
                    $statement = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
                    $statement->execute();
                    while($row = $statement->fetch()){
                        
                        $full_text = $row['text'];
                        $text = str_replace("</p>","",$full_text);
                        $min_text = substr($text,0,200).'...</p>';
                        
                        echo "<h1 class='light'>".$row['header']." <small style='font-size: 25px;'><i>".$row['date']."</i></small></h1>
              <h4 class='light'>".$min_text."</h4> 
              <div style='text-align:right'>
              <a class='waves-effect waves-light btn' href='post_edit.php?id=".$row['id']."'><i class='mdi-editor-mode-edit left'></i>Edit</a> 
              <a class='waves-effect waves-light btn red' href='delete_post.php?id=".$row['id']."'><i class='mdi-action-delete left'></i>Delete</a>
              </div>
              <br>";
                    }

                if(isset($text)){} else {
                    echo "<h1 class='light'>There are no posts yet...</h1><a class='waves-effect waves-light btn right' href='post_create.php'><i class='mdi-editor-mode-edit left'></i>Create Post</a>";
                }

                ?>
              
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
