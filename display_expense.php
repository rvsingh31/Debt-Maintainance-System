<?php
			date_default_timezone_set('Asia/Kolkata');
			$date_value=$_GET["date"];
					session_start();
				include('connection.php');
					$un=$_SESSION["client_name"];
					$sql="select client_id from usersdb where name='$un'";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($result);
					$id=$row["client_id"];
					
					
					if(isset($date_value))
					{
							$d=$date_value;
							$s_date=array();
							$s_date=explode("/",$d);
					}
					else
					{
							$d=date("m/d/Y");
							$s_date=array();
							$s_date=explode("/",$d);
					}
					
					
					
		
					$sql="select expense from singleevent where client_id='$id' and date='$d'";
	
						$result=mysqli_query($conn,$sql);
						$ex=0;
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								$ex=$ex+$row["expense"];
							}
							$str1="";
							$str1="<h2 style='color:#003b6f'>".$ex."</h2>";
						}
						else
						{
							$str1="";
							$str1="<h3 style='color:#003b6f'>No Expenses to show</h3>";
						}
						
		
					$sql="select exp_limit from singleevent where client_id='$id'";
	
						$result=mysqli_query($conn,$sql);
	
						$row=mysqli_fetch_assoc($result);
						$uplimit=$row["exp_limit"];
						
						$exp_value=floatval($ex);
						
						$percent=($exp_value/floatval($uplimit))*100;
						
					$p=date("m/d/Y");
					if(strcmp($d,$p)!==0)
					{
						echo $str1;	
					}
					else
					{
						
					if($percent>=100)
						{
							$str2="";
							$str2="<p style='color:red;opacity:0.9'>LIMIT EXCEEDED</p>";						
						}
						else if($percent>=80)
						{
							$f = sprintf ("%.2f", $percent);
							$str2="";
							$str2="<p style='color:red;opacity:0.9'>EXPENSES REACHED ".$f."% of LIMIT </p>";
						}
						else
						{
							$str2="";
								$str2="<p style='color:#003b6f;opacity:0.7'>LIMIT:".$uplimit."</p>";
						}
						
						echo $str1.",".$str2;
					}	
					
				
						
				?>
				
