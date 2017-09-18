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
    $likes = 0;
    $liked = 0;
    $sql2 = "SELECT * FROM likes WHERE id_likedContent='$article'";
    $query2 = mysqli_query($db, $sql2);
	    while($data=mysqli_fetch_assoc($query2)){
	    $likes++;
	    if($userid == $id_likerUser){
	    	$liked = 1;
	    	
	    }
	  } 
  
 if(isset($_POST['action'])){
 	if($liked != 1){
              $sql3 = "INSERT INTO likes VALUES ('','$userid','$article')";
              $query3 = mysqli_query($db, $sql3);
              echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#unset').modal('show');
                    });
                </script>";
                
            }
        }
?>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="http://evanhahn.com/wp-content/uploads/2011/08/nonselect.css">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5031903344792892",
    enable_page_level_ads: true
  });
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5031903344792892",
    enable_page_level_ads: true
  });
</script>
</script>
	</head>
	<body>
		<div style="margin-bottom:0%;"class="container">
			<div class="row"> 
				<div class="panel panel-default" style="margin-left:15%; margin-right:15%;">
					<div class="panel-body" style="margin-left:5%; margin-right:5%;">
						<?php 
							echo "<h1 align='center'>".$title."</h1><br>";
							echo "<p align='center'>Written By: ".$user2."</p><br>";
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
						?> 

						
					</div>
				</div>
			</div>
		</div>
		
		
		<div style="margin-bottom:5%;"class="container">
			<div class="row"> 
				<div class="panel panel-default" style="margin-left:15%; margin-right:15%;">
					<div class="panel-body" style="margin-left:5%; margin-right:5%;">
						<?php 
							echo "<p align='center'>Likes: ".$likes."</p>";
						?> 
						<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
						
						<input type="submit" name="action" value="Like">
						
						</form>
						
					</div>
				</div>
			</div>
		</div>

	</body>
</html>

<div class="modal fade" id="unset">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">
	        <p><center>You liked this post.</center></p>
	        <?php header("Refresh:0"); ?>
	        
	      </div>
	
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->