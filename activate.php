<?php

function showPosts() {
    
    require 'inc/settings.php';
require 'lib/password.php';





try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    
    $statement = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
    $statement->execute();
    while($row = $statement->fetch()){
        
        $full_text = $row['text'];
        $text = str_replace("</p>","",$full_text);
        $min_text = substr($text,0,200).'...</p>';
        
        // You can edit the HTML below, just remember that:
        
        /*
        $row['header'] -> Will output the post header
        $row['date'] -> Will output the post date
        $row['id'] -> Will output the post id (You need it when redirecting to the post page)
        $row['text'] -> Will output the FULL post text
        $min_text -> Will output the 200 first charachers of the full post text
        */
        
        
        echo "<h1>".$row['header']." <small style='font-size: 25px;'><i>".$row['date']."</i></small></h1>
              <h4>".$min_text."</h4> 
              <div style='text-align:right'>
              <a href='".$post_page."?id=".$row['id']."'>Read More</a>
              </div>
              <br>";   
    }
}

function showPost() {
    if(isset($_GET['id'])){
        $post_id = $_GET['id'];
        require 'inc/settings.php';
require 'lib/password.php';





try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
        
    $statement = $conn->prepare("SELECT * FROM posts WHERE id=:post_id");
    $statement->execute(array(':post_id' => $post_id));
    while($row = $statement->fetch()){
        
        $full_text = $row['text'];
        
        // You can edit the HTML below, just remember that:
        
        /*
        $row['header'] -> Will output the post header
        $row['date'] -> Will output the post date
        $row['id'] -> Will output the post id (You need it when redirecting to the post page)
        $row['text'] or $full_text -> Will output the FULL post text
        */
        
        echo "<h1>".$row['header']." <small style='font-size: 25px;'><i>".$row['date']."</i></small></h1>
              <h4>".$full_text."</h4>";
    }
    } else {
        echo "<h4>No post selected</h4>";
        //If you wish to redirect the user if he/she has not selected any post you can add the following text instead: header('Location: $post_page');
    }
}
?>