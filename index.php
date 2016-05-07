<!DOCTYPE html>
<html>
<head><title>Log In/Sign Up</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="groupcss.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		
</head>
	
	<body>

		<nav class="navbar navbar-default"  style="border-bottom: 1px solid #498b50;" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>    
    </div>
    <a class="navbar-brand navbar-center" style="color:black;" href="#">
   SPLIT-WISE
    </a>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li class="active"><a href="index.php">Login/Register</a></li>
		   <li><a href="about.html">About Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
         <li style="text-align:center;color:blue;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;right:13%;"><?php if(isset($_GET["log_msg"])){echo $_GET["log_msg"];}?></li>
	    </ul>
    </div>
</nav>



	<!--	<h1 id="texthead" style="	text-align:center;text-shadow: #ccc 1px 1px 1px; color:#e3f2fd;align:center;" >SPLIT-WISE</h1><br>  -->      

		<h2 style="	text-align:center;color:#e3f2fd;align:center;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">Login/Register</h2>
	
		<div class="line_left" style="float:left;border-right: groove #e3f2fd;position :relative;padding-bottom:10%;padding-top:5%;padding-right:10%;padding-left:10%;">
			<span><h3 style="align:center;color:#ffe4e1;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">Enter Username and Password to Log In:</h3></span>
			<hr>
			<br>	
			<form action="logincheck.php" method="post">
				<table style="padding:15%;margin:0 auto">
					<tr>
						<td><input id="glowing" type="text" name="l_username" placeholder="Enter username.." onblur="check('l_username')" style="padding:0.7em"/></td>
						<td style="color:red" id="l_username_td">*</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td><input id="glowing" type="password" name="l_password" placeholder="Enter password.." onblur="check('l_password')"  style="padding:0.7em"/></td>
						<td style="color:red" id="l_password_td">*</td>
					</tr>
					<tr>
						<td>
							<a  href="forgotpwd.php" style="float:right;color:white;text-shadow:2px 2px 2px red;">forgot password?</a>
						</td>
					</tr>
					<tr>
						<td style="color:red"><?php if(isset($_GET["msg"])){ echo $_GET["msg"];}else{echo "<br>";}?></td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					<tr>
					<tr>
						<td>
							<?php
								session_start();
								if(isset($_SESSION["wrong"]))
								{
									$f=$_SESSION["wrong"];
									if($f>=2)
									{
										echo "<tr>
													<td>
															<input type='text' name='captcha_log' id='captcha_log' placeholder='enter captcha code...'  onblur='check_captcha_log(this.value)' />
													</td>
													<td>
															<img id='cp_log' src='captcha_log.php' />
													</td>
													<td>
															<button type='button' id='generate_log' style='width:100px'>Refresh</button>
													</td>
												</tr>
												<tr>
													<td id='err_log' style='color:red'>
													</td>
												</tr>";
									}
								}
								else
								{
									echo "";
								}
							?>
						</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					<tr>
					
					<tr>
						<td><input style="width:100px;font-weight:500" type="submit" value="Log In" /></td>
					</tr>
					
				</table>
			</form>
		
		</div>
		<div class="line_right" style="float:right;width:45%;height:40%;align:center;position:relative;padding-left:30px;text-align:center;paddding-right:20px">
			<span style="position:absolute;right:41%"><h3 style="align:center;color:#ffe4e1;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;margin:0 auto;">Register Yourself:</h3></span>
			<br>
			<hr style="width:300px;position:relative;right:5%">
		
			<form action="registeruser.php" method="post" id="register">
				<table style="position:absolute;left:30%"> 
					<tr>
						<td><input  style="padding:0.7em" id="glowing" type="text" name="r_name" placeholder="Enter name.." onblur="validate('r_name')" /></td>
						<td style="color:red" id="name_td">*</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td><input id="glowing" type="text" name="r_username" placeholder="Enter username.." onblur="validate('r_username')"  style="padding:0.7em"  /></td>
						<td style="color:red" id="username_td">*</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td><input id="glowing" type="password" name="r_password" placeholder="Enter password.."  onblur="validate('r_password')"  style="padding:0.7em" /></td>
						<td style="color:red" id="pass_td">*</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td><input id="glowing" type="password" name="r_repassword" placeholder="Enter password again.."  onblur="validate('r_repassword')"  style="padding:0.7em" /></td>
						<td style="color:red" id="repass_td">*</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td><input id="glowing" type="text" name="r_contact" placeholder="Enter contact no.."  onblur="validate('r_contact')"  style="padding:0.7em" /></td>
						<td style="color:red" id="contact_td">*</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td><input id="glowing" type="text" name="r_mail_id" placeholder="Enter mail id.."  onblur="validate('r_mail_id')"  style="padding:0.7em" /></td>
						<td style="color:red" id="mail_td">*</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="captcha" id="captcha" placeholder="enter captcha code..."  onblur="check_captcha(this.value)" />
						</td>
						<td style="padding-left:2%">
							<img id="cp" src="captcha.php" />
						</td>
						<td>
							<button type="button" id="generate" style="width:100px">Refresh</button>
						</td>
					</tr>
					<tr>
						<td id="err_c"  style="color:red"><?php if(isset($_GET["n"])){echo htmlspecialchars($_GET["n"]);}else{echo "<br>";}?></td>
					</tr>
					<tr>
						<td><button type="button" style="width:10em" onclick="if(error===false){document.getElementById('register').submit();}else{alert('Fill the required details');}">Create Account</button></td>
					</tr>

				</table>
			</form>  
		</div>
		
		<script>
		
			$(document).ready(function(){
					
				$("#generate").click(function(){
				//	alert("in");
						$("#cp").attr("src","captcha.php?r="+Math.random());
				});
				
			});
			
			$(document).ready(function(){
					
				$("#generate_log").click(function(){
				//	alert("in");
						$("#cp_log").attr("src","captcha_log.php?r="+Math.random());
				});
				
			});
			
			

		</script>
	<script>
	
	function check_captcha(str)
	{
		var r = new XMLHttpRequest();
		r.onreadystatechange = function() {
		//	alert(r.readyState);
			if (r.readyState == 4 && r.status == 200) {
				var ou=r.responseText;
				if(ou==="false")
				{
						//	alert("in");
							var d=document.getElementById("captcha").value;
						//	alert(d);
							if(d==="")
							{
							//	alert("in");
							document.getElementById("err_c").innerHTML="Enter captcha code!";
							}
							else
							{
									document.getElementById("err_c").innerHTML="Wrong Captcha Code,Try again!";	
							}
							
				}
				else
				{
					document.getElementById("err_c").innerHTML="<br>";
				}
    }
  };
		r.open("GET", "validate_c.php?x="+str+"&type=register", true);

	r.send();

	}
	
	function check_captcha_log(str)
	{
		var r = new XMLHttpRequest();
		r.onreadystatechange = function() {
		//	alert(r.readyState);
			if (r.readyState == 4 && r.status == 200) {
				var ou=r.responseText;
				if(ou==="false")
				{
						//	alert("in");
							var d=document.getElementById("captcha_log").value;
						//	alert(d);
							if(d==="")
							{
							//	alert("in");
							document.getElementById("err_log").innerHTML="Enter captcha code!";
							}
							else
							{
									document.getElementById("err_log").innerHTML="Wrong Captcha Code,Try again!";	
							}
							
				}
				else
				{
					document.getElementById("err_log").innerHTML="";
				}
    }
  };
			r.open("GET", "validate_c.php?x="+str+"&type=log", true);
	

	r.send();

	}
	
	var error=true;
	function validate(field){
			
				if(field==="r_name")
				{
					//	alert("before");
					var value=document.getElementsByName("r_name")[0].value;
				//	alert("in")	
					if(value==="")
					{
						
						document.getElementById("name_td").innerHTML="Enter name";
						error=true;
					}
					else
					{
						document.getElementById("name_td").innerHTML="*";
						error=false;
					}
				}
				else if(field==="r_username")
				{
					//	alert("before");
					var value=document.getElementsByName("r_username")[0].value;
				//	alert("in")	
					if(value==="")
					{
						
						document.getElementById("username_td").innerHTML="Enter username";
						error=true;
					}
					else
					{
						error=false;
						document.getElementById("username_td").innerHTML="*";
					}
				} 
				else if(field==="r_password")
				{
					//	alert("before");
					var value=document.getElementsByName("r_password")[0].value;
				//	alert("in")	
					if(value==="")
					{
						
						document.getElementById("pass_td").innerHTML="Enter password";
						error=true;
					}
					else
					{
						error=false;
						document.getElementById("pass_td").innerHTML="*";
					}
				}
				else if(field==="r_repassword")
				{
					//	alert("before");
					var value=document.getElementsByName("r_password")[0].value;
					var valuecheck=document.getElementsByName("r_repassword")[0].value;
				//	alert("in")	
					if(value==="")
					{
						
						document.getElementById("repass_td").innerHTML="Enter password again.";
						error=true;
					}
					else if(value!==valuecheck)
					{
						document.getElementById("repass_td").innerHTML="Enter password same as above!!";
						error=true;
					}
					else if(value===valuecheck)
					{
						document.getElementById("repass_td").innerHTML="*";
					}
					else
					{
						error=false;
						document.getElementById("repass_td").innerHTML="*";
					}
				}
				else if(field==="r_contact")
				{
					//	alert("before");
					var value=document.getElementsByName("r_contact")[0].value;
				//	alert("in")	
					if(value==="")
					{
						document.getElementById("contact_td").innerHTML="Enter contact details";
						error=true;
					}
					else if(value.match(/\D/g))
					{
							document.getElementById("contact_td").innerHTML="Not a valid phone number!";
						error=true;
					}
					else
					{
						document.getElementById("contact_td").innerHTML="*";
						error=false;
					}
				}
				else if(field==="r_mail_id")
				{
					
					//	alert("before");
					var value=document.getElementsByName("r_mail_id")[0].value;
				//	alert("in")	
					if(value==="")
					{
						
						document.getElementById("mail_td").innerHTML="Enter mail id";
						error=true;
					}
					else if(validateEmail(value)!==true)
					{
								document.getElementById("mail_td").innerHTML="Please enter valid email address";
						error=true;
					}
					else
					{
						document.getElementById("mail_td").innerHTML="*";
						error=false;
					}
				}
		}
		
		
		function check(field){
				if(field==="l_username")
				{
					//	alert("before");
					var value=document.getElementsByName("l_username")[0].value;
				//	alert("in")	
					if(value==="")
					{
						
						document.getElementById("l_username_td").innerHTML="Enter username";
					}
					else
					{
						document.getElementById("l_username_td").innerHTML="*";
					}
				}
				else if(field==="l_password")
				{
					//	alert("before");
					var value=document.getElementsByName("l_password")[0].value;
				//	alert("in")	
					if(value==="")
					{
						
						document.getElementById("l_password_td").innerHTML="Enter password";
					}
					else
					{
						document.getElementById("l_password_td").innerHTML="*";
					}
				}
		}
		
		function validateEmail(email) 
		{
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
	</script>
	
	
	
	</body>

	
</html>