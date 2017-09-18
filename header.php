<?php
	session_start();
    if(isset($_SESSION['username'])) {
    	$user = $_SESSION['username'];
    	include_once("headerMember.php");
    }
    else{
    	include_once("headerGuest.php");
    }
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</html>	
