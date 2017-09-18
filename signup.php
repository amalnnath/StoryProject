<?php
    session_start();
 
    if(isset($_POST['signup'])) {
        include_once("db.php");
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $email = $_POST['email'];
       
        $user = mysqli_real_escape_string($db, $user);
        $pass = mysqli_real_escape_string($db, $pass);
        $pass2 = mysqli_real_escape_string($db, $pass2);
        $email = mysqli_real_escape_string($db, $email);
        date_default_timezone_set('US/Eastern');
        $sql = "SELECT * FROM users WHERE username='$user' LIMIT 1";
        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($query);
        $id = $row['id'];
        $db_user = $row['username'];
        $date=date("Y-m-d H:i:s");
        if($user == $db_user) {
            echo "Username taken, please try again!";
        }
        else{

            if ($user && $pass && $pass2) {

                if ($pass == $pass2) {
                    
                    $pass=md5($pass);
                    $sql = "INSERT INTO users VALUES ('','$user','$pass','$email','$date','http://storyproject.ca/avatar/avatar1.png','')";
                    $query = mysqli_query($db, $sql);
                    echo "Sign up sucessful! You may now log in.";
                }
                else{
                    echo "Error in signing you up...";
                }
            }
        }
    }
?>
