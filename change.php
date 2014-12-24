<?php
require 'inc/settings.php';
require 'inc/core.php';

if(isset($_GET['f'])){
    $function = $_GET['f'];
} else {
    $_SESSION['msg'] = "toast('No function selected, try again!', 3000);";
    header("Location: index.php");
    die();
}

if(isset($_GET['s'])){
    $new_value = $_GET['s'];
} else {
    $_SESSION['msg'] = "toast('No function status selected, try again!', 3000);";
    header("Location: index.php");
    die();
}

$stmt = $conn->prepare("UPDATE settings SET $function=:new_value WHERE id='1'");
$stmt->execute(array(':new_value' => $new_value));

if($new_value == 1){
    $status = "Enabled";
} elseif ($new_value == 0){
    $status = "Disabled";
}

$function_text_semi = str_replace("_"," ",$function);

$function_text = ucfirst($function_text_semi);

$_SESSION['msg'] = "toast('$function_text -> $status!', 3000);";
$ref = $_SERVER['HTTP_REFERER'];
header("Location: $ref");

?>