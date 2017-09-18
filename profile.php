<?php

	$userProfile=$_GET['author'];
	include_once("headerMember.php");
	include_once("db.php");

	
	$sql = "SELECT * FROM users WHERE username='$userProfile' LIMIT 1";
            $query = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($query);
            $id = $row['id'];
            $db_password = $row['password'];
            $pic = $row['pic'];
            $bio = $row['bio'];


	$sql2 = "SELECT * FROM stories WHERE author='$userProfile' ORDER BY id DESC" ;
    $query2 = mysqli_query($db, $sql2);  
    $cover_image = $data['cover'];
	


if(isset($_POST['subpassword'])) {


            $opassword = md5($_POST['opassword']);
            $npassword = md5($_POST['npassword']);
            $cnpassword =md5($_POST['cnpassword']);
            $opassword = mysqli_real_escape_string($db, $opassword);
            $npassword = mysqli_real_escape_string($db, $npassword);
            $cnpassword = mysqli_real_escape_string($db, $cnpassword);
     
          if($opassword && $npassword && $cnpassword){
          		if($opassword == $db_password) {
          			if($opassword == $npassword) {

          				echo "<a data-toggle='modal' href='success'></a>";

          			}else{
		          		if($npassword == $cnpassword)
		          		{



		          			$sql = "UPDATE users SET password = '$npassword' WHERE username = '$user'";
		                    $query = mysqli_query($db, $sql);
		                    	echo "<script type='text/javascript'>
		                    $(document).ready(function(){
		                    $('#success').modal('show');
		                    });
		                </script>";

		          		}else{
		          			echo "<script type='text/javascript'>
		                    $(document).ready(function(){
		                    $('#match').modal('show');
		                    });
		                </script>";
		          		}

		          	}

				}else{
					echo "<script type='text/javascript'>
	                    $(document).ready(function(){
	                    $('#orig').modal('show');
	                    });
	                </script>";
				}

          }else{
          	echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#empty').modal('show');
                    });
                </script>";
          }
}

?>

<html>
	<head>
		<title><?php echo $userProfile; ?></title>
	</head>
	<body>

		<div height="100%"style="margin-bottom:0%;"class="container">
			<div class="row"> 
				<div class="panel panel-default" style="margin-left:25%; margin-right:25%; padding-bottom:2%;">
					<div class="panel-body">
				<center style="margin-bottom:0%;">
					<h1 style="font-weight:200;"><?php echo $userProfile; ?></h1><br>
					<?php echo "<img style='background-repeat: no-repeat;
    							background-position: 50%;
    							border-radius: 50%;
    							width: 128px;
    							height: 128px;' src=".$pic.">";?>
					</div>
				</div>
			</div>
		</div>
		
		
		<div height="100%"style="margin-bottom:0%;"class="container">
			<div class="row"> 
				<div class="panel panel-default" style="margin-left:25%; margin-right:25%; padding-bottom:2%;">
					<div class="panel-body">
				<center style="margin-bottom:0%;">
					<h1 style="font-weight:200;">Bio</h1><br>
					<?php echo $bio;?>
					</div>
				</div>
			</div>
		</div>


		<div align="center"style="margin-bottom:5%;" class="container">
			<div class="row"> 
				<div class="panel panel-default" style="margin-left:10%; margin-right:10%;" >
					<div class="panel-body">
						<h1 align="center" style="font-weight:200;"> Uploads </h1><br><br>
						<div style="margin-left">
							<div class='row'>
								<?php 
									while($data=mysqli_fetch_assoc($query2)){
						        		echo "<div align='center' class='col-md-2'>";
						        		echo "<img style='width:93px; height:128px;' src=".$data['cover'].">";
						        		echo "<br><br><a align='center' class='stories' href=article.php?story=".$data['id'].">".$data['title']."</a>";
						        		echo "<br><a style='font-weight:600;'align='center' class='stories' href=profile.php?author=".$data['author'].">".$data['author']."</a>";
						        		echo "<br><p align='center' class='stories' href=article.php?story=".$data['id'].">".$data['genre']."</p><br>";
						        		echo "</div>";
						        	} 
						        ?>
	        				</div>
	        			</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>	