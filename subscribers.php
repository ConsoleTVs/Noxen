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
                Subscribers
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Complete list of all the subscribed emails
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
              <i class="mdi-content-add left">
              </i>
              Add subscriber
            </a>
            <a class="waves-effect waves-light btn">
              <i class="mdi-communication-email left">
              </i>
              Send Mass Mail
            </a>
              
            <a class="waves-effect waves-light btn">
              <i class="mdi-action-help left">
              </i>
              Help
            </a>
            <br>
            <table class='centered'>
              <thead>
                <tr>
                  <th data-field="name">
                    Email
                  </th>
                    <th data-field="date">
                    Subscribed on
                  </th>
                  <th data-field="options">
                    Options
                  </th>
                </tr>
              </thead>
              
              <tbody>
                  
                  <?php
    
                    $statement = $conn->prepare("SELECT * FROM subs");
                    $statement->execute();
                    while($row = $statement->fetch()){
                        echo "<tr>
                  <td>
                    ".$row['email']."
                  </td>
                    <td>
                    ".$row['date']."
                  </td>
                  <td>            
                    <a href='send.php?id=".$row['id']."' class='btn-floating'>
                      <i class='mdi-communication-email'>
                      </i>
                    </a>
                    <a href='delete_sub.php?id=".$row['id']."' class='btn-floating red'>
                      <i class='mdi-action-delete'>
                      </i>
                    </a>
                  </td>
                </tr>";
                    }

                ?>

              </tbody>
        </table>
        
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
