<!DOCTYPE html>
<?php
	session_start();
	if(isset($_SESSION["group_name"]) && isset($_SESSION["group_id"]))
	{
		
	}
	else
	{
		header("location:error_page.php");
	}
?>
	<head>
		<title>Group Main Page</title>
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
          <li class="active"><a href="group_main.php">Home</a></li>
				<li><a href="splitsettle.php">Split/Settle</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo $_SESSION["group_name"]; ?> </a></li>
				<li><a href="group_logout.php"><span class="glyphicon glyphicon-log-out"></span> Exit </a></li>
        </ul>
    </div>
</nav>

		
	<h4 style="color:#e3f2fd;text-shadow: #111 2px 2px 2px;">
		The Group Event Management details and information is as follows:
	</h4>
	<br>
	<br>
	<h5 id="tex">
		There are two phases - SPLIT and SETTLE .
	</h5>
	<br>
	<br>
	<div style="width:100%;position:relative;color:white;text-align:center;">
		<h3 style="color:#e3f2fd;text-shadow: #111 2px 2px 2px;text-align:center">SPLIT</h3>
		<hr style="width:60%">
	<p id="para">Here,You can share the bills paid by you on behalf of your whole group .You just need to specify the amount spent by you.</p>
	<p id="para">The amount specified will be automatically divided equally between you and your friends.</p>
	<p id="para">One thing to note is that it also includes you into to the splitting process.So ,keep that in mind and specify the amount.</p>
	<p id="para">In this way ,we are providing you a feature in which you dont need to have a trouble of remembering the money you owe someone.</p>
	<hr style="width:60%">
	</div>
	<br><br>
	<div style="width:100%;position:relative;color:white;text-align:center;">
		<h3 style="color:#e3f2fd;text-shadow: #111 2px 2px 2px;text-align:center">SETTLE</h3>
		<hr style="width:65%">
	<p id="para">Here,You can settle the bills that is being owed by someone else.You just need to specify the amount and the person who owes you that amount.</p>
	<p id="para">The amount will be settled between you and your friend in no time.</p>
	<p id="para">NOTE: You can only settle the bills that you are owed to, not the one which you owe someone , as a matter of integrity.</p>
	<p id="para">As far as security stands , as explained earlier about the settling process, it is way safer .</p>
	<hr style="width:65%">
	</div>
	
	</body>
</html>