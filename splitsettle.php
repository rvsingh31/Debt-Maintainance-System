<!DOCTYPE html>	

<head>
		<title>Split/Settle</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="groupcss.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	<body style="background-image:url(image.jpg);">
	
<nav class="navbar navbar-default"  style="border-bottom: 1px solid #498b50;" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>    
    </div>
    <a class="navbar-brand navbar-center" style="color:black;" href="#">
      Group Event Management
    </a>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="group_main.php">Home</a></li>
			<li class="active"><a href="splitsettle.php">Split/Settle</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php session_start(); echo $_SESSION["group_name"]; ?> </a></li>
				<li><a href="group_logout.php"><span class="glyphicon glyphicon-log-out"></span> Exit </a></li>
        </ul>
    </div>
</nav>


		
	
	
	<h4 style="color:#e3f2fd;text-shadow: #111 2px 2px 2px;">Select the below mentioned options to create a further update in the group details:</h4>

	
		<div id="split" style="float:left;text-align:center;height:100%;color:white;border-right: groove #e3f2fd;position :relative;padding-bottom:10%;padding-top:5%;padding-right:7%;padding-left:10%;">
				<span><h3 style="align:center;color:#ffe4e1">SPLIT</h3></span>
				<br>
				<br>
				<h4>Enter the amount</h4>
				<hr>
				<form action="split.php" method="post">
					<table>
						<tr>
							<td><input  id="amt" name="money" placeholder="Amount..." onblur="check()" /></td>
						</tr>
						<tr>
							<td id="check_err" style="color:red"></td>
						</tr>
						<tr>
							<td><br></td>
						</tr>
						<tr>
							<td><input type="submit" value="Split" style="color:black; width:60%"/></td>
						</tr>
						<tr>
							<td style="color:red;"><?php  if(isset($_GET["res"])){ echo $_GET["res"];}else{echo "<br>";}?></td>
						</tr>
						
					</table>
				</form>
		</div>

			<script>
						function check(){
					//	alert("before");
					var value=document.getElementById("amt").value;
				//	alert("in")	
					if(value==="")
					{
						
						document.getElementById("check_err").innerHTML="Enter the amount.";
					}
					else
					{
						document.getElementById("check_err").innerHTML="";
					}
							}
	
			</script>
		<div id="settle" style="float:left;height:600px;color:white;position :relative;padding-bottom:10%;padding-top:5%;padding-right:20%;padding-left:17%;">
			<span><h3 style="align:center;color:#ffe4e1">SETTLE</h3></span>
			<br>
			<br>
			<p style="color:white;">NOTE: Press the settle button to settle your bills.<p>
			<hr>
			<br>
			<h4>--Current Status--</h4>
			<br>
			<?php
				include('connection.php');
					$groupid=$_SESSION["group_id"];
					$username=$_SESSION["client_name"];
					
					$sql="select client_id from usersdb where name='$username'";
					//	echo "aftr sql";
					$result=mysqli_query($conn,$sql);
					//	echo "aftr exe";
	
					//			echo "before while";
					$id="";
					while($row=mysqli_fetch_assoc($result))
					{
				//			echo "in while" ;
						$id=$row["client_id"];
					}
				//	echo $id;
					
					$sql="select money,owe_id from split_settle where group_id='$groupid' and user_id='$id' ";
					$result=mysqli_query($conn,$sql);
					$owe=array();$m=array();
					while($row=mysqli_fetch_assoc($result))
					{
						array_push($m,$row["money"]);
						array_push($owe,$row["owe_id"]);
					}
					$length=sizeof($owe);
				//	echo sizeof($m)."<br>";
					$arr=array();
					for($a=0;$a<$length;$a++)
					{
					//	echo "in<br>";
						$i=$owe[$a];
					//	echo $i."<br>";
						$sql="select name from usersdb where client_id='$i' ";
						$result=mysqli_query($conn,$sql);
						
						$row=mysqli_fetch_assoc($result);
						//	echo $row["name"];
						//	$mo=$m[$b];
						//	echo $mo;
						//	$n=$row["name"];
						//	echo "<p>".$n." owes you RS. ".$mo."</p><br>";
							array_push($arr,$row["name"]);
					}
					$count=sizeof($arr);
					for($b=0;$b<$count;$b++)
					{
						echo "<p style='"."color:#e3f2fd;'>".ucfirst($arr[$b])." owes you Rs. ".$m[$b]."  =><a style='text-decoration:none;color:black' href='settlebill.php?name=$arr[$b]&money=$m[$b]'><button style='color:black;text-align:center;display: inline-block;border: none;font-size: 1.4rem;  padding: 0.6rem 1.3em; background: #3f2fd; border-bottom: 1px solid #498b50;'>Settle</button></a></p><br>";
					}
					echo "<br>";
				echo "<hr  style='border-top: dotted 1px;' >";
					echo "<br>";
					$sql="select money,user_id from split_settle where group_id='$groupid' and owe_id='$id'";
					$result=mysqli_query($conn,$sql);
						$users=array();$user_m=array();
						while($row=mysqli_fetch_assoc($result))
						{
							array_push($user_m,$row["money"]);
							array_push($users,$row["user_id"]);
						}
					$length2=sizeof($users);
					$user_arr=array();
						for($c=0;$c<$length2;$c++)
						{
									$j=$users[$c];
									$sql="select name from usersdb where client_id='$j' ";
									$result=mysqli_query($conn,$sql);
									$row=mysqli_fetch_assoc($result);
										array_push($user_arr,$row["name"]);
						}
						$count2=sizeof($user_arr);
						for($d=0;$d<$count2;$d++)
						{
							echo "<p style='color:#e3f2fd'>You owe ".ucfirst($user_arr[$d])." Rs ".$user_m[$d]."</p><br>";
						}
		//					echo "<br>";
						echo "<hr>";
			?>
					</div>
		
</body>
</html>