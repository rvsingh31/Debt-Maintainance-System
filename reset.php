<?php

session_start();
	$pass=$_POST["pwd"];
	
	include('connection.php');
	$name=$_SESSION["temp_uname"];
	$sql="update usersdb set password='$pass' where username='$name'";
	if(mysqli_query($conn,$sql))
	{
		echo "updated";
			session_destroy();
		header("location:forgotpwd.php?msg=Password reset complete! ");
	
	}
	else
	{
		echo "failed";
	}
	

?>