<?php 

//estalish connection
include('connection.php');

$sql="select name from usersdb";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
	$str="";
	while($row=mysqli_fetch_assoc($result))
	{
		$str.=$row["name"].",";
	}
}

echo $str;			


?>
