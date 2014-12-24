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
?>