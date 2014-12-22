<?php
require 'inc/settings.php';
require 'inc/core.php';
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    
    $statement = $conn->prepare("SELECT * FROM users WHERE id=:user_id");
    $statement->execute(array(':user_id' => $user_id));
    $row = $statement->fetch();
    $user_name = $row['username'];
    
    $stmt = $conn->prepare("DELETE FROM users WHERE id=:user_id");
    $stmt->execute(array(':user_id' => $user_id));
    
    $_SESSION['msg'] = "toast('$user_name has been deleted', 3000);";
    header("Location: users.php");
    die();
} else {
    $_SESSION['msg'] = "toast('Please select a user...', 3000);";
    header("Location: users.php");
    die();
}

?>