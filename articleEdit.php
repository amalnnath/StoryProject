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
    
    if(isset($_POST['newStorySubmit'])) {

	$newStory = $_POST['newStory'];
	$sqlStory = "UPDATE stories SET story='$newStory' WHERE id='$article' LIMIT 1";
	$query = mysqli_query($db, $sqlStory);
	 echo "<script type='text/javascript'>
                    $(document).ready(function(){
                    $('#update').modal('show');
                    });
                </script>";
	
}
    
?>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="http://evanhahn.com/wp-content/uploads/2011/08/nonselect.css">
		<script type="text/javascript" src="http://platform-api.sharethis.com/js/sharethis.js#property=589bbcb38cb6e0001365b8a2&product=inline-share-buttons"></script>
		
	</head>
	<body>
	<form style="margin-right:3%;" action="#" method="post" enctype="multipart/form-data">
	

<div style="margin-bottom:0%;"class="container">
			<div class="row"> 
				<div class="panel panel-default" style="padding-top: 2%; margin-left:15%; margin-right:15%;">
					<div class="panel-body" style="margin-left:5%; margin-right:5%;" >
					<input style="background-color: #fafafa;" maxlength="25" class="form-control" value="<?php echo $title; ?>" name="title" type="text" autofocus>	
					<br>
	                            <textarea style="background-color: #fafafa; resize:none" rows="50" cols="50" class="form-control" name="newStory" type="text"><?php echo $story2; ?></textarea>
	                            <br>
	                            <input  class="btn btn-primary" name="newStorySubmit" type="submit" value="Submit">
	                            <br>
	                       
						
					</div>
				</div>
			</div>
		</div>
		

 </form>

	</body>
</html>

<div class="modal fade" id="update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p><center>Your story has been updated! Check out the changes <a href="article.php?story=<?php echo $article?>">here</a>.<center></p>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
