<?php include 'inc/settings.php' ?>
<?php include 'inc/core.php' ?>
<?php
    $statement = $conn->prepare("SELECT * FROM settings WHERE id=1");
    $statement->execute();
    $row = $statement->fetch();
    $allow_login = $row['allow_login'];
    $maintenance = $row['maintenance'];


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
                Administration
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Website administrators and moderators
              </h4>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          
            <div class='col s12 m12 l12'>
                <a class="waves-effect waves-light disabled btn">
                <i class="mdi-action-assignment-ind left">
                </i>
                    Moderators
                </a>
                <a href='https://github.com/ConsoleTVs/Noxen/' class="waves-effect waves-light btn">
                <i class="mdi-action-help left">
                </i>
                    Help
                </a>
              <br>
                <h4 class='light'><b>Administrator:</b></h4>
                <p class='flow-text'>Username: admin</p>
                <p class='flow-text'>Password: *censored* <a href='change.php?f=change_password&token=<?php echo $_SESSION['token']; ?>&id=<?php echo $_SESSION['id']; ?>'>[Change Password]</a></p>
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
