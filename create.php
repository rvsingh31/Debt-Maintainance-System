<?php 
session_start();
$count=$_GET["no_of_members"];
	$users_array=array();
	for($i=0;$i<$count;$i++)
	{
		$var="user".($i+1);
		array_push($users_array,$_GET[$var]);
		echo $var;
	}
	array_push($users_array,$_SESSION["client_name"]);
	echo $_SESSION["client_name"];
	$group_name=$_GET["group_name"];
	
	$userid_arr=array();
	
	include('connection.php');
	/*
		$un=$_SESSION["client_name"];

				$sql="select client_id from usersdb where name='$un'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$id=$row["client_id"];
		*/
	for($a=0;$a<$count+1;$a++)
	{
			$name=$users_array[$a];
			$sql="select client_id from usersdb where name='$name'";
			$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
						$ans=$row["client_id"];
				array_push($userid_arr,$ans);
			
				
	}
	$q="SELECT COUNT(group_id) from groupevent";
	$result=mysqli_query($conn,$q);

	$data=mysqli_fetch_assoc($result);

	//	echo $data['COUNT(group_id)'];
		$val=$data['COUNT(group_id)']-1;
	
	$sql="SELECT * FROM groupevent LIMIT $val,1";
	
	$result=mysqli_query($conn,$sql);
	//	echo "query exe!!";
//	$fetched=array();
/*	for($a=0;$a<$val;$a++)
	{
		$row=mysqli_fetch_assoc($result);
		$d=$row["group_id"];
//		echo $d."<br>";
	}
	*/	
		//	echo "after assoc";
		//	echo "after row<br>";
		//	echo "ANS:".$d."<br>";
					//	$recent=intval($fetched);
		//		echo "<br>";
				$row=mysqli_fetch_assoc($result);
				$d=$row["group_id"];
					$newid=$d+1;
	//				echo "after new id<br>".$newid."<br>";
		
			$_SESSION["group_id"]=$newid;
			$_SESSION["group_name"]=$group_name;
		
		for($a=0;$a<$count+1;$a++)
		{
			$sql="insert into groupevent(group_name,group_id,user_id) values('$group_name','$newid','$userid_arr[$a]')";
		//	echo "final query exe";
			if(mysqli_query($conn,$sql))
			{
			//	echo "final query exe";
				echo "Successfully added!!";
				header("location:newGROUPintermediate.php");
			}
			else
			{
				echo "Could not add";
			}
				
		}
	
	
	
?>
