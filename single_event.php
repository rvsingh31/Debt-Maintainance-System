<!DOCTYPE html>
<head>
<?php
session_start(); 
if(!isset($_SESSION["client_name"]))
{
	header("location:index.php?msg=Login to access the site!");
	exit();
}

?>
	<title>
		Single Day-To-Day Event
	</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link rel="stylesheet" href="date_picker/css1.css">
		<script src="date_picker/code1.js"></script>
		<script src="date_picker/code2.js"></script>
	
		<link rel="stylesheet" type="text/css" href="groupcss.css">

	
  
  <style>
  #gen:hover{
	color: rgba(255, 255, 255, 1);
 box-shadow: 5px 15px 15px rgba(145, 92, 182, .4);
}
#gen{
	border:none;
	float:right;
	height:40px;
	 text-decoration: none;
 color: rgba(255, 255, 255, 0.8);
 background: rgb(145, 92, 182);
 font-weight: normal;
 text-transform: uppercase;
 transition: all 0.2s ease-in-out;
}
#parallelogram {
    width: 50px;
    height: 30px;
    -webkit-transform: skew(50deg);
       -moz-transform: skew(50deg);
         -o-transform: skew(50deg);
    background: #551a8b;
}

  </style>
</head>
<body style="background-image:url(image.jpg);" onload="fn()">

<nav class="navbar navbar-default"  style="border-bottom: 1px solid #498b50;" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>    
    </div>
    <a class="navbar-brand navbar-center" style="color:black;" href="#">
     Daily Event Management
    </a>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="select_event.php">Home</a></li>
				<li class="active"><a href="single_event.php">Manage Expenses</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
        </ul>
    </div>
