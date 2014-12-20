<?php
session_start();
if(isset($_SESSION['login'])){
    
} else {
    if($_SESSION['login'] == false){
        header("Location: login.php");
    }
}

require './lib/password.php';

require 'db_connect.php';

?>