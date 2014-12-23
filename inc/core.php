<?php
session_start();
if(isset($_SESSION['login'])){
    
} else {
    if($_SESSION['login'] == false){
        header("Location: login.php");
    }
}

require './lib/password.php';

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

?>