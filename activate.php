<?php
session_start();
require 'inc/settings.php';
require 'lib/password.php';

if(isset($_POST['register_user_set'])){
    registerUser();
}

if(isset($_POST['login_user_set'])){
    loginUser();
}

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $stmt_check = $conn->prepare("SELECT * FROM settings WHERE id=1");
    $stmt_check->execute();
    $row = $stmt_check->fetch();
    $maintenance = $row['maintenance'];

    if($maintenance == 1){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<center><h1>WEBSITE UNDER MAINTENANCE</h1></center>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }

    if(isset($_SESSION['id'])){
        $stmt_data = $conn->prepare("SELECT * FROM users WHERE id=:user_id");
    $stmt_data->execute(array(':user_id' => $_SESSION['id']));
    $row = $stmt_data->fetch();
    $user_name = $row['username'];
    $user_email = $row['email'];
    $user_type = $row['type'];
    
    $stmt_data2 = $conn->prepare("SELECT * FROM plan WHERE id=:type");
    $stmt_data2->execute(array(':type' => $user_type));
    $row = $stmt_data2->fetch();
    $user_plan = $row['plan'];
    }

function loginUser() {
session_start();
require 'inc/settings.php';
require 'lib/password.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    
    $stmt2 = $conn->prepare("SELECT * FROM settings WHERE id=1");
    $stmt2->execute();
    $row = $stmt2->fetch();
    $allow_login = $row['allow_login'];
    
    if($allow_login == 0){
        die("LOGIN IS DISABLED BY THE ADMIN");
    }
    
    $pass_set_b = $_POST['login_pass_set'];
    $user_set_b = $_POST['login_user_set'];
    
    if($pass_set_b == ""){
        die("Please set a password");
    }
    
    if($user_set_b == ""){
        die("Please set a username");
    }
    
    $pass_set = strip_tags($pass_set_b);
    $user_set = strip_tags($user_set_b);
    

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=:user_set");
    $stmt->execute(array(':user_set' => $user_set));
    $row = $stmt->fetch();
    
    $pass_hash = $row['pass_hash'];
    $user_id = $row['id'];
    
    if (password_verify($pass_set, $pass_hash)) {
        $_SESSION['user_login'] = true;
        $_SESSION['id'] = $user_id;
        header("Location: $post_login_page");
    } else {
        /*--------------------------EDITABLE HTML--------------------------*/
        echo '<h4>Invalid password</h4>';
        /*--------------------------EDITABLE HTML--------------------------*/
        die();
    }
    
    
    
    die();
    
}

function registerUser() {
session_start();
require 'inc/settings.php';
require 'lib/password.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    
    $pass_set_b = $_POST['register_pass_set'];
    $repeat_pass_set_b = $_POST['register_repeat_pass_set'];
    $user_set_b = $_POST['register_user_set'];
    $email_set_b = $_POST['register_email_set'];
    
    if($pass_set_b == ""){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<h4>Please set a password</h4>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }
    
    if($repeat_pass_set_b == ""){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<h4>Please repeat the password</h4>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }
    
    if($user_set_b == ""){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<h4>Please set a username</h4>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }
    
    if($email_set_b == ""){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<h4>Please set an email</h4>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }
    
    if($pass_set_b != $repeat_pass_set_b){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<h4>Passwords do not match</h4>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }
    
    $pass_set = strip_tags($pass_set_b);
    $repeat_pass_set = strip_tags($repeat_pass_set_b);
    $user_set = strip_tags($user_set_b);
    $email_set = strip_tags($email_set_b);
    
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=:user_set");
    $stmt->execute(array(':user_set' => $user_set));
    $row = $stmt->fetch();
    if($row['username'] != ""){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<h4>The user already exists</h4>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }
    
    $stmt2 = $conn->prepare("SELECT * FROM users WHERE email=:email_set");
    $stmt2->execute(array(':email_set' => $email_set));
    $stmt2->execute();
    $row = $stmt2->fetch();
    if($row['email'] != ""){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<h4>The email already exists</h4>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }
    
    
    $pass_hash = password_hash($pass_set, PASSWORD_BCRYPT);
    
    $statement = $conn->prepare("INSERT INTO users (username, pass_hash, email, type) VALUES (:user_set, :pass_hash, :email_set, :type)");
    $statement->bindParam(':user_set', $user_set);
    $statement->bindParam(':pass_hash', $pass_hash);
    $statement->bindParam(':email_set', $email_set);
    $statement->bindParam(':type', $default_type);
    $statement->execute();
    echo "Redirecting...";
    echo "<META http-equiv='refresh' content='2;URL=$login_page'>";
    echo "<script type=\"text/javascript\">";
    echo "alert(\"Registation Complete!\")";
    echo "</script>";
    die();
    
}

