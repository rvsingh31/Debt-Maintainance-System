<?php

	$uname=$_GET["uname"];
	include('connection.php');
	
	$sql="select name from usersdb where username='$uname'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo "true";
		$row=mysqli_fetch_assoc($result);
		session_start();
		$_SESSION["temp_uname"]=$uname;
	}
	else
	{
		echo "false";
	}
?>