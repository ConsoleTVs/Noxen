<?php

session_start();

require 'inc/settings.php';

if(isset($_SESSION['login'])){
    if($_SESSION['login'] == true){
        header("Location: index.php");
    }
}

if(isset($_POST['user_set'])){
    $user_set = $_POST['user_set'];
    $pass_set = $_POST['pass_set'];

    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    
    $statement = $conn->prepare("SELECT * FROM admins WHERE username=:user_set");
    $statement->execute(array(':user_set' => $user_set));
    $row = $statement->fetch();
    $hash = $row['pass_hash'];
    $admin_id = $row['id'];
        
    if(password_verify($pass_set, $hash)) {
        $_SESSION['msg'] = "toast('Welcome back, $user_set!', 3000);";
        $_SESSION['login'] = true;
        $_SESSION['id'] = $admin_id;
        header("Location: index.php");
        die();
    } else {
        $login_msg = "Invalid account details";
        $_SESSION['msg'] = "toast('Wrong details, try again!', 3000);";
        
    }
}
?>
<!DOCTYPE html>
<html>
  <?php include 'inc/header.php' ?>
  
  <body>
      
      <div class="section fullDiv" id="home-page">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 center">
              <h1 class="header light center-on-small-only ">
                Noxen - CMS
              </h1>
              <h4 class ="light white-text lighten-4 center-on-small-only">
                Please login below
              </h4>
                <br><br>
            <div class="row">
              <div class="col l4 offset-l4 col m6 offset-m3 col s12">
                <div class="card-panel white">
                    <form method='POST'><br>
                        <span style='font-size: 20px;' class='light'>Administrator Login</span><br><br>
                        <?php if(isset($login_msg)){ echo "<span style='font-size: 15px; color: red;' class='light'>$login_msg</span><br>";} ?>
                        <div class="input-field">
                            <input style="display:none" type="text" name="fakeusernameremembered"/>
                          <input id="user_set" name="user_set" type="text" required>
                          <label for="user_set">
                            Username
                          </label>
                    </div><br>
                        <div class="input-field">
                            <input style="display:none" type="password" name="fakepasswordremembered"/>
                          <input id="pass_set" name="pass_set" type="password" required>
                          <label for="pass_set">
                            Password
                          </label>
                        </div>
                    <br>
                          <button class="btn waves-effect waves-light" type="submit" name="action">Login
    <i class="mdi-content-send right"></i>
  </button>
                    </form>
                </div>
              </div>
            </div>
          
            </div>
          </div>
        </div>
      </div>

      <!-- MUST INCLUDE THE FOOTER !-->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js">
      </script>
      <script type="text/javascript" src="js/materialize.js">
      </script>
      <script>
      <?php include 'inc/scripts.php' ?>a
      </script>
  </body>
</html>
