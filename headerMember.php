<?php
	session_start();
    	$user = $_SESSION['username'];
    	$userid = $_SESSION['id'];

?>	
<html>
	<head>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		
	</head>

		<!-- This is the Navbar -->
	<div class="navbar navbar-xs navbar-inverse navbar-fixed-top">
		<div class = "container">
			<a href="#" class="navbar-brand">StoryProject</a>
				<div class = "collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a class="redir" href ="index.php">Home</a></li>
						<li class="dropdown">
						        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Stories
						        <span class="caret"></span></a>
						        <ul class="dropdown-menu">
						        
						          <li><a href="stories.php">All Content</a></li>
						          <li><a href="storiesAction.php">Action</a></li>
						          <li><a href="storiesAdventure.php">Adventure</a></li>
						          <li><a href="storiesChickLit.php">Chick Lit</a></li>
						          <li><a href="storiesClassics.php">Classics</a></li>
						          <li><a href="storiesFanFiction.php">Fan Fiction</a></li>
						          <li><a href="storiesGeneralFiction.php">General Fiction</a></li>
						          <li><a href="storiesHistoricalFiction.php">Historical Fiction</a></li>
						          <li><a href="storiesHorror.php">Horror</a></li>
						          <li><a href="storiesHumor.php">Humor</a></li>
						          <li><a href="storiesMystery.php">Mystery</a></li>
						          <li><a href="storiesNonFiction.php">Non-Fiction</a></li>
						          <li><a href="storiesParanormal.php">Paranormal</a></li>
						          <li><a href="storiesPoetry.php">Poetry</a></li>
						          <li><a href="storiesRandom.php">Random</a></li>
						          <li><a href="storiesRomance.php">Romance</a></li>
						          <li><a href="storiesScienceFiction.php">Science Fiction</a></li>
						          <li><a href="storiesShortStory.php">Short Story</a></li>
						          <li><a href="storiesSpiritual.php">Spiritual</a></li>
						          <li><a href="storiesTeenFiction.php">Teen Fiction</a></li>
						          <li><a href="storiesVampire.php">Vampire</a></li>
						        </ul>
						      </li>
						<li><a class="redir" href ="submit.php">Submit</a></li>
                        <li class="dropdown">
						        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $user;?>
						        <span class="caret"></span></a>
						        <ul class="dropdown-menu">
						         <li><a href="profilePersonal.php?author=<?php echo $user?>">Profile</a></li>
						         <li><a data-target ="#password" data-toggle="modal" >Change Password</a></li>
						         <li><a href="destroy.php">Logout</a></li>
						        </ul>
						      </li>
					</ul>
				</div>
		</div>
	</div>
	<!-- Navbar Ends Here-->

	<!-- This is the footer -->
	<div class ="navbar-default navbar-fixed-bottom">
		<div class="container">
			<p class="navbar-text">Copyright 	&copy; 2017 TheStoryProject. All rights reserved. Powered by Aphro Inc.</p>
		</div>
	</div>
</html>	

<div class="modal fade" id="password">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-body">

	        <center><p>This feature is currently unavailable.</p><!--<h1 style="font-weight:200;">Change Password</h1><br>
						<form action="profile.php" method="post" enctype="multipart/form-data">
	                        <input style="width:65%;" class="form-control" placeholder="Old Password" type="password" name="opassword"><br>
	                        <input style="width:65%;" class="form-control" placeholder="New Password" type="password" name="npassword"><br>
	                        <input style="width:65%;" class="form-control" placeholder="Confirm New Password" type="password" name="cnpassword"><br>
	                        <input class="btn btn-primary" name="subpassword" type="submit" value="Change Password">
	                        <footer class="clearfix">
                    	</form>-->      </center></div>
	
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	