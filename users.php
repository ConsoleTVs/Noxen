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
    <div id="modal1" class="modal">
        <h2>User Codes</h2>
        <b>All functions require <i>activate.php</i> located in noxen folder <code>&lt;?php require 'path/to/activate.php' ?&gt;</code></b><br><br>
        <h4>User Registration</h4>
        <p>To create a user registration using Noxen, just create a form in the page you want to have your registration page, and make sure you have the 'activate.php' file required in the page
        <br>
            
        The next step is to make sure the form elements have the following names<br><br>
        
        <b>Form</b>    
        <pre>method='POST'</pre>
        
        <b>Username Input</b>
        <pre>name='register_user_set'</pre>
        
        <b>Email Input</b>
        <pre>name='register_email_set'</pre>
        
        <b>Password Input</b>
        <pre>name='register_pass_set'</pre>
        
        <b>Repeat Password Input</b>
        <pre>name='register_repeat_pass_set'</pre>
        
        <b><i>Example</i></b>
        <pre>
&lt;?php require 'admin/activate.php' ?&gt;
&lt;html&gt;
    &lt;body&gt;
        &lt;form method='POST'&gt;
            &lt;input type='text' name='register_user_set' placeholder='Username'&gt;
            &lt;input type='password' name='register_pass_set' placeholder='Password'&gt;
            &lt;input type='password' name='register_repeat_pass_set' placeholder='Repeat Password'&gt;
            &lt;input type='email' name='register_email_set' placeholder='Email'&gt;
            &lt;input type='submit' value='Register'&gt;
        &lt;/form&gt;
    &lt;/body&gt;
&lt;/html&gt;
        </pre>
                <h4>User Login</h4>
        <p>To create a user login using Noxen, just create a form in the page you want to have your login page, and make sure you have the 'activate.php' file required in the page
        <br>
            
        The next step is to make sure the form elements have the following names<br><br>
        
        <b>Form</b>    
        <pre>method='POST'</pre>
        
        <b>Username Input</b>
        <pre>name='login_user_set'</pre>
        
        <b>Password Input</b>
        <pre>name='login_pass_set'</pre>

        <b><i>Example</i></b>
        <pre>
&lt;?php require 'admin/activate.php' ?&gt;
&lt;html&gt;
    &lt;body&gt;
        &lt;form method='POST'&gt;
            &lt;input type='text' name='login_user_set' placeholder='Username'&gt;
            &lt;input type='password' name='login_pass_set' placeholder='Password'&gt;
            &lt;input type='submit' value='Register'&gt;
        &lt;/form&gt;
    &lt;/body&gt;
&lt;/html&gt;
        </pre>
        
        <h4>Logout</h4>
        <p>To create a logout simple create a file and call it: logout.php
        <br>
            
        The next step is to make sure the file logout.php have the following text<br><br>
        
        <b>logout.php</b>    
        <pre>
&lt;?php
session_start();
session_destroy();
header("Location: /");
?&gt;
        </pre>
        After creating the file, just make sure you add a logout button somewhere and link it to logout.php
        </p>
        <a href="#" class="waves-effect btn-flat modal-close right">Close</a>
    </div>
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
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">
              <i class="mdi-action-settings-ethernet left">
              </i>
              Codes
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
