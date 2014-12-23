<?php
require 'inc/settings.php';
require 'inc/core.php';
if(isset($_GET['id'])){
    $post_id = $_GET['id'];
    
    $stmt = $conn->prepare("DELETE FROM posts WHERE id=:post_id");
    $stmt->execute(array(':post_id' => $post_id));
    
    $_SESSION['msg'] = "toast('Post #$post_id has been deleted', 3000);";
    header("Location: post_edit.php");
    die();
} else {
    $_SESSION['msg'] = "toast('Please select a post...', 3000);";
    header("Location: post_edit.php");
    die();
}

?>