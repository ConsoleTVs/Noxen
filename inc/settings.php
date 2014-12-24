<?php

//VERSION INFORMATION: v0.5

/*
 _   _                                _____ _           ___  ___          _                   _____                    _____                            _____ ___  ___ _____ 
| \ | |                              |_   _| |          |  \/  |         | |                 |  _  |                  /  ___|                          /  __ \|  \/  |/  ___|
|  \| | _____  _____ _ __    ______    | | | |__   ___  | .  . | ___   __| | ___ _ __ _ __   | | | |_ __   ___ _ __   \ `--.  ___  _   _ _ __ ___ ___  | /  \/| .  . |\ `--. 
| . ` |/ _ \ \/ / _ \ '_ \  |______|   | | | '_ \ / _ \ | |\/| |/ _ \ / _` |/ _ \ '__| '_ \  | | | | '_ \ / _ \ '_ \   `--. \/ _ \| | | | '__/ __/ _ \ | |    | |\/| | `--. \
| |\  | (_) >  <  __/ | | |            | | | | | |  __/ | |  | | (_) | (_| |  __/ |  | | | | \ \_/ / |_) |  __/ | | | /\__/ / (_) | |_| | | | (_|  __/ | \__/\| |  | |/\__/ /
\_| \_/\___/_/\_\___|_| |_|            \_/ |_| |_|\___| \_|  |_/\___/ \__,_|\___|_|  |_| |_|  \___/| .__/ \___|_| |_| \____/ \___/ \__,_|_|  \___\___|  \____/\_|  |_/\____/ 
                                                                                                   | |                                                                       
                                                                                                   |_|                                                                       
*/

//WEBSITE INFORMATION
$web_name = "Noxen"; // The main website name
$chars_min_text = 300; // The max characters that the post preview should get -> Recomended around 200-400

//DATABASE CONFIGURATION
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noxen";


//FILE SETTINGS
$post_page = "post.php"; // File where any full post is going to show
$login_page = "login.php"; // File where the users log-in (where the login form is located)
$post_login_page = "secured.php"; // File where the user gets redirected after he/she has logged in




//IMPORT SETTINGS FROM DATABASE ------- DO NOT MODIFY UNLESS YOU KNOW WHAT YOU'RE DOING!
try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

$statement = $conn->prepare("SELECT * FROM settings");
$statement->execute();
$row = $statement->fetch();

$default_type = $row['default_user_plan'];


?>