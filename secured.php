<?php
session_start();
if($_SESSION['user_login'] == false){
    if(isset($login_page)){
        header("Location: $login_page");
    } else {
        header("Location: /");
    }
    die();
} else {
    $stmt_data = $conn->prepare("SELECT * FROM users WHERE id=:user_id");
    $stmt_data->execute(array(':user_id' => $_SESSION['u_id']));
    $row = $stmt_data->fetch();
    $user_name = $row['username'];
    $user_email = $row['email'];
    $user_type = $row['type'];
    
    $stmt_data2 = $conn->prepare("SELECT * FROM plan WHERE id=:type");
    $stmt_data2->execute(array(':type' => $user_type));
    $row = $stmt_data2->fetch();
    $user_plan = $row['plan'];
}
?>