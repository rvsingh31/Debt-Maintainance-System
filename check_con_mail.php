<?php

	$c=$_GET["c"];
	$m=$_GET["m"];
	include('connection.php');
	
	$sql="select name from usersdb where contact='$c' and email='$m'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo "true";
	}
	else
	{
		echo "false";
	}
 
?>