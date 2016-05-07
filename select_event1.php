<!DOCTYPE html>
<?php 
		session_start();
		if(isset($_SESSION["client_name"]))
		{}
		else{
					header("location:index.php?msg=Please login to access the site!");
		
		}
			
	?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"> 
 </head>
 <body>
	 
  <script>
  
	$(document).ready(function(){
		$("#single").click(function(){
			if ($('#new_group_div').is(':visible'))
			{
				$("#new_group_div").animate({'marginLeft':'-=600px'});
				$("#new_group_div").slideToggle();
			}
			if ($('#existing_group_div').is(':visible'))
			{
				$("#existing_group_div").animate({'marginLeft':'-=600px'});
				$("#existing_group_div").slideToggle();
			}
			
			
			if ($('#group_div').is(':visible'))
			{
				$("#group_div").slideToggle();
			}
			$("#single_div").slideToggle();
			
		
		});
	
		
		$("#group").click(function(){
			if ($('#new_group_div').is(':visible'))
			{
				$("#new_group_div").animate({'marginLeft':'-=600px'});
				$("#new_group_div").slideToggle();
			}
			if ($('#existing_group_div').is(':visible'))
			{
				$("#existing_group_div").animate({'marginLeft':'-=600px'});
				$("#existing_group_div").slideToggle();
			}
			
			if ($('#single_div').is(':visible'))
			{
				$("#single_div").slideToggle();
			}
			$("#group_div").slideToggle();
		
		});
		
		$("#new_group").click(function(){
			if ($('#new_group_div').is(':visible'))
			{
				$("#new_group_div").animate({'marginLeft':'-=600px'});
				$("#new_group_div").slideToggle();
			
			}
			else
			{
					$("#new_group_div").slideToggle();
					$("#new_group_div").animate({'marginLeft':'+=600px'});
			}
			 if ($('#existing_group_div').is(':visible'))
			{
				$("#existing_group_div").slideToggle();
				$("#existing_group_div").animate({'marginLeft':'-=600px'});
			}
			
		});
		
		
		$("#existing_group").click(function(){
		
			if ($('#existing_group_div').is(':visible'))
			{
				$("#existing_group_div").animate({'marginLeft':'-=600px'});
				$("#existing_group_div").slideToggle();
				
			}
			else
			{
				$("#existing_group_div").slideToggle();
				$("#existing_group_div").animate({'marginLeft':'+=600px'});
			}
			
			if ($('#new_group_div').is(':visible'))
			{
				$("#new_group_div").slideToggle();
				$("#new_group_div").animate({'marginLeft':'-=600px'});
			}
			
		});
	});
  
  </script>
  <div id="top" style="color:#e3f2fd;position:relative;float:top;height:75px;width:100%">
	<span style="color:red;float:left"><?php if(isset($_GET["note"])){
											echo $_GET["note"];
											}
	?></span>
	<span style="color:white;padding-left:85%;text-shadow: #ccc 1px 1px 1px;">
			Welcome
			<?php
					echo $_SESSION["client_name"];
			?>
	</span>
	<span style="color:white;text-shadow: #ccc 1px 1px 1px;padding-left:1%; border-left: groove #e3f2fd"><a href="logout.php" style="text-decoration:none ;color:white">Log Out</a></span>
	<br>
	<br>
	<hr style="float:bottom">
  </div>
 
<div style="position:relative;">
	<h3 style="font-family:sans-serif;color:violet">Choose the type of event you want to create </h3>
	<button  id="single" name="button1" >Single Day-To-Day Event</button>
	
  <button  id="group" name="button2" >Group Event</button>
  <br>
  
  <div id="single_div" >
			<?php
				$un=$_SESSION["client_name"];
			include('connection.php');
			$sql="select client_id from usersdb where name='$un'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$id=$row["client_id"];
		
				$sql="select exp_limit from singleevent where client_id='$id'";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0)
				{	
					echo "<a href='single_event.php' style='color:black;text-decoration:none;'>CLICK HERE</a> to enter your expenses ";
				}
				else
				{
						echo "<form action='setlimit.php' method='post'>
								<table>
								<tr>
								<td>
									Set Limit for Daily Expense-Supervision:
								</td>
								<td>
									<input type='text' name='limit' />
								</td>
								</tr>
							<tr>
								<td>
									<input type='submit' value='Set Limit' />
								</td>
							</tr>
						</table>
					</form> " ;
				}
			?>
			
	</div>
  <div id="group_div" >
		<button id="new_group">New Group</button>	
		<button id="existing_group">Pre-Existing Group</button>
  </div>
  <div id="new_group_div" style="height:140%">
		<form action="create.php" id="create">
			<table>
				<tr>
					<td>Group Name:</td>
					<td><input type="text" name="group_name" placeholder="Enter group name"></input></td>
				</tr>
				<tr>
					<td>No of members in the group:<span style="opacity:0.4">(except you)</span></td>
					<td><input type="text" id="user_count" name="no_of_members" placeholder="No. of members..." onblur="create_row(this.value)" onfocus="cl()" /></td>
					<td style="opacity:0.4" id="number_err">Press Tab to enter users</td>
				</tr>
				<tr>
					<td>
						<span id="dynamic_data_rows">
						</span>
					</td>
				</tr>
				<tr>
					<td>
						<button type="button" style="width:10em" onclick="reg_chck()">Create Group</button>
					</td>
				</tr>
			</table>
		</form>
  </div>
  
   <div style="height:20em" id="existing_group_div">
	<form action="validategrouplog.php" method="post">
	<!--   -->
		<table>
			<tr>
				<td>Enter your Group name:</td>
				<td><input type="text" id="gname" name="gname" placeholder="Enter your Group name"  /></td>
			</tr>
			
			<tr>
				<td>Enter your Group id:</td>
				<td><input type="text" id="gid" name="gid" placeholder="Enter your Group id" /></td>
			</tr>
			
			<tr>
				<td><input type="submit" value="Log in" /></td> 
			<!--	<td><button onclick="execute()" >Log in</button></td> -->
			</tr>
		</table>
	</form>
   </div>
  </div>
