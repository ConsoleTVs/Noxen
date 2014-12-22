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
                Create Post
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Create a new post for your website
              </h4>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          
          <div class='col s12 m12 l12'>
  <a class="waves-effect waves-light btn">
              <i class="mdi-action-help left">
              </i>
              Help
            </a><br><br>
              <div class="input-field col s12">
          <input id="username" type="text" required>
          <label for="username">Post Title</label>
        </div><br><br><br><br>
              <center>
              <textarea class="ckeditor" name="editor1">Post Content...</textarea>
              </center>
              <br>
               
              
             <button class="btn waves-effect waves-light right" type="submit" name="action">Create Post
    <i class="mdi-content-send right"></i>
  </button>
              
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
