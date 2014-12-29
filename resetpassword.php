<?php
include_once("dbconnect.inc.php");
$userid = $_POST["uid"];
$newpwd = $_POST["newpassword"];
$mysqli = new mysqli($host, $user, $password, $database);
$query = "update UserProfile set Password='".$newpwd."' where UserID='".$userid."'";
$result = $mysqli->query($query);
if ($mysqli->error) 
	echo 'Password not updated '.$mysqli->error;
else
	echo 'Password has been changed successfully. 
		  To login with your new password
		  <a href="index.html">click here</a>';


?>