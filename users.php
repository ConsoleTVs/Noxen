<?php include 'inc/settings.php' ?>
<?php include 'inc/core.php' ?>
<?php
if(isset($_POST['plan_set'])){
    $default_user_plan_set = $_POST['plan_set'];
    
    $statement_plan_update = $conn->prepare("UPDATE settings SET default_user_plan=:default_user_plan_set");
    $statement_plan_update->execute(array(':default_user_plan_set' => $default_user_plan_set));
    
    $statement_plan_update_text = $conn->prepare("SELECT * FROM plan WHERE id=:default_user_plan_set");
    $statement_plan_update_text->execute(array(':default_user_plan_set' => $default_user_plan_set));
    $row = $statement_plan_update_text->fetch();
    $default_user_plan_text = $row['plan'];
    
    $_SESSION['msg'] = "toast('Default user plan is now $default_user_plan_text', 3000);";
    header("Location: users.php");
    die();
}
if(isset($_POST['create_user'])){
    $create_user_username = $_POST['create_user_username'];
    $create_user_password = $_POST['create_user_password'];
    $create_user_email = $_POST['create_user_email'];
    $create_user_type = $_POST['create_user_type'];
    
    $create_user_password_hash = password_hash($create_user_password, PASSWORD_BCRYPT);
    
    $statement_create_user = $conn->prepare("INSERT INTO users (username, pass_hash, email, type) VALUES (:username, :password, :email, :type)");
    $statement_create_user->bindParam(':username', $create_user_username);
    $statement_create_user->bindParam(':password', $create_user_password_hash);
    $statement_create_user->bindParam(':email', $create_user_email);
    $statement_create_user->bindParam(':type', $create_user_type);
    $statement_create_user->execute();

    
    $_SESSION['msg'] = "toast('User $create_user_username created', 3000);";
    header("Location: users.php");
    die();
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
        After creating the file, just make sure you add a logout button somewhere and link it to logout.php<br><br>
        
        <h4>Secure a page #1</h4>
        <p>To secure a page and only allow to view it to registered users, use the following code:<br><br>
        
        <b>Secure #1 (Only registered members)</b>
        <pre>
&lt;?php
require 'path/to/secured.php';
?&gt;
        </pre>
        Make sure you link the file correctly, the file 'secure.php' is included in noxen's folder<br><br>
        
        <h4>Secure a page #2</h4>
        <p>To secure a page and only allow to view it to a specific members, use the following code:<br><br>
        
        <b>Secure #2 (Only specified group)</b>
        <pre>
&lt;?php
$allowed_group = 1;
require 'path/to/only.php';
?&gt;
        </pre>
        Make sure you link the file correctly, the file 'only.php' is included in noxen's folder, then just change the number (x) in: "$allowed_group = x" for the group you want to allow access to.<br><br>
        <h4>User variables</h4>
        <p>To recive some user variables use the following created variables:
        <br><br>
        <b>Username</b>    
        <pre>
&lt;?php echo $user_name; ?&gt;
        </pre>
        <b>User email</b>    
        <pre>
&lt;?php echo $user_email; ?&gt;
        </pre>
        <b>User type (plan) (id number)</b>    
        <pre>
&lt;?php echo $user_type; ?&gt;
        </pre>
        <b>User plan (text)</b>    
        <pre>
&lt;?php echo $user_plan; ?&gt;
        </pre>
        </p>
      
        <a href="#" class="waves-effect btn-flat modal-close right">Close</a>
    </div>
    
    
    
    
    
    
    
    
    <div id="modal3" class="modal">
   
        <div class="row">

  <form method="POST" class="col s12">
    <div class="row">
        <h2>Create new user</h2>
                
        <h4>User details</h4><br>
      <div class="input-field col s6">
          <input style="display:none" type="text" name="fakeusernameremembered"/>
        <input id="username" name="create_user_username" type="text" class="validate">
        <label for="username">Username</label>
      </div>
      <div class="input-field col s6">
          <input style="display:none" type="password" name="fakepasswordremembered"/>
        <input id="password" name="create_user_password" type="password" class="validate">
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input id="email" name="create_user_email" type="email" class="validate">
        <label for="email">Email</label>
      </div>
    </div>
      
      
       <div class="row">
      <div class="col s6">
      
      <label for="create_user_type">User Plan</label>
      <select name='create_user_type' >
    <?php
    $statement_plan_default = $conn->prepare("SELECT * FROM settings");
    $statement_plan_default->execute();
    $row = $statement_plan_default->fetch();
    $default_user_plan = $row['default_user_plan'];


    $count = "0";
    $statement_plan = $conn->prepare("SELECT * FROM plan ORDER BY id ASC");
    $statement_plan->execute();
    while($row = $statement_plan->fetch()){
        $count++;
        $plan = $row['plan'];
        if($row['id'] == $default_user_plan){
            echo "<option value='$count' selected>$plan</option>";
        } else {
            echo "<option value='$count'>$plan</option>";
        }
    }
    
    ?>
</select>
          <br>
      </div>
       <div class="input-field col s6">
      <br><br>
        <button class="btn waves-effect waves-light right" type="submit" name="create_user">Create User
            <i class="mdi-content-send right"></i>
        </button>
           
      </div>
    </div>
      
  </form>
</div>
        
        
        
    <a href="#" class="waves-effect btn-flat modal-close right">Close</a>
    </div>
    
    
    
    
    
    
    
<div id="modal2" class="modal">
      <div class="row">
           <div class='col l6'>
    <h2>User Settings</h2>
        <h4>User default plan</h4>
        <p>
            <form method="POST">
              
                   
            <label for="plan_set">User Plan</label>
<select name='plan_set' >
    <?php
    $statement_plan_default = $conn->prepare("SELECT * FROM settings");
    $statement_plan_default->execute();
    $row = $statement_plan_default->fetch();
    $default_user_plan = $row['default_user_plan'];


    $count = "0";
    $statement_plan = $conn->prepare("SELECT * FROM plan ORDER BY id ASC");
    $statement_plan->execute();
    while($row = $statement_plan->fetch()){
        $count++;
        $plan = $row['plan'];
        if($row['id'] == $default_user_plan){
            echo "<option value='$count' selected>$plan</option>";
        } else {
            echo "<option value='$count'>$plan</option>";
        }
    }
    
    ?>
</select><br>
<button class="btn waves-effect waves-light" type="submit" name="action">Set default group
    <i class="mdi-content-send right"></i>
</button>
          </div>  </div>
                    </form>
        </p>
        <a href="#" class="waves-effect btn-flat modal-close right">Close</a>
</div>

      <div class="container">
        <div class="row">
          
          <div class='col s12 m12  l12'>
            <a class="waves-effect waves-light btn modal-trigger" href="#modal3">
              <i class="mdi-content-add left">
              </i>
              Create New User
            </a>
              
            <a class="waves-effect waves-light btn modal-trigger" href="#modal2">
              <i class="mdi-action-settings left">
              </i>
              User Settings
            </a>
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">
              <i class="mdi-action-settings-ethernet left">
              </i>
              Codes
            </a>
            <a href='https://github.com/ConsoleTVs/Noxen/' class="waves-effect waves-light btn">
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
