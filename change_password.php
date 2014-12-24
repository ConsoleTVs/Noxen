<?php include 'inc/settings.php' ?>
<?php include 'inc/core.php' ?>
<?php
    
if(isset($_POST['new_password'])){
    
   if($_SESSION['token'] != $_GET['token']){
    $_SESSION['msg'] = "toast('Token missmatch, please try again!', 3000);";
    header("Location: index.php");
    die();
}
$id = $_GET['id'];

if($_SESSION['id'] != $_GET['id']){
    $_SESSION['msg'] = "toast('ID missmatch, please try again!', 3000);";
    header("Location: index.php");
    die();
}
$id = $_GET['id'];
$statement_admin2 = $conn->prepare("SELECT * FROM admins WHERE id=:id");
$statement_admin2->execute(array(':id' => $id));
$row = $statement_admin2->fetch();
$admin_name = $row['username'];


if($admin_name != 'admin'){
    $_SESSION['msg'] = "toast('You're not the admin!', 3000);";
    header("Location: index.php");
    die();
}
    
    $new_password = $_POST['new_password'];
    
    $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);
    
    $statement_admin3 = $conn->prepare("UPDATE admins SET pass_hash=:new_password_hash WHERE id=:id");
    $statement_admin3->bindParam(':id', $id);
    $statement_admin3->bindParam(':new_password_hash', $new_password_hash);
    $statement_admin3->execute();
    
    unset($_SESSION['login']);
    unset($_SESSION['id']);
    unset($_SESSION['token']);
    
    $_SESSION['msg'] = "toast('Password changed, please re-login!', 3000);";
    header("Location: login.php");
    die();
}
    
if($_SESSION['token'] != $_GET['token']){
    $_SESSION['msg'] = "toast('Token missmatch, please try again!', 3000);";
    header("Location: index.php");
    die();
}
$id = $_GET['id'];

if($_SESSION['id'] != $_GET['id']){
    $_SESSION['msg'] = "toast('ID missmatch, please try again!', 3000);";
    header("Location: index.php");
    die();
}
$id = $_GET['id'];
$statement_admin2 = $conn->prepare("SELECT * FROM admins WHERE id=:id");
$statement_admin2->execute(array(':id' => $id));
$row = $statement_admin2->fetch();
$admin_name = $row['username'];


if($admin_name != 'admin'){
    $_SESSION['msg'] = "toast('You're not the admin!', 3000);";
    header("Location: index.php");
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
            <div class="col s12 m12">
              <h1 class="header light center">
                Change Password
              </h1>
              <h4 class ="light white-text lighten-4 center">
                Token: <?php echo $_GET['token']; ?>
              </h4>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          
            <div class='col s12 m12 l12'>
                <h1 class='light flow-text' style='font-size: 40px;'>Your new password:</h1><br>
                <form method='POST'>
                    <div class="input-field col s6">
                        <input id="header" name='new_password' id='new_password' type="password" required>
                        <label for="header">New Password</label>
                    </div><br><br>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Change Password
                        <i class="mdi-content-send right"></i>
                    </button>
                </form>
              <br>

    </div>
    
  </div>
  <?php include 'inc/footer.php' ?>
      </div>

      <!-- MUST INCLUDE THE FOOTER !-->
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
