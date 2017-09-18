<?php
	$article=$_GET['story'];

	include_once("header.php");
	include_once("db.php");
	
	$sql = "SELECT * FROM stories WHERE id='$article' LIMIT 1";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);
    $story2 = $row['story'];
    $title = $row['title'];
    $user2 = $row['author'];
?>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="http://evanhahn.com/wp-content/uploads/2011/08/nonselect.css">
		<script type="text/javascript" src="http://platform-api.sharethis.com/js/sharethis.js#property=589bbcb38cb6e0001365b8a2&product=inline-share-buttons"></script>

	</head>
	<body>
		<div style="margin-bottom:0%;"class="container">
			<div class="row"> 
				<div class="panel panel-default" style="margin-left:15%; margin-right:15%;">
					<div class="panel-body" style="margin-left:5%; margin-right:5%;">
						<?php 
							echo "<h1 align='center'>".$title."</h1><br>";
							echo "<center><p>Written By:<a href=profile.php?author=".$user2."> ".$user2."</a></p><br></center>";
						?> 

						
					</div>
				</div>
			</div>
		</div>

<div style="margin-bottom:0%;"class="container">
			<div class="row"> 
				<div class="panel panel-default" style="padding-top: 2%; margin-left:15%; margin-right:15%;">
					<div class="panel-body" style="margin-left:5%; margin-right:5%;" >
						<?php 
							echo "<p>".nl2br($story2)."</p>";
							echo "<br><br>";
						
						if($user2 == $user){
					echo "<center><a href = 'articleEdit.php?story=".$article."'>Edit</a></center>";
					}
					?>
						
					</div>
				</div>
			</div>
		</div>
		
	
		<div style="margin-bottom:5%;"class="container">
			<div class="row"> 
				<div class="panel panel-default" style="padding-top: 0%; margin-left:15%; margin-right:15%;">
					<div class="panel-body" style="margin-left:5%; margin-right:5%;" >
					<center>					
					<div class="sharethis-inline-share-buttons"></div>
					</center>

						
					</div>
				</div>
			</div>
		</div>

<div id="343832536569904327" align="left" style="width: 100%; overflow-y: hidden;" class="wcustomhtml" unselectable="on"><link rel="stylesheet" type="text/css" href="http://evanhahn.com/wp-content/uploads/2011/08/nonselect.css" unselectable="on">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" unselectable="on"></script>
<script type="text/javascript" unselectable="on">$('html').addClass('nonselectable');</script>
<script type="text/javascript" src="http://evanhahn.com/wp-content/uploads/2011/08/nonselect.js" unselectable="on"></script></div>
	</body>
</html>