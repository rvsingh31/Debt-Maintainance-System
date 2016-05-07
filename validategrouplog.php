<?php 
		session_start();
	$g_n=$_POST["gname"];
	$g_i=$_POST["gid"];
	$i=$_SESSION["id"];
	include('connection.php');
	
	if(empty($g_n) || empty($g_i))
	{
		header("location:select_event.php?note=Enter the group name/id for logging in !");
		exit;
	}
	$g_name=mysqli_real_escape_string($conn,text_input($g_n));
	$g_id=mysqli_real_escape_string($conn,text_input($g_i));
	
//	echo $g_name;
	//echo $g_id;
	
	$sql="SELECT group_name,group_id from groupevent where group_name='$g_name' and group_id='$g_id'";
	
	$result=mysqli_query($conn,$sql);
		
		if(mysqli_num_rows($result) > 0)
		{
			
			$s="SELECT user_id from groupevent where group_name='$g_name' and group_id='$g_id' and user_id='$i'";
				$t=mysqli_query($conn,$s);
				if(mysqli_num_rows($t) > 0)
				{
						$_SESSION["group_name"]=$g_name;
						$_SESSION["group_id"]=$g_id;
							echo "logged_in";
						header("location:group_main.php");
				}
				else
				{
						echo "not logged";
						header("location:select_event.php?note=You are not a member of this group!");
				}		
			
		}
		else
		{
		//	header("location:newGROUPintermediate.php");
			 $x= "Please enter correct Group name/id!";
			header("location:select_event.php?note=".$x);
		//	echo $x;
		}
	
	
	
	function text_input($variable)
	{
		$variable=trim($variable);
		$varible=stripslashes($variable);
		$variable=htmlspecialchars($variable);
		return $variable;
	}
?>