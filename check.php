<?php
if(isset($_POST['test'])){
    die("GOOD");
}
echo "<form method='POST'><input type='text' name='test'><input type='submit'></form>";
?>