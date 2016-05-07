<?php
	$money=0;
	if(isset($_POST["money_s"]))
	{
		$money=$_POST["money_s"];
	}
	

	 echo $money."<br>";
	
	
	session_start();
	
	echo $_SESSION["owe_money"];
	
	if($money>$_SESSION["owe_money"])
	{
		header("location:settlebill.php?money=".$_SESSION["owe_money"]."&err=Enter valid amount!"."&name=".$_SESSION["owe_name"]);
		exit;
	}
	
	$group_id=$_SESSION["group_id"];
	$user_name=$_SESSION["client_name"];
	echo $user_name."<br>";
	$owe_name=$_SESSION["owe_name"];
	
//	echo $group_id."<br>",$user_name."<br>".$owe_name;	
	
include('connection.php');
		
	$sql="select client_id from usersdb where name='$user_name'";
	
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$user_id=$row["client_id"];
	
		
	$sql="select client_id from usersdb where name='$owe_name'";
	
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$owe_id=$row["client_id"];
	// echo "USer-id".$user_id."<br>Owe_id:".$owe_id;
	
	if($money===$_SESSION["owe_money"])
	{
		$sql="delete from split_settle where user_id='$user_id' and group_id='$group_id' and owe_id='$owe_id'";
		if(mysqli_query($conn,$sql))
		{
			echo "settled ie deleted the bill as money= session money<br>";
		}
	}
	else if($money<$_SESSION["owe_money"])
	{
		$v=$_SESSION["owe_money"]-$money;
		$sql="update split_settle set money='$v' where user_id='$user_id' and group_id='$group_id' and owe_id='$owe_id'";
		if(mysqli_query($conn,$sql))
		{
			echo "settled ie updated the bill as money= session money<br>";
		}
	}
	
	header("location:splitsettle.php?bill=Settled with ".ucfirst($owe_name)." just now!");	
		
?>
	
	