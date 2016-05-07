<?php
	session_start();
	$un=$_SESSION["client_name"];
	$myfile=$un."_file.txt";
	unlink($myfile);
	
?>