<?php
session_start();
if($_SESSION['user_login'] == false){
    if(isset($login_page)){
        header("Location: $login_page");
    } else {
        header("Location: /");
    }
    die();
}

    if(isset($allowed_plan)){
        $user_id = $_SESSION['u_id'];
        $stmt_check_plan_type = $conn->prepare("SELECT * FROM users WHERE id=:user_id");
        $stmt_check_plan_type->execute(array(':user_id' => $user_id));
        $row = $stmt_check_plan_type->fetch();
        $user_plan = $row['type'];

        if($user_plan != $allowed_plan){
            /*--------------------------EDITABLE HTML--------------------------*/
            die("<center><h1>You're not allowed to view this page, please go back</h1></center>");
            /*--------------------------EDITABLE HTML--------------------------*/
        }   
    } else {
        /*--------------------------EDITABLE HTML--------------------------*/
        die("<center><h1>THE WEBMASTER MUST ADD THE ALLOWED GROUP ID</h1></center>");
        /*--------------------------EDITABLE HTML--------------------------*/
    }

?>