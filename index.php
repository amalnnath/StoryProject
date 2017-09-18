<?php
    include_once("header.php");

    session_start();
 

      
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
                $_SESSION['id'] = $id;            } 
            else {
                echo "<div id='errorprompt'><p align='center'>Incorrect username and/or password</p></div>";
            }
        }

    }
?>
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
                    echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#success').modal('show');
                    });
                </script>";
                }
                else{
                    echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#fail').modal('show');
                    });
                </script>";
                }
            }
        }
    }
?>

<html>
	<head>
		<title>Home</title>
		<style>
			body {
				background-image: url("index.jpg");
				background-repeat: no-repeat;
				background-size: cover;
			}
			
			.loginBox {
				width:500px;
				height:500px;
				background-color:white;
				opacity:0.8;
				margin-left:30%;
				margin-top:10%;
			}
			
			.logo {
				width:500px;
				margin-top:20%;
				margin-left:20%;
			}
			
			.slogan{
				color:white;
				text-size:21px;
			}

			
		</style>
	</head>
	<body>
		<div class="col-sm-6">
			<img class="logo" src="logo.png">
		</div>
		<div class="col-sm-6">
		<div class="loginBox" style="padding-top:1%;">
		<center><div class="formText"><h3 align="center">Signup</h3>
		<h4 class="slogan">share your story</h4>
                <fieldset>
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <input class="form-control" placeholder="Username" name="user" type="username" autofocus></br>
                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus></br>
                        <input class="form-control" placeholder="Password" name="pass" type="password"></br>
                        <input class="form-control" placeholder="Retype Password" name="pass2" type="password"></br>
                       <input class="btn btn-primary" name="signup" type="submit" value="Signup">
                    </form>
                </fieldset>
                </center>
                <div class="navbar">
            <a data-target ="#login" data-toggle="modal">ALREADY A MEMBER?</a>
            </div>
                </div>
		</div>
		</div>
		
	</body>
	
	<div class="modal fade" id="login">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">
	        <p><center><h3>Login</h3>
                <fieldset>
                    <form action="login.php" method="post" enctype="multipart/form-data">
                        <input  class="form-control" placeholder="Username" type="username" name="username" type="text"></br>
                        <input  class="form-control" placeholder="Password" type="password" name="password" type="password"></br>
                        <input  class="btn btn-primary" name="login" type="submit" value="Login">
                        <footer class="clearfix">
                    </form>
                </fieldset><center></p>
	      </div>
	
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade" id="success">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">
	        <p><center>You have successfully signed up!</center></p>
	        <p><center><h3>Login</h3>
                <fieldset>
                    <form action="login.php" method="post" enctype="multipart/form-data">
                        <input  class="form-control" placeholder="Username" type="username" name="username" type="text"></br>
                        <input  class="form-control" placeholder="Password" type="password" name="password" type="password"></br>
                        <input  class="btn btn-primary" name="login" type="submit" value="Login">
                        <footer class="clearfix">
                    </form>
                </fieldset><center></p>
	      </div>
	
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade" id="success">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">
	        <p><center>Error in signing up. Please try again.</center></p>
	      </div>
	
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
</html>			