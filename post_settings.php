<?php include 'inc/core.php' ?>
<?php include 'inc/settings.php' ?>
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
  <a class="waves-effect waves-light btn">
              <i class="mdi-action-help left">
              </i>
              Help
            </a>
              <br>
              <h4 class='light'>Show Post Date - Currently: <span style='color: green;'>ON</span></h4>
              <a class="waves-effect waves-light btn"><i class="mdi-notification-event-available left"></i>Turn On Post Date</a>
              <a class="waves-effect waves-light red btn"><i class="mdi-notification-event-busy left"></i>Turn Off Post Date</a>
              <br>
              <h4 class='light'>Hide all the posts - Currently: <span style='color: red;'>OFF</span></h4>
              <a class="waves-effect waves-light btn"><i class="mdi-action-visibility left"></i>Show All Posts</a>
              <a class="waves-effect waves-light red btn"><i class="mdi-action-visibility-off left"></i>Hide All Posts</a>
              <br>
              <h4 class='light'>Message in all posts</h4>
              <a class="waves-effect waves-light btn"><i class="mdi-action-settings left"></i>Set Up</a>

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