function showPosts() {
session_start();
require 'inc/settings.php';
require 'lib/password.php';

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    
    $stmt_check = $conn->prepare("SELECT * FROM settings WHERE id=1");
    $stmt_check->execute();
    $row = $stmt_check->fetch();
    $hide_all_posts = $row['hide_all_posts'];

    if($hide_all_posts == 1){
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<h4>Posts are currently hidden, please check back later</h4>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }
    
    $statement = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
    $statement->execute();
    while($row = $statement->fetch()){
        
        $full_text = $row['text'];
        $text = str_replace("</p>","",$full_text);
        $min_text = substr($text,0,$chars_min_text).'...</p>';
        
        // You can edit the HTML below, just remember that:
        
        /*
        $row['header'] -> Will output the post header
        $row['date'] -> Will output the post date
        $row['id'] -> Will output the post id (You need it when redirecting to the post page)
        $row['text'] -> Will output the FULL post text
        $min_text -> Will output the 300 first charachers of the full post text
        */
        
        /*--------------------------EDITABLE HTML--------------------------*/
        
        echo "<h1>".$row['header']." <small style='font-size: 25px;'><i>".$row['date']."</i></small></h1>
              <h4>".$min_text."</h4> 
              <div style='text-align:right'>
              <a href='".$post_page."?id=".$row['id']."'>Read More</a>
              </div>
              <br>";
        
        /*--------------------------EDITABLE HTML--------------------------*/
    }
}

function showPost() {
    session_start();
    if(isset($_GET['id'])){
        $post_id = $_GET['id'];
        require 'inc/settings.php';
        require 'lib/password.php';

        try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
                catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }

        $stmt_check = $conn->prepare("SELECT * FROM settings WHERE id=1");
        $stmt_check->execute();
        $row = $stmt_check->fetch();
        $hide_all_posts = $row['hide_all_posts'];
        $all_posts_message = $row['all_posts_message'];

        if($hide_all_posts == 1){
            /*--------------------------EDITABLE HTML--------------------------*/
            die("<h4>Posts are currently hidden, please check back later</h4>");
            /*--------------------------EDITABLE HTML--------------------------*/
        }
        
        $statement = $conn->prepare("SELECT * FROM posts WHERE id=:post_id");
        $statement->execute(array(':post_id' => $post_id));
        while($row = $statement->fetch()){

        $full_text = $row['text'];
        
        
        // You can edit the HTML below, just remember that:
        
        /*
        $row['header'] -> Will output the post header
        $row['date'] -> Will output the post date
        $row['id'] -> Will output the post id (You need it when redirecting to the post page)
        $row['text'] or $full_text -> Will output the FULL post text
        */
        
        /*--------------------------EDITABLE HTML--------------------------*/
        
        echo "<h1>".$row['header']." <small style='font-size: 25px;'><i>".$row['date']."</i></small></h1>
              <h4>".$all_posts_message.$full_text."</h4>";
        
        /*--------------------------EDITABLE HTML--------------------------*/
        }
    } else {
        /*--------------------------EDITABLE HTML--------------------------*/
        echo "<h4>No post selected</h4>";
        //If you wish to redirect the user if he/she has not selected any post you can add the following text instead: header('Location: $post_page');
        /*--------------------------EDITABLE HTML--------------------------*/
    }
}

function showLastPost() {
    session_start();
        require 'inc/settings.php';
        require 'lib/password.php';

        try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
                catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }

        $stmt_check = $conn->prepare("SELECT * FROM settings WHERE id=1");
        $stmt_check->execute();
        $row = $stmt_check->fetch();
        $hide_all_posts = $row['hide_all_posts'];
        $all_posts_message = $row['all_posts_message'];

        if($hide_all_posts == 1){
            /*--------------------------EDITABLE HTML--------------------------*/
            die("<h4>Posts are currently hidden, please check back later</h4>");
            /*--------------------------EDITABLE HTML--------------------------*/
        }
        
        $statement = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
        $statement->execute();
        $row = $statement->fetch();

        $full_text = $row['text'];
        
        
        // You can edit the HTML below, just remember that:
        
        /*
        $row['header'] -> Will output the post header
        $row['date'] -> Will output the post date
        $row['id'] -> Will output the post id (You need it when redirecting to the post page)
        $row['text'] or $full_text -> Will output the FULL post text
        */
        
        /*--------------------------EDITABLE HTML--------------------------*/
        
        echo "<h1>".$row['header']." <small style='font-size: 25px;'><i>".$row['date']."</i></small></h1>
              <h4>".$all_posts_message.$full_text."</h4>";
        
        /*--------------------------EDITABLE HTML--------------------------*/
        
    
}
?>