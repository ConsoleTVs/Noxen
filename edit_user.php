<?php include 'inc/settings.php' ?>
<?php include 'inc/core.php' ?>
<?php
if(isset($_GET['id'])){
    $user_edit_id = $_GET['id'];
    $statement_edit_user = $conn->prepare("SELECT * FROM users WHERE id=:user_id");
    $statement_edit_user->execute(array(':user_id' => $user_edit_id));
    $row = $statement_edit_user->fetch();
    $user_edit_email = $row['email'];
    $user_edit_id = $row['id'];
    $user_edit_username = $row['username'];
    $user_edit_type = $row['type'];
    
    $statement_edit_user = $conn->prepare("SELECT * FROM plan WHERE id=:type_id");
    $statement_edit_user->execute(array(':type_id' => $user_edit_type));
    $row = $statement_edit_user->fetch();
    $user_edit_plan = $row['plan'];
    
} else {
    $_SESSION['msg'] = "toast('No user ID set', 3000);";
    header("Location: users.php");
    die();
}

if(isset($_POST['action'])){
    $email_set = $_POST['email_set'];
    $plan_set = $_POST['plan_set'];
    $token = $_POST['token'];
    if($_POST['token'] != $_SESSION['token']){
        $_SESSION['msg'] = "toast('Token missmatch!', 3000);";
        header("Location: index.php");
        die();
    }
    
    $statement_edit_user_s = $conn->prepare("UPDATE users SET email=:email_set WHERE id=:user_id");
    $statement_edit_user_s->bindParam(':email_set', $email_set);
    $statement_edit_user_s->bindParam(':user_id', $user_edit_id);
    $statement_edit_user_s->execute();
    
    $statement_edit_user_s2 = $conn->prepare("UPDATE users SET type=:plan_set WHERE id=:user_id");
    $statement_edit_user_s2->bindParam(':plan_set', $plan_set);
    $statement_edit_user_s2->bindParam(':user_id', $user_edit_id);
    $statement_edit_user_s2->execute();
    
    $_SESSION['msg'] = "toast('$user_edit_username updated', 3000);";
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
            <div class="col s12 m12">
              <h1 class="header light">
                Editing user
              </h1>
              <h4 class ="light white-text lighten-4">
                <b><?php echo $user_edit_username; ?></b>
              </h4>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          
            <div class='col s12 m12 l12'>
                <form method='POST'>
                    <input style="display: none;" type="text" name='token' value="<?php echo $_SESSION['token']; ?>">
                    <h1 class='light flow-text' style='font-size: 40px;'>User Information:</h1><br>
                    <div class="input-field col s6">
        <input id="email_set" name='email_set' type="email" value="<?php echo $user_edit_email; ?>" class="validate">
        <label for="email_set">User email</label>
      </div>
                    <div class="input-field col s6">
        <span>User Plan:</span>
<select name='plan_set' class="disabled">
    <?php
    $count = "0";
    $statement_plan = $conn->prepare("SELECT * FROM plan ORDER BY id ASC");
    $statement_plan->execute();
    while($row = $statement_plan->fetch()){
        $count++;
        $plan = $row['plan'];
        if($row['id'] == $user_edit_type){
            echo "<option value='$count' selected>$plan</option>";
        } else {
            echo "<option value='$count'>$plan</option>";
        }
    }
    
    ?>
</select><br>
<button class="btn waves-effect waves-light right" type="submit" name="action">Save
    <i class="mdi-content-send right"></i>
</button>
      </div>
                  
                <br>
                </form>

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
