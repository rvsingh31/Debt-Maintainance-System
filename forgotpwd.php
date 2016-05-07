<!DOCTYPE html>

	<head>
		<title>Reset Password</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
				<link rel="stylesheet" type="text/css" href="groupcss.css">
			<style>
			#gen,#val_b{
						border:none;
						width:60%;
						height:40px;
						text-decoration: none;
						color: rgba(255, 255, 255, 0.8);
						background: rgb(145, 92, 182);
						font-weight: normal;
						text-transform: uppercase;
						transition: all 0.2s ease-in-out;
			}
			
			#gen:hover{
						color: rgba(255, 255, 255, 1);
						box-shadow: 10px 5px 5px #e3f2fd;
			}
			
			#val_b:hover{
						color: rgba(255, 255, 255, 1);
						box-shadow: 10px 5px 5px #e3f2fd;
			}
			</style>
	<head>
	
	<body style="background-image:url(image.jpg);">
		<div style="background:#e3f2fd;width:30%;height:70%;align:center;text-align:center;position:absolute;top:15%;left:35%;box-shadow:2px 2px 2px blue;">
		<div style="text-align:center;width:100%;height:10%;position:relative;background:#b0e0e6;color:black;padding-top:10px;">
				<h4 style="text-align:center;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;color:#003b6f;">Enter username to change your password</h4>
		</div>
		<br>
	
				<table style="margin : 0 auto">
					<tr>
						<td>
							<input type="text" name="username" id="ch_u" placeholder="username.." style="width:60%" onfocus="clear_fn()" />
						</td>
						<td>
							<button type="button" onclick="check_uname()" id="val_b" style="width:100%">Check Validity</button>
						</td>
					</tr>
					<tr>
						<td id="err" style="color:red">
						</td>
					</tr>
				</table>

			<br>
			<div id="contact_mail" style="height:20%;width:100%;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;color:#003b6f;">
			</div>
			<span style="position:realtive;color:red"><?php 
					if(isset($_GET["msg"]))
					{
						echo $_GET["msg"]."<br>";
						echo "<a href='index.php' style='text-decoration:none'><button id='gen' type='button' style='position:absolute;bottom:0;float:right;width:50%;background:#b0e0e6;color:#003b6f;'> Back to Home</button></a> ";
					}
				?></span>

		</div>
		
		<script>
				function check_uname()
				{
					str=document.getElementsByName("username")[0].value;
				alert(str);
					var req = new XMLHttpRequest();
					req.onreadystatechange = function() { //alert(req.readyState);
					if (req.readyState == 4 && req.status == 200)
						{
							var result=req.responseText;
							alert(result);
							
							if(result==false)			
							{
							//	alert("in");
								document.getElementById("err").innerHTML="Username incorrect!Please try again";
							}
							else
							{	
								var string="<h4  style='text-align:center;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;color:#003b6f;'>Enter Contact number and your email address</h4><table style='margin:0 auto'><tr><td><input type='text' id='contact' name='contact' placeholder='contact no...' /></td></tr><tr><td><input type='text' id='mail' name='mail' placeholder='mail address..'/></td></tr><tr><td id='details_err' style='color:red'><br></td></tr><tr><td><button id='gen' type='button' onclick='clear_area()'>Proceed</button></td></tr></table>";
								document.getElementById("err").innerHTML="";
								document.getElementById("contact_mail").innerHTML=string;
							}
						}
						
				};
					req.open("GET", "check_name.php?uname="+str, true);
					req.send();

				}
				
				function clear_fn()
				{
				//	alert("clear");
					document.getElementById("contact_mail").innerHTML="";
				}
				function r(a,b)
				{
					var r = new XMLHttpRequest();
					r.onreadystatechange = function() { 
					//	alert(r.readyState);
					if (r.readyState == 4 && r.status == 200)
						{
							var res=r.responseText;
						//	alert(res);
							if(res==="false")
							{
								document.getElementById("details_err").innerHTML="Details entered aren't correct!";
							}
							else
							{	
								var string="<h4  style='text-align:center;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;color:#003b6f;'>Enter new Password</h4><form action='reset.php' method='post'><table style='margin:0 auto'><tr><td><input type='password' id='p' name='pwd' placeholder='new password...' /></td></tr><tr><td><input type='password' id='re_p' name='re_pwd' onblur='c_pass()' placeholder='confirm password..'/></td></tr><tr><td id='pass_err' style='color:red'><br></td></tr><tr><td><input type='submit' value='Change Password' /></td></tr></table>";
								document.getElementById("details_err").innerHTML="<br>";
								document.getElementById("contact_mail").innerHTML="";
								document.getElementById("contact_mail").innerHTML=string;
							}
						}
						
				};
					r.open("GET", "check_con_mail.php?c="+a+"&m="+b, true);
					r.send();

				}
				
				function clear_area()
				{
				//	alert("in");
					
					var c=document.getElementById("contact").value;
					var m=document.getElementById("mail").value;
				//	alert(c);
				//	alert(m);
				//	alert("transfering..");
						r(c,m);
						
				}
				
				function c_pass()
				{
				//	alert("in");
					var x=document.getElementById("p").value;
					var y=document.getElementById("re_p").value;
					
					if(x!==y)
					{
						document.getElementById("pass_err").innerHTML="Enter same password as above!";
					}
					else
					{
						document.getElementById("pass_err").innerHTML="<br>";
					}
				}
		</script>
	</body>
</html>