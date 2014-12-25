<?php
require 'inc/settings.php';
require 'inc/core.php';

if(isset($_GET['f'])){
    $function = $_GET['f'];
} else {
    $_SESSION['msg'] = "toast('No function selected, try again!', 3000);";
    header("Location: index.php");
    die();
}

if($_GET['f'] == "change_password"){
    if(isset($_GET['id'])){
        if($_SESSION['id'] == $_GET['id']){
            $id = $_SESSION['id'];
            $statement_admin = $conn->prepare("SELECT * FROM admins WHERE id=:id");
            $statement_admin->execute(array(':id' => $id));
            $row = $statement_admin->fetch();
            $admin_name = $row['username'];
            
            if($admin_name == 'admin'){
                $token = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
                $_SESSION['token'] = $token;
                header("Location: change_password.php?token=$token&id=$id");
                die();
            } else {
                $_SESSION['msg'] = "toast('You're not the admin!', 3000);";
                header("Location: index.php");
                die();
            }
        } else {
            $_SESSION['msg'] = "toast('You have no permission!', 3000);";
            header("Location: index.php");
            die(); 
        }
    } else {
        $_SESSION['msg'] = "toast('No user selected!', 3000);";
        header("Location: index.php");
        die();
    }
    die();
}

if(isset($_GET['s'])){
    $new_value = $_GET['s'];
} else {
    $_SESSION['msg'] = "toast('No function status selected, try again!', 3000);";
    header("Location: index.php");
    die();
}

if(!$_GET['token']){
    $_SESSION['msg'] = "toast('No token detected!', 3000);";
    header("Location: index.php");
    die();
}

if($_GET['token'] != $_SESSION['token']){
    $_SESSION['msg'] = "toast('Token missmatch!', 3000);";
    header("Location: index.php");
    die();
}

$stmt = $conn->prepare("UPDATE settings SET $function=:new_value WHERE id='1'");
$stmt->execute(array(':new_value' => $new_value));

if($new_value == 1){
    $status = "Enabled";
} elseif ($new_value == 0){
    $status = "Disabled";
}

$function_text_semi = str_replace("_"," ",$function);

$function_text = ucfirst($function_text_semi);

$_SESSION['msg'] = "toast('$function_text -> $status!', 3000);";
$ref = $_SERVER['HTTP_REFERER'];
header("Location: $ref");

?>