<?php include 'inc/settings.php' ?>
<?php include 'inc/core.php' ?>
<?php
    $statement = $conn->prepare("SELECT * FROM settings WHERE id=1");
    $statement->execute();
    $row = $statement->fetch();
    $allow_login = $row['allow_login'];
    $maintenance = $row['maintenance'];

    if($allow_login == 0){
        $allow_login_0 = "<a class='waves-effect waves-light disabled btn'><i class='mdi-navigation-close left'></i>Disable user login</a>";
        $allow_login_1 = "<a href='change.php?f=allow_login&s=1' class='waves-effect waves-light btn'><i class='mdi-navigation-check left'></i>Allow user login</a>";
        $allow_login_status = "<span style='color: red;'>OFF</span>";
    } else {
        $allow_login_0 = "<a href='change.php?f=allow_login&s=0' class='waves-effect waves-light red btn'><i class='mdi-navigation-close left'></i>Disable user login</a>";
        $allow_login_1 = "<a class='waves-effect waves-light disabled btn'><i class='mdi-navigation-check left'></i>Allow user login</a>";
        $allow_login_status = "<span style='color: green;'>ON</span>";
    }

    if($maintenance == 0){
        $maintenance_0 = "<a class='waves-effect waves-light disabled btn'><i class='mdi-action-lock-open left'></i>Turn Off Maintenance mode</a>";
        $maintenance_1 = "<a href='change.php?f=maintenance&s=1' class='waves-effect waves-light red btn'><i class='mdi-action-lock-outline left'></i>Turn On Maintenance mode</a>";
        $maintenance_status = "<span style='color: red;'>OFF</span>";
    } else {
        $maintenance_0 = "<a href='change.php?f=maintenance&s=0' class='waves-effect waves-light btn'><i class='mdi-action-lock-open left'></i>Turn Off Maintenance mode</a>";
        $maintenance_1 = "<a class='waves-effect waves-light disabled btn'><i class='mdi-action-lock-outline left'></i>Turn On Maintenance mode</a>";
        $maintenance_status = "<span style='color: orange;'>ON - Nobody can acces the site</span>";
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
              <h4 class='light'>Maintenance mode - Currently: <?php echo $maintenance_status; ?></h4>
              <?php echo $maintenance_1; ?>
              <?php echo $maintenance_0; ?>
              
              <br>
              <h4 class='light'>Allow user login - Currently: <?php echo $allow_login_status; ?></h4>
              <?php echo $allow_login_1; ?>
              <?php echo $allow_login_0; ?>
              

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
