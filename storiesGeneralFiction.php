<?php
	include_once("header.php");
	include_once("db.php");
	$sql = "SELECT * FROM stories ORDER BY id DESC";
    $query = mysqli_query($db, $sql);  
    $cover_image = $data['cover'];

    

?>

<html>
	<head>
		<title>Stories</title>
	</head>
	<body>
		<div align="center"style="margin-bottom:5%;" class="container">
			<div class="row"> 
				<div class="panel panel-default">
					<div class="panel-body">
						<h1 align="center" style="font-weight:200;"> General Fiction </h1><br><br>
						<div style="margin-left">
							<div class='row'>
								<?php 
									while($data=mysqli_fetch_assoc($query)){
										if($data['genre'] == "General Fiction") {
							        		echo "<div align='center' class='col-md-2'>";
							        		echo "<img style='width:93px; height:128px;' src=".$data['cover'].">";
							        		echo "<br><br><a align='center' class='stories' href=article.php?story=".$data['id'].">".$data['title']."</a>";
							        		echo "<br><p style='font-weight:600;'align='center' class='stories' href=article.php?story=".$data['id'].">".$data['author']."</p>";
							        		echo "<p style='line-height:0;' align='center' class='stories' href=article.php?story=".$data['id'].">".$data['genre']."</p><br>";
							        		echo "</div>"; 
							        		}
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