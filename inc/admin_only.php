<?php
    $admin_id = $_SESSION['id'];
    $statement_admin = $conn->prepare("SELECT * FROM admins WHERE id=:admin_id");
    $statement_admin->execute(array(':admin_id' => $admin_id));
    $row = $statement_admin->fetch();
    $admin_username = $row['username'];

    if($admin_username == "admin"){
        $admin = true;
    } else {
        $admin = false;
    }
if($admin == false){
        $_SESSION['msg'] = "toast('You are not the admin', 3000);";
        header("Location: index.php");
        die();
}
?>