</nav>


	<div style="position:fixed;top:15%;left:35%;background:#fde3e3;color:black;width:400px;height:600px;align:center;text-align:center">
			<div style="text-align:center;width:100%;height:10%;position:relative;background:#b0e0e6;color:black;padding-top:10px;">
				<h3 style="text-align:center;padding-bottom:10%;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">Day-To-Day Expense</h3>
			</div>
			<br>
			<h4 style="text-align:center;color:#003b6f;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">Enter your expense with a note.</h4>
			<br>
			<br>	
			<form action="single.php" method="post">
				<table style="margin: 0 auto">
				<tr>
						<td id="date_picker">
							  <script>
								$(function() {
								$( "#datepicker" ).datepicker();
								});
							</script>
							<input type="text" id="datepicker" name="date_val" placeholder="date..." style="width:80%;text-align:center" onblur="disp_d(this.value)" onchange="clear_are(this.value)"  value="<?php if(isset($_GET["d"])){echo $_GET["d"]; }?>">
						</td>
					</tr>
					<tr>
						<td><br></td>
					</tr>
					<tr>
						<td>
							<input type="text" name="expense" style="width:80%;text-align:center;" placeholder="0.00" ></input>							
						</td>
					</tr>
					<tr>
						<td>
							<br>
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="text" name="note" style="width:80%;text-align:center;" placeholder="note..."></input>							
						</td>
					</tr>
					
					<tr>
						<td>
							<br>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Add Expense" style="background-color:#0063ff;top:10%;left:60%;width:60%;color:white;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;"  />
						</td>
					</tr>
				</table>
			</form>
			<br>
			<h4 style="color:#003b6f;text-align:center;padding-top:10%;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">Total Expense</h4>
			<hr style="width: 60%; color:#003b6f ; height: 1px; background-color:black;" />
				<div id="displ"  style="text-align:center;width:100%;height:80px;position:relative;background:#b0e0e6;color:black;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;" >
					<script>
						function display_exp(str) { //alert("in");
							var req = new XMLHttpRequest();
							req.onreadystatechange = function() { //alert(req.readyState);
							if (req.readyState == 4 && req.status == 200) {
									var ou=req.responseText;
								//	alert(ou);
									var arr=new Array();
									arr=ou.split(",");
								//	alert(arr[0]);
								//	alert(arr[1]);
										var a;
										for(a in arr)
										{
										//	alert("in");
											var x=arr[a];
										//	alert(x);
											document.getElementById('displ').innerHTML += x;
										}									
									
							}
						};
								req.open("GET", "display_expense.php?date="+str, true);
								req.send();

							}

							
							function clear_are(str)
							{
							//	alert("in");
							//	alert(str);
								document.getElementById('displ').innerHTML = "";
								display_exp(str);
							}
							
							function fn()
							{
								var passed_date = location.search.split('d=')[1];
							//	alert(passed_date);
								clear_are(passed_date);
							}
					</script>
				
				</div>
		</div> 		
	<button id="gen" style="text-align:center;padding-bottom:0.2%;">Generate EXPENSE Report</button>	
  <div id="parallelogram" style="top:40px;left:86.3%;position:relative" ></div>
	<div id="set" style=" background: rgb(145, 92, 182);top:16%;position:absolute;left:86.6%;height:50%;width:200px;text-align:center;color: rgba(255, 255, 255, 0.8);" >
	<h4>- - SET DATE - - </h4>
	<form action="gen_report.php" method="post">
		<table>
		<tr>
			<td>
				FROM:
			</td>
		</tr>
			<tr>
						<td>
							  <script>
								$(function() {
								$( "#from_date" ).datepicker();
								});
							</script>
							<input type="text" id="from_date" name="from_date" placeholder="from..." style="width:80%;text-align:center">
						</td>
			</tr>
			<tr>
				<td>
					<br>
				</td>
			</tr>
			<tr>
				<td>
					TO:
				</td>
			</tr>
			<tr>
						<td>
							  <script>
								$(function() {
								$( "#to_date" ).datepicker();
								});
							</script>
							<input type="text" id="to_date" name="to_date" placeholder="to..." style="width:80%;text-align:center"  onchange="check()">
						</td>
			</tr>
			<tr>
				<td>
					<br>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class="btn btn-primary btn-lg"  value="Generate" style="width:70%"/>
				</td>
			</tr>	
			<tr>
				<td id="chck" style="color:#e3f2fd;font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">
						<?php if(isset($_GET["msg"])){echo $_GET["msg"];}else{echo "<br>";}?>
				</td>
			</tr>
			<tr>
				<td>
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">View Report</button>
				</td>
			</tr>
		</table>
	</form>
	</div>
	
	<script>
	function check(){
		var frm=document.getElementById("from_date").value;
		var to=document.getElementById("to_date").value;
	//	alert(to);
		var frm_arr=new Array();
		frm_arr=frm.split("/");
		
		var to_arr=new Array();
		to_arr=to.split("/");
		
	//	alert(frm_arr[0]);
	//	alert(to_arr[0])
		if(frm_arr[0]!==to_arr[0])
		{
			document.getElementById("chck").innerHTML="You can generate report for 1 MONTH at max!";
		}
		
	}
	</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a href="del_file.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>
        <h4 class="modal-title" id="myModalLabel">Expense-Report<br>
			<h5>
				(NOTE:Report Generated only once,Previous report will get deleted everytime you <strong>generate</strong> a new one.)
			</h5>
		</h4>
      </div>
      <div class="modal-body">
        <?php
		$un=$_SESSION["client_name"];
			if(file_exists($un."_file.txt"))
			{
					$handle = fopen($un."_file.txt", "r");
				//$data=fread($handle,filesize("file.txt"));
				 while (($line = fgets($handle)) !== false) {
									echo $line;
									echo "<br>";
						}
					
				
			}
			else
			{
				echo "First generate Report!!!";
				
			}
		
		?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="download.php" style="color:#e3f2fd;"><button type="button" class="btn btn-primary">Download</button></a>	
      </div>
    </div>
  </div>
</div>
	
</body>

</html>