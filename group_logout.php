
<?php 
	session_start();
	unset($_SESSION["goup_id"]);
	unset($_SESSION["group_name"]);
		header("location:select_event.php");
?>