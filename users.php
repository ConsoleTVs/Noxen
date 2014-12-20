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
                <tr>
                  <td>
                    ConsoleTVs
                  </td>
                  <td>
                    ConsoleTVs@gmail.com
                  </td>
                  <td>
                    Standard
                  </td>
                  <td>
                    <a class="btn-floating">
                      <i class="mdi-action-perm-identity">
                      </i>
                    </a>
                    
                    <a class="btn-floating">
                      <i class="mdi-content-create">
                      </i>
                    </a>
                      
                    <a class="btn-floating red">
                      <i class="mdi-action-delete">
                      </i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    ConsoleTVs
                  </td>
                  <td>
                    ConsoleTVs@gmail.com
                  </td>
                  <td>
                    Standard
                  </td>
                  <td>
                     <a class="btn-floating">
                      <i class="mdi-action-perm-identity">
                      </i>
                    </a>
                    
                    <a class="btn-floating">
                      <i class="mdi-content-create">
                      </i>
                    </a>
                      
                    <a class="btn-floating red">
                      <i class="mdi-action-delete">
                      </i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    ConsoleTVs
                  </td>
                  <td>
                    ConsoleTVs@gmail.com
                  </td>
                  <td>
                    Standard
                  </td>
                  <td>
                    <a class="btn-floating">
                      <i class="mdi-action-perm-identity">
                      </i>
                    </a>
                    
                    <a class="btn-floating">
                      <i class="mdi-content-create">
                      </i>
                    </a>
                      
                    <a class="btn-floating red">
                      <i class="mdi-action-delete">
                      </i>
                    </a>
                      
                  </td>
                </tr>
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
