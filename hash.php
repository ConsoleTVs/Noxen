<?php

session_start();
if(isset($_SESSION['hash'])){
    echo "Tu Hash es: ".$_SESSION['hash'];
    echo "<br>";
}

if(isset($_POST['pass'])){
    $pass = $_POST['pass'];
    $hash = password_hash($pass, PASSWORD_BCRYPT);
    $_SESSION['hash'] = $hash;
    header("Location: hash.php");
    die();
}
if(isset($_POST['v_pass'])){
    $v_pass = $_POST['v_pass'];
    $hash = $_SESSION['hash'];
if (password_verify($v_pass, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
}
   
?>
<html>
<body>
<form method='POST'>
    <p>Pass:</p>
    <input type='text' id='pass' name='pass'>
    <input type='submit'>
</form>
<form method='POST'>
    <p>Verificar Pass:</p>
    <input type='text' id='v_pass' name='v_pass'>
    <input type='submit'>
</form> 
</body>
</html>