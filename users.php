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
                Website Users
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Complete list of all users in your site
              </h4>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          
          <div class='col s12 m12  l12'>
            <a class="waves-effect waves-light btn">
              <i class="mdi-content-add left">
              </i>
              Create New User
            </a>
              
              <a class="waves-effect waves-light btn">
              <i class="mdi-action-settings left">
              </i>
              User Settings
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
                  <th data-field="id">
                    Username
                  </th>
                  <th data-field="name">
                    Email
                  </th>
                  <th data-field="price">
                    Type
                  </th>
                  <th data-field="price">
                    Options
                  </th>
                </tr>
              </thead>
              
              <tbody>
                  
                <?php
    
                    $statement = $conn->prepare("SELECT * FROM users");
                    $statement->execute();
                    while($row = $statement->fetch()){
                        $username = $row['username'];
                        $email = $row['email'];
                        $type_plan = $row['type'];
                        $u_id = $row['id'];
                        
                        $stmt = $conn->prepare("SELECT * FROM plan WHERE id=:type");
                        $stmt->execute(array(':type' => $type_plan));
                        $row = $stmt->fetch();
                        $type_text = $row['plan'];
                        
                        echo "<tr>
                  <td>
                    ".$username."
                  </td>
                  <td>
                    ".$email."
                  </td>
                  <td>
                    ".$type_text."
                  </td>
                  <td>
                    <a href='edit_user.php?id=$u_id' class='btn-floating'>
                      <i class='mdi-content-create'>
                      </i>
                    </a>
                      
                    <a href='delete_user.php?id=$u_id' class='btn-floating red'>
                      <i class='mdi-action-delete'>
                      </i>
                    </a>
                  </td>";
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
