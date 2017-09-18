<?php
    session_start();
 
    if(isset($_SESSION['username'])) {
            header("Location: index.php");
    }
    else{
      
        if(isset($_POST['login'])) {
            include_once("db.php");
            $username = $_POST['username'];
            $password = $_POST['password'];
           
            $username = mysqli_real_escape_string($db, $username);
            $password = mysqli_real_escape_string($db, $password);
     
            $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
            $query = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($query);
            $id = $row['id'];
            $db_password = $row['password'];

     if($username && $password){
            if(md5($password) == $db_password) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;            
                header( 'Location: stories.php' ) ;
                } 
            else {
                echo "<div id='errorprompt'><p align='center'>Incorrect username and/or password</p></div>";
            }
        }
}
    }
?>
 