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
                General Settings
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Edit the general website settings
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
              <h4 class='light'>Maintenance mode - Currently: <span style='color: red;'>OFF</span></h4>
              <a class="waves-effect waves-light btn"><i class="mdi-action-lock-outline left"></i>Turn On Maintenance mode</a>
              <a class="waves-effect waves-light red btn"><i class="mdi-action-lock-open left"></i>Turn Off Maintenance mode</a>
              <br>
              <h4 class='light'>Allow user login - Currently: <span style='color: green;'>ON</span></h4>
              <a class="waves-effect waves-light btn"><i class="mdi-navigation-check left"></i>Allow user login</a>
              <a class="waves-effect waves-light red btn"><i class="mdi-navigation-close left"></i>Disable user login</a>
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
