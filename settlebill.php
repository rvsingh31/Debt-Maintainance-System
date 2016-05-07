<!DOCTYPE html>	
<?php
	session_start();
	$_SESSION["owe_name"]=$_GET["name"];
	$_SESSION["owe_money"]=$_GET["money"];
?>

<head>
		<title>Settle Bill</title>
		<link rel="stylesheet" type="text/css" href="groupcss.css">
	</head>
	<body style="background-image:url(image.jpg);">
		<div style="position:fixed;top:5%;left:35%;background:#fde3e3;color:black;width:400px;height:600px;align:center;text-align:center">
			<div style="text-align:center;width:100%;height:10%;position:relative;background:#b0e0e6;color:black;padding-top:10px">
				<h3 style="text-align:center">SETTLE-BILL</h3>
			</div>
			<br>
			<h4 style="text-align:center;color:#003b6f">Enter the amount to settle with <?php echo ucfirst($_GET["name"]); ?></h4>
			<br>
			<br>	
			<form action="settle.php" method="post">
				<table style="margin: 0 auto">
					<tr>
						<td>
							<input type="text" name="money_s" style="width:80%;text-align:center;" placeholder="0.00" value="<?php echo $_GET["money"]; ?>" ></input>							
						</td>
					</tr>
					<tr>
						<td style="color:red">
							<br><?php if(isset($_GET["err"])){echo $_GET["err"];}?><br>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Settle" style="background-color:#0063ff;top:10%;left:60%;width:60%;color:white"  />
						</td>
					</tr>
				</table>
			</form>
			<br>
			<br>
			<br>
			<p style="color:#598fcd;text-shadow:1px 1px 1px #e3f2fd;">Enter the amount that has been paid to you by <?php echo ucfirst($_GET["name"]); ?>.</p>
			<p  style="color:#598fcd;text-shadow:1px 1px 1px #e3f2fd;">Initially, the value that appears is the whole bill amount.<p>
			<p  style="color:#598fcd;text-shadow:1px 1px 1px #e3f2fd;">So,if you want to clear the whole bill,just proceed by clicking 'Settle'.<p>
				<div style="text-align:center;width:100%;height:40px;position:relative;background:#b0e0e6;color:black;padding-top:10px">
			</div>
		</div>
			
			
	</body>
	
</html>