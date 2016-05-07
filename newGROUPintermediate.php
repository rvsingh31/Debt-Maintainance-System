<!DOCTYPE html>
<html>

		<?php
		
			include('remote_sms/way2sms-api.php');
			
		session_start();
		$grp_name= $_SESSION["group_name"];
		$grp_id=$_SESSION["group_id"];
		
	//	echo $grp_name;
	//	echo $grp_id;
		$message="Welcome to Split-Wise.\n Your Group name is: ".$grp_name."\n and \n group id is:".$grp_id."\n Remember this id and name for log in purpose!.\nThank You";
		include('connection.php');

		$sql="select user_id from groupevent where group_id='$grp_id' and group_name='$grp_name'";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			$id=$row["user_id"];
		//	echo $id."<br>";
			$sql="select contact,email from usersdb where client_id='$id'";
			$r=mysqli_query($conn,$sql);
			$x=mysqli_fetch_assoc($r);
			$contact=$x["contact"];
			$email=$x["email"];
	//		echo $contact."<br>";
			
			    sendWay2SMS ( "8460348865","cannotaccess",$contact,$message);
			//	echo "done sending!"."<br>";
		
		}	
		
		?>

<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
 <body>
 	
		<h4 style="color:#CCAA00;">Your group has been created.</h4>
		<br>
		<h5 style="color:#CCAA00;">Details for the created group is as follows:</h5>
		
		<div style="color:#CCAA00;">Group Name: <?php 
								echo $_SESSION["group_name"];
								?></div>
		<br>
		<div style="color:#CCAA00;">Group ID: <?php
								echo $_SESSION["group_id"];
								?></div>
		<br>
		<div style="color:#CCAA00;opacity:0.7">This Group-name and id will be sent in a form of text-message to all the group members <br>Remember the <strong>group-name</strong> and <strong>id</strong> for future log in .</div>
		
		<a styele="text-decoration: off" href="group_main.php">
		<button id="next" >NEXT</button>
		</a>
</body>
</html>

