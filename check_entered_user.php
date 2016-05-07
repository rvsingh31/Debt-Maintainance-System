<?php
	
	$u=$_REQUEST["user"];
include('connection.php');
	$sql="select client_id from usersdb where name='$u'";
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