<script>


	function cl()
	{
			document.getElementById("number_err").innerHTML="Press Tab to enter users";
		document.getElementById("dynamic_data_rows").innerHTML="";
	}


	function create_row(str){
//	alert("in");

		if(str.match(/\D/g))
		{
			document.getElementById("number_err").innerHTML="Not a valid input!";
		}
		var number=parseInt(str);
		var i;
		for(i=0;i<number;i++)
		{
			var assgn="user"+(i+1);
			var err=assgn+"_err";
			var td1=document.createElement("TD");
			var td2=document.createElement("TD");
			var td3=document.createElement("TD");
			var tr=document.createElement("TR");
	//		var t = document.createTextNode("Enter "+assgn+":");
			td1.innerHTML="Enter "+assgn+":";
		//	td2.appendChild(t);
			td2.innerHTML="<input type='"+"text' list='"+"datalist_ele' name='"+assgn+"' id='"+"findyou' onfocus='"+"fetch_fn(this.name)' onblur='"+"clearArea(this.value,this.name)' placeholder='"+"Enter your Search' ></input><datalist id='"+"datalist_ele' ></datalist>";
			td3.innerHTML="<span id='"+err+"' style='color:red'></span>";
			document.getElementById("dynamic_data_rows").appendChild(tr);
			document.getElementById("dynamic_data_rows").appendChild(td1);
			document.getElementById("dynamic_data_rows").appendChild(td2);
			document.getElementById("dynamic_data_rows").appendChild(td3);
		}
		
	}
   
	
function fetch_fn(str) {
	//alert("in");
	
	var id=str+"_err";
	var req = new XMLHttpRequest();
  req.onreadystatechange = function() { //alert(req.readyState);
    if (req.readyState == 4 && req.status == 200) {
       var ou=req.responseText;
				//alert(ou);
				var user_array=new Array();
				user_array=ou.split(",");
				
				var a;
					for(a in user_array)
					{
						
						var option = document.createElement("option");
						option.value=user_array[a];
						document.getElementById("datalist_ele").appendChild(option);
					}
					//alert("outside loop");
					
					document.getElementById(id).innerHTML="";
    }
  };
  req.open("GET", "fetch.php", true);
  req.send();

}
function clearArea(str,na)
{	//alert("in clearArea");
	
	document.getElementById("findyou").placeholder="Enter your search";
	document.getElementById("datalist_ele").innerHTML="";
	alert(str);
	check_user(str,na);
	
}
var err=true;
function check_user(u,name){
//	alert(u);
	var id=name+"_err";
	alert(id);
	var r = new XMLHttpRequest();
  r.onreadystatechange = function() { //alert(r.readyState);
    if (r.readyState == 4 && r.status == 200) {
       var ou=r.responseText;
	  alert(ou);
			//	alert(typeof(str));
					if(ou==='true')
					{
						alert("yes");
						document.getElementById(id).innerHTML="";
						err=false;
					
					}
					else
					{
						alert("no");
					/*	if(u=="")
						{
							document.getElementById(id).innerHTML="Name is required!";
								err=true;
						}
						else
							{
							*/		//	alert("in");
								document.getElementById(id).innerHTML="Not a registered User!";
								err=true;
							//}
					}
				
    }
  };
  r.open("GET", "check_entered_user.php?user="+u, false);
  r.send();
	
	
}


function reg_chck(){
	if(err===false)
	{
		document.getElementById('create').submit();
	}
	else
	{
		alert('Enter all the fields as specified!');
	}
}	
</script>

</body>
</html>