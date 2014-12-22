<?php
require 'inc/settings.php';
require 'inc/core.php';
if(isset($_GET['id'])){
    $sub_id = $_GET['id'];
    
    $statement = $conn->prepare("SELECT * FROM subs WHERE id=:sub_id");
    $statement->execute(array(':sub_id' => $sub_id));
    $row = $statement->fetch();
    $sub_email = $row['email'];
    
    $stmt = $conn->prepare("DELETE FROM subs WHERE id=:sub_id");
    $stmt->execute(array(':sub_id' => $sub_id));
    
    $_SESSION['msg'] = "toast('$sub_email has been deleted', 3000);";
    header("Location: subscribers.php");
    die();
} else {
    $_SESSION['msg'] = "toast('Please select a subscriber...', 3000);";
    header("Location: subscribers.php");
    die();
}

?